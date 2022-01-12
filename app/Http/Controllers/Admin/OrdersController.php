<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Order;
use App\Product;
use App\OrderProduct;

class OrdersController extends Controller
{
    public function index (Request $request) {
        
        if ($request->ajax()) {
            $model = Order::query();
            

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
                'all_products'  => $target_order->products,
                // 'products'      => $target_order->products()->distinct()->get(),
                'products'      => $target_order->products,
                'products_meta' => $target_order->meta
            ];

            return response()->json(['data' => $target_data, 'success' => isset($target_data)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'customer' => 'required|exists:customers,id',
            'products.*' => 'required|exists:products,id'
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
         * */

        $products_quantity = (array) json_decode($request->products_quantity);
        $products_id = explode(',', $request->products);
        $products    = Product::whereIn('id', $products_id)->where('quantity', '>', 0)->get();

        $data = [
            'code'          => 'ad-' . time(), 
            'customer_id'   => $request->customer,
            'sub_total'     => 0,
            'total'         => 0,
            'meta' => json_encode(['products_id' => $products_id, 'products_quantity' => $products_quantity])
        ];
        $new_order = Order::create($data);

        $total = 0;
        foreach ($products as $product) {
            $data = [];

            for ($i = 0; $i < $products_quantity[$product->id]; $i++) {
                $data[] = [
                    'order_id'   => $new_order->id,
                    'product_id' => $product->id, 
                    'ar_name'    => $product->ar_name,
                    'en_name'    => $product->en_name,
                    'sku'        => $product->sku,
                    'price_when_order'  => $product->price,
                    'created_at' => $new_order->created_at,
                    'updated_at' => $new_order->updated_at,
                    'code'       => $new_order->code
                ];
            }

            $new_order_product = OrderProduct::insert($data);
            $product->quantity -= $products_quantity[$product->id];
            $product->save();
            
            $total += $product->price * $products_quantity[$product->id];
        }

        $new_order->total     = $total;
        $new_order->sub_total = $total;
        $new_order->save();
        
        return response()->json(['data' => $new_order, 'success' => isset($new_order)]);
    }// end :: store

    public function update (Request $request, $id) {
        
        // if (isset($request->activate_customer)) {
        //     return $this->updateActivation($id);
        // }

        return $this->updateOrder($request, $id);
    }

    protected function updateOrder (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            
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
          * 2- get target products
          * 3- start loop through the order_products
          * 4- delete product if it's not in the new product list, 
          *    and return the orderd_quantityt to the storage quantityt
          * 4- 
          * 4-
          * 4-
          * */
        dd($request->all());
        $target_order          = Order::find($id);
        $target_products       = $target_order->products;
        $target_order_products = $target_order->order_products;
        $products_quantity     = (array) json_decode($request->products_quantity);
        
        $products_id = explode(',', $request->products);
        $products    = Product::whereIn('id', $products_id)->where('quantity', '>', 0)->get();

        $total = 0;

        


        
        dd($products_quantity, $products_id, $products);

        return response()->json(['data' => $target_user, 'success' => isset($target_user)]);
    }

    protected function updateActivation ($id) {
        $target_user = User::find($id);
        if (isset($target_user)) {
            $target_user->email_verified_at = isset($target_user->email_verified_at) ? null : Date('Y-m-d H:i:s');
            $target_user->save();
        }

        return response()->json(['data' => $target_user, 'success' => isset($target_user)]);        
    }

    public function destroy ($id) {
        /**
         * Delete an order meeans we need to delete all the order products
         * restore the quantity to the products in the storage
         */
        // $target_user = User::find($id);
        // isset($target_user) && $target_user->delete();
        
        $target_order   = Order::find($id);
        $order_meta     = (array) json_decode($target_order->meta);
        $products_id    = (array) $order_meta['products_id'];
        $order_quantity = (array) $order_meta['products_quantity'];

        foreach ($products_id as $product_id) {
            $target_product = Product::find($product_id);
            $target_product->quantity += $order_quantity[$product_id];
            $target_product->save();
        }

        $target_order->delete();
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
}
