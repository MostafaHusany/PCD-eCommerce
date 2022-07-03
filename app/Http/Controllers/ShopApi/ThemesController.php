<?php

namespace App\Http\Controllers\ShopApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ThemeSetting;

class ThemesController extends Controller
{
    public function getHomeTheme () {
        // need caching
        $slides = ThemeSetting::where('section', 'slider')->get();
        $navbraLinks = ThemeSetting::where('section', 'navbar')->get();
        $customeSection = ThemeSetting::where('section', 'cSection')->with('products')->get();

        $data = [
            'slides' => $slides,
            'navbraLinks' => $navbraLinks,
            'customeSection' => $customeSection,
        ];

        return response()->json(array('data' => $data, 'success' => isset($data)));
    }
}
