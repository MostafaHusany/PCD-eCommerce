<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\ProductCategory;
use App\CategoryAttribute;

class ProductCategoriesController extends Controller
{
    private $target_model;

    public function __construct () {
        $this->target_model = new ProductCategory;
    }
    

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
        if (isset($request->group_acc)) {
            $targted_categoreis = $this->target_model->whereIn('id', $request->categoreis_id)->with('attributes')->get();
            return response()->json(['data' => $targted_categoreis, 'success' => isset($targted_categoreis)]);
        }

        $target_object = ProductCategory::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            $target_object->attributes;
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        } else if (isset($target_object) && isset($request->my_products)) {
            $category_products = $target_object->products()->where('is_active', 1)->where('quantity', '>', 0)->where('is_composite', 0)->get();
            return response()->json(['data' => $category_products, 'category' => $target_object, 'success' => isset($category_products)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        // dd($request->all());
        /**
         * The plan is to create a new custome fields that linked to product_category
         * when we link a product to a category automatically the product is linked 
         * to the custome attributes.
         * 
         * each attribute should have .... (title, type, options, values, meta, metric)
         */
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

        $custome_fields = json_decode($request->custome_fields);
        $this->create_category_custome_fields($new_object, $custome_fields);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {
        // dd($request->all());
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
        
        $target_object->attributes()->delete();
        $custome_fields = json_decode($request->custome_fields);
        
        $this->create_category_custome_fields($target_object, $custome_fields);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function destroy ($id) {
        $target_object = ProductCategory::find($id);
        
        isset($target_object) && $target_object->attributes()->delete();
        isset($target_object) && $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $model = ProductCategory::query()->select("id", "ar_title", "en_title")
            		->orWhere('ar_title','LIKE',"%$search%")
            		->orWhere('en_title','LIKE',"%$search%")
                    ->orWhere('id', $search);

            $data = isset($request->is_main) ? $model->where('is_main', 1)->get() : $model->get();
        }
        return response()->json($data);
    }

    // START HELPER FUNCTIONS
    private function create_category_custome_fields ($target_object, $custome_field) {
        $custome_fields = [];

        foreach ($custome_field as $field) {
            $field_arr = (array) $field;
            $data = [
                'title'       => $field_arr['field_title'],
                'type'        => $field_arr['field_type'],
                'category_id' => $target_object->id,
                'meta'        => $field_arr['field_type'] == 'options' ? json_encode(['options' => $field_arr['field_options']])
                                    :
                                json_encode(['number' => ['field_number_from' => $field_arr['field_number_from'], 
                                                          'field_number_to'   => $field_arr['field_number_to'],
                                                          'field_number_metric' => $field_arr['field_number_metric']]])
            ];
            
            $custome_fields[] = $data;
        }

        return CategoryAttribute::insert($custome_fields);
    }
}
