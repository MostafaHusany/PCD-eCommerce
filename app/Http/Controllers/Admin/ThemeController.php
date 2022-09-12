<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ThemeSetting;
use App\ProductCategory;

class ThemeController extends Controller
{
    public function customeSection (Request $request) {
        
        if(isset($request->cSection)) {
            $customeSection = ThemeSetting::where('section', 'cSection')->with('products')->get();
            
            return response()->json(['data' => $customeSection, 'success' => isset($customeSection)]);
        }
        
        $all_categories = ProductCategory::all();
        
        return view('admin.themes.custome_sections.index', compact('all_categories'));
    }

    public function navbar (Request $request) {
        
        if(isset($request->navbra_links)) {
            $navbra_links = ThemeSetting::where('section', 'navbar')->get();

            return response()->json(['data' => $navbra_links, 'success' => isset($navbra_links)]);
        }
        
        $all_categories = ProductCategory::all();
        
        return view('admin.themes.navbar.index', compact('all_categories'));
    }

    public function slider (Request $request) {
        if(isset($request->slidies)) {
            $slides = ThemeSetting::where('section', 'slider')->get();

            return response()->json(['data' => $slides, 'success' => isset($slides)]);
        }

        $all_categories = ProductCategory::all();
        
        return view('admin.themes.slider.index', compact('all_categories'));
    }

    public function footer () {
        /**
         * Manage footer links,
         * solcial icons,
         * adds 
         */

        return view('admin.themes.footer.index');
    }

    public function contactInfo () {
        return view('');
    } 

    public function store (Request $request) {

        if (isset($request->navbar)) {
            return $this->storeNavbar($request);
        }

        if (isset($request->slider)) {
            return $this->storeSlider($request);
        }

        if (isset($request->cSection)) {
            return $this->storeCSection($request);
        }
    }

    private function storeNavbar ($request) {
        // validation ...
        
        $data = [];
        foreach($request->links as $link) {
            $data[] = [
                'section' => 'navbar',
                'meta'    => json_encode([
                    'ar_title' => $link['ar_title'],
                    'en_title' => $link['en_title'],
                    'type'  => $link['type'],
                    'value' => $link['value'],
                ]),
                'category_id' => $link['type'] == 'category' ? $link['value'] : null
            ];
        }

        ThemeSetting::where('section', 'navbar')->delete();
        $navbar_data = sizeof($data) ? ThemeSetting::insert($data) : null;
        return response()->json(['data' => $navbar_data, 'success' => true ]);
    }

    private function storeSlider ($request) {
        // validation ...

        /**
         * 1- store slide image,
         * 2- parse data 
         * 3- store new slider, and send response
         */

         
        $image = $request->file('image');
        $image->store('/public/homeSlider');
        
        $data = [
            'section' => 'slider',
            'meta'    => json_encode([

                'order' => $request->order,
                'image' => 'storage/homeSlider/' . $image->hashName(),
                'type'  => $request->type, // product, category, external_link
                'value' => $request->value
            ]),
            'category_id'    => $request->type == 'category' ? $request->value : null,
            'product_id'     => $request->type == 'product' ? $request->value : null,
            'external_link'  => $request->type == 'externalLink' ? $request->value : null
        ];

        $theme_setting = ThemeSetting::create($data);

        return response()->json(['data' => $theme_setting, 'success' => isset($theme_setting)]);
    }

    private function storeCSection ($request) {
        // validate ...
        
        ThemeSetting::where('section', 'cSection')->delete();
        foreach($request->sections as $section) {
            // dd($section);
            $data = [
                'section' => 'cSection',
                'meta'    => json_encode([
                    'ar_title' => $section['ar_title'],
                    'en_title' => $section['en_title'],
                    'order'  => $section['order'],
                ]),
            ];

            $products = [];
            foreach($section['products'] as $product) {
                $products[] = $product['id'];
            }

            $theme_section = ThemeSetting::create($data);
            $theme_section->products()->sync($products);
        }

        return response()->json(['data' => null, 'success' => true]);
    }

    public function update (Request $request, $id) {
        if (isset($request->navbar)) {
            return $this->updateNavbar($request);
        }

        if (isset($request->slider)) {
            return $this->updateSlider($request, $id);
        }
    } 

    public function updateSlider ($request, $id) {
        $target_slide = ThemeSetting::find($id);
        
        if (isset($target_slide)) {

            $image = $request->file('image');
            if (isset($image)) {
                $image->store('/public/homeSlider');
            }

            $data = [
                'section' => 'slider',
                'category_id' => $request->type == 'category' ? $request->value : null,
                'product_id'  => $request->type == 'product' ? $request->value : null,
                'external_link'  => $request->type == 'externalLink' ? $request->value : null
            ];

            $prev_slide_meta = (array) json_decode($target_slide->meta);
            $data['meta'] = json_encode([
                'order' => $request->order,
                'image' => isset($image) ? 'storage/homeSlider/' . $image->hashName() : $prev_slide_meta['image'],
                'type'  => $request->type, // product, category, external_link
                'value' => $request->value
            ]);

            $target_slide->update($data);
        };

        return response()->json(['data' => $target_slide, 'success' => isset($target_slide)]);
    }

    public function destory ($id) {
        $target_obj = ThemeSetting::find($id);

        isset($target_obj) ? $target_obj->delete() : null;

        return response()->json(array('data' => $target_obj, 'success' => isset($target_obj))); 
    }

    /**
     * # Theme Table what will store ?! 
     * 1- We want to store navbar structure 
     * 2- we want to store cover image, and links
     * 3- we want to store
    */
}
