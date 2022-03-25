<div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('uploadInvoices')}}" method="post" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('frontend.productInfo')}}</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">

                            <div class="pr_detail">
                                <div class="product_description">
                                    <h4 class="product_title"><a href="#">{{name($product->id)}}</a></h4>
                                    <div class="product_price">
                                        {{trans('frontend.productPrice')}} :
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
                                    <br>

                                    <div class="pr_desc">
                                        {{trans('frontend.small_description')}} : {{small_description($product->id)}}
                                    </div>
                                </div>
                                <br>
                                <hr />
                                <div class="cart_extra">

                                    <div class="cart_btn">
                                        <a class="btn btn-fill-out btn-addtocart item_to_cart" href="" data-bs-dismiss="modal" data-ar_name="{{ $product->ar_name }}" data-en_name="{{ $product->en_name }}" data-quantity="1" data-id="{{ $product->id }}" @if($product->has_promotion() == '1') data-price="{{$product->get_promotion()->price}}" @else data-price="{{ $product->price }}" @endif
                                            aria-label="{{name($product->id)}}"><i class="icon-basket-loaded">
                                            </i>{{trans('frontend.add_to_cart')}}</a>

                                        @guest
                                        <a href="{{route('Login')}}" data-bs-dismiss="modal"><i class="icon-heart"></i></a>
                                        @else
                                        <a id="favorite" href="javascript:void(0)">
                                            <i class="icon-heart add-to-favorite @if(checkFavorite($product->id))favorite @endif" data-bs-dismiss="modal" data-product-id="{{ $product->id }}"></i></a>
                                        @endguest
                                    </div>
                                </div>
                                <hr />

                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('frontend.close')</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="col-md-4 col-6">
    <div class="product">
        <div class="product_img">
            <a href="{{route('product.detail',$product->slug)}}">
                <img src="{{asset($product->main_image)}}" alt="product_img1">
            </a>
            <div class="product_action_box">

                <ul class="list_none pr_action_btn">
                    <li class="add-to-cart"> <a class="item_to_cart" href="" data-ar_name="{{ $product->ar_name }}" data-en_name="{{ $product->en_name }}" data-quantity="1" data-id="{{ $product->id }}" @if($product->has_promotion() == '1') data-price="{{$product->get_promotion()->price}}" @else data-price="{{ $product->price }}" @endif
                            aria-label="{{name($product->id)}}"><i class="icon-basket-loaded">
                            </i>{{trans('frontend.add_to_cart')}}</a></li>
                    <li>
                        <button style="border:none" type="button" data-bs-toggle="modal" data-bs-target="{{ '#exampleModal' . $product->id }}">
                            <i class="icon-magnifier-add"></i>
                        </button>
                    </li>
                    @guest
                    <li><a href="{{route('Login')}}"><i class="icon-heart"></i></a></li>
                    @else
                    <li id="favorite"><a href="javascript:void(0)"><i class="icon-heart add-to-favorite @if(checkFavorite($product->id))favorite @endif" data-product-id="{{ $product->id }}"></i></a></li>
                    @endguest
                </ul>

            </div>
        </div>
        <div class="product_info">
            <h6 class="product_title"><a href="{{route('product.detail',$product->slug)}}">{{name($product->id)}}</a></h6>
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
                    <li class="add-to-cart"> <a class="item_to_cart" href="" data-ar_name="{{ $product->ar_name }}" data-en_name="{{ $product->en_name }}" data-quantity="1" data-id="{{ $product->id }}" data-price="{{ $product->price }}" aria-label="{{name($product->id)}}"><i class="icon-basket-loaded">
                            </i>{{trans('frontend.add_to_cart')}}</a></li>
                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                    @guest
                    <li><a href="{{route('Login')}}"><i class="icon-heart"></i></a></li>
                    @else
                    <li id="favorite"><a href="javascript:void(0)"><i class="icon-heart add-to-favorite @if(checkFavorite($product->id))favorite @endif" data-product-id="{{ $product->id }}"></i></a></li>
                    @endguest
                </ul>

            </div>
        </div>
    </div>
</div>