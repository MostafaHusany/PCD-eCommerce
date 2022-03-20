@extends('layouts.shop.app')

@section('title')
@lang('frontend.Login')
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => trans('frontend.Login'),
])
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>{{trans('frontend.Login')}}</h3>
                            </div>

                            <form method="post" action="{{ url('/login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="@lang('frontend.Email')">
                                    @error('email')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="password" name="password" placeholder="@lang('frontend.Password')">
                                    @error('password')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="login_footer form-group mb-3">
                            
                                    <a href="{{ route('forget.password.get')}}">@lang('frontend.ForgotPassword')?</a>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">@lang('frontend.Login')</button>
                                </div>
                            </form>
                            <div class="different_login">
                                <span> @lang('frontend.or')</span>
                            </div>

                            <div class="form-note text-center">@lang('frontend.DoAccount')? <a href="{{ route('front.register') }}">@lang('frontend.register')</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
</div>
<!-- END MAIN CONTENT -->


@endsection