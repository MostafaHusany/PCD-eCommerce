<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Models\Permission;

class PermissionsController extends Controller
{
    
    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = Permission::select("id", "name", "display_name")
                    ->where(function ($q) use ($search){
                        $q->orWhere('name','LIKE',"%$search%")
                        ->orWhere('display_name','LIKE',"%$search%");
                    })
            		->get();
        }
        
        return response()->json($data);
    }
}
