<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;


use App\User;
use App\Customer;
use App\District;

class CustomerController extends Controller
{
    public function index (Request $request) {
        
        if ($request->ajax()) {
            $model = Customer::query();
            
            if (isset($request->name)) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            if (isset($request->email)) {
                $model->where('email', 'like', '%' . $request->email . '%');
            }

            if (isset($request->phone)) {
                $model->where('phone', 'like', '%' . $request->phone . '%');
            }

            if (isset($request->country)) {
                $model->where('country_id', $request->country);
            }

            if (isset($request->governorate)) {
                $model->whereIn('gove_id', $request->governorate);
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('country', function ($row_object) {
                return isset($row_object->country) ? $row_object->country->name : '---';
            })
            ->addColumn('government', function ($row_object) {
                return isset($row_object->government) ? $row_object->government->name : '---';
            })
            ->addColumn('active', function ($row_object) {
                return view('admin.customers.incs._active', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.customers.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        $countries = District::where('type', 'country')->where('is_active', 1)->get();
        return view('admin.customers.index', compact('countries'));
    }

    public function show (Request $request, $id) {
        $target_customer = Customer::find($id);

        if (isset($target_customer) && isset($request->fast_acc)) {
            // $target_user->permissions = (array) json_decode($target_user->permissions);
            // $target_customer = $target_user->customer;
            $target_customer->government;
            isset($request->get_orders) && $target_customer->orders;
            return response()->json(['data' => $target_customer, 'success' => isset($target_customer)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|unique:users,email|max:255',
            'phone' => 'required|unique:users,phone|max:255',
            // 'city' => 'required|unique:users,phone|max:255',
            'address' => 'required|unique:users,phone|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->all();

        if (isset($request->password)) {
            $data['password'] = bcrypt($request->password);
            $data['plain_password'] = $request->password;
        } else {
            $data['password'] = bcrypt('123456');
            $data['plain_password'] = '123456';
        }
        
        $new_user = User::create($data);
        $new_user->customer()->create($data);

        return response()->json(['data' => $new_user, 'success' => isset($new_user)]);
    }

    public function update (Request $request, $id) {
        
        if (isset($request->activate_customer)) {
            return $this->updateActivation($id);
        }

        return $this->updateCustomer($request, $id);
    }

    protected function updateCustomer (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|max:255|unique:customers,email,'.$id,
            'phone' => 'required|max:255|unique:customers,phone,'.$id,
            // 'city' => 'required|max:255',
            'address' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->except(['password', 'id', '_token', '_method']);

        if (isset($request->password)) {
            $data['plain_password'] = $request->password;
            $data['password']       = bcrypt($request->password);
        }
        
        $target_customer = Customer::find($id);
        $target_user = $target_customer->user;
        
        $target_customer->update($data);
        $target_user->update($data);

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
        $target_user = User::find($id);
        isset($target_user) && $target_user->delete();

        return response()->json(['data' => $target_user, 'success' => isset($target_user)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = Customer::select("id", "first_name", "second_name", "phone", "email")
                    ->where(function ($q) use($search) {
                        $q->orWhere('first_name','LIKE',"%$search%")
                          ->orWhere('second_name','LIKE',"%$search%");
                    })
            		->orWhere('email','LIKE',"%$search%")
                    ->orWhere('phone','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
