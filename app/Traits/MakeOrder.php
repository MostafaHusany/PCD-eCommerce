<?php


namespace App\Traits;

use App\Fee;
use App\Taxe;
use App\Order;
use App\Product;
use App\Shipping;
use App\OrderProduct;

trait MakeOrder {
    public function create_customer_order ($customer_id, 
                                            Array $shipping_data, // [shipping_id, is_free_shipping, shipping_cost]
                                            Array $products_data, // [products_id, products_quantity]
                                            Array $fees_ids = []      // list of fees ids
                                        ) 
    {
        // dd($customer_id, $shipping_data, $products_data);
        
        /**
         * 1- create a order
         * 2- create for each product in the order sold_product record
         * 3- remove the left quantityt of the requested sold product
         * 4- calculate the taxes 
         */
        $new_order = Order::create([
            'code'          => 'cs-' . time(), 
            'customer_id'   => $customer_id,

            'shipping_id'       => $shipping_data[0],
            'is_free_shipping'  => $shipping_data[1],
            'shipping_cost'     => $shipping_data[2],
            
            'sub_total'     => 0,
            'total'         => 0,
        ]);

        $this->update_order_calculation($new_order, $products_data, $fees_ids);
        // dd($new_order);
        return $new_order;
    }

    private function update_order_calculation ($target_order, $products_data, Array $fees_ids) {
        /* 
            # Array $products_data [products_id => [1, 2, ...], 
                                    products_quantity => [product_id => [quantity => 2, price => 0.0]] ]
        */
        
        $meta = [ 
            'products_id'       => $products_data[0], 
            'products_quantity' => $products_data[1],
            'products_prices'   => [], 
            'restored_quantity' => [], 
            'taxes' => [], 
            'fees'  => []
        ];

        $products = Product::whereIn('id', $products_data[0])->where('quantity', '>', 0)->get();
        
        $sub_total          = 0;
        $products_count     = 0;
        $products_quantity  = $products_data[1];

        /**
         * # Create for each product in the order a sold_product item
         * # Update each product quantity
        */
        foreach ($products as $product) {
            $targted_product_quantity = (array) $products_quantity[$product->id];
            $products_count          += (int) $targted_product_quantity['quantity']; 
            
            $data = [];
            for ($i = 0; $i < $targted_product_quantity['quantity']; $i++) {
                $data[] = [
                    'order_id'   => $target_order->id,
                    'product_id' => $product->id, 
                    'ar_name'    => $product->ar_name,
                    'en_name'    => $product->en_name,
                    'sku'        => $product->sku,
                    'code'       => $target_order->code,
                    'price_when_order'  => $product->price,
                    'created_at' => $target_order->created_at,
                    'updated_at' => $target_order->updated_at
                ];
            }

            $new_order_product = OrderProduct::insert($data);

            $this->update_product_quantity($product, $targted_product_quantity['quantity']);

            $meta['products_prices'][$product->id]      = $product->price;
            $meta['restored_quantity'][$product->id]    = 0;
            $sub_total += $targted_product_quantity['price'] * $targted_product_quantity['quantity'];
        }

        // START CALCULATE TAXES
        $tax_result = $this->calculate_all_taxe($products_count, $sub_total);
        $tax_total  = $tax_result['total_tax'];
        $meta['taxes'] = $tax_result['tax_meta'];
        
        // START CALCULATE FEES
        $targted_fees_ids;
        $fee_result = $this->calculate_all_fees($products_count, $sub_total, $fees_ids);
        $fee_total  = $fee_result['fee_total'];
        $meta['fees'] = $fee_result['fee_meta'];

        // dd($tax_total, $target_order);
        $target_order->sub_total = $sub_total;
        $target_order->taxe      = $tax_total;
        $target_order->fee       = $fee_total;
        $target_order->total     = $sub_total + $target_order->shipping_cost + $tax_total + $fee_total;
        $target_order->meta      = json_encode($meta);
        $target_order->save();

    }// end :: update_order_calculation

    public function update_product_quantity ($target_product, $order_quantity) {

        /**
         * # This method is used to update the 
         * quantiy of the products.
         * 
         * # Check if the product is a composit product
         * and change the children products quantity.
         */
        if ($target_product->is_composite === 1) {
            $target_children     = $target_product->children;
            $parent_product_meta = (array) json_decode($target_product->meta);
            $products_quantity   = (array) $parent_product_meta['products_quantity'];

            foreach ($target_children as $child_product) {
                // get the needed quantity of the child product for the main
                $requested_quantity = $products_quantity[$child_product->id] * $order_quantity;
                $child_product->reserved_quantity -= $requested_quantity;
                $child_product->save();
            }
        }
        
        $target_product->quantity -= $order_quantity;
        $target_product->save();
    }// end :: update_product_quantity

    private function calculate_all_taxe ($products_count, $sub_total) {
        /**
         * Get all active taxes, 
         * loop in the taxe, and notice that there is
         * severals types of taxes, a per-item per-package
         * a percnentage and fixed
         * and we need calculate the tax in right way
         * 
         * check if the tax per item or per package, 
         * if per-item we need to loop through the products 
        */
        
        $targted_taxes  = Taxe::where('is_active', 1)->get();
        $tax_total = 0;
        /**
         * We need to store the selected taxe
         * and store it in the meta to have a history 
         * about the tax that been added intime for this 
         * order. $tax_meta = [$tax_obj, $tax_obj, ....];
         *  
        */

        $tax_meta = [];
        foreach ($targted_taxes as $tax) {
            $tmp_tax_total = 0;
            if ($tax->cost_type) {// per item
                // loop through the products and get the tax cost for each product
                $tmp_tax_total = $tax->is_fixed ? $tax->cost * $products_count : $sub_total * $tax->cost / 100 ;
            } else {
                // just add the cost on the package
                $tmp_tax_total = $tax->is_fixed ? $tax->cost : $sub_total * $tax->cost / 100 ;
            }
            
            $tax_total += $tmp_tax_total;
            $tax_meta[] = ['id' => $tax->id, 'title' => $tax->title, 'cost' => $tax->cost, 
                            'is_fixed' => $tax->is_fixed, 'cost_type' => $tax->cost_type, 
                            'tax_total' => $tmp_tax_total, 'is_active' => $tax->is_active]; 
        }
        
        return ['total_tax' => $tax_total, 'tax_meta' => $tax_meta];
    }

    private function calculate_all_fees ($products_count, $sub_total, $targted_fees_ids) {
        // get targted fees
        $targted_fees = Fee::whereIn('id', $targted_fees_ids)->get();
        $fee_total = 0;

        $fee_meta = [];
        foreach ($targted_fees as $fee) {
            $tmp_fee_total = 0;
            if ($fee->cost_type) {
                // loop through the products and get the fee cost for each product
                $tmp_fee_total = $fee->is_fixed ? $fee->cost * $products_count : $sub_total * $fee->cost / 100 ;
            } else {
                // just add the cost on the package
                $tmp_fee_total = $fee->is_fixed ? $fee->cost : $sub_total * $fee->cost / 100 ;
            }

            $fee_total += $tmp_fee_total;
            $fee_meta[] = ['id' => $fee->id, 'title' => $fee->title, 'cost' => $fee->cost, 
                            'is_fixed' => $fee->is_fixed, 'cost_type' => $fee->cost_type, 
                            'fee_total' => $tmp_fee_total, 'is_active' => $fee->is_active]; 
        }
        
        return ['fee_total' => $fee_total, 'fee_meta' => $fee_meta];
    }

}