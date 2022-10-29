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
use App\Customer;
use App\Shipping;
use App\District;
use App\OrderProduct;
use App\SystemSetting;

use App\Traits\MakeOrder;

class OrdersController extends Controller
{
    use MakeOrder;

    /**
     * We want to make orders for the upgradable products !!
     * in the composite products the sub-products are always known very well
     * we just get them right away from the relation with child products
     * 
     * In another way the upgradable options depend on the selected upgrade
     * options for the project, there is the default options, and they may be
     * a desire for creating an upgrade.
     * 
     * hot to make an order for upgradable product
     *   
    */
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Order::query()->with(['customer', 'status_obj'])->orderBy('id', 'desc');
            
            if (isset($request->code)) {
                $model->where('code', 'like', "%$request->code%");
            }

            if (isset($request->status)) {
                $model->whereHas('status_obj', function ($q) use ($request) {
                    $q->where('order_statuses.status_code', $request->status);
                });
            }

            if (isset($request->name)) {
                $model->whereHas('customer', function ($q) use ($request) {
                    $q->where(function ($query) use ($request) {
                        $query->orWhere('name', 'like', "%$request->name%");
                    });
                });
            }

            if (isset($request->payment_status)) {
                $model->whereHas('invoice', function ($q) use ($request) {
                    $q->where('invoices.status', $request->payment_status);
                });
            }

            if (isset($request->phone)) {
                $model->whereHas('customer', function ($q) use ($request) {
                    $q->where('customers.phone', 'like', "%$request->phone%");
                });
            }

            if (isset($request->start_date)) {
                $model->whereDate('created_at', '>=', $request->start_date);
            }

            if (isset($request->end_date)) {
                $model->whereDate('created_at', '<=', $request->end_date);
            }

            if (isset($request->country)) {
                $model->whereHas('country', function ($q) use ($request) {
                    $q->where('districts.id', $request->country)
                    ->where('districts.type', 'country');
                });
            }

            if (isset($request->governorate)) {
                $model->whereHas('government', function ($q) use ($request) {
                    $q->whereIn('districts.id', $request->governorate)
                    ->where('districts.type', 'gove');
                });
            }

            // if (isset($request->city)) {
            //     $model->whereHas('customer', function ($q) use ($request) {
            //         $q->where('customers.city', $request->city);
            //     });
            // }

            $datatable_model = Datatables::of($model)
            ->addColumn('code', function ($row_object) {
                return view('admin.orders.incs._code', compact('row_object'));
            })
            ->addColumn('customer', function ($row_object) {
                return isset($row_object->customer) ? $row_object->customer->name : 'deleted';
            })
            ->addColumn('phone', function ($row_object) {
                return isset($row_object->customer) ? $row_object->customer->phone : 'deleted';
            })
            ->addColumn('email', function ($row_object) {
                return isset($row_object->customer) && isset($row_object->customer->email) ? $row_object->customer->email : '---';
            })
            ->addColumn('country', function ($row_object) {
                return isset($row_object->country) ? $row_object->country->name : '---';
            })
            ->addColumn('government', function ($row_object) {
                return isset($row_object->government) ? $row_object->government->name : '---';
            })
            ->addColumn('payment_status', function ($row_object) {
                return $row_object->payment_status();
            })
            ->addColumn('status', function ($row_object) {
                return view('admin.orders.incs._status', compact('row_object'));
            })
            ->addColumn('status_action', function ($row_object) {
                return view('admin.orders.incs._status_action', compact('row_object'));
            })
            ->addColumn('created_at', function ($row_object) {
                return view('admin.orders.incs._date', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.orders.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        $countries = District::where('type', 'country')->where('is_active', 1)->get();
        return view('admin.orders.index', compact('countries'));
    }

    public function show (Request $request, $id) {
        $target_order = Order::find($id);

        if (isset($target_order) && isset($request->fast_acc)) {
            // I need to get the product old price, and new price 

            $target_data = [
                'id'            => $target_order->id,
                'customer'      => $target_order->customer,
                // 'all_products'  => $target_order->products,
                'products'      => $target_order->products()->where('is_child', 0)->distinct()->get(),
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
                'products'      => $target_order->products()->where('is_child', 0)->distinct()->get(),
                'order_products'      => $target_order->order_products()->where('is_child', 0)->get(),
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

        $validator = Validator::make($request->all(), [
            'customer'      => 'required|exists:customers,id',
            'products.*'    => 'required|exists:products,id',
            'shipping'   => 'required|exists:shippings,id',
            'is_free_shipping' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        // dd($request->all());
        
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
        if (isset($request->update_status)) {
            return $this->update_order_status($request, $id);
        }

        return $this->update_order ($request, $id);
    }

    public function update_order (Request $request, $id) {
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

    public function update_order_status (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'order_id'      => 'exists:orders,id',
            'update_status' => 'exists:order_statuses,status_code'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }
        /**
         * # How to update order status ?
         * 1- validate that the status code do exists
         * 2- update order status
         * */ 

        $target_order = Order::find($id);
        $target_order->status = $request->update_status;
        $target_order->save();

        // send sms with order status
        $this->SMSTemplate($target_order);

        return response()->json(['data' => $target_order, 'success' => isset($target_order)]);
    }

    public function destroy (Request $request, $id) {
        // dd();
        /**
         * Delete an order meeans we need to delete all the order products
         * restore the quantity to the products in the storage
         */
         
        // dd($request->all());

        $target_order = Order::find($id);
        
        if ($target_order->status !== -1) {
            $this->restore_order_all_products($target_order);
        }
        
        if (isset($request->restore_product)) {
            // dd($request->all());

            $this->restore_order_meta($target_order);
            
            // update orders' products status
            $orderproducts = $target_order->order_products()->where('status', '!=', 0)->update(['status' => '0']);
            
            // update orders' status
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
    // public function update_product_quantity ($target_product, $order_quantity) {
    //     if ($target_product->is_composite === 1) {
    //         $target_children = $target_product->children;
    //         $parent_product_meta = (array) json_decode($target_product->meta);
    //         $products_quantity   = (array) $parent_product_meta['products_quantity'];

    //         foreach ($target_children as $child_product) {
    //             $requested_quantity          = $products_quantity[$child_product->id] * $order_quantity;
    //             $child_product->reserved_quantity -= $requested_quantity;
    //             $child_product->save();
    //         }
    //     }

    //     $target_product->quantity -= $order_quantity;
    //     $target_product->save();
    // }

    protected function SMSTemplate ($target_order) {
        $sms_msgs = SystemSetting::where('setting_code', 'sms_settings')->first();
        $sms_msgs = (array) json_decode($sms_msgs->meta);
        $sms_temp = $sms_msgs['order-status-sms'];

        $phone = $target_order->customer->phone;
        $order_status = $target_order->status_obj->status_name_ar;
        $message = $sms_temp . "\nالطلب : $target_order->code, الحالة : $order_status";
        
        $this->sendSms($message, $phone);
    }

    
}
