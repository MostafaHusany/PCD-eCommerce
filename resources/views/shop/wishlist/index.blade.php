@extends('layouts.shop.app')

@section('title')
{{trans('frontend.Wishlist')}}
@endsection


@section('content')

@include('shop.incs.breadcramp', [
'name' => trans('frontend.Wishlist'),
])

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive wishlist_table">
                        <table class="table">
                            @if(count($favorites)>0)
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">{{trans('frontend.ProductImage')}}</th>
                                    <th class="product-thumbnail">{{trans('frontend.Product')}}</th>
                                    <th class="product-price">{{trans('frontend.Price')}}</th>
                                    <th class="product-stock-status">{{trans('frontend.StockStatus')}}</th>
                                    <th class="product-add-to-cart">{{trans('frontend.add_to_cart')}}</th>
                                    <th class="product-remove">{{trans('frontend.Remove')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($favorites as $favorite)
                                <tr>
                                    <td class="product-thumbnail"><a href="{{route('product.detail',$favorite->product->slug)}}"><img src="{{asset($favorite->product->main_image)}}" alt="alt"></a></td>
                                    <td class="product-name" data-title="Product"><a href="{{route('product.detail',$favorite->product->slug)}}">{{$favorite->product->en_name}}</a></td>
                                    <td class="product-price" data-title="Price">{{$favorite->product->price}}</td>
                                    <td class="product-stock-status" data-title="Stock Status">{{$favorite->product->quantity}}</td>
                                    <td class="product-add-to-cart">
                                        <a class="item_to_cart btn btn-fill-out" href="" data-ar_name="{{ $favorite->product->ar_name }}" data-en_name="{{ $favorite->product->en_name }}" data-quantity="1" data-id="{{ $favorite->product->id }}" data-price="{{ $favorite->product->price }}" aria-label="{{ $favorite->product->name }}"><i class="icon-basket-loaded">
                                            </i>{{trans('frontend.add_to_cart')}}</a>
                                    </td>
                                    <td class="product-remove remove-favorite" data-title="Remove" data-product-id="{{ $favorite->product->id}}"><a href="javascript:void(0)"><i class="ti-close"></i></a></td>
                                </tr>
                                @endforeach

                            </tbody>
                            @else
                            {{trans('frontend.empty_wishlist')}}
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->


</div>
<!-- END MAIN CONTENT -->

@endsection