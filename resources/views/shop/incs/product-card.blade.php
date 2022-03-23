<div class="col-md-4 col-6">
    <div class="product">
        <div class="product_img">
            <a href="{{route('product.detail',$product->slug)}}">
                <img src="{{asset($product->main_image)}}" alt="product_img1">
            </a>
            <div class="product_action_box">

                <ul class="list_none pr_action_btn">
                    <li class="add-to-cart"> <a class="item_to_cart" href=""
                     data-ar_name="{{ $product->ar_name }}" 
                     data-en_name="{{ $product->en_name }}" data-quantity="1" 
                     data-id="{{ $product->id }}"
                     @if($product->has_promotion() == '1') data-price="{{$product->get_promotion()->price}}" @else  data-price="{{ $product->price }}" @endif
                     aria-label="{{name($product->id)}}"><i class="icon-basket-loaded">
                            </i>{{trans('frontend.add_to_cart')}}</a></li>

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