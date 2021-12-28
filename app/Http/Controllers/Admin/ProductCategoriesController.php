<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\ProductCategory;

class ProductCategoriesController extends Controller
{
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = ProductCategory::query();
            
            if (isset($request->title)) {
                $model->where(function($query) use ($request){
                    $query->orWhere('ar-title', 'like', '%' . $request->title . '%');
                    $query->orWhere('en-title', 'like', '%' . $request->title . '%');
                });
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('products', function ($row_object) {
                return 0;
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.categories.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.categories.index');
    }

    public function show (Request $request, $id) {
        $target_object = ProductCategory::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'ar-title'       => 'required|unique:product_categories,ar-title|max:255',
            'en-title'       => 'required|unique:product_categories,en-title|max:255',
            'ar-description' => 'required|max:500',
            'en-description' => 'required|max:500',
            'rule'        => 'required|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data       = $request->all();
        $new_object = ProductCategory::create($data);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'ar-title'       => 'required|max:255|unique:product_categories,ar-title,' . $id,
            'en-title'       => 'required|max:255|unique:product_categories,en-title,' . $id,
            'ar-description' => 'required|max:500',
            'en-description' => 'required|max:500',
            'rule'           => 'required|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data = $request->all();
        $target_object = ProductCategory::find($id);
        $target_object->update($data);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function destroy ($id) {
        $target_object = ProductCategory::find($id);
        isset($target_object) && $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = ProductCategory::select("id", "ar-title", "en-title")
            		->orWhere('ar-title','LIKE',"%$search%")
            		->orWhere('en-title','LIKE',"%$search%")
                    ->orWhere('id', $search)
            		->get();
        }
        return response()->json($data);
    }
}
