@extends('layouts.shop.app')

@section('title')
@lang('frontend.ThanksPage')
@endsection

@section('content')
@include('shop.incs.breadcramp', [
'name' => trans('frontend.ThanksPage'),
])


<style>
    .feedback {
        color: red;
    }
</style>
<!-- START MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION SHOP -->

    @include('shop.incs.orderDetails',[
    'order' => $order,
    ])
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <div class="order_review">
                <div class="heading_s1">
                    <p>@lang('frontend.orderRecived')</p>
                    <form action="{{route('uploadInvoices')}}" method="post" enctype="multipart/form-data">
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
                 
                        <div class="form-group mb-3">
                        <button type="submit" class="btn btn-fill-out">@lang('frontend.uploadInvoice')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- END MAIN CONTENT -->
@endsection