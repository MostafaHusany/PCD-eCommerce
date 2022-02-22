@extends('layouts.shop.app')

@section('title')
Forget password
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => 'Forget password',
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
                                <h3>Forget password</h3>
                            </div>
                            @if(\Session::has('message'))
                            <div class="alert alert-success">
                                @lang(\Session::get('message'))
                            </div>
                            @endif
                            <form class="user" method="POST" action="{{ route('forget.password.post') }}">
                                @csrf
                                <div class="form-group mt-3">
                                    <input class="form-control form-control-user" id="exampleInputEmail" type="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Email address">
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div><br>

                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    Reseat password
                                </button>
                            </form>


                            <div class="different_login">
                                <span> or</span>
                            </div>

                            <div class="text-center">
                                <a class="small" href="{{ route('Login') }}">Login</a><br>
                                <a class="small" href="{{ route('front.register') }}">register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

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