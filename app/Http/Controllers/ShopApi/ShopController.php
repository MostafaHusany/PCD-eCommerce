<?php

namespace App\Http\Controllers\ShopApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;

class ShopController extends Controller
{

    public function show ($slug) {
        $target_product = Product::with(['brand', 'categories', 'product_promotion_r', 'brand'])->where('slug', $slug)->first();

        return response()->json(array('data' => $target_product, 'success' => isset($target_product)));
    }

    public function search_all_products (Request $request) {
        $model = Product::query()->with(['brand', 'categories', 'product_promotion_r', 'brand']);

        if (isset($request->name)) {
            $model->where(function ($q) use ($request) {
                $q->where('en_name', 'Like', "%$request->name%");
                $q->orWhere('ar_name', 'Like', "%$request->name%");
            });
        }

        if (isset($request->brands_id)) {
            $model->whereHas('brand', function ($q) use ($request) {
                $q->whereIn('brands.id', $request->brands_id);
            });
        }

        if (isset($request->categories_id)) {
            $model->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('product_categories.id', $request->categories_id);
            });
        }

        $pagination_nom = isset($request->pagination_nom) ? $request->pagination_nom : 15;  
        $order_type     = isset($request->order_type) ? $request->order_type : 'price';
        $order_dir      = isset($request->order_dir) ? $request->order_dir : 'desc';
        
        $products  = $model->orderBy($order_type, $order_dir)->paginate($pagination_nom);

        return response()->json(array('data' => $products, 'success' => isset($products)));
    }

    public function get_products_by_category (Request $request, $slug) {
        /**
         * # Get products of specific category, and do filtration by
         * brands, price , and category custome fields.
         *  
         * props : pagination_nom, order_type, order_dir, brands_id
         */

        $product_category = ProductCategory::where('slug', $slug)->first();
        $model            = $product_category->products()->with(['product_custome_fields', 'product_promotion_r', 'brand']);

        // filtration with name, with price  
        if (isset($request->name)) {
            $model->where('products.price', 'Like', "%$request->price_from%");
        }

        if (isset($request->price_from)) {
            $model->where('products.price', '>=', $request->price_from);
        }
        
        if (isset($request->price_to)) {
            $model->where('products.price', '<=', $request->price_to);
        }

        if (isset($request->brands_id)) {
            $model->whereHas('brand', function ($q) use ($request) {
                $q->whereIn('brands.id', $request->brands_id);
            });
        }
        
        // custome attribute filtration
        if (isset($request->custome_fields)) {
            foreach ($request->custome_fields as $custome_field) {
                $model->whereHas('product_custome_fields', function ($q) use ($custome_field) {
                    $q->where('title', $custome_field['title']);

                    if ($custome_field['type'] == 'number') {
                        $dir = $custome_field['dir'] == 'from' ? '>=' : '<=';
                        $q->where('value', $dir, $custome_field['value']);
                    } else {
                        $q->where('value', $custome_field['value']);
                    }
                });
            }// end :: foreach
        }// end :: if
        
        $pagination_nom = isset($request->pagination_nom) ? $request->pagination_nom : 15;  
        $order_type     = isset($request->order_type) ? $request->order_type : 'price';
        $order_dir      = isset($request->order_dir) ? $request->order_dir : 'desc';
        
        $products  = $model->orderBy($order_type, $order_dir)->paginate($pagination_nom);
        // $products       = $model->count();

        return response()->json(array('data' => $products, 'success' => isset($products)));
    }

    public function get_categories (Request $request) {
        $categories = cache()->remember('categories', 3600, function () {
            return ProductCategory::with(['product_custome_fields', 'brands'])->get();
        });
            
        return response()->json(array('data' => $categories, 'success' => isset($categories)));
    }

}