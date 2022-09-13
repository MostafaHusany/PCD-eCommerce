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

        $data = [
            'navbraLinks'  => $navbraLinks,
            'contactsInfo' => [
                'phone'       => '+201063200201',
                'email'       => 'pcd@pcd.com',
                'linkedin'    => '',
                'facebook'    => 'https://www.facebook.com/pcdsa',
                'youtube'     => 'https://www.youtube.com/channel/UC5_WMJEpzcN1ONEs820ugHw',
                'whatsapp'    => 'https://wa.me/966503362127',
                'instagram'   => 'https://www.instagram.com/pc_doctor/',
                'address'     => 'some address ....',
                'ar_description' => 'افضل متجر الكتروني علي شبكة الانترنت',
                'en_description' => 'We are the best eCommerce ever',
            ]
        ];

        return response()->json(array('data' => $data, 'success' => isset($data)));
    }
}
