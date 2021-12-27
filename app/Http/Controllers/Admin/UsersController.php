<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\User;

class UsersController extends Controller
{
    public function index (Request $request) {
        
        if ($request->ajax()) {
            $model = User::query();

            $datatable_model = Datatables::of($model)
            ->addColumn('actions', function ($row_object) {
                return view('admin.users.incs._actions', compact('row_object'));
                return 1;
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

        
        $data['plain_password'] = $request->password;
        if (isset($request->password)) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = bcrypt('123456');
        }
        
        $new_user = User::create($data);

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
      
        $target_user = User::find($id);
        $target_user->update($data);

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
            		->where('name','LIKE',"%$search%")
            		->orWhere('email','LIKE',"%$search%")
                    ->orWhere('phone','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
