@extends('layouts.shop.app')

@section('title')
Order Details
@endsection

@section('content')
@include('shop.incs.breadcramp', [
'name' => 'Order Details',
])


<!-- START MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Your Orders Details</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($order->order_products)>0)
                                    @foreach($order->order_products as $product)
                                    <tr>
                                        <td> @if(get_lang() == 'ar')
                                            {{substr($product->ar_name, 0, 20)}}
                                            @elseif(get_lang() == 'en')
                                            {{substr($product->en_name, 0, 20)}}
                                            @endif</td>
                                        <td>{{$product->price_when_order}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">{{ $order->sub_total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping price</th>
                                        <td class="shipping_price_field">{{ $order->shipping_cost}}</td>
                                    </tr>
                                    <tr>
                                        <th>Taxes sum</th>
                                        <td class="shipping_price_field">{{$order->taxe}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fees sum</th>
                                        <td class="shipping_price_field" id="shipping_price">{{$order->fee}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal order_price">{{$order->total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order ststus</th>
                                        <td class="product-subtotal order_price">{{$order->status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td class="product-subtotal order_price">{{ $order->created_at->format('d/m/Y')}}</td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection