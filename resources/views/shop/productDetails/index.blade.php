@extends('layouts.shop.app')

@section('title')
{{name($product->id)}}
@endsection


@section('content')


<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>{{name($product->id)}}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">{{name($product->id)}}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src='{{asset($product->main_image)}}' data-zoom-image="{{asset($product->main_image)}}" alt="product_img1" />
                            <a href="#" class="product_img_zoom" title="Zoom">
                                <span class="linearicons-zoom-in"></span>
                            </a>
                        </div>
                        @if($product->images))
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                            @foreach(json_decode($product->images) as $image)
                            <div class="item">
                                <a href="#" class="product_gallery_item active" data-image="{{asset( $image)}}" data-zoom-image="{{asset('shop')}}/images/product_zoom_img1.jpg">
                                    <img src={{asset( $image)}} alt="product_small_img1" />
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a href="{{route('product.detail',$product->slug)}}">{{name($product->id)}}</a></h4>
                            <div class="product_price">
                                @if($product->has_promotion() == '1')
                                <span class="price">{{$product->get_promotion()->price}}</span>
                                <del>{{$product->price}}</del>
                                <div class="on_sale">
                                    <span>{{$product->get_promotion()->discount_ratio}}% Off</span>
                                </div>
                                @else
                                <span class="price">{{$product->price}}</span>
                                <del></del>
                                @endif
                            </div>
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width:80%"></div>
                                </div>
                                <span class="rating_num">(21)</span>
                            </div>
                            <div class="pr_desc">
                                <p>{{small_description($product->id)}}</p>
                            </div>
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input class="item-count form-control" type="number" min="1" max="10000" value="1">
                                </div>
                            </div>
                            <div class="cart_btn">

                                <a class="btn btn-fill-out btn-addtocart item_to_cart" href="" id="mydiv" data-ar_name="{{ $product->ar_name }}" data-en_name="{{ $product->en_name }}" data-quantity="1" data-id="{{ $product->id }}" @if($product->has_promotion() == '1') data-price="{{$product->get_promotion()->price}}" @else data-price="{{ $product->price }}" @endif aria-label="{{name($product->id)}}"><i class="icon-basket-loaded">
                                    </i>{{trans('frontend.add_to_cart')}}</a>
                                @guest
                                <a class="add_wishlist" href="{{route('Login')}}"><i class="icon-heart"></i></a>
                                @else
                                <a id="favorite" class="add_wishlist" href="javascript:void(0)"><i class="icon-heart add-to-favorite @if(checkFavorite($product->id))favorite @endif" data-product-id="{{ $product->id }}"></i></a>
                                @endguest

                            </div>
                        </div>
                        <hr />
                        <ul class="product-meta">
                            <li>SKU: <a href="#">{{$product->sku}}</a></li>
                            <li>{{trans('frontend.Category')}}: <a href="#">{{$category->ar_title}}</a></li>
                        </ul>

                        <div class="product_share">
                            <span>{{trans('frontend.Share')}}:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">{{trans('frontend.Description')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                <p>{{description($product->id)}}</p>
                            </div>
                            <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Capacity</td>
                                        <td>5 Kg</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Black, Brown, Red,</td>
                                    </tr>
                                    <tr>
                                        <td>Water Resistant</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>Artificial Leather</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                    <ul class="list_none comment_list mt-4">
                                        <li>
                                            <div class="comment_img">
                                                <img src="{{asset('shop')}}/images/user1.jpg" alt="user1" />
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%"></div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">Alea Brooks</span>
                                                    <span class="comment-date">March 5, 2018</span>
                                                </p>
                                                <div class="description">
                                                    <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment_img">
                                                <img src="{{asset('shop')}}/images/user2.jpg" alt="user2" />
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:60%"></div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">Grace Wong</span>
                                                    <span class="comment-date">June 17, 2018</span>
                                                </p>
                                                <div class="description">
                                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review_form field_form">
                                    <h5>Add a review</h5>
                                    <form class="row mt-3">
                                        <div class="form-group col-12 mb-3">
                                            <div class="star_rating">
                                                <span data-value="1"><i class="far fa-star"></i></span>
                                                <span data-value="2"><i class="far fa-star"></i></span>
                                                <span data-value="3"><i class="far fa-star"></i></span>
                                                <span data-value="4"><i class="far fa-star"></i></span>
                                                <span data-value="5"><i class="far fa-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                        </div>

                                        <div class="form-group col-12 mb-3">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>{{trans('frontend.ReletedProducts')}}</h3>
                    </div>
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @if(count($relatedProducts)>0)
                        @foreach($relatedProducts as $single)
                        @include('shop.productDetails.incs.releted-product-card', [
                        'product' => $single,
                        ])
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

</div>
<!-- END MAIN CONTENT -->

@section('script')
<script>
    $('#mydiv').attr('data-quantity', $('.item-count').val()); // sets
    $(".item-count").on("input", function() {
        $('#mydiv').attr('data-quantity', $(this).val()); // sets
    });
</script>

@endsection
@endsection