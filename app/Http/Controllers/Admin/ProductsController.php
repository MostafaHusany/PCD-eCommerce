<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;

class ProductsController extends Controller
{
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Product::query();
            
            if (isset($request->title)) {
                $model->where(function($query) use ($request){
                    $query->orWhere('ar-title', 'like', '%' . $request->title . '%');
                    $query->orWhere('en-title', 'like', '%' . $request->title . '%');
                });
            }

            $datatable_model = Datatables::of($model)
            // ->addColumn('parent', function ($row_object) {
            //     return $row_object->is_main ? '--' : '';
            // })
            // ->addColumn('products', function ($row_object) {
            //     return 0;
            // })
            ->addColumn('actions', function ($row_object) {
                return view('admin.categories.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        $all_categories = ProductCategory::all();
        return view('admin.categories.index', compact('all_categories'));
    }
}
