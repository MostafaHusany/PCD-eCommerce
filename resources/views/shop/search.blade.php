@extends('layouts.shop.app')

@section('title')
{{trans('frontend.Searchresult')}}
@endsection


@section('content')

@include('shop.incs.breadcramp', [
'name' => trans('frontend.Searchresult'),
])

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                @if(count($products)>0)

                <div class="col-lg-12">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="order">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container">
                        @foreach($products as $product)
                        <div class="col-md-4 col-6">
                            <div class="product">
                                <div class="product_img">
                                    <a href="{{route('product.detail',$product->slug)}}">
                                        <img src="assets/images/product_img1.jpg" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">

                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"> <a class="item_to_cart" href="" data-ar_name="{{ $product->ar_name }}" data-en_name="{{ $product->en_name }}" data-quantity="1" data-id="{{ $product->id }}" data-price="{{ $product->price }}" aria-label="{{ $product->name }}"><i class="icon-basket-loaded">
                                                    </i>Add To Cart</a></li>

                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            @guest
                                            <li><a href="{{route('Login')}}"><i class="icon-heart"></i></a></li>
                                            @else
                                            <li id="favorite"><a href="javascript:void(0)"><i class="icon-heart add-to-favorite @if(checkFavorite($product->id))favorite @endif" data-product-id="{{ $product->id }}"></i></a></li>
                                            @endguest
                                        </ul>

                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="{{route('product.detail',$product->slug)}}">{{$product->ar_name}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$product->price}}</span>
                                        <del>$55.25</del>
                                        <div class="on_sale">
                                            <span>35% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>{{$product->ar_description}}</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                    <div class="list_product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"> <a class="item_to_cart" href="" data-ar_name="{{ $product->ar_name }}" data-en_name="{{ $product->en_name }}" data-quantity="1" data-id="{{ $product->id }}" data-price="{{ $product->price }}" aria-label="{{ $product->name }}"><i class="icon-basket-loaded">
                                                    </i>Add To Cart</a></li>

                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @else
            <p class="text-center">There is no products</p>
            @endif
        </div>
    </div>
    <!-- END SECTION SHOP -->



</div>
<!-- END MAIN CONTENT -->
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('li.dropdown').click(function() {
            $('li.dropdown').not(this).find('ul').hide();
            $(this).find('ul').toggle();
        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#price_filter").each(function() {
            var self = $(this);
            $('#price_first').val(self.data('min-value'));
            $('#price_second').val(self.data('max-value'));

        });
    });
</script>
@endpush