@extends('layouts.shop.app')

@section('title')
Cart content
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => 'Cart content',
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
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count(Cart::content())>0)
                            @foreach(Cart::content() as $item)
                            <tr>
                                <td class="product-thumbnail"><a href="#"><img src="{{ asset(product_details($item->id)->main_image) }}" alt="product3"></a></td>
                                <td class="product-name" data-title="Product"><a href="#">{{$item->name}}</a></td>
                                <td class="product-price" data-title="Price">{{$item->price}}</td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="number" name="quantity" data-price="{{ $item->price }}" data-row-id="{{ $item->rowId }}" class="update-quantity" value="{{$item->qty}}" title="Qty" class="qty" size="4">
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
                                            <a class="btn btn-line-fill btn-sm update-cart"> Update Cart</a>
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
            <div class="col-md-12">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
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
                    <a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END SECTION SHOP -->

@endsection