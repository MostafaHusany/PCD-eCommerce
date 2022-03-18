<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Order;
use App\Product;
use App\OrderProduct;

use App\Traits\MakeOrder;

class SoldProductsController extends Controller
{
    use MakeOrder;

    public function index (Request $request) {
        $tmp = OrderProduct::get();
        
        if ($request->ajax()) {
            $model = OrderProduct::query()->with('categories')->orderBy('id', 'desc');
            
            if (isset($request->name)) {
                $model->where(function ($q) use ($request) {
                    $q->orWhere('ar_name', 'like', "%$request->name%");
                    $q->orWhere('ar_name', 'like', "%$request->name%");
                });
            }
            
            if (isset($request->code)) {
                $model->where('code', 'like', "%$request->code%");
            }

            if (isset($request->status)) {
                $model->where('status', $request->status);
            }

            if (isset($request->sku)) {
                $model->where('sku', 'like', "%$request->status%");
            }
            // return $model->categories;
            if (isset($request->category)) {
                $model->whereHas('categories', function ($q) use ($request) {
                    $q->where('product_categories.id', $request->category);
                });
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('name', function ($row_object) {
                return view('admin.sold_products.incs._name', compact('row_object'));
            })
            ->addColumn('status', function ($row_object) {
                return view('admin.sold_products.incs._status', compact('row_object'));
            })
            ->addColumn('image', function ($row_object) {
                return view('admin.sold_products.incs._image', compact('row_object'));
            })
            ->addColumn('categories', function ($row_object) {
                return $row_object->product->categories()->count() ? 
                    view('admin.sold_products.incs._categories', compact('row_object')) : '---';
            })
            ->addColumn('price', function ($row_object) {
                return $row_object->price_when_order . ' SR';
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.sold_products.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.sold_products.index');
    }

    public function destroy (Request $request, $id) {
        // we will have two senarios ... 
        // one for deleting the item from the order
        // second for updating the item from the order

        /**
         * To delete the item from the order, 
         * check if the order type is composite
         * restore the product quantityt
         * delete the orderProduct from the order
         * 
         * update the order meta
         */
        // dd($request->all());
        $target_order_product = OrderProduct::find($id);
        $target_order         = $target_order_product->order;
        if ($target_order_product->status == 1) {
            /**
             * Here we want to restore a sold product in order,
             * this means we need to change sold product status,
             * and after this we need to update order data,
             * meta, sub-total, tax, fees and totals. 
             * 
             */
            $this->restore_reserved_products($target_order_product->product, 1);
            // dd($request->all());
            // هل ممكن اختزال الخطوات دي بشكل افضل
            
            /**
             * # In this operation we didn't make any change in the requested quantity
             * We only used to store the quantity od the restored items.
             * We Don a change in this operation by decreassing the requested items
             * and increasing the restored item.
             * 
             * # Now we need to recalculate the tax, fees, sub-total and leave the 
             * shipping the same.
             * 
             * # We have in the meta all the data we need to do all 
             * re-calculation for the order,
             * 
             * # We have the selected products with price and quantity
             * also the restored quantity, 
             * 
             */

            $target_order_meta    = (array) json_decode($target_order->meta);
            $products_quantity    = (array) $target_order_meta['products_quantity'];
            $restored_quantity    = (array) $target_order_meta['restored_quantity'];
            // dd($target_order_meta);

            ($products_quantity[$target_order_product->product->id])->quantity -= 1;
            $restored_quantity[$target_order_product->product->id] += 1;

            $target_order_meta['products_quantity'] = $products_quantity;
            $target_order_meta['restored_quantity'] = $restored_quantity;
            $target_order->meta = json_encode($target_order_meta);
            $target_order->save();

            // START CALCULATING SUB-TOTAL AND  
            $result = $this->update_order_calculation($target_order);
            $sub_total      = $result['sub_total'];
            $products_count = $result['products_count'];

            // START CALCULATE TAXES
            $tax_result = $this->calculate_all_taxe($products_count, $sub_total);
            $tax_total  = $tax_result['total_tax'];
            $meta['taxes'] = $tax_result['tax_meta'];
            
            // START CALCULATE FEES
            $targted_fees_ids;
            $fee_result = $this->calculate_all_fees($products_count, $sub_total, null, $target_order_meta['fees']);
            $fee_total  = $fee_result['fee_total'];
            $meta['fees'] = $fee_result['fee_meta'];

            $target_order->sub_total = $sub_total;
            $target_order->taxe      = $tax_total;
            $target_order->fee       = $fee_total;
            $target_order->total     = $sub_total + $target_order->shipping_cost + $tax_total + $fee_total;
            $target_order->meta = json_encode($target_order_meta);
            $target_order->save();
        }
        
        if (isset($request->restore_product)) {
            $target_order_product->status = 0;
            $target_order_product->save();
        } else {
            $target_order_product->delete();
        }


        /* 
            Check if there is no more products in the order, and change the order status to be restored
        */
        if ($target_order->order_products()->where('status', 1)->count() === 0) {
            $target_order->status = -1;
            $target_order->save();
        }
        return response()->json(['data' => $target_order_product, 'success' => isset($target_order_product)]);
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


    private function update_order_calculation ($target_order) {
        // # We have the target_order, with the meta_data
        // # To re-calculate the order totals we will parse the meta and get each of
        // 1- the requested item, with the prices, and quantity
        // 2- the taxes, and the fees 

        $target_order_meta    = (array) json_decode($target_order->meta);
        $products_quantity    = (array) $target_order_meta['products_quantity'];
        // dd($products_quantity);
        $sub_total = 0;
        $products_count = 0;

        foreach ($products_quantity as $product_meta) {
            $sub_total      += (float) $product_meta->price * (int) $product_meta->quantity;
            $products_count += (int) $product_meta->quantity;
        }
        
        return ['sub_total' => $sub_total, 'products_count' => $products_count];
    }
    
}
