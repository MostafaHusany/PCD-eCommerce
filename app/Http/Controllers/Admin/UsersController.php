<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\User;

class UsersController extends Controller
{
    /**
     * # Manage technical users ....
     * 
     */
    public function index (Request $request) {
        
        if ($request->ajax()) {
            $model = User::query()->where('category', '!=', 'user');
            
            if (isset($request->name)) {
                $model->where('name', 'like', '%' . $request->name . '%');
            }

            if (isset($request->email)) {
                $model->where('email', 'like', '%' . $request->email . '%');
            }

            if (isset($request->category)) {
                $model->where('category', $request->category);
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('actions', function ($row_object) {
                return view('admin.users.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.users.index');
    }

    public function show (Request $request, $id) {
        $target_user = User::find($id);

        if (isset($target_user) && isset($request->fast_acc)) {
            $target_user->permissions = (array) json_decode($target_user->permissions);
            return response()->json(['data' => $target_user, 'success' => isset($target_user)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|unique:users,email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->except('category');
        $data['category'] = in_array($request->category , ['technical', 'admin']) ? $request->category  : 'technical';
        $data['permissions'] = json_encode($data['permissions']);

        
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
    }// end :: store

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,'.$id,
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->except(['category', 'password']);
        $data['category'] = in_array($request->category , ['technical', 'admin']) ? $request->category  : 'technical';
        
        if (isset($request->password)) {
            $data['plain_password'] = $request->password;
            $data['password']       = bcrypt($request->password);
        }
      
        $target_user     = User::find($id);
        $target_customer = $target_user->customer;
        
        $target_user->update($data);
        if (isset($target_customer)) {
            $target_customer->update($data);
        } else {
            $data['first_name']  = $target_user->name;
            $data['second_name'] = 'Demo';
            $data['city'] = 'Demo';
            $data['address'] = 'Demo';
            $data['plain_password'] = '000'; 
            $target_user->customer()->create($data);
        }

        return response()->json(['data' => $target_user, 'success' => isset($target_user)]);
    }

    public function destroy ($id) {
        $target_user = User::find($id);
        $target_user->delete();

        return response()->json(['data' => $target_user, 'success' => isset($target_user)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = User::select("id", "name", "phone", "email")
            		->where('category', '!=', 'user')
                    ->where(function ($q) use ($search){
                        $q->orWhere('name','LIKE',"%$search%")
                        ->orWhere('email','LIKE',"%$search%")
                        ->orWhere('phone','LIKE',"%$search%");
                    })
            		->get();
        }
        return response()->json($data);
    }
}
