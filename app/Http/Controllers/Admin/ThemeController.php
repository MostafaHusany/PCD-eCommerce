<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index (Request $request) {
        
        
        return view('admin.themes.navbar.index');
    }
}
