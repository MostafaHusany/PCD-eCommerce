<!DOCTYPE html>
@if(get_lang() == 'ar')
<html lang="ar" dir="rtl">
@else
<html lang="en">
@endif

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>@yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('shop')}}/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('shop')}}/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{asset('shop')}}/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('shop')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/linearicons.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/simple-line-icons.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{asset('shop')}}/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('shop')}}/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="{{asset('shop')}}/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('shop')}}/css/magnific-popup.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('shop')}}/css/jquery-ui.css">

    <link rel="stylesheet" href="{{asset('shop')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/slick-theme.css">
    <!-- Style CSS -->

    <link rel="stylesheet" href="{{asset('shop')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/responsive.css">
    @if(get_lang() == 'ar')
    <link rel="stylesheet" href="{{asset('shop')}}/css/rtl-style.css">
    @endif
</head>

<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->

<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown me-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="{{asset('shop')}}/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="{{asset('shop')}}/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="{{asset('shop')}}/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="me-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                        <ul class="contact_detail text-center text-lg-start">
                            <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-end">
                        <ul class="header_list">
                            <li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Compare</span></a></li>
                            @guest
                            <li><a href="{{route('Login')}}"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                            @else
                            <li><a href="{{route('wishlist')}}"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                            @endguest
                            @auth
                            <li><a href="{{route('profile')}}"><i class="ti-user"></i><span>
                                        profile</span></a></li>
                            @else
                            <li><a href="{{route('Login')}}"><i class="ti-user"></i><span>
                                        Login</span></a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img class="logo_light" src="{{asset('shop')}}/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="{{asset('shop')}}/images/logo_dark.png" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a class="nav-link" href="{{route('index')}}">Home</a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link" href="{{route('products')}}">All products</a>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">title one</a>
                            <div class="dropdown-menu">
                                <ul>
                                    @foreach(categories() as $category)
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('category', $category->id)}}">
                                            @if(get_lang() == 'ar')
                                            {{$category->ar_title}}
                                            @elseif(get_lang() == 'en')
                                            {{$category->en_title}}
                                            @endif</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link" href="">Title two</a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link" href="">Title three</a>
                        </li>
                        <li class="dropdown ">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">
                                    <span class="user-name text-bold-700"> {{App::getLocale()}}</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul>
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li><a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </li>

                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form action="{{route('Search')}}" method="post">
                                @csrf
                                <input type="text" placeholder="Search" name="search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count" id='items_count'>{{items_count()}}</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list" id="cart-content">
                                @if(cartContent())
                                @foreach(cartContent() as $item)
                                <div class="single">
                                    <li>
                                        <a href="#" class="item_remove"><i class="ion-close delete-cart-item" data-product-id="{{$item->rowId}}"></i></a>
                                        <a href="#">{{$item->name}}</a>
                                        <span class="cart_quantity"> {{$item->qty}} x <span class="cart_amount"> <span class="price_symbole">$</span></span>{{$item->price}}</span>
                                    </li>
                                </div>
                                @endforeach
                            </ul>

                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole" id="totalPrice">{{totalPrice()}}</span></p>
                                <p class="cart_buttons"><a href="{{route('cart')}}" class="btn btn-fill-line rounded-0 view-cart">View Cart</a>
                                    <a href="#" class="btn btn-fill-out rounded-0 checkout">Checkout</a>
                                </p>
                            </div>
                            @endif
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->

@yield('content')

@extends('layouts.shop.footer')