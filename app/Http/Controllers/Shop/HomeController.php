<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
          return view('shop.home');
    }
}
