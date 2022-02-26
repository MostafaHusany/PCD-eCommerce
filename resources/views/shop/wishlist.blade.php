@extends('layouts.shop.app')

@section('title')
wishlist
@endsection


@section('content')

@include('shop.incs.breadcramp', [
'name' => 'wishlist',
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
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-stock-status">Stock Status</th>
                                    <th class="product-add-to-cart"></th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($favorites)>0)
                                @foreach($favorites as $favorite)
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{asset($favorite->product->main_image)}}" alt="alt"></a></td>
                                    <td class="product-name" data-title="Product"><a href="{{route('product.detail',$favorite->product->slug)}}">{{$favorite->product->en_name}}</a></td>
                                    <td class="product-price" data-title="Price">{{$favorite->product->price}}</td>
                                    <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>
                                    <td class="product-add-to-cart">
                                        <a class="item_to_cart btn btn-fill-out" href="" data-ar_name="{{ $favorite->product->ar_name }}" data-en_name="{{ $favorite->product->en_name }}" data-quantity="1" data-id="{{ $favorite->product->id }}" data-price="{{ $favorite->product->price }}" aria-label="{{ $favorite->product->name }}"><i class="icon-basket-loaded">
                                            </i>Add To Cart</a>
                                    </td>
                                    <td class="product-remove remove-favorite" data-title="Remove" data-product-id="{{ $favorite->product->id}}"><a href="javascript:void(0)"><i class="ti-close"></i></a></td>
                                </tr>
                                @endforeach
                                @else
                                No products in wishlist
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <div class="section bg_default small_pt small_pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>Subscribe Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form>
                            <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

@endsection