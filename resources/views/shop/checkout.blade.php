@extends('layouts.shop.app')

@section('title')
Check out
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => 'Check out',
])

<style>
    .feedback {
        color: red;
    }
</style>

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            @guest
            <div class="row">
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                    </div>
                    <div class="panel-collapse collapse login_form" id="loginform">
                        <div class="panel-body">
                            <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                            <form method="post" action="{{ url('/login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" required="" class="form-control" name="email" placeholder="Enter your email">
                                    @error('email')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" required="" type="password" name="password" placeholder="Enter your password">
                                    @error('password')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="login_footer form-group mb-3">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                            <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fas fa-tag"></i>You don't have account? <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                                Click here to create account</a></span>
                    </div>
                    <div class="panel-collapse collapse coupon_form" id="coupon">
                        <div class="panel-body">
                            <p>Fill these fields to create new account.</p>
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                                </div>
                                <div class="login_footer form-group mb-3">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                            <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            @endguest



            <div class="row">
                <div class="col-md-6">


                    <div class="heading_s1 mb-3">
                        <h6>Select shipping method</h6>
                    </div>
                    <form class="field_form shipping_calculator">
                        <div class="form-row">
                            <div class="form-group col-lg-12 mb-3">
                                <div class="custom_select">
                                    <select class="form-control" id="shipping" name="shipping">
                                        <option value="">Choose a option...</option>
                                        @foreach($shippings as $shipping)
                                        <option value="{{$shipping->id}}">{{$shipping->title}}</option>
                                        @endforeach

                                    </select>
                                    @error('shipping_id_field')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="heading_s1">
                        <h4>Billing Details</h4>
                    </div>
                    <form action="{{route('create_order')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        @if(count($addresses)>0)
                        <div class="form-group mb-3">
                            <div class="custom_select">
                                <label>Select Address</label>
                                <select class="form-control" name="address_id">
                                    <option value="0">Choose a option...</option>
                                    @foreach($addresses as $address)
                                    <option value="{{$address->id}}">{{$address->address}}</option>
                                    @endforeach
                                    
                                </select>
                                @error('address_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="ship_detail">
                            <div class="form-group mb-3">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                        <label class="form-check-label label_info" for="differentaddress"><span>Ship to a different address?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="different_address">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="First name *">
                                    @error('first_name')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last name *">
                                    @error('last_name')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone *">
                                    @error('phone')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="address" placeholder="Address *">
                                    @error('address')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="shipping_price_field" class="shipping_price_field">
                                <input type="hidden" name="total_price" id="total_price">
                                <input type="hidden" name="shipping_id_field" id="shipping_id_field">
                                <input type="hidden" name="taxes_sum" value="{{$taxes_sum}}">
                                <input type="hidden" name="fees_sum" value="{{$fees_sum}}">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="city" placeholder="City / Town *">
                                    @error('city')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="state" placeholder="State / County *">
                                    @error('state')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="zipcode" placeholder="Postcode / ZIP *">
                                    @error('zipcode')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="heading_s1">
                            <h4>Additional information</h4>
                        </div>
                        <div class="form-group mb-0">
                            <textarea rows="5" class="form-control" placeholder="Order notes" name="address_details"></textarea>
                        </div>

                        <div class="payment_method">
                            <div class="heading_s1">
                                <h4>Payment</h4>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input type="file" name="payment_file" id="exampleRadios3" value="option3" checked="">
                                    <label for="exampleRadios3">Upload Bank transfer </label>
                                    @error('payment_file')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>

                    </form>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Your Orders</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th>Tax</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($taxes)>0)
                                    @foreach($taxes as $tax)
                                    <tr>
                                        <td>{{$tax->title}}<span class="product-qty">
                                            </span></td>
                                        <td>{{$tax->cost }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>

                                <thead>
                                    <tr>
                                        <th>Fee</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($fees)>0)
                                    @foreach($fees as $fee)
                                    <tr>
                                        <td>{{$fee->title}}<span class="product-qty">
                                            </span></td>
                                        <td>{{$fee->cost }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>

                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count(Cart::content())>0)
                                    @foreach(Cart::content() as $item)
                                    <tr>
                                        <td>{{$item->name}}<span class="product-qty">
                                                x {{$item->qty}}</span></td>
                                        <td>{{$item->qty * $item->price}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">{{ Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping price</th>
                                        <td class="shipping_price_field" id="shipping_price"></td>
                                    </tr>
                                    <tr>
                                        <th>Taxes sum</th>
                                        <td class="shipping_price_field" id="shipping_price">{{$taxes_sum}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fees sum</th>
                                        <td class="shipping_price_field" id="shipping_price">{{$fees_sum}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal order_price" id="totlal_price"></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
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