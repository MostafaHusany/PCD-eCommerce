@extends('layouts.shop.app')

@section('title')
{{trans('frontend.Checkout')}}
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => trans('frontend.Checkout'),
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
            <!-- @guest
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
            @endguest -->



            <div class="row">
                <div class="col-md-6">


                    <div class="heading_s1 mb-3">
                        <h6>{{trans('frontend.SelectShipping')}} </h6>
                    </div>
                    <form class="field_form shipping_calculator">
                        <div class="form-row">
                            <div class="form-group col-lg-12 mb-3">
                                <div class="custom_select">
                                    <select class="form-control" id="shipping" name="shipping">
                                        <option value="">{{trans('frontend.ChooseOption')}}</option>
                                        @foreach($shippings as $shipping)
                                        <option value="{{$shipping->id}}" {{ old('shipping') == $shipping->id ? 'selected' : '' }}>{{$shipping->title}}</option>
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
                        <h4>{{trans('frontend.BillingDetails')}}</h4>
                    </div>
                    <form action="{{route('create_order')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        @if(count($addresses)>0)
                        <div class="form-group mb-3">
                            <div class="custom_select">
                                <label>{{trans('frontend.SelectShipping')}}</label>
                                <select class="form-control" name="address_id">
                                    <option value="0">{{trans('frontend.ChooseOption')}}</option>
                                    @foreach($addresses as $address)
                                    <option value="{{$address->id}}" {{ old('shipping_id_field') == $address->id ? 'selected' : '' }}>{{$address->address}}</option>
                                    @endforeach

                                </select>
                                @error('address_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="ship_detail">
                            <div class="form-group mb-3">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                        <label class="form-check-label label_info" for="differentaddress"><span>{{trans('frontend.differentAddress')}}</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="different_address">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="{{trans('frontend.FirstName')}} *">
                                    @error('first_name')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="last_name" placeholder="{{trans('frontend.LastName')}} *">
                                    @error('last_name')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="phone" placeholder="{{trans('frontend.Phone')}} *">
                                    @error('phone')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="address" placeholder="{{trans('frontend.Address')}} *">
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
                                    <input class="form-control" type="text" name="city" placeholder="{{trans('frontend.City')}}*">
                                    @error('city')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="state" placeholder="{{trans('frontend.State')}} *">
                                    @error('state')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="zipcode" placeholder="{{trans('frontend.zipcode')}} *">
                                    @error('zipcode')
                                    <span class="feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @else

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" placeholder="{{trans('frontend.FirstName')}} *">
                            @error('first_name')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input type="hidden" name="address_id" value="0">
                        <input type="hidden" name="shipping_price_field" class="shipping_price_field">
                        <input type="hidden" name="total_price" id="total_price">
                        <input type="hidden" name="shipping_id_field" id="shipping_id_field">
                        <input type="hidden" name="taxes_sum" value="{{$taxes_sum}}">
                        <input type="hidden" name="fees_sum" value="{{$fees_sum}}">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" placeholder="{{trans('frontend.LastName')}} *">
                            @error('last_name')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="{{trans('frontend.Phone')}} *">
                            @error('phone')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" class="form-control" value="{{old('address')}}" name="address" placeholder="{{trans('frontend.Address')}} *">
                            @error('address')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="city" value="{{old('city')}}" placeholder="{{trans('frontend.City')}}*">
                            @error('city')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="state" value="{{old('state')}}" placeholder="{{trans('frontend.State')}} *">
                            @error('state')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="zipcode" value="{{old('zipcode')}}" placeholder="{{trans('frontend.zipcode')}} *">
                            @error('zipcode')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                    @if(old('checkbox')) checked @endif id="createaccount">
                                    <label class="form-check-label label_info" for="createaccount"><span>{{trans('frontend.register')}}?</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group create-account mb-3 @error('email') d-block @enderror">
                            <input type="text" class="form-control " name="email" value="{{old('email')}}" placeholder="{{trans('frontend.Email')}} *">
                            @error('email')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group create-account mb-3  @error('password') d-block @enderror">
                            <input class="form-control" type="password" placeholder="{{trans('frontend.Password')}}" name="password">
                            @error('password')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif

                        <div class="heading_s1">
                            <h4>{{trans('frontend.AdditionalInformation')}}</h4>
                        </div>
                        <div class="form-group mb-0">
                            <textarea rows="5" class="form-control" placeholder="{{trans('frontend.AdditionalInformation')}}" name="address_details"></textarea>
                        </div>
                        <br>

                        <!-- <div class="form-group mb-3">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="promo"
                                    @if(old('checkbox')) checked @endif id="promoApply">
                                    <label class="form-check-label label_info" for="promoApply"><span>{{trans('frontend.promoApply')}}?</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group apply-promo mb-3 @error('promoCode') d-block @else d-none @enderror">
                            <input type="text" class="form-control " name="promoCode" value="{{old('promoCode')}}"
                             placeholder="{{trans('frontend.promo')}} *">
                            @error('promoCode')
                            <span class="feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->

                        <br>
                        <button type="submit" class="btn btn-fill-out btn-block">{{trans('frontend.PlaceOrder')}}</button>

                    </form>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>{{trans('frontend.yourOrder')}} </h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{trans('frontend.Product')}}</th>
                                        <th>{{trans('frontend.Total')}}</th>
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
                                    <thead>
                                        <tr>
                                            <th>{{trans('frontend.Tax')}}</th>
                                            <th>{{trans('frontend.Cost')}}</th>
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
                                            <th>{{trans('frontend.Fee')}}</th>
                                            <th>{{trans('frontend.Cost')}}</th>
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


                                    <tr>
                                        <th>{{trans('frontend.Subtotal')}}</th>
                                        <td class="product-subtotal">{{ Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{trans('frontend.ShippingPrice')}}</th>
                                        <td class="shipping_price_field" id="shipping_price"></td>
                                    </tr>
                                    <tr>
                                        <th>{{trans('frontend.TaxesSum')}}</th>
                                        <td class="shipping_price_field" id="shipping_price">{{$taxes_sum}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{trans('frontend.FeesSum')}}</th>
                                        <td class="shipping_price_field" id="shipping_price">{{$fees_sum}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{trans('frontend.Total')}}</th>
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

</div>
<!-- END MAIN CONTENT -->
@endsection