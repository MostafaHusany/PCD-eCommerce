@extends('layouts.shop.app')

@section('title')
{{$user->name}}
@endsection

@section('content')

@include('shop.incs.breadcramp', [
'name' => $user->name,
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
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>@lang('frontend.Orders')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>@lang('frontend.Address') </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>@lang('frontend.AccountDetail')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="ti-id-badge"></i>@lang('frontend.changePassword')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="ti-lock"></i>@lang('frontend.Logout')</a>
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
                        <div class="tab-pane fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>@lang('frontend.Orders')</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>@lang('frontend.Order')</th>
                                                    <th>@lang('frontend.Date')</th>
                                                    <th>@lang('frontend.Status')</th>
                                                    <th>@lang('frontend.Total')</th>
                                                    <th>@lang('frontend.Actions')</th>
                                                    <th>@lang('frontend.PaymentStatus')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($user->orders)>0)
                                                @foreach($user->orders()->paginate(10) as $order)
                                                <tr>
                                                    <td>{{$order->id}}</td>
                                                    <td>{{ $order->created_at->format('d/m/Y')}}</td>
                                                    <td>{{$order->status}}</td>
                                                    <td>{{$order->total}}</td>
                                                    <td><a href="{{route('order.details',$order->id)}}" class="btn btn-fill-out btn-sm">@lang('frontend.View')</a></td>
                                                    @if($order->invoice->status == 'check_payment_transaction' )
                                                    <td>@lang('frontend.ReviewingPayment')</td>
                                                    @elseif($order->invoice->status == 'waiting_payment' ||
                                                    $order->invoice->status == 'refused' &&
                                                    $order->invoice->payment_refuse_count < 3) <td>
                                                        <button type="button" class="btn btn-fill-out btn-sm" data-bs-toggle="modal" data-bs-target="{{ '#exampleModal' . $order->id }}">
                                                            @lang('frontend.uploadInvoice')
                                                            <i class="fas fa-upload"></i>
                                                        </button>
                                                        </td>
                                                        @elseif($order->invoice->status == 'paid')
                                                        <td>@lang('frontend.orderPaid')</td>
                                                        @elseif($order->invoice->status == 'refused' &&
                                                        $order->invoice->payment_refuse_count >2 )
                                                        <td>@lang('frontend.orderRefused')</td>
                                                        @endif
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="container text-center">
                                    {!! $user->orders()->paginate(10)->render() !!}
                                </div>
                            </div>
                        </div>


                        @foreach($user->orders()->paginate(10) as $order)
                        <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{route('uploadInvoices')}}" method="post" enctype="multipart/form-data">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('frontend.uploadBankInvoices')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <input type="file" name="payment_file">
                                                    <br>
                                                    @error('payment_file')
                                                    <span class="feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>
                                            <input type="hidden" name="order_id" value="{{$order->id}}">


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('frontend.close')</button>
                                            <button type="submit" class="btn btn-fill-out">@lang('frontend.uploadInvoice')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach

                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                @if(count($user->addresses)>0)
                                @foreach($user->addresses as $address)
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>@lang('frontend.addressDetails')</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>@lang('frontend.Address') : {{$address->address}}
                                                <br>@lang('frontend.City') : {{$address->city}}
                                                <br>@lang('frontend.State') : {{$address->state}}
                                                <br>@lang('frontend.Phone') : {{$address->phone}}
                                                <br>@lang('frontend.zipcode') : {{$address->zipcode}}
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>@lang('frontend.AccountDetail')</h3>
                                </div>
                                <div class="card-body">

                                    <form action="{{route('update_profile')}}" method="post" name="enq">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>@lang('frontend.name') <span class="required">*</span></label>
                                                <input value="{{old('name', $user->name)}}" class="form-control" name="name" type="text">
                                                @error('name')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12 mb-3">
                                                <label>@lang('frontend.Email') <span class="required">*</span></label>
                                                <input value="{{old('email', $user->email)}}" class="form-control" name="email" type="text">
                                                @error('email')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12 mb-3">
                                                <label>@lang('frontend.phone') <span class="required">*</span></label>
                                                <input value="{{old('phone', $user->phone)}}" class="form-control" name="phone" type="text">
                                                @error('phone')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">@lang('frontend.Save')</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="password-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>@lang('frontend.Changpassword')</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('update_password')}}" method="post" name="enq">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>@lang('frontend.Currentpassword') <span class="required">*</span></label>
                                                <input id="exampleInput8" type="password" name="old_password" class="form-control" placeholder="@lang('frontend.Currentpassword') " />
                                                @error('old_password')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label> @lang('frontend.Newpassword') <span class="required">*</span></label>
                                                <input id="exampleInput9" type="password" name="password" class="form-control" placeholder=" @lang('frontend.Newpassword') " />
                                                @error('password')
                                                <p class="text-muted alert alert-danger mt-1">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label> @lang('frontend.PasswordConfirm') <span class="required">*</span></label>
                                                <input id="exampleInput10" type="password" name="confirm_password" class="form-control" placeholder=" @lang('frontend.PasswordConfirm') " />
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit"> @lang('frontend.Save') </button>
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

</div>
<!-- END MAIN CONTENT -->



@endsection