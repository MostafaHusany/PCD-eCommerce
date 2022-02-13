<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Product;
use App\ProductCategory;
use App\CategoryAttribute;
use App\ProductCustomeField;

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
            ->addColumn('name', function ($row_object) {
                // return "$row_object->en_name / $row_object->ar_name";
                return view('admin.products.incs._name', compact('row_object'));
            })
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
            ->addColumn('reserved_quantity', function ($row_object) {
                return $row_object->is_composite ? '---' : $row_object->reserved_quantity;
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
            $target_object->product_custome_fields;
            $target_object->children = $target_object->is_composite ? $target_object->children()->distinct()->get() : null;
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        if (isset($target_object) && isset($request->get_p)) {
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['product' => null, 'success' > false]);
    }

    public function store (Request $request) {
        // dd($request->all());
        // START VALIDATION
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

        $child_products          = $request->is_composite == 1 ? (array) json_decode($request->child_products) : [];
        $child_products_quantity = $request->is_composite == 1 ? (array) json_decode($request->child_products_quantity) : [];
        
        if ($request->is_composite == 1) {
            /**
             * I want to make sure that products quantity is valied
             * for making reserved_quantity for composite products
            */

            $err_msg = $this->validate_child_products_quantity($child_products, $child_products_quantity, $request->reserved_quantity);

            if (isset($err_msg)) {
                return response()->json(['data' => null, 'success' => false, 'msg' => $err_msg]); 
            }
        }
        // END VALIDATION

        
        $data = $request->except(['main_image', 'price_after_sale', 'is_active', 'reserved_quantity']);
        
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
        }
        
        $data['quantity']         = $request->is_composite == 1 ? $request->reserved_quantity : $request->quantity;
        $data['slug']             = join("-", explode(' ', $request->en_name));
        $data['price_after_sale'] = $request->price_after_sale > 0 ? $request->price_after_sale : null;
        $data['meta']             = json_encode([
            'child_products_id' => $child_products,
            'products_quantity' => $child_products_quantity,
        ]);

        $new_object = Product::create($data);
        
        $categories = explode(',', $request->categories);
        $this->sync_product_categories($categories, $new_object);

        // start record custome_fields ... 
        $this->create_products_custome_fields ($new_object, $request->custome_attr_id, $request->custome_field_attr);
        

        if ($request->is_composite == 1) {
            $new_object->children()->sync($child_products);
            $this->update_reserved_products($new_object);
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
        // dd($request->all());
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

        /**
         * For the reserved quantity updates ?
         * Parent quantity, child r-quantity , child o-quantity
         * 
         * we can return the whole quantityt than start updating the data
         * don't forget about validation
         * 
         * check first if there is a change in the quantity that 
         * user entered in the reserved unit by comparing the new by the 
         * original, if there is a change start act
         * 
         * There is a diference sinario and more secure
         * restore all reserved quantityt to the products
         * than start doing validation , 
         * if failed return every thing back
         * if true start do your job 
         * 
         */

        
        // get the target product
        $target_object = Product::find($id);

        $child_products          = $request->is_composite == 1 ? (array) json_decode($request->child_products) : [];
        $child_products_quantity = $request->is_composite == 1 ? (array) json_decode($request->child_products_quantity) : [];
        // dd($child_products, $child_products_quantity);
        if ($request->is_composite == 1) {
            $this->restore_reserved_products($target_object);

            $err_msg = $this->validate_child_products_quantity($child_products, $child_products_quantity, $request->reserved_quantity);

            if (isset($err_msg)) {
                $this->update_reserved_products($target_object);
                return response()->json(['data' => null, 'success' => false, 'msg' => $err_msg]); 
            }
        }

        $data  = $request->except(['main_image', 'price_after_sale', 'is_active']);
        
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
        
        
        $data['quantity']         = $request->is_composite == 1 ? $request->reserved_quantity : $request->quantity;
        $data['slug']             = join("-", explode(' ', $request->en_name));
        $data['price_after_sale'] = $request->price_after_sale > 0 ? $request->price_after_sale : null;
        $data['meta']             = json_encode([
            'child_products_id' => $child_products,
            'products_quantity' => $child_products_quantity,
        ]);
        $categories               = explode(',', $request->categories);

        $target_object->update($data);
        $this->sync_product_categories($categories, $target_object);
    

        if ($request->is_composite == 1) {
            $target_object->children()->sync($child_products);
            $this->update_reserved_products($target_object);
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

        if (isset($target_object)) {
            $target_object->is_composite == 1 && $this->restore_reserved_products($target_object);
            $target_object->delete();
        }

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

    private function update_reserved_products ($parent_product) {
        $child_products      = $parent_product->children()->get();
        $parent_product_meta = (array) json_decode($parent_product->meta);
        $products_quantity   = (array) $parent_product_meta['products_quantity'];

        foreach($child_products as $product) {
            $requested_quantity          = $parent_product->quantity * $products_quantity[$product->id];

            $product->quantity          -= $requested_quantity;
            $product->reserved_quantity += $requested_quantity;
            $product->save();
        }
    }

    private function restore_reserved_products ($parent_product) {
        $child_products      = $parent_product->children()->get();
        $parent_product_meta = (array) json_decode($parent_product->meta);
        $products_quantity   = (array) $parent_product_meta['products_quantity'];
        
        foreach($child_products as $product) {
            $requested_quantity          = $parent_product->quantity * $products_quantity[$product->id];

            $product->quantity          += $requested_quantity;
            $product->reserved_quantity -= $requested_quantity;
            $product->save();
            // dd($product->quantity, $product->reserved_quantity, $requested_quantity, $parent_product->quantity, $products_quantity[$product->id]);
        }
    }

    private function validate_child_products_quantity ($child_products, $child_products_quantity, $reserved_quantity) {
        $selected_products  = Product::whereIn('id', $child_products)->get();
        $msg_str = "";
        $msg     = null;

        foreach($selected_products as $product) {
            $requested_quantity = ($child_products_quantity[$product->id] * $reserved_quantity);

            if ($product->quantity < $requested_quantity) {
                $msg_str .= "<li>($product->en_name / $product->ar_name) has only $product->quantity and you requested $requested_quantity</li>";
            }
        }

        if (strlen($msg_str)) {
            $msg_str = "<ul>" . $msg_str . "</ul>";
            $msg     = ['reserved_quantity' => $msg_str];
        }

        return $msg;
    }

    private function create_products_custome_fields ($target_object, $custome_attr_id, $custome_field_attr) {
        $custome_attr_id    = (array) json_decode($custome_attr_id);
        $custome_field_attr = (array) json_decode($custome_field_attr);
        $get_targted_attr   = CategoryAttribute::whereIn('id', $custome_attr_id)->get(); // ProductCustomeField
        
        $custome_field_vals = [];
        foreach ($get_targted_attr as $attr) {
            $data = [
                'title' => $attr->title,
                'value' => $custome_field_attr[$attr->id],
                'type'  => $attr->type,
                'product_id'  => $target_object->id,
                'category_id' => $attr->category_id,
                'category_attribute_id' => $attr->id,
            ];

            $custome_field_vals[] = $data;
        }
        
        ProductCustomeField::insert($custome_field_vals);
    }
    // END   HELPER FUNCTIONS 

}
