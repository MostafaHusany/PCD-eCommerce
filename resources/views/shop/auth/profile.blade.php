@extends('layouts.shop.app')

@section('title')
{{$user->name}}
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => $user->name,
])

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="ti-id-badge"></i>change password</a>
                            </li>
                            <li class="nav-item">                           
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" ><i class="ti-lock"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        @if(\Session::has('success'))
                        <div class="alert alert-success">
                            @lang(\Session::get('success'))
                        </div>
                        @endif
                        @if(\Session::has('err'))
                        <div class="alert alert-danger">
                            @lang(\Session::get('err'))
                        </div>
                        @endif
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Dashboard</h3>
                                </div>
                                <div class="card-body">
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent orders</a>, manage your <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">shipping and billing addresses</a> and <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">edit your password and account details.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Orders</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#1234</td>
                                                    <td>March 15, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$78.00 for 1 item</td>
                                                    <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#2366</td>
                                                    <td>June 20, 2020</td>
                                                    <td>Completed</td>
                                                    <td>$81.00 for 1 item</td>
                                                    <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3>Billing Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Shipping Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Account Details</h3>
                                </div>
                                <div class="card-body">
                                    <p>Already have an account? <a href="#">Log in instead!</a></p>

                                    <form action="{{route('update_profile')}}" method="post" name="enq">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Display Name <span class="required">*</span></label>
                                                <input  value="{{old('name', $user->name)}}" class="form-control" name="name" type="text">
                                                @error('name')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12 mb-3">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input  value="{{old('email', $user->email)}}" class="form-control" name="email" type="email">
                                                @error('email')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12 mb-3">
                                                <label>phone <span class="required">*</span></label>
                                                <input value="{{old('phone', $user->phone)}}" class="form-control" name="phone" type="text">
                                                @error('phone')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="password-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Chang password</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('update_password')}}" method="post" name="enq">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Current Password <span class="required">*</span></label>
                                                <input id="exampleInput8" type="password" name="old_password" class="form-control" placeholder="Current Password" />
                                                @error('old_password')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>New Password <span class="required">*</span></label>
                                                <input id="exampleInput9" type="password" name="password" class="form-control" placeholder="New Password" />
                                                @error('password')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Confirm Password <span class="required">*</span></label>
                                                <input id="exampleInput10" type="password" name="confirm_password" class="form-control" placeholder="Confirm Password " />
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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