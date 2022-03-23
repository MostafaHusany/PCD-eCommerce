<div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                <div class="categories_wrap">
                    <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn">
                        <i class="linearicons-menu"></i><span>{{trans('frontend.categories')}} </span>
                    </button>
                    <div id="navCatContent" class="nav_cat navbar collapse">
                        <ul>
                            @foreach(categories() as $category)
                            <li class="dropdown dropdown-mega-menu">
                                <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-tv"></i> <span>
                                        {{title($category->id)}}
                                    </span></a>
                                @if( count($category->children ) >0)

                                <div class="dropdown-menu">
                                    <ul>

                                        <li class="dropdown-header">Sub categories</li>
                                        @foreach( $category->children as $child)
                                        <li><a class="dropdown-item nav-link nav_item" href="{{route('category',$child->id)}}">
                                                {{title($child->id)}}
                                            </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            </li>
                            @endforeach
                        </ul>
                    </div>


                    <!-- <div id="navCatContent" class="nav_cat navbar collapse">
                        <ul>
                            @foreach(categories() as $category)
                            <li class="dropdown dropdown-mega-menu">
                                <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-tv"></i> <span>
                                        {{title($category->id)}}
                                    </span> <span class="categories_num"> ({{count($category->products)}})</span></a>

                                @if(count($category->products) > 0 || count($category->children ) >0 )
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        @if(count($category->products) > 0 )
                                        <li class="mega-menu-col col-lg-5">
                                            <div class="header-banner2">
                                                <ul>
                                                    @foreach($category->products as $product)
                                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('product.detail',$product->slug)}}">
                                                        @if(get_lang() == 'ar')
                                                            {{substr($product->ar_name, 0, 20)}}
                                                            @elseif(get_lang() == 'en')
                                                            {{substr($product->en_name, 0, 20)}}
                                                            @endif
                                                        </a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        @endif
                                        @if( count($category->children ) >0)
                                        <li class="mega-menu-col col-lg-7">
                                            <ul class="d-lg-flex">
                                                @foreach( $category->children as $child)
                                                <li class="mega-menu-col col-lg-6">
                                                    <ul>
                                                        <li class="dropdown-header">
                                                            {{title($child->id)}}
                                                        </li>
                                                        @foreach($child->products as $product)
                                                        <li><a class="dropdown-item nav-link nav_item" href="{{route('product.detail',$product->slug)}}">
                                                                @if(get_lang() == 'ar')
                                                                {{substr($product->ar_name, 0, 20)}}
                                                                @elseif(get_lang() == 'en')
                                                                {{substr($product->en_name, 0, 20)}}
                                                                @endif</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                @endif
                            </li>
                            @endforeach

                        </ul>
                    </div> -->
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

                </nav>
            </div>
        </div>
    </div>
</div>
</header>

<!-- START SECTION BANNER -->
<div class="mt-4 staggered-animation-wrap">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-7 offset-lg-3">
                <div class="banner_section shop_el_slider">
                    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active background_bg" data-img-src="{{asset('shop')}}/images/banner13.jpg">
                                <div class="banner_slide_content banner_content_inner">
                                    <div class="col-lg-7 col-10">
                                        <div class="banner_content3 overflow-hidden">
                                            <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInRight" data-animation-delay="0.5s">Get up to 50% off Today Only!</h5>
                                            <h2 class="staggered-animation" data-animation="slideInRight" data-animation-delay="1s">Dual Camera 20MP</h2>
                                            <h4 class="staggered-animation mb-4 product-price" data-animation="slideInRight"" data-animation-delay=" 1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                            <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInRight" data-animation-delay="1.5s">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item background_bg" data-img-src="{{asset('shop')}}/images/banner14.jpg">
                                <div class="banner_slide_content banner_content_inner">
                                    <div class="col-lg-8 col-10">
                                        <div class="banner_content3 overflow-hidden">
                                            <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInRight" data-animation-delay="0.5s">50% off in all products</h5>
                                            <h2 class="staggered-animation" data-animation="slideInRight" data-animation-delay="1s">Smart Watches</h2>
                                            <h4 class="staggered-animation mb-3 mb-sm-4 product-price" data-animation="slideInRight" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                            <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInRight" data-animation-delay="1.5s">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item background_bg" data-img-src="{{asset('shop')}}/images/banner15.jpg">
                                <div class="banner_slide_content banner_content_inner">
                                    <div class="col-lg-8 col-10">
                                        <div class="banner_content3 overflow-hidden">
                                            <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInRight" data-animation-delay="0.5s">Taking your Viewing Experience to Next Level</h5>
                                            <h2 class="staggered-animation" data-animation="slideInRight" data-animation-delay="1s">Beat Headphone</h2>
                                            <h4 class="staggered-animation mb-4 product-price" data-animation="slideInRight" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                            <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInRight" data-animation-delay="1.5s">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ol class="carousel-indicators indicators_style3">
                            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-none d-lg-block">
                <div class="shop_banner2 el_banner1">
                    <a href="#" class="hover_effect1">
                        <div class="el_title text_white">
                            <h6>iphone Collection</h6>
                            <span>25% off</span>
                        </div>
                        <div class="el_img">
                            <img src="{{asset('shop')}}/images/shop_banner_img6.png" alt="shop_banner_img6">
                        </div>
                    </a>
                </div>
                <div class="shop_banner2 el_banner2">
                    <a href="#" class="hover_effect1">
                        <div class="el_title text_white">
                            <h6>MAC Computer</h6>
                            <span><u>Shop Now</u></span>
                        </div>
                        <div class="el_img">
                            <img src="{{asset('shop')}}/images/shop_banner_img7.png" alt="shop_banner_img7">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->