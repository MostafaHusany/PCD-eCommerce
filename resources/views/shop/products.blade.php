@extends('layouts.shop.app')

@section('title')
{{trans('frontend.AllProducts')}}
@endsection


@section('content')
@if($title == 'all_products')
    @include('shop.incs.breadcramp', [
    'name' => trans('frontend.AllProducts'),
    ])
@else
    @include('shop.incs.product-breadcramp', [
    'name' => $currentCategory,
    ])
@endif
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="order">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="table_data">
                        @include('shop.incs.product-card')
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            @csrf
                            @if(count($categoryProducts)>0)
                            <h5 class="widget_title">{{trans('frontend.categories')}}</h5>
                            <ul class="widget_categories">
                                @foreach($categoryProducts as $category)
                                <li class="dropdown cssState">
                                    <a href="{{route('category',$category->id)}}">
                                        <span class="categories_name">
                                            {{title($category->id)}}
                                        </span>
                                    </a>
                                    </span><span class="categories_num"> ({{count($category->products)}})</span>

                                </li>

                                @endforeach
                            </ul>
                            @else
                            <h5 class="widget_title">{{trans('frontend.Options')}}</h5>
                            <form action="{{route('option_filter')}}" method="post">
                                @csrf
                                <ul>
                                    @foreach($currentCategory->attributes as $custom)
                                    <li class="dropdown cssState">{{$custom->title}}</li>
                                    <ul>
                                        @php
                                        $meta = (array) json_decode($custom->meta);
                                        if ($custom->type === 'options') {
                                        $options = $meta['options'];
                                        foreach($options as $option) {
                                        @endphp
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox[]" id="{{$option}}" value="{{$option}}">
                                            <label class="form-check-label" for="{{$option}}"><span>{{$option}}</span></label>
                                        </div>
                                        @php
                                        }
                                        } else if ($custom->type === 'number'){
                                        @endphp
                                        <div class="widget">
                                            <h5 class="widget_title">Filter</h5>
                                            <div class="filter_price">
                                                <div id="price_filter" data-min="0" data-max="5000" data-min-value="{{$meta['number']->field_number_from}}" data-max-value="{{$meta['number']->field_number_to}}" data-price-sign="{{$meta['number']->field_number_metric}}"></div>
                                                <div class="price_range">
                                                    <span>{{$meta['number']->field_number_metric}}: <span id="flt_price"></span></span>
                                                    <input type="hidden" name="price_first" id="price_first">
                                                    <input type="hidden" name="price_second" id="price_second">
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                        }
                                        @endphp
                                    </ul>
                                    @endforeach
                                </ul>
                                <button class="btn btn-danger" type="submit">{{trans('frontend.filter')}}</button>
                            </form>
                            @endif
                            <br>
                            <form action="{{route('brand_filter')}}" method="post">
                                @csrf
                                <h5 class="widget_title">{{trans('frontend.Brands')}}</h5>
                                @foreach(brands() as $brand)
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="brands[]" id="{{ $brand->id}}" value="{{$brand->id}}">
                                    <label class="form-check-label" for="{{$brand->id}}"><span>{{$brand->en_title}}</span></label>
                                </div>
                                @endforeach
                                <br>
                                <button class="btn btn-danger" type="submit">{{trans('frontend.filter')}}</button>
                            </form>

                        </div>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

</div>
<!-- END MAIN CONTENT -->
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('li.dropdown').click(function() {
            $('li.dropdown').not(this).find('ul').hide();
            $(this).find('ul').toggle();
        });

        $("#price_filter").each(function() {
            var self = $(this);
            $('#price_first').val(self.data('min-value'));
            $('#price_second').val(self.data('max-value'));
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            var url = window.location.href;
            
            $("html, body").scrollTop(0);
            
            $.ajax({
                url: "/pagination/fetch_data?page=" + page,
                success: function(data) {
                    console.log(data);
                    $('#table_data').html(data);
                }
            });
        }
    });
</script>
@endpush