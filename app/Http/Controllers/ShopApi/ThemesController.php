<?php

namespace App\Http\Controllers\ShopApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ThemeSetting;

class ThemesController extends Controller
{
    public function getHomeTheme () {
        // need caching
        $slides = ThemeSetting::where('section', 'slider')->with(['category', 'product'])->get();
        $navbraLinks = ThemeSetting::where('section', 'navbar')->with(['category'])->get();
        $customeSection = ThemeSetting::where('section', 'cSection')->with(['products'])->get();

        $data = [
            'slides' => $slides,
            'navbraLinks' => $navbraLinks,
            'customeSection' => $customeSection,
        ];

        return response()->json(array('data' => $data, 'success' => isset($data)));
    }

    public function getNavbarLinks () {
        // need caching
        $navbraLinks = ThemeSetting::where('section', 'navbar')->with(['category'])->get();

        $data = [
            'navbraLinks' => $navbraLinks,
        ];

        return response()->json(array('data' => $data, 'success' => isset($data)));
    }

    public function getThemeLayout () {
        // gets navbar data, and contacts info
        $navbraLinks = ThemeSetting::where('section', 'navbar')->with(['category'])->get();
        $contacts_info = ThemeSetting::where('section', 'contacts_info')->first();
        $contacts_info = isset($contacts_info->meta) ? (array) json_decode($contacts_info->meta) : [];

        $data = [
            'navbraLinks'  => $navbraLinks,
            'contactsInfo' => $contacts_info
        ];

        return response()->json(array('data' => $data, 'success' => isset($data)));
    }
}
