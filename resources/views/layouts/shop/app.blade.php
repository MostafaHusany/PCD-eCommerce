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
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/animate.css">
        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/bootstrap/css/bootstrap.min.css">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/all.min.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/ionicons.min.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/themify-icons.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/linearicons.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/flaticon.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/simple-line-icons.css">
        <!--- owl carousel CSS-->
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/owlcarousel/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/owlcarousel/css/owl.theme.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/owlcarousel/css/owl.theme.default.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/magnific-popup.css">
        <!-- Slick CSS -->
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/slick.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/slick-theme.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/style.css">
        <link rel="stylesheet" href="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/css/responsive.css">
        <!-- RTL CSS -->
        
        @if(get_lang() == 'ar')
        <link rel="stylesheet" href="{{asset('shop/rtl_assets')}}/css/rtl-style.css">
        @endif

        @stack('style')

    </head>

    <body dir="{{ get_lang() == 'ar' ? 'rtl' : '' }}">
        
        @include('layouts.shop.incs._loader')

        @include('layouts.shop.incs._modal')

        @include('layouts.shop.incs._header')
        
        <!-- END MAIN CONTENT -->
        <div class="main_content">
            @yield('content')
        </div>
        <!-- END MAIN CONTENT -->

        <!-- START FOOTER -->
        @include('layouts.shop.incs._footer')
        <!-- END FOOTER -->

        <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

        <!-- Latest jQuery --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/jquery-3.6.0.min.js"></script> 
        <!-- popper min js -->
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/popper.min.js"></script>
        <!-- Latest compiled and minified Bootstrap --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/bootstrap/js/bootstrap.min.js"></script> 
        <!-- owl-carousel min js  --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/owlcarousel/js/owl.carousel.min.js"></script> 
        <!-- magnific-popup min js  --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/magnific-popup.min.js"></script> 
        <!-- waypoints min js  --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/waypoints.min.js"></script> 
        <!-- parallax js  --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/parallax.js"></script> 
        <!-- countdown js  --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/jquery.countdown.min.js"></script> 
        <!-- imagesloaded js --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/imagesloaded.pkgd.min.js"></script>
        <!-- isotope min js --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/isotope.min.js"></script>
        <!-- jquery.dd.min js -->
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/jquery.dd.min.js"></script>
        <!-- slick js -->
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/slick.min.js"></script>
        <!-- elevatezoom js -->
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/jquery.elevatezoom.js"></script>
        <!-- scripts js --> 
        <script src="{{asset( LaravelLocalization::getCurrentLocale() == 'ar' ? 'shop/rtl_assets' : 'shop/ltr_assets' )}}/js/scripts.js"></script>
        <script src="{{asset('shop')}}/js/custom.js"></script>
        
        @stack('script')
    
    </body>
</html>