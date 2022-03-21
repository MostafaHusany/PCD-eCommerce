@extends('layouts.shop.app')

@section('title')
@lang('frontend.register')
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => trans('frontend.register'),
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
                                <h3>@lang('frontend.CreateAccount')</h3>
                            </div>
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="@lang('frontend.name')">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="@lang('frontend.phone')">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="email"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="@lang('frontend.Email')">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="@lang('frontend.Password')">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('frontend.PasswordConfirm') ">
                                </div>
                   
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">{{trans('frontend.register')}}</button>
                                </div>
                            </form>
                            <div class="different_login">
                                <span> {{trans('frontend.or')}}</span>
                            </div>

                            <div class="form-note text-center">{{trans('frontend.HaveAccount')}} <a href="{{route('login')}}">{{trans('frontend.Login')}}</a></div>
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