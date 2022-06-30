<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ThemeSetting;
use App\ProductCategory;

class ThemeController extends Controller
{
    public function navbar (Request $request) {
        
        if(isset($request->navbra_links)) {
            $navbra_links = ThemeSetting::where('section', 'navbar')->get();

            return response()->json(['data' => $navbra_links, 'success' => isset($navbra_links)]);
        }
        
        $all_categories = ProductCategory::all();
        
        return view('admin.themes.navbar.index', compact('all_categories'));
    }

    public function cover (Request $request) {
        $all_categories = ProductCategory::all();
        
        return view('admin.themes.cover.index', compact('all_categories'));
    }

    public function store (Request $request) {

        if (isset($request->navbar)) {
            return $this->storeNavbar($request);
        }
    }

    public function storeNavbar ($request) {
        // validation
        
        foreach($request->links as $link) {
            $data[] = [
                'section' => 'navbar',
                'meta'    => json_encode([
                    'title' => $link['title'],
                    'type'  => $link['type'],
                    'value' => $link['value'],
                ]),
                'category_id' => $link['type'] == 'category' ? $link['value'] : null
            ];
        }

        ThemeSetting::where('section', 'navbar')->delete();
        $navbar_data = ThemeSetting::insert($data);
        return response()->json(['data' => $navbar_data, 'success' => isset($navbar_data)]);
    }


    /**
     * # Theme Table what will store ?! 
     * 1- We want to store navbar structure 
     * 2- we want to store cover image, and links
     * 3- we want to store
    */
}
