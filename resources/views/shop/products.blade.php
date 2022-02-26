@extends('layouts.shop.app')

@section('title')
Home Page
@endsection


@section('content')
@if($title == 'all_products')
@include('shop.incs.breadcramp', [
'name' => 'All Products',
])
@else
@include('shop.incs.product-breadcramp', [
'name' => $currentCategory,
])
@endif
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
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
                        @if(isset($products ))
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
                        @else
                        <p>There is no products</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            @csrf
                            @if(count($categoryProducts)>0)
                            <h5 class="widget_title">Categories</h5>
                            <ul class="widget_categories">
                                @foreach($categoryProducts as $category)
                                <li class="dropdown cssState">
                                    <a href="{{route('category',$category->id)}}">
                                        <span class="categories_name">
                                            @if(get_lang() == 'ar')
                                            {{substr($category->ar_title, 0, 20)}}
                                            @elseif(get_lang() == 'en')
                                            {{substr($category->en_title, 0, 20)}}
                                            @endif
                                        </span>
                                    </a>
                                    </span><span class="categories_num"> ({{count($category->products)}})</span>

                                </li>

                                @endforeach
                            </ul>
                            @else
                            <h5 class="widget_title">options</h5>
                            <form action="{{route('option_filter')}}" method="post">
                                @csrf
                                <ul>
                                    @foreach($currentCategory->attributes as $custom)
                                    <li class="dropdown cssState">{{$custom->title}}</li>
                                    <ul>
                                        @php
                                        $meta = (array) json_decode($custom->meta);
                                        if ($custom->type === 'options') {
                                        $options = $meta['options'];
                                        foreach($options as $option) {
                                        @endphp
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox[]" id="{{$option}}" value="{{$option}}">
                                            <label class="form-check-label" for="{{$option}}"><span>{{$option}}</span></label>
                                        </div>
                                        @php
                                        }
                                        } else if ($custom->type === 'number'){
                                        @endphp
                                        <div class="widget">
                                            <h5 class="widget_title">Filter</h5>
                                            <div class="filter_price">
                                                <div id="price_filter" data-min="0" data-max="5000" data-min-value="{{$meta['number']->field_number_from}}" data-max-value="{{$meta['number']->field_number_to}}" data-price-sign="{{$meta['number']->field_number_metric}}"></div>
                                                <div class="price_range">
                                                    <span>{{$meta['number']->field_number_metric}}: <span id="flt_price"></span></span>
                                                    <input type="hidden" name="price_first" id="price_first">
                                                    <input type="hidden" name="price_second" id="price_second">
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                        }
                                        @endphp
                                    </ul>
                                    @endforeach
                                </ul>
                                <button class="btn btn-danger" type="submit">filter</button>
                            </form>
                            @endif
                            <br>
                            <form action="{{route('brand_filter')}}" method="post">
                                @csrf
                                <h5 class="widget_title">Brands</h5>
                                @foreach(brands() as $brand)
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="brands[]" id="{{ $brand->id}}" value="{{$brand->id}}">
                                    <label class="form-check-label" for="{{$brand->id}}"><span>{{$brand->en_title}}</span></label>
                                </div>
                                @endforeach
                                <br>
                                <button class="btn btn-danger" type="submit">filter</button>
                            </form>

                        </div>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->



</div>
<!-- END MAIN CONTENT -->


@section('script')



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

@endsection
@endsection