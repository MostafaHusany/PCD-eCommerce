<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Order;
use App\Product;
use App\Shipping;
use App\OrderProduct;

class OrdersController extends Controller
{
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
                'shipping_cost' => $target_order->shipping_cost
            ];

            return response()->json(['data' => $target_data, 'success' => isset($target_data)]);
        } else if (isset($target_order) && isset($request->show_order)) {

            $target_data = [
                'id'            => $target_order->id,
                'customer'      => $target_order->customer,
                // 'all_products'  => $target_order->products,
                'products'      => $target_order->products()->distinct()->get(),
                'order_products'      => $target_order->order_products,
                'products_meta' => $target_order->meta
            ];

            return response()->json(['data' => $target_data, 'success' => isset($target_data)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'customer'      => 'required|exists:customers,id',
            'products.*'    => 'required|exists:products,id',
            'shipping'   => 'required|exists:shippings,id',
            'is_free_shipping' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        /**
         * create an order
         * and create for each product quantityt order product
         * while creating an order product subtract the quantity required from the original quantity of the product
         * 
         * Notice : I need to store the price history of the product
         * to make it easy as possible, store the history as a meta data
         * 
         * We have a special case ! composite products 
         * we need to check if the product that we suptracting quantity from is beign 
         * used for a composite product , and if the product is finshed from the storage 
         * we need to disabel the composite product
         * */

        
        /**
         * Shipping cost : 
         * 
         * we want to add shipping cost to the total, but first we need 
         * to make sure that the cuser didn't edit the cost, so we need 
         * to check if the used sent a new shipping_cost, and than we make sure
         * that this cost differ than the cost from the shipping boject
         * if it's differs we update the shipping cost
         * 
         * first get the shipping object
         * check if the user sent a new 
         */
        $target_shipping = Shipping::find($request->shipping);
        $shipping_cost   = isset($request->shipping_cost) && ((float) $request->shipping_cost) > 0 ? (float) $request->shipping_cost : $target_shipping->cost;

        $new_order = Order::create([
            'code'          => 'ad-' . time(), 
            'customer_id'   => $request->customer,
            'sub_total'     => 0,
            'total'         => 0,
            'shipping_id'   => $request->shipping,
            'is_free_shipping'  => $request->is_free_shipping,
            'shipping_cost'     => $shipping_cost
        ]);
        // products_quantity contains the quantity and the prices of eacg product in the order 
        $products_quantity  = (array) json_decode($request->products_quantity);
        $products_id        = json_decode($request->products);
        $this->create_requested_order($new_order, $products_id, $products_quantity);
        
        return response()->json(['data' => $new_order, 'success' => isset($new_order)]);
    }

    public function update (Request $request, $id) {
        // dd($request->all());
        // if (isset($request->activate_customer)) {
        //     return $this->updateActivation($id);
        // }

        return $this->updateOrder($request, $id);
    }

    protected function updateOrder (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'customer'      => 'required|exists:customers,id',
            'products.*'    => 'required|exists:products,id',
            'shipping'   => 'required|exists:shippings,id',
            'is_free_shipping' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        /**
         * Need to update order, total, & subTotal
         * Need to delete removed product_order, and add new product_order
         * Notice that we created product_order by number of quantityt
         * Need to delete order that not exists any more
         */
        
         /**
          * 1- get target order 
          * 2- get target order meta
          * 3- get order quantity
          * 4- get targted products
          * 5- delete old order_products
          * 6- restore old unatity
          * 7- create requested order
          * 8- update the restore if order was restored
          * */
        // dd($request->all());
        $target_order       = Order::find($id);

        $target_shipping = Shipping::find($request->shipping);
        $shipping_cost   = isset($request->shipping_cost) && ((float) $request->shipping_cost) > 0 ? (float) $request->shipping_cost : $target_shipping->cost;

        $target_order->update([
            'customer_id'   => $request->customer,
            'shipping_id'   => $request->shipping,
            'is_free_shipping'  => $request->is_free_shipping,
            'shipping_cost'     => $shipping_cost
        ]);

        if ($target_order->status !== -1) {
            $order_meta         = (array) json_decode($target_order->meta);
            $order_quantity     = (array) $order_meta['products_quantity'];
            $order_restored_q   = (array) $order_meta['restored_quantity'];
            $target_products    = $target_order->products()->distinct()->get();

            // restore old qunatity
            foreach ($target_products as $target_product) {
                $target_product_quantity = (array) $order_quantity[$target_product->id];
                $this->restore_reserved_products($target_product, $target_product_quantity['quantity'] - $order_restored_q[$target_product->id]);
            }
        }

        // delete old orders
        $target_order->order_products()->delete();
        
        // create updated order
        $products_quantity  = (array) json_decode($request->products_quantity);
        $products_id        = json_decode($request->products);
        $this->create_requested_order($target_order, $products_id, $products_quantity);
        
        if ($target_order->status == -1) {
            $target_order->status = 0;
            $target_order->save();
        }

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

    private function create_requested_order ($target_order, $products_id, $products_quantity) {
        // dd($products_id, $products_quantity);
        $total      = 0;
        $meta       = ['products_id' => $products_id, 'products_quantity' => $products_quantity, 'products_prices' => [], 'restored_quantity' => []];
        $products   = Product::whereIn('id', $products_id)->where('quantity', '>', 0)->get();

        foreach ($products as $product) {
            $targted_product_quantity = (array) $products_quantity[$product->id];
            $data = [];
            
            for ($i = 0; $i < $targted_product_quantity['quantity']; $i++) {
                $data[] = [
                    'order_id'   => $target_order->id,
                    'product_id' => $product->id, 
                    'ar_name'    => $product->ar_name,
                    'en_name'    => $product->en_name,
                    'sku'        => $product->sku,
                    'price_when_order'  => $targted_product_quantity['price'],
                    'created_at' => $target_order->created_at,
                    'updated_at' => $target_order->updated_at,
                    'code'       => $target_order->code
                ];
            }

            
            $new_order_product = OrderProduct::insert($data);
            $this->update_product_quantity($product, $targted_product_quantity['quantity']);
            $product->save();

            $meta['products_prices'][$product->id]      = $targted_product_quantity['price'];
            $meta['restored_quantity'][$product->id]    = 0;
            $total += $targted_product_quantity['price'] * $targted_product_quantity['quantity'];
        }

        $target_order->total     = $total + $target_order->shipping_cost;
        $target_order->sub_total = $total;
        $target_order->meta      = $meta;
        $target_order->save();
    }

    private function restore_order_meta ($target_order) {
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
