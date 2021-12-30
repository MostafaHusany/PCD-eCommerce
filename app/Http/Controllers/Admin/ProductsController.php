<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Product;
use App\ProductCategory;

class ProductsController extends Controller
{
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Product::query();
            
            // if (isset($request->title)) {
            //     $model->where(function($query) use ($request){
            //         $query->orWhere('ar-title', 'like', '%' . $request->title . '%');
            //         $query->orWhere('en-title', 'like', '%' . $request->title . '%');
            //     });
            // }

            $datatable_model = Datatables::of($model)
            ->addColumn('image', function ($row_object) {
                return view('admin.products.incs._image', compact('row_object'));
            })
            ->addColumn('price', function ($row_object) {
                return $row_object->getFormatedPrice();
            })
            ->addColumn('price_after_sale', function ($row_object) {
                return isset($row_object->price_after_sale) ? $row_object->getFormatedSale() : '---';
            })
            ->addColumn('categories', function ($row_object) {
                return $row_object->categories()->count() ? 
                    view('admin.products.incs._categories', compact('row_object')) : '---';
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.products.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.products.index');
    }
    
    public function show (Request $request, $id) {
        $target_object = Product::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            // $target_object->categories = $target_object->categories()->pluck('product_categories.id')->toArray();
            $target_object->categories;
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['data' => null, 'success' > false]);
    }

    public function store (Request $request) {
        // dd($request->categories, explode(',', $request->categories));
        $validator = Validator::make($request->all(), [
            'ar_name'        => 'required|unique:products,ar_name|max:255',
            'en_name'        => 'required|unique:products,en_name|max:255',
            'ar_description' => 'required|max:2000',
            'en_description' => 'required|max:2000',
            'ar_small_description' => 'required|max:1000',
            'en_small_description' => 'required|max:1000',
            'sku'           => 'required|unique:products,sku|max:255',
            'price'         => 'required|numeric|min:1',
            'main_image'    => 'required',
            'categories'    => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data       = $request->except(['main_image', 'price_after_sale']);
        
        $main_image = $request->file('main_image')[0];
        $main_image->store('/public/products');
        $data['main_image'] = 'storage/products/' . $main_image->hashName(); 
        
        if (isset($request->images)) {
            $images = [];
            foreach($request->images as $image) {
                $image->store('/public/products');
                $images[] = 'storage/products/' . $image->hashName(); 
            }// end :: foreach

            $data['images'] = json_encode($images);
        }// end :: if
        
        $data['slug'] = join("-", explode(' ', $request->en_name));
        $data['price_after_sale'] = $request->price_after_sale > 0 ? $request->price_after_sale : null;
        $categories = explode(',', $request->categories);

        $new_object = Product::create($data);
        $new_object->categories()->sync($categories);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'ar_name'        => 'required|max:255|unique:products,ar_name,'.$id,
            'en_name'        => 'required|max:255|unique:products,en_name,'.$id,
            'ar_description' => 'required|max:2000',
            'en_description' => 'required|max:2000',
            'ar_small_description' => 'required|max:1000',
            'en_small_description' => 'required|max:1000',
            'sku'           => 'required|max:255|unique:products,sku,'.$id,
            'price'         => 'required|numeric|min:1',
            // 'main_image'    => 'required',
            'categories'    => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }


        $data       = $request->except(['main_image', 'price_after_sale']);
        
        if (isset($request->main_image)) {
            $main_image = $request->file('main_image')[0];
            $main_image->store('/public/products');
            $data['main_image'] = 'storage/products/' . $main_image->hashName(); 
        }

        if (isset($request->images)) {
            $images = [];
            foreach($request->images as $image) {
                $image->store('/public/products');
                $images[] = 'storage/products/' . $image->hashName(); 
            }// end :: foreach

            $data['images'] = json_encode($images);
        }// end :: if
        
        $data['slug'] = join("-", explode(' ', $request->en_name));
        $data['price_after_sale'] = $request->price_after_sale > 0 ? $request->price_after_sale : null;
        $categories = explode(',', $request->categories);

        $target_object = Product::find($id);
        $target_object->update($data);
        $target_object->categories()->sync($categories);

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
