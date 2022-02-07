@extends('layouts.shop.app')

@section('title')
    Home Page
@endsection


@section('content')
   
    @include('shop.incs.banner')
    @include('shop.incs.shop')
    @include('shop.incs.singleBanner')
    @include('shop.incs.product')
    @include('shop.incs.testimonial')
    @include('shop.incs.shop_info')
    @include('shop.incs.subscribe')




@endsection