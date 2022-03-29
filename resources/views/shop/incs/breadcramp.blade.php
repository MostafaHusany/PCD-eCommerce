<!-- START SECTION BREADCRUMB -->

<!-- this file used in cart.index , checkout.index , checkout.thanks,
home.index , orderDetail.index , productDetails.index , products.index 
, products.search , wishlist.index -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>{{$name}}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">@lang('frontend.Home')</a></li>
                    <li class="breadcrumb-item active">{{$name}}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->