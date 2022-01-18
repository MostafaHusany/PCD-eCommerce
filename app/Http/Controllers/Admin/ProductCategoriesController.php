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
                    $query->orWhere('ar_title', 'like', '%' . $request->title . '%');
                    $query->orWhere('en_title', 'like', '%' . $request->title . '%');
                });
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('parent', function ($row_object) {
                return $row_object->is_main ? '--' : '';
            })
            ->addColumn('products', function ($row_object) {
                // return 0;
                return $row_object->products()->count();
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.categories.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        $all_categories = ProductCategory::all();
        return view('admin.categories.index', compact('all_categories'));
    }

    public function show (Request $request, $id) {
        $target_object = ProductCategory::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        } else if (isset($target_object) && isset($request->my_products)) {
            $category_products = $target_object->products()->where('is_active', 1)->where('quantity', '>', 0)->where('is_composite', 0)->get();
            return response()->json(['data' => $category_products, 'category' => $target_object, 'success' => isset($category_products)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'ar_title'       => 'required|unique:product_categories,ar_title|max:255',
            'en_title'       => 'required|unique:product_categories,en_title|max:255',
            'ar_description' => 'required|max:500',
            'en_description' => 'required|max:500',
            'rule'           => 'required|max:3',
            'is_main'        => 'required',
            'category_id'    =>  $request->is_main == 0 ? 'exists:product_categories,id' : ''
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
            'ar_title'       => 'required|max:255|unique:product_categories,ar_title,' . $id,
            'en_title'       => 'required|max:255|unique:product_categories,en_title,' . $id,
            'ar_description' => 'required|max:500',
            'en_description' => 'required|max:500',
            'rule'           => 'required|max:3',
            'is_main'        => 'required',
            'category_id'    =>  $request->is_main == 0 ? 'exists:product_categories,id' : ''
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
            $data = ProductCategory::select("id", "ar_title", "en_title")
            		->orWhere('ar_title','LIKE',"%$search%")
            		->orWhere('en_title','LIKE',"%$search%")
                    ->orWhere('id', $search)
            		->get();
        }
        return response()->json($data);
    }
}
