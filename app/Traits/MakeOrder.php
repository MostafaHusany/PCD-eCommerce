<?php


namespace App\Traits;

use App\Fee;
use App\Taxe;
use App\Order;
use App\Product;
use App\Invoice;
use App\Customer;
use App\Shipping;
use App\PromoCode;
use App\OrderProduct;
use App\Traits\MakeOrder;

trait MakeOrder {
    /**
     * # In case of order updates : 
     * Can we reuse the create_customer_order , or should we build another method
     * Lets build another method in hope no bugs happen in between 
     */
    public function create_customer_order ($customer_id, 
                                            Array $shipping_data, // [shipping_id, is_free_shipping, shipping_cost]
                                            Array $products_data, // [products_id, products_quantity]
                                            Array $fees_ids = [],      // list of fees ids
                                            $promo_code = null
                                        ) 
    {
        // dd($customer_id, $shipping_data, $products_data);
        // dd($products_data);
        
        /**
         * 0- check if there promo code
         * 1- create a order
         * 2- create for each product in the order sold_product record
         * 3- remove the left quantityt of the requested sold product
         * 4- calculate the taxes 
         */
        if (isset($promo_code)) {
            $promo_code = PromoCode::where('code', $promo_code)->first(); 
        }

        $target_customer = Customer::find($customer_id);
        
        $new_order = Order::create([
            'code'          => 'cs-' . time(), 
            'customer_id'   => $customer_id,

            'shipping_id'       => $shipping_data[0],
            'is_free_shipping'  => $shipping_data[1],
            'shipping_cost'     => $shipping_data[2],
            
            'country_id' => $target_customer->country_id,
            'gove_id' => $target_customer->gove_id,
            'address' => $target_customer->address,

            'sub_total'     => 0,
            'total'         => 0,
            'promo_code_id' => isset($promo_code) ? $promo_code->id : null
        ]);

        $new_order = $this->update_order_calculation($new_order, $products_data, $fees_ids);
        
        // create an invoive for the order Invoice
        $this->create_order_invoice($new_order);

        return $new_order;
    }

    public function update_customer_order ($target_order_id,
                                            $customer_id,
                                            Array $shipping_data, // [shipping_id, is_free_shipping, shipping_cost]
                                            Array $products_data, // [products_id => [1, 2, ...], 
                                                                  //  products_quantity => [product_id => [quantity => 2, price => 0.0]] ]
                                            Array $fees_ids = []      // list of fees ids
                                        ) 
    {
        /**
         * 
         */

        $target_order = Order::find($target_order_id);

        if ($target_order->status !== -1) {
            $this->restore_order_all_products($target_order);
        }

        /** 
         * # Update main order data like ...
         * customer_id, shipping_id, is_free_shipping and shipping_cost
         * */
        $target_order->update([ 
            'customer_id'   => $customer_id,

            'shipping_id'       => $shipping_data[0],
            'is_free_shipping'  => $shipping_data[1],
            'shipping_cost'     => $shipping_data[2],
            
            'sub_total'     => 0,
            'total'         => 0,
            'status'        => $target_order->status == -1 ? 0 : $target_order->status
        ]);

        // delete old order products linked to this order
        $target_order->order_products()->delete();

        $target_order = $this->update_order_calculation($target_order, $products_data, $fees_ids);
        
        $this->create_order_invoice($target_order);
        
        return $target_order;

    }

    // main method used in the public and chain the methods down
    private function restore_order_all_products ($target_order) {
        /** 
         *  # If order is not already restored, restore all order products
         **/
        $order_meta         = (array) json_decode($target_order->meta);
        $order_quantity     = (array) $order_meta['products_quantity'];
        $order_restored_q   = (array) $order_meta['restored_quantity'];
        $target_products    = $target_order->products()->distinct()->get();

        // dd($order_quantity, $target_products, $order_restored_q);
        // restore old qunatity
        foreach ($target_products as $target_product) {
            $target_product_quantity = (array) $order_quantity[$target_product->id];
            // $this->restore_reserved_products($target_product, $target_product_quantity['quantity'] - $order_restored_q[$target_product->id]);
            $this->restore_reserved_products($target_product, $target_product_quantity['quantity']);
        }
    }

    private function restore_reserved_products ($target_product, $order_quantity) {
        if ($target_product->is_composite === 1) {
            $target_children = $target_product->children;        
            $parent_product_meta = (array) json_decode($target_product->meta);
            $products_quantity   = (array) $parent_product_meta['products_quantity'];
    

            foreach ($target_children as $child_product) {
                $requested_quantity          = $products_quantity[$child_product->id] * $order_quantity;

                $child_product->reserved_quantity += $requested_quantity;
                $child_product->save();
            }
        }

        $target_product->quantity += $order_quantity;
        $target_product->save();
    }

    private function restore_order_meta ($target_order) {
        /**
         * Store the restored items in the meta of 
         * the order, we use this in restoring all the 
         * order products.
         * */ 
        $target_order_meta    = (array) json_decode($target_order->meta);
        $requested_quantity   = (array) $target_order_meta['products_quantity'];
        $restored_quantity    = [];

        foreach ($requested_quantity as $product_id => $product_meta) {
            $product_meta = (array) $product_meta;
            $restored_quantity[$product_id] = $product_meta['quantity'];
        }

        $target_order_meta['restored_quantity'] = $restored_quantity;
        $target_order->meta = json_encode($target_order_meta);
    }


    // main method used in the public and chain the methods down
    private function update_order_calculation ($target_order, $products_data, Array $fees_ids) {
        /* 
            # Array $products_data [products_id => [1, 2, ...], 
                                    products_quantity => [product_id => [quantity => 2, price => 0.0]] ]
        */
        
        // START CREATE SOLD-PRODUCTS RECORD FOR EACH PRODUCT IN THE ORDER
        $results = $this->create_order_sold_products($target_order, $products_data);

        $sub_total          = $results['sub_total'];
        $products_count     = $results['products_count'];
        $meta               = $results['meta'];

        // START CALCULATE TAXES
        $tax_result = $this->calculate_all_taxe($products_count, $sub_total);
        $tax_total  = $tax_result['total_tax'];
        $meta['taxes'] = $tax_result['tax_meta'];
        
        // START CALCULATE FEES
        $fee_result = $this->calculate_all_fees($products_count, $sub_total, $fees_ids);
        $fee_total  = $fee_result['fee_total'];
        $meta['fees'] = $fee_result['fee_meta'];

        // START CALCULATE 
        // $promo_code_discount = $this->calculate_promocode_discount($target_order);
        $total = $sub_total + $target_order->shipping_cost + $tax_total + $fee_total;
        if (isset($target_order->promo_code)) {
            $promo_code = $target_order->promo_code;
            $discount = $target_order->promo_code->type == 'fixed' ? $promo_code->value : $promo_code->value / $total * 100;
            $total   -= $discount;
            $target_order->promo_code_discount = $promo_code->value;
        }

        $target_order->sub_total = $sub_total;
        $target_order->taxe      = $tax_total;
        $target_order->fee       = $fee_total;
        $target_order->total     = $total;
        $target_order->meta      = json_encode($meta);
        $target_order->save();

        return $target_order;
    }// end :: update_order_calculation
    
    private function create_order_sold_products ($target_order, $products_data) {
        /**
         * # Each order consist of group of products and we create for each 
         * order a sold product record for better reports works. 
         */
        $products = Product::whereIn('id', $products_data[0])->where('quantity', '>', 0)->get();

        $sub_total          = 0;
        $products_count     = 0;
        $products_quantity  = $products_data[1];
        
        $meta = [ 
            'products_id'       => $products_data[0], 
            'products_quantity' => $products_data[1],
            'products_prices'   => [], 
            'restored_quantity' => [], 
            'taxes' => [], 
            'fees'  => []
        ];

        // dd($meta);

        /**
         * # Create for each product in the order a sold_product item
         * # Update each product quantity
         * 
         * Notice that we need to check if ther is a promotion and get the products 
         * with the promotion with the new price ... 
         * also there may be a trick if there is promotion for only first 3 items 
         * When the user select item with promotion he can only get the item with
         * the specific quantity of promotion
         * 
         * # We need to check on the product in the list, 
         * if the product is composite we need to get the 
         * children products and than start creating sold-
         * produtcs record and linked to the parent product  
        */

        $data  = [];
        $data2 = [];
        foreach ($products as $product) {
            $targted_product_quantity = (array) $products_quantity[$product->id];
            $products_count          += (int) $targted_product_quantity['quantity']; 
            
            for ($i = 0; $i < $targted_product_quantity['quantity']; $i++) {
                $data[] = [
                    'order_id'   => $target_order->id,
                    'product_id' => $product->id, 
                    'ar_name'    => $product->ar_name,
                    'en_name'    => $product->en_name,
                    'sku'        => $product->sku,
                    'code'       => $target_order->code,
                    'price_when_order'  => $product->get_price(),
                    'created_at' => $target_order->created_at,
                    'updated_at' => $target_order->updated_at
                ];

                if ($product->is_composite == 1) {
                    /* 
                        # If this product is composite product bring his children and start
                        creating sold product record for each one and link it to main product
                    */ 
                    // dd($product->children);
                    foreach ($product->children as $child) {
                        // dd($child);
                        $data2[] = [
                            'order_id'   => $target_order->id,
                            'product_id' => $child->id, 
                            'ar_name'    => $child->ar_name,
                            'en_name'    => $child->en_name,
                            'sku'        => $child->sku,
                            'code'       => $target_order->code,
                            'price_when_order'  => $child->get_price(),
                            'created_at' => $target_order->created_at,
                            'updated_at' => $target_order->updated_at,
                            'is_child'   => 1,
                            'parent_product_id' => $product->id
                        ];
                    }
                } elseif ($product->is_composite == 2) {
                    // $meta = (array) json_decode($product->meta);
                    $upgrade_options_list = (array) $targted_product_quantity['upgrade_options_list'];
                    $children = Product::whereIn('id', $upgrade_options_list)->get();

                    foreach ($children as $child) {
                        $data2[] = [
                            'order_id'   => $target_order->id,
                            'product_id' => $child->id, 
                            'ar_name'    => $child->ar_name,
                            'en_name'    => $child->en_name,
                            'sku'        => $child->sku,
                            'code'       => $target_order->code,
                            'price_when_order'  => $child->get_price(),
                            'created_at' => $target_order->created_at,
                            'updated_at' => $target_order->updated_at,
                            'is_child'   => 1,
                            'parent_product_id' => $product->id
                        ];
                    }
                }
            }

            // check if the product has a promotion update the promotion data
            if ($product->has_promotion()) {
                $product->update_promotion($targted_product_quantity['quantity']);
            }

            // this line need refactore because this calling the database in a loop !!
            $this->update_product_quantity($product, $targted_product_quantity);

            $meta['products_prices'][$product->id]      = $product->get_price();
            $meta['restored_quantity'][$product->id]    = 0;
            $sub_total += $targted_product_quantity['price'] * $targted_product_quantity['quantity'];
        }

        $new_order_product = OrderProduct::insert($data);
        OrderProduct::insert($data2);
        return ['sub_total' => $sub_total, 'products_count' => $products_count, 'meta' => $meta];
    }// end :: create_order_sold_products

    private function update_product_quantity ($target_product, $order_quantity) {

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
                $requested_quantity = $products_quantity[$child_product->id] * $order_quantity['quantity'];
                $child_product->reserved_quantity -= $requested_quantity;
                $child_product->save();
            }
        } 
        elseif ($target_product->is_composite == 2) {
            $upgrade_options_list = (array) $order_quantity['upgrade_options_list'];
            $target_children      = Product::whereIn('id', $upgrade_options_list)->get();
            $parent_product_meta  = (array) json_decode($target_product->meta);
            $products_quantity    = (array) $parent_product_meta['products_quantity'];

            foreach ($target_children as $child_product) {
                // get the needed quantity of the child product for the main
                $requested_quantity = $products_quantity[$child_product->id] * $order_quantity['quantity'];
                $child_product->quantity -= $requested_quantity;
                $child_product->save();
            }
        }
        
        $target_product->quantity -= $order_quantity['quantity'];
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
    }// end :: calculate_all_taxe

    private function calculate_all_fees ($products_count, $sub_total, $targted_fees_ids = null, $targted_fees = null) {
        // get targted fees
        $targted_fees = $targted_fees_ids != null ? 
                            Fee::whereIn('id', $targted_fees_ids)->get() 
                        : ($targted_fees != null ? $targted_fees : Fee::where('is_active', 1)->get());
        
        $fee_total = 0;
        $fee_meta  = [];
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
    }// end :: calculate_all_fees

    private function create_order_invoice ($target_order) {
        /**
         * Here we will create order invoice, 
         * there is two choices for order ... 
         * 1- the order don't have an invoice so we need to create the invoice
         * 2- the order already has an invoice so we can update the invoice.
         * 
         * Notice there is this situation when the order is delivired and fully paid
         * than the user want to restore the order, what sholud we do for the invoice ?!
         */

        // check if the order has an invoice 
        $order_invoice = $target_order->invoice == null ? new Invoice() : $target_order->invoice;
        
        $order_invoice->status      = $order_invoice->status != 'paid' || $order_invoice->status != 'check_payment_transaction' ? 'waiting_payment' : $order_invoice->status;
        $order_invoice->order_id    = $target_order->id;
        $order_invoice->sub_total   = $target_order->sub_total;
        $order_invoice->fee         = $target_order->fee;
        $order_invoice->tax         = $target_order->taxe;
        $order_invoice->shipping    = $target_order->is_free_shipping ? 0 : $target_order->shipping_cost;
        $order_invoice->total       = $target_order->total;
        $order_invoice->save();

        return $order_invoice;
    }

}