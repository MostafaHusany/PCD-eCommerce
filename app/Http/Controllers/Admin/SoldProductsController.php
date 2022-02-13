<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Order;
use App\Product;
use App\OrderProduct;

class SoldProductsController extends Controller
{
    public function index (Request $request) {
        
        if ($request->ajax()) {
            $model = OrderProduct::query()->orderBy('id', 'desc');
            
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

        $target_order_product = OrderProduct::find($id);
        $target_order         = $target_order_product->order;
        if ($target_order_product->status == 1) {
            $this->restore_reserved_products($target_order_product->product, 1);
            // dd($request->all());
            // هل ممكن اختزال الخطوات دي بشكل افضل
            $target_order_meta    = (array) json_decode($target_order->meta);
            $restored_quantity    = (array) $target_order_meta['restored_quantity'];
            $restored_quantity[$target_order_product->product->id] += 1;
            $target_order_meta['restored_quantity'] = $restored_quantity;
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

}