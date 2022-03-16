<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Fee;
use App\Taxe;
use App\Order;
use App\Product;
use App\Shipping;
use App\OrderProduct;

use App\Traits\MakeOrder;

class OrdersController extends Controller
{
    use MakeOrder;

    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Order::query()->orderBy('id', 'desc');
            
            if (isset($request->code)) {
                $model->where('code', 'like', "%$request->code%");
            }

            if (isset($request->status)) {
                $model->where('code', $request->status);
            }

            if (isset($request->name)) {
                $model->whereHas('customer', function ($q) use ($request) {
                    $q->where(function ($query) use ($request) {
                        $query->orWhere('first_name', 'like', "%$request->name%");
                        $query->orWhere('second_name', 'like', "%$request->name%");
                    });
                });
            }

            if (isset($request->email)) {
                $model->whereHas('customer', function ($q) use ($request) {
                    $q->where('customers.email', 'like', "%$request->email%");
                });
            }

            if (isset($request->phone)) {
                $model->whereHas('customer', function ($q) use ($request) {
                    $q->where('customers.phone', 'like', "%$request->phone%");
                });
            }

            if (isset($request->city)) {
                $model->whereHas('customer', function ($q) use ($request) {
                    $q->where('customers.city', $request->city);
                });
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('customer', function ($row_object) {
                return $row_object->customer->fullName();
            })
            ->addColumn('phone', function ($row_object) {
                return $row_object->customer->phone;
            })
            ->addColumn('email', function ($row_object) {
                return $row_object->customer->email;
            })
            ->addColumn('city', function ($row_object) {
                return $row_object->customer->city;
            })
            // ->addColumn('status', function ($row_object) {
            //     return $row_object->customer->city;
            // })
            ->addColumn('actions', function ($row_object) {
                return view('admin.orders.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.orders.index');
    }

    public function show (Request $request, $id) {
        $target_order = Order::find($id);

        if (isset($target_order) && isset($request->fast_acc)) {
            // I need to get the product old price, and new price 

            $target_data = [
                'id'            => $target_order->id,
                'customer'      => $target_order->customer,
                // 'all_products'  => $target_order->products,
                'products'      => $target_order->products()->distinct()->get(),
                // 'products'      => $target_order->products,
                'products_meta' => $target_order->meta,
                'shipping'      => $target_order->shipping,
                'shipping_cost' => $target_order->shipping_cost,
                'is_free_shipping' => $target_order->is_free_shipping,
                'taxe' =>$target_order->taxe,
                'fee' =>$target_order->fee,
            ];

            return response()->json(['data' => $target_data, 'success' => isset($target_data)]);
        } else if (isset($target_order) && isset($request->show_order)) {

            $target_data = [
                'id'            => $target_order->id,
                'customer'      => $target_order->customer,
                // 'all_products'  => $target_order->products,
                'products'      => $target_order->products()->distinct()->get(),
                'order_products'      => $target_order->order_products,
                'products_meta' => $target_order->meta,
                'shipping'      => $target_order->shipping,
                'shipping_cost' => $target_order->shipping_cost,
                'is_free_shipping' => $target_order->is_free_shipping,
                'taxe' =>$target_order->taxe,
                'fee' =>$target_order->fee,
                'sub_total' =>$target_order->sub_total,
                'total' =>$target_order->total,
            ];

            return response()->json(['data' => $target_data, 'success' => isset($target_data)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'customer'      => 'required|exists:customers,id',
            'products.*'    => 'required|exists:products,id',
            'shipping'   => 'required|exists:shippings,id',
            'is_free_shipping' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }
        
        // products_quantity contains the quantity and the prices of eacg product in the order 
        $products_quantity  = (array) json_decode($request->products_quantity);
        $products_id        = (array) json_decode($request->products);
        $targted_fees_ids   = explode(',', $request->fees);
        
        $target_shipping = Shipping::find($request->shipping);
        
        $new_order = $this->create_customer_order($request->customer, 
            [$target_shipping->id, $request->is_free_shipping, $target_shipping->get_cost()],
            [$products_id, $products_quantity],
            $targted_fees_ids
        );

        return response()->json(['data' => $new_order, 'success' => isset($new_order)]);
    }

    public function update (Request $request, $id) {
        
        $validator = Validator::make($request->all(), [
            'customer'      => 'required|exists:customers,id',
            'products.*'    => 'required|exists:products,id',
            'shipping'   => 'required|exists:shippings,id',
            'is_free_shipping' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        // products_quantity contains the quantity and the prices of eacg product in the order 
        $products_quantity  = (array) json_decode($request->products_quantity);
        $products_id        = (array) json_decode($request->products);
        $targted_fees_ids   = explode(',', $request->fees);
        
        // dd($request->all(), $products_quantity, $products_id, $targted_fees_ids);

        $target_shipping = Shipping::find($request->shipping);
        
        $target_order = $this->update_customer_order(
            $id,
            $request->customer, 
            [$target_shipping->id, $request->is_free_shipping, $target_shipping->get_cost()],
            [$products_id, $products_quantity],
            $targted_fees_ids
        );

        return response()->json(['data' => $target_order, 'success' => isset($target_order)]);
    }

    public function destroy (Request $request, $id) {
        /**
         * Delete an order meeans we need to delete all the order products
         * restore the quantity to the products in the storage
         */
         
        $target_order   = Order::find($id);

        if ($target_order->status !== -1) {
            // dd($target_order->products);
            foreach ($target_order->products()->distinct()->get() as $target_product) {
                $quantity = $target_order->order_products()->where('status', 1)->where('product_id', $target_product->id)->count();
                $this->restore_reserved_products($target_product, $quantity);
            }
        }

        if (isset($request->restore_product)) {
            $this->restore_order_meta($target_order);
            
            foreach ($target_order->order_products as $target_order_product) {
                $target_order_product->status = 0;
                $target_order_product->save();
            }

            $target_order->status = -1;
            
            $target_order->shipping_cost = 0;
            $target_order->sub_total = 0;
            $target_order->taxe      = 0;
            $target_order->fee       = 0;
            $target_order->total     = 0;

            $target_order->save();
            
        } else {
            $target_order->delete();
        }

        return response()->json(['data' => $target_order, 'success' => isset($target_order)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = User::select("id", "name", "phone", "email")
            		->where('name','LIKE',"%$search%")
            		->orWhere('email','LIKE',"%$search%")
                    ->orWhere('phone','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }

    // START HELPER FUNCTION
    public function update_product_quantity ($target_product, $order_quantity) {
        if ($target_product->is_composite === 1) {
            $target_children = $target_product->children;
            $parent_product_meta = (array) json_decode($target_product->meta);
            $products_quantity   = (array) $parent_product_meta['products_quantity'];

            foreach ($target_children as $child_product) {
                $requested_quantity          = $products_quantity[$child_product->id] * $order_quantity;
                $child_product->reserved_quantity -= $requested_quantity;
                $child_product->save();
            }
        }

        $target_product->quantity -= $order_quantity;
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
}
