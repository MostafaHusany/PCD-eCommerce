<!-- START SECTION BREADCRUMB -->
<!-- this file used in products.index -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>{{$name->en_title}}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item">
                        <a href="{{route('index')}}">@lang('frontend.Home')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('products')}}">@lang('frontend.AllProducts')</a>
                    </li>
                    @if($name->CategoryParent)
                    <li class="breadcrumb-item">
                        <a href="{{route('category',$name->CategoryParent->id)}}">{{$name->CategoryParent->en_title}}</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active">{{$name->en_title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->