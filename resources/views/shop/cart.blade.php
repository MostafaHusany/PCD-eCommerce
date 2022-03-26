@extends('layouts.shop.app')

@section('title')
{{trans('frontend.CartContent')}}

@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => trans('frontend.CartContent'),
])
<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">{{trans('frontend.ProductImage')}}</th>
                                <th class="product-thumbnail">{{trans('frontend.Product')}}</th>
                                <th class="product-price">{{trans('frontend.Price')}}</th>
                                <th class="product-stock-status">{{trans('frontend.Quantity')}}</th>
                                <th class="product-add-to-cart">{{trans('frontend.Total')}}</th>
                                <th class="product-remove">{{trans('frontend.Remove')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count(Cart::content())>0)
                            @foreach(Cart::content() as $item)
                            <tr>
                                <td class="product-thumbnail"><a href="{{route('product.detail', product_details($item->id)->slug)}}"><img src="{{ asset(product_details($item->id)->main_image) }}" alt="product3"></a></td>
                                <td class="product-name" data-title="Product"><a href="{{route('product.detail', product_details($item->id)->slug)}}">{{$item->name}}</a></td>
                                <td class="product-price" data-title="Price">{{$item->price}}</td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="number" name="quantity" data-price="{{ $item->price }}" data-row-id="{{ $item->rowId }}" value="{{$item->qty}}" title="Qty" class="qty update-product-quantity" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </td>
                                <td class="product-subtotal totalAmount_{{ $item->rowId }}" data-title="Total">{{$item->qty * $item->price}}</td>
                                <td class="product-remove delete-cart" data-title="Remove" data-row-id="{{ $item->rowId }}">
                                    <a href="javascript:void(0);"><i class="ti-close"></i></a>
                                </td>
                            </tr>
                            @endforeach

                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="px-0">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-lg-8 col-md-6  text-start  text-md-end">
                                            <a class="btn btn-line-fill btn-sm update-cart"> {{trans('frontend.updateContent')}}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>{{trans('frontend.CartTotals')}}</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">{{trans('frontend.SubTotal')}}</td>
                                    <td class="cart_total_amount" id="updatePrice">{{$totalPrice}}</td>
                                </tr>
                                <!-- <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>$349.00</strong></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <form action="{{route('checkout')}}" method="post">
                        @csrf
                        <input type="hidden" name="promoCodeValue" class="promoCodeValue">
                        <button class="btn btn-fill-out" type="submit">{{trans('frontend.Checkout')}} </button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 d-block" id="addpromoCode">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>{{trans('frontend.promoApply')}}</h6>
                    </div>
                    <form method="post" class="direct-contact" id="promoApply">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <div class="form-group mb-3 ">
                                        <input type="text" class="form-control" name="promoCode" id="promoCode" value="{{old('promoCode')}}" placeholder="{{trans('frontend.promo')}} *">
                                        <span class="error text-danger d-none"></span>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                        <span class="text-success" id="message-success"></span>
                        <button type="submit" class="btn btn-fill-out Enter_promo">{{trans('frontend.promoCodeCheck')}}</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 d-none" id="promoCodeDetails">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>{{trans('frontend.Promoinfo')}}</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">{{trans('frontend.promoType')}} : </td>
                                    <td class="cart_total_amount" id="promoType"></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">{{trans('frontend.PromoValue')}} : </td>
                                    <td class="cart_total_amount" id="PromoValue"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


        </div>



    </div>
</div>
<!-- END SECTION SHOP -->

@endsection