<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Models\Role;

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
            $target_user->role = sizeof($target_user->roles) ? $target_user->roles[0] : null;
            $target_user->permissions;
            return response()->json(['data' => $target_user, 'success' => isset($target_user)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|unique:users,email|max:255',
            'category' => 'required|exists:roles,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->except('category');
        $data['category']    = Role::find($request->category)->display_name;
        $data['permissions'] = json_encode($data['permissions']);
        
        if (isset($request->password)) {
            $data['password'] = bcrypt($request->password);
            $data['plain_password'] = $request->password;
        } else {
            $data['password'] = bcrypt('123456');
            $data['plain_password'] = '123456';
        }
        
        $new_user = User::create($data);
        
        // attach role or permissions to user
        if (!isset($request->is_custome_permissions) || $request->is_custome_permissions === 'false') {
            $new_user->attachRole($request->category);
        } else {
            $permissions = explode(',', $request->permissions);
            $new_user->syncPermissions($permissions);
        }

        // create customer account
        $this->create_customer_acc($new_user, $data);

        return response()->json(['data' => $new_user, 'success' => isset($new_user)]);
    }// end :: store

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,'.$id,
            'category' => 'required|exists:roles,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->except(['category', 'password']);
        $data['category'] = Role::find($request->category)->display_name;

        if (isset($request->password)) {
            $data['plain_password'] = $request->password;
            $data['password']       = bcrypt($request->password);
        }
      
        $target_user = User::find($id);
        $target_user->update($data);
        
        // attach role or permissions to user
        if (!isset($request->is_custome_permissions) || $request->is_custome_permissions === 'false') {
            $target_user->syncRoles([$request->category]);
        } else {
            $permissions = explode(',', $request->permissions);
            $target_user->syncPermissions($permissions);
        }

        // create customer account
        isset($target_user->customer) ? $target_user->customer->update($data) : $this->create_customer_acc($target_user, $data);

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
    
    private function create_customer_acc (User $user, $data) {

        $data['first_name']  = $user->name;
        $data['second_name'] = 'Demo';
        $data['city'] = 'Demo';
        $data['address'] = 'Demo';
        $data['plain_password'] = '000'; 

        return $user->customer()->create($data);
    }
}

