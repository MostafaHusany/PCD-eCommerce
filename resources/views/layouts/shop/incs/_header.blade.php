<!-- START HEADER -->
<header class="header_wrap">
    <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="container">
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
                                <option @if(LaravelLocalization::getCurrentLocale()=='ar' ) selected="selected" @endif value='ar' data-image="{{asset('shop')}}/images/ar.png">العربية</option>
                                <option @if(LaravelLocalization::getCurrentLocale()=='en' ) selected="selected" @endif value='en' data-image="{{asset('shop')}}/images/eng.png">english</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.top-header -->

    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img class="logo_light" src="{{asset('shop')}}/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="{{asset('shop')}}/images/logo_dark.png" alt="logo" />
                </a>
                <div class="product_search_form rounded_input">
                    <form action="{{route('search')}}" method="post">
                        <div class="input-group">
                            {{--
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null" name='category'>
                                        <option value="">@lang('frontend.categories')</option>
                                        @foreach(categories() as $key => $category)
                                        <option value="{{$category->id }}">
                                        {{title($category->id)}}
                                        </option>
                                        @endforeach
                                        </select>
                                    </div>
                            </div>
                            --}}
                            @csrf
                            <input class="form-control" placeholder="@lang('frontend.Search')" name="search" required="" type="text">
                            <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
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
                                            <a href="#"><img src="assets/images/cart_thamb2.jpg" alt="cart_thumb2">{{$item->name}}</a>
                                            <span class="cart_quantity"> {{$item->qty}} x <span class="cart_amount"> <span class="price_symbole">SR</span></span>{{$item->price}}</span>
                                        </li>
                                    </div>
                                    @endforeach
                                @endif
                            </ul>

                            <div class="cart_footer">
                                <p class="cart_total"><strong>@lang('frontend.Subtotal'):</strong> <span class="cart_price"> <span class="price_symbole" id="totalPrice">{{totalPrice()}}</span></p>

                                <p class="cart_buttons">
                                    <a href="{{route('cart')}}" class="btn btn-fill-line rounded-0 view-cart">@lang('frontend.ViewCart')</a>
                                    <a href="{{route('checkout')}}" class="btn btn-fill-out">@lang('frontend.Checkout')</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- /.middle-header -->

    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                            <span>All Categories </span><i class="linearicons-menu"></i>
                        </button>
                        <div id="navCatContent" class="navbar collapse">
                            <ul>
                                @foreach(categories() as $category)
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="{{route('category',$category->slug)}}">
                                        <i class="flaticon-tv"></i>
                                        <span>{{title($category->id)}}</span>
                                    </a>
                                    @if( count($category->children ) >0)
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="dropdown-header">Sub categories</li>
                                            @foreach( $category->children as $child)
                                            <li>
                                                <a class="dropdown-item nav-link nav_item" href="{{route('category',$child->id)}}">
                                                    {{title($child->id)}}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                                {{--
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-tv"></i> <span>Computer</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul> 
                                                            <li class="dropdown-header">Featured Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Popular Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="assets/images/menu_banner7.jpg" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>Computers</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="assets/images/menu_banner8.jpg" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Top Laptops</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-responsive"></i> <span>Mobile & Tablet</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul> 
                                                            <li class="dropdown-header">Featured Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Popular Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <a href="#"><img src="assets/images/menu_banner6.jpg" alt="menu_banner"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-camera"></i> <span>Camera</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul> 
                                                            <li class="dropdown-header">Featured Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li class="dropdown-header">Popular Item</li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <a href="#"><img src="assets/images/menu_banner9.jpg" alt="menu_banner"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-plugins"></i> <span>Accessories</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-4">
                                                <ul> 
                                                    <li class="dropdown-header">Woman's</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum sed</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-4">
                                                <ul>
                                                    <li class="dropdown-header">Men's</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Donec vitae ante ante</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Etiam ac rutrum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Vivamus in tortor</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-4">
                                                <ul>
                                                    <li class="dropdown-header">Kid's</li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                                    <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-headphones"></i> <span>Headphones</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-console"></i> <span>Gaming</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-watch"></i> <span>Watches</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-music-system"></i> <span>Home Audio & Theater</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-monitor"></i> <span>TV & Smart Box</span></a></li>
                                <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-printer"></i> <span>Printer</span></a></li>
                                <li>
                                	<ul class="more_slide_open">
                                    	<li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-fax"></i> <span>Fax Machine</span></a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-mouse"></i> <span>Mouse</span></a></li>
                                    </ul>
                                </li>
                                --}}
                                <!-- <li>
                                	<ul class="more_slide_open">
                                    	<li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-fax"></i> <span>Fax Machine</span></a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-mouse"></i> <span>Mouse</span></a></li>
                                    </ul>
                                </li> -->
                            </ul>
                            <!-- <div class="more_categories">More Categories</div> -->
                        </div>
                    </div>
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
                                    <a data-bs-toggle="dropdown" class="nav-link dropdown-toggle active" href="#">Home</a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li><a class="dropdown-item nav-link nav_item" href="index.html">Fashion 1</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index-2.html">Fashion 2</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index-3.html">Furniture 1</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index-4.html">Furniture 2</a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="index-5.html">Electronics 1</a></li>
                                            <li><a class="dropdown-item nav-link nav_item active" href="index-6.html">Electronics 2</a></li>
                                        </ul>
                                    </div>
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
                                                            <img src="assets/images/shop_banner_img7.jpg" alt="shop_banner_img7">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="header-banner">
                                                    <div class="sale-banner">
                                                        <a class="hover_effect1" href="#">
                                                            <img src="assets/images/shop_banner_img8.jpg" alt="shop_banner_img8">
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
                                                                <img src="assets/images/shop_banner4.jpg" alt="shop_banner2" />
                                                            </div>
                                                            <div class="shop_bn_content">
                                                                <h6 class="text-uppercase shop_subtitle">New Collection</h6>
                                                                <h5 class="text-uppercase shop_title">Sale 30% Off</h5>
                                                                <a href="#" class="btn btn-white rounded-0 btn-xs text-uppercase">Shop Now</a>
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
                    </nav>
                </div>
            </div>
        </div>
    </div><!-- /.bottom_header -->

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