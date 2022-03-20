@extends('layouts.shop.app')

@section('title')
@lang('frontend.Home')
@endsection


@section('content')

@include('shop.incs.header')

<!-- END MAIN CONTENT -->
<div class="main_content">

    @include('shop.incs.ExclusiveProducts')

    @include('shop.incs.banner')

    @include('shop.incs.DayDeal')

    @include('shop.incs.TrendingProducts')

    @include('shop.incs.Brands')

    @include('shop.incs.FeaturedProducts')

    @endsection