<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Models\Role;

class RolesController extends Controller
{
    public function index (Request $request) {
        
        if ($request->ajax()) {
            $model = Role::query();
            
            if (isset($request->name)) {
                $model->where('name', 'like', '%' . $request->name . '%');
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('users', function ($row_object) {
                return $row_object->users()->count();
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.roles.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.roles.index');
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255|unique:roles,name',
            'description' => 'required|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }
        
        $new_object = Role::create([
            'name'         => join('_', explode(' ', strtolower($request->name))),
            'display_name' => $request->name,
            'description'  => $request->description
        ]);

        // assign permissions to roles
        if(isset($request->permissions)) {
            $permissions = explode(',', $request->permissions);
            $new_object->attachPermissions($permissions);
        }

        // assign users to roles
        if(isset($request->users)) {
            $target_users = User::whereIn('id', explode(',', $request->users))->pluck('id')->toArray();
            $new_object->users()->sync($target_users);
        }

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }

    public function show (Request $request, $id) {
        $target_role = Role::with(['users', 'permissions'])->find($id);

        if (isset($target_role) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_role, 'success' => isset($target_role)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'  => "required|max:255|unique:roles,name,$id",
            'description' => 'required|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_role = Role::find($id);
        
        $target_role->update([
            'name'         => join('_', explode(' ', strtolower($request->name))),
            'display_name' => $request->name,
            'description'  => $request->description
        ]);

        // assign permissions to roles
        if(isset($request->permissions)) {
            $permissions = explode(',', $request->permissions);
            $target_role->syncPermissions($permissions);
        }

        // assign users to roles
        if(isset($request->users)) {
            $target_users = User::whereIn('id', explode(',', $request->users))->pluck('id')->toArray();
            $target_role->users()->sync($target_users);
        }

        return response()->json(['data' => $target_role, 'success' => isset($target_role)]);
    }

    public function destroy ($id) {
        $target_role = Role::find($id);
        $target_role->delete();

        return response()->json(['data' => $target_role, 'success' => isset($target_role)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = Role::select("id", "name", "display_name")
                    ->where('name', '!=', 'admin')
                    ->where(function ($q) use ($search){
                        $q->orWhere('name','LIKE',"%$search%")
                        ->orWhere('display_name','LIKE',"%$search%");
                    })
            		->get();
        }
        
        return response()->json($data);
    }

}
