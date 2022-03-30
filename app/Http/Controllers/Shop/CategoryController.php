<?php

namespace App\Http\Controllers\shop;

use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    public function category($slug)
    {
        // get current category
        $currentCategory = ProductCategory::where('slug', $slug)->first();
        // get category children
        $categoryProducts = ProductCategory::where('category_id', $currentCategory->id)->get();
        $title = "category";
        if (isset($currentCategory->products)) {
            $products = $currentCategory->products()->where('is_active', '1')->paginate(PAGINATION_COUNT);
            return view('shop.products.index', compact('categoryProducts', 'products', 'currentCategory', 'title'));
        }
        return view('shop.products.index', compact('categoryProducts', 'currentCategory', 'title'));
    }

    public function brand_filter(Request $request)
    {
        $title = "category";
        $brands = $request->brands;
        if ($brands) {
            $products = Product::whereIn('brand_id', $brands)->paginate(PAGINATION_COUNT);
            $categoryProducts = ProductCategory::get();
            $currentCategory = ProductCategory::first();

            return view('shop.products.index', compact('categoryProducts', 'products', 'currentCategory', 'title'));
        } else {
            return redirect()->back();
        }
    }

    public function option_filter(Request $request)
    {
        $attributes = [];
        if ($request->checkbox) {
            $options = $request->checkbox;
            foreach ($options as  $option) {
                $attributes[] = CategoryAttribute::where('meta', 'like', '%' . $option . '%')->get();
            }
        }
        if ($request->price_first) {
            $attributes[] = CategoryAttribute::where('meta', 'like', '%' . $request->price_first . '%')
                ->where('meta', 'like', '%' . $request->price_second . '%')->where('type', 'number')
                ->get();
        }
        if (count($attributes[0]) > 0) {



            foreach ($attributes as $attribute) {

                $categoryProducts[] = $attribute[0]->products_categories;
            }
            $categoryProducts  = array_unique($categoryProducts);
            $currentCategory  = array_unique($categoryProducts)[0];


            foreach (array_unique($categoryProducts) as $cat) {
                $products[] = $cat->products;
            }
            $title = "category";
            $products =  $this->paginate($products[0]);
            $categoryProducts = [];
            return view('shop.products.index', compact('categoryProducts', 'products', 'currentCategory', 'title'));
        } else {
            return redirect()->back();
        }
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function Search(Request $request)
    {
        $products = Product::where('ar_name', 'like', '%' . $request->search . '%')
            ->orWhere('ar_small_description',  'like', '%' . $request->search . '%')
            ->orWhere('ar_description',  'like', '%' . $request->search . '%')
            ->orWhere('en_name',  'like', '%' . $request->search . '%')
            ->orWhere('en_small_description',  'like', '%' . $request->search . '%')
            ->orWhere('en_description',  'like', '%' . $request->search . '%')->get();
        return view('shop.products.search', compact('products'));
    }
}
