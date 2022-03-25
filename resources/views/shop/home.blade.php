@extends('layouts.shop.app')

@section('title')
@lang('frontend.Home')
@endsection


@section('content')

@include('shop.incs.header')

<!-- END MAIN CONTENT -->

@include('shop.incs.ExclusiveProducts')

@include('shop.incs.banner')

@include('shop.incs.ExclusiveProducts')

@include('shop.incs.TrendingProducts')

@include('shop.incs.Brands')


@endsection