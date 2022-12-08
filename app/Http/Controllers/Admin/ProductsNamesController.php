<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Imports\ProductNameImport;
use Maatwebsite\Excel\Facades\Excel;

use App\ProductName;

class ProductsNamesController extends Controller
{
    
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = ProductName::query()->orderBy('id', 'desc');

            if (isset($request->name)) {
                $model->where('name', 'like', "%$request->name%");

                // $model->where(function ($q) use ($request) {
                //     $q->orWhere('ar_name', 'like', "%$request->name%");
                //     $q->orWhere('en_name', 'like', "%$request->name%");
                // });
            }

            if (isset($request->sku)) {
                $model->where('sku', 'like', "%$request->sku%");
            }

            $datatable_model = Datatables::of($model)
            // ->addColumn('name', function ($row_object) {
            //     return view('admin.products_names.incs._name', compact('row_object'));
            // })
            ->addColumn('actions', function ($row_object) {
                return view('admin.products_names.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.products_names.index');
    }

    public function show (Request $request, $id) {
        $target_object = ProductName::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'importFile.*' => 'required|file|mimes:xlsx,xls,xls,xlw,csv',
        ]);

        if ($validator->fails()) {
            $validator->errors()->add(
                'importFile', 'File must be ont of this extentions xlsx, xls, xls or xlw.'
            );
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $result = Excel::import(new ProductNameImport,  $request->file('importFile')[0]);
        
        return response()->json(['data' => null, 'success' => isset($result)]);
    }

    protected function update (Request $request, $id) {
        // START VALIDATION
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:9999',
            'sku'   => 'required|max:9999',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $target_object = ProductName::find($id);
        $target_object->update($request->except('file', 'id', 'importFile'));
        
        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }
    
    public function destroy ($id) {
        $target_object = ProductName::find($id);

        if (isset($target_object)) {
            $target_object->delete();
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }
    
    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $model = ProductName::query();
            $model->select("id", "name", "sku")
            ->where(function ($model) use ($search) {
                $model->orWhere('name','LIKE',"%$search%")
                ->orWhere('sku','LIKE',"%$search%");
            });

            $data = $model->limit('15')->get();
        }
        return response()->json($data);
    }
}
