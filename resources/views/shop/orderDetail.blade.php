@extends('layouts.shop.app')

@section('title')
@lang('frontend.orderDetails')
@endsection

@section('content')

    @include('shop.incs.breadcramp', [
    'name' => trans('frontend.orderDetails'),
    ])


<!-- START MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION SHOP -->
    @include('shop.incs.orderDetails',[
    'order' => $order,
    ])
</div>

@endsection