@extends('layouts.shop.app')

@section('title')
{{trans('frontend.Searchresult')}}
@endsection


@section('content')

@include('shop.incs.breadcramp', [
'name' => trans('frontend.Searchresult'),
])

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                @if(count($products)>0)

                <div class="col-lg-12">
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
                    <div class="row shop_container">


                        @include('shop.products.incs.search-card')
                    </div>
                </div>
            </div>
            @else
            <p class="text-center">There is no products</p>
            @endif
        </div>
    </div>
    <!-- END SECTION SHOP -->



</div>
<!-- END MAIN CONTENT -->
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('li.dropdown').click(function() {
            $('li.dropdown').not(this).find('ul').hide();
            $(this).find('ul').toggle();
        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#price_filter").each(function() {
            var self = $(this);
            $('#price_first').val(self.data('min-value'));
            $('#price_second').val(self.data('max-value'));

        });
    });
</script>
@endpush