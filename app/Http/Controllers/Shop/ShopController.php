<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;

class ShopController extends Controller
{
    public function index()
    {
        // call here to safe time on database ->with('children')
        $main_categories = ProductCategory::where('is_main', 1)->with('children')->get();

        return view('shop.index', compact('main_categories'));
    }

    public function prodects(Request $request)
    {
        /**
         * Get products we need to get products
         * use pagination in loading products
         * use categories in loding products, or loading all data
         */

        $model = Product::query();

        if (isset($request->category) && $request->category !== '') {
            $model->whereHas('categories', function ($q) use ($request) {
                $q->where('product_categories.id', $request->category);
            });
        }

        if (isset($request->orderby_type) && $request->orderby_type === 'menu_order') {
        }
        if (isset($request->orderby_type) && $request->orderby_type === 'popularity') {
        }
        if (isset($request->orderby_type) && $request->orderby_type === 'rating') {
        }
        if (isset($request->orderby_type) && $request->orderby_type === 'date') {
            $model->orderBy('id', 'desc');
        }
        if (isset($request->orderby_type) && $request->orderby_type === 'price') {
            $model->orderBy('price', 'asc');
        }
        if (isset($request->orderby_type) && $request->orderby_type === 'price-desc') {
            $model->orderBy('price', 'desc');
        }

        $pagination     = isset($request->pagination) && $request->pagination <= 32 && $request->pagination >= 3 ? $request->pagination : 3;
        $all_products   = $model->paginate($pagination);

        return response()->json(['products' => $all_products, 'success' => isset($all_products)]);
    }

    public function show(Request $request, $slug)
    {
        // dd(\LaravelLocalization::getCurrentLocale());
        $product = Product::where('slug', $slug)->first();
        $relatedProducts =  $product->categories[0]->products;
        $category =  $product->categories[0];
        return view('shop.show', compact('product', 'relatedProducts', 'category'));
    }

    public function products()
    {
        $categoryProducts = ProductCategory::where('is_main', '1')->get();
        $products = Product::where('is_active', '1')->paginate(PAGINATION_COUNT);
        $title = "all_products";
        return view('shop.products', compact('products', 'categoryProducts', 'title'));
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('is_active', '1')->paginate(PAGINATION_COUNT);
            return view('shop.incs.product-card', compact('products'))->render();
        }
    }
    function category(Request $request)
    {
        if ($request->ajax()) {
            $params = explode("/",$request->page);
            $page = $params [0];
            $category = $params [1];
            $category = ProductCategory::find($category);
            $products = $category->products()->where('is_active','1')->paginate(PAGINATION_COUNT);
            return view('shop.incs.product-card', compact('products'))->render();
        }
    }
}
