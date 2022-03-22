<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="{{asset('shop')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/slick-theme.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('shop')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('shop')}}/css/responsive.css">
    <!-- RTL CSS -->
    @if(get_lang() == 'ar')
    <link rel="stylesheet" href="{{asset('shop')}}/css/rtl-style.css">
    @else
    <style>
        .carousel-inner {
            margin-left: 320px;
        }
    </style>
    @endif

    
</head>

@if(get_lang() == 'ar')

<body dir="rtl">
    @else

    <body>
        @endif
        <!-- LOADER -->
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- END LOADER -->

        <!-- Home Popup Section -->
        <!-- <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                    </button>
                    <div class="row g-0">
                        <div class="col-sm-7">
                            <div class="popup_content  text-start">
                                <div class="popup-text">
                                    <div class="heading_s1">
                                        <h3>Subscribe Newsletter and Get 25% Discount!</h3>
                                    </div>
                                    <p>Subscribe to the newsletter to receive updates about new products.</p>
                                </div>
                                <form method="post">
                                    <div class="form-group mb-3">
                                        <input name="email" required type="email" class="form-control" placeholder="Enter Your Email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button class="btn btn-fill-out btn-block text-uppercase" title="Subscribe" type="submit">Subscribe</button>
                                    </div>
                                </form>
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                        <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="background_bg h-100" data-img-src="{{asset('shop')}}/images/popup_img3.jpg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
        <!-- End Screen Load Popup Section -->

        <!-- START HEADER -->
        <header class="header_wrap">
            <div class="top-header light_skin bg_dark d-none d-md-block">
                <div class="custom-container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="header_topbar_info">
                                <div class="header_offer">
                                </div>
                                <div class="download_wrap">
                                    <ul class="icon_list text-center text-lg-start">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                <div class="lng_dropdown">
                                    <select name="languageSelect" class="custome_select">
                                        <option value=""> {{trans('frontend.language')}}</option>
                                        <option value='en' data-image="{{asset('shop')}}/images/eng.png">English</option>
                                        <option value='ar' data-image="{{asset('shop')}}/images/ar.png">العربية</option>
                                    </select>
                                </div>
                                <div class="ms-3">
                                    <select name="countries" class="custome_select">
                                        <option value='USD' data-title="USD">USD</option>
                                        <option value='EUR' data-title="EUR">EUR</option>
                                        <option value='GBR' data-title="GBR">GBR</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle-header dark_skin">
                <div class="custom-container">
                    <div class="nav_block">
                        <a class="navbar-brand" href="{{route('index')}}">
                            <img class="logo_light" src="{{asset('shop')}}/images/logo_light.png" alt="logo" />
                            <img class="logo_dark" src="{{asset('shop')}}/images/logo_dark.png" alt="logo" />
                        </a>
                        <div class="product_search_form rounded_input">
                            <form>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="custom_select">
                                            <select class="first_null" name='category'>
                                                <option value="">@lang('frontend.categories')</option>
                                                @foreach(categories() as $key => $category)
                                                <option value="{{$category->id }}">
                                                    @if(get_lang() == 'ar')

                                                    {{substr($category->ar_title, 0, 20)}}
                                                    @elseif(get_lang() == 'en')
                                                    {{substr($category->en_title, 0, 20)}}
                                                    @endif
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <form action="{{route('Search')}}" method="post">
                                        @csrf
                                        <input class="form-control" placeholder="@lang('frontend.Search')" name="search" required="" type="text">
                                        <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </form>
                        </div>
                        <ul class="navbar-nav attr-nav align-items-center">
                            @auth
                            <li><a href="{{route('profile')}}" class="nav-link"><i class="linearicons-user"></i></a></li>
                            @else
                            <li><a href="{{route('Login')}}" class="nav-link"><i class="linearicons-user"></i></a></li>

                            @endauth
                            @guest
                            <li><a href="{{route('Login')}}" class="nav-link"><i class="linearicons-heart"></i></a></li>

                            @else
                            <li><a href="{{route('wishlist')}}" class="nav-link"><i class="linearicons-heart"></i></a></li>

                            @endguest


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
                                        <p class="cart_total"><strong>@lang('frontend.Subtotal'):</strong> <span class="cart_price"> <span class="price_symbole" id="totalPrice">{{totalPrice()}}</span></p>
                                        <p class="cart_buttons"><a href="{{route('cart')}}" class="btn btn-fill-line rounded-0 view-cart">@lang('frontend.ViewCart')</a>
                                            <a href="{{route('checkout')}}" class="btn btn-fill-out rounded-0 checkout">@lang('frontend.Checkout')</a>
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </li>


                            <!-- <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">2</span><span class="amount"><span class="currency_symbol">$</span>159.00</span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{asset('shop')}}/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                </li>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{asset('shop')}}/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                </li>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                                <p class="cart_buttons"><a href="#" class="btn btn-fill-line view-cart">View Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-3">

                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false">
                                    <span class="ion-android-menu"></span>
                                </button>
                                <div class="pr_search_icon">
                                    <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                                </div>
                                <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                                    <ul class="navbar-nav">
                                        <li class="dropdown">
                                            <a class="nav-link active" href="{{route('index')}}">{{trans('frontend.Home')}}</a>

                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Pages</a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <li><a class="dropdown-item nav-link nav_item" href="about.html">About Us</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="contact.html">Contact Us</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="faq.html">Faq</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="404.html">404 Error Page</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="login.html">Login</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="signup.html">Register</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="term-condition.html">Terms and Conditions</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="dropdown dropdown-mega-menu">
                                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Products</a>
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-3">
                                                        <ul>
                                                            <li class="dropdown-header">Woman's</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum sed</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-3">
                                                        <ul>
                                                            <li class="dropdown-header">Men's</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Vivamus in tortor</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-3">
                                                        <ul>
                                                            <li class="dropdown-header">Kid's</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-3">
                                                        <ul>
                                                            <li class="dropdown-header">Accessories</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <div class="d-lg-flex menu_banners row g-3 px-3">
                                                    <div class="col-lg-6">
                                                        <div class="header-banner">
                                                            <div class="sale-banner">
                                                                <a class="hover_effect1" href="#">
                                                                    <img src="{{asset('shop')}}/images/shop_banner_img7.jpg" alt="shop_banner_img7">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="header-banner">
                                                            <div class="sale-banner">
                                                                <a class="hover_effect1" href="#">
                                                                    <img src="{{asset('shop')}}/images/shop_banner_img8.jpg" alt="shop_banner_img8">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Blog</a>
                                            <div class="dropdown-menu dropdown-reverse">
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">Grids</a>
                                                        <div class="dropdown-menu">
                                                            <ul>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-three-columns.html">3 columns</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-four-columns.html">4 columns</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-left-sidebar.html">Left Sidebar</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-right-sidebar.html">right Sidebar</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-standard-left-sidebar.html">Standard Left Sidebar</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-standard-right-sidebar.html">Standard right Sidebar</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">Masonry</a>
                                                        <div class="dropdown-menu">
                                                            <ul>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-masonry-three-columns.html">3 columns</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-masonry-four-columns.html">4 columns</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-masonry-left-sidebar.html">Left Sidebar</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-masonry-right-sidebar.html">right Sidebar</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">Single Post</a>
                                                        <div class="dropdown-menu">
                                                            <ul>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single.html">Default</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-left-sidebar.html">left sidebar</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-slider.html">slider post</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-video.html">video post</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-single-audio.html">audio post</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item menu-link dropdown-toggler" href="#">List</a>
                                                        <div class="dropdown-menu">
                                                            <ul>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-list-left-sidebar.html">left sidebar</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="blog-list-right-sidebar.html">right sidebar</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="dropdown dropdown-mega-menu">
                                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Shop</a>
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-9">
                                                        <ul class="d-lg-flex">
                                                            <li class="mega-menu-col col-lg-4">
                                                                <ul>
                                                                    <li class="dropdown-header">Shop Page Layout</li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">shop List view</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">shop List Left Sidebar</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list-right-sidebar.html">shop List Right Sidebar</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Shop Load More</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="mega-menu-col col-lg-4">
                                                                <ul>
                                                                    <li class="dropdown-header">Other Pages</li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Cart</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Checkout</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="my-account.html">My Account</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Wishlist</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="compare.html">compare</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Order Completed</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="mega-menu-col col-lg-4">
                                                                <ul>
                                                                    <li class="dropdown-header">Product Pages</li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Default</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Left Sidebar</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Right Sidebar</a></li>
                                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Thumbnails Left</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-3">
                                                        <div class="header_banner">
                                                            <div class="header_banner_content">
                                                                <div class="shop_banner">
                                                                    <div class="banner_img overlay_bg_40">
                                                                        <img src="{{asset('shop')}}/images/shop_banner3.jpg" alt="shop_banner" />
                                                                    </div>
                                                                    <div class="shop_bn_content">
                                                                        <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                                                        <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                                                        <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a class="nav-link nav_item" href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="contact_phone contact_support">
                                    <i class="linearicons-phone-wave"></i>
                                    <span>123-456-7689</span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-primary d-none" id="item_added" role="alert">
                @lang('frontend.itemToCart')
            </div>
            <div class="alert alert-primary d-none" id="favorite_item" role="alert">
                @lang('frontend.itemToFavor')
            </div>
            <div class="alert alert-primary d-none" id="item_removed" role="alert">
                @lang('frontend.itemRemovedCart')
            </div>

            <div class="alert alert-danger  d-none" id="item_not_added" role="alert">
                @lang('frontend.NotAvailable')
            </div>
            <div class="alert alert-danger  d-none" id="item_in_favorite" role="alert">
                @lang('frontend.InFavorite')
            </div>
        </header>
        <!-- END HEADER -->




        @yield('content')

        @extends('layouts.shop.footer')