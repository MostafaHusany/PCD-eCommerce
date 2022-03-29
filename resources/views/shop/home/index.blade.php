@extends('layouts.shop.app')

@section('title')
    @lang('frontend.Home')
@endsection


@section('content')

    @include('shop.home.incs.header')

    @include('shop.home.incs.ExclusiveProducts')

    @include('shop.home.incs.banner')

    @include('shop.home.incs.ExclusiveProducts')

    @include('shop.home.incs.TrendingProducts')

    @include('shop.home.incs.Brands')

@endsection