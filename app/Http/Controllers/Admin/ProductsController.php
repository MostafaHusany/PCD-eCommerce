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
    /**
     * # The product object is most important part of our project,
     * and any kind of updates comes with this effect more than one place.
     * 
     * # Product & Category
     * for example when we add a category to a product, we have more 
     * child and parent category, if the product is connectd to a child
     * category, we shold get his parent and connected to it to.
     * 
     * # Composed Products
     * we have this type of products that consist of other group of 
     * other products like one package, in this kind of products
     * the quantity id is placed outomatically depending on the 
     * smallest quantity of products that is connected to this package,
     * and if one of the products is finshed we need to disable the product
    */
    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Product::query()->orderBy('id', 'desc');
            
            // if (isset($request->title)) {
            //     $model->where(function($query) use ($request){
            //         $query->orWhere('ar-title', 'like', '%' . $request->title . '%');
            //         $query->orWhere('en-title', 'like', '%' . $request->title . '%');
            //     });
            // }

            // dd($request->all());

            if (isset($request->name)) {
                $model->where(function ($q) use ($request) {
                    $q->orWhere('ar_name', 'like', "%$request->name%");
                    $q->orWhere('en_name', 'like', "%$request->name%");
                });
            }

            if (isset($request->sku)) {
                $model->where('sku', 'like', "%$request->sku%");
            }

            if (isset($request->category)) {
                $model->whereHas('categories', function ($q) use ($request) {
                    $q->where('product_categories.id', $request->category);
                });
            }

            if (isset($request->type)) {
                $model->where('is_composite', $request->type);
            }
            
            if (isset($request->active)) {
                $model->where('is_active', $request->active);
            }

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
            ->addColumn('is_composite', function ($row_object) {
                return $row_object->is_composite ? 'منتج مركب' : '---';
                return view('admin.products.incs._composite', compact('row_object'));
            })
            ->addColumn('active', function ($row_object) {
                return view('admin.products.incs._active', compact('row_object'));
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
            $target_object->is_composite && $target_object->children;
            return response()->json(['product' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['product' => null, 'success' > false]);
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

        $data       = $request->except(['main_image', 'price_after_sale', 'is_active']);
        
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
        // get all products 

        /**
        * get main category of the each child category parent ... 
        */
        $new_object = Product::create($data);
        // $new_object->categories()->sync($categories);
        $this->sync_product_categories($categories, $new_object);

        
        if ($request->is_composite == 1) {
            $child_products = explode(',', $request->child_products);
            $new_object->children()->sync($child_products);
        }

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }

    public function update (Request $request, $id) {
        if (isset($request->activate_product)) {
            return $this->updateActivation($id);
        }

        return $this->updateProduct($request, $id);
    }

    protected function updateProduct (Request $request, $id) {
        
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

        $data       = $request->except(['main_image', 'price_after_sale', 'is_active']);
        
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
        // $target_object->categories()->sync($categories);
        $this->sync_product_categories($categories, $target_object);

        if ($request->is_composite == 1) {
            $child_products = explode(',', $request->child_products);
            $target_object->children()->sync($child_products);
        }
        
        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    protected function updateActivation ($id) {
        $target_object = Product::find($id);
        if (isset($target_object)) {
            $target_object->is_active = !$target_object->is_active;
            $target_object->save();
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);        
    }

    public function destroy ($id) {
        $target_object = Product::find($id);
        isset($target_object) && $target_object->delete();

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    public function dataAjax(Request $request) {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $model = Product::query();
            $model->select("id", "ar_name", "en_name", "quantity")
                    ->where(function ($model) use ($search) {
                        $model->orWhere('ar_name','LIKE',"%$search%")
                        ->orWhere('en_name','LIKE',"%$search%")
                        ->orWhere('sku','LIKE',"%$search%")
                        ->orwhere('sku','LIKE',"%$search%")
                        ->orWhere('id', $search);
                    })
            		->where('quantity', '>', 0)
            		->where('is_active', 1);
            		
            !isset($request->all_products) && $model->where('is_composite',  0);

            $data = $model->get();
        }
        return response()->json($data);
    }

    // START HELPER FUNCTIONS 
    private function sync_product_categories ($categories_id, $target_product) {
        /**
        * Get all categories child categories ids and thier parent id  
        */

        $all_categories_ids = [];
        $targted_categories = ProductCategory::whereIn('id', $categories_id)->get();

        foreach($targted_categories as $category) {
            $all_categories_ids[] = $category->id;
            !$category->is_main && $all_categories_ids[] = $category->category_id;
        }
        
        $all_categories_ids = array_unique($all_categories_ids, SORT_REGULAR);
        $target_product->categories()->sync($all_categories_ids);
    }// end :: sync_product_categories
}
