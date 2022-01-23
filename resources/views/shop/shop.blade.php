@extends('layouts.shop.app')


@push('custome-css')
<style>   
    .widget ul li a{
        font-size: 14px;
        line-height: 40px;
        color: #444444;
        text-decoration:none;
        font-weight: 600;
    }
    .widget ul li{
        list-style: none;
        float: left;
        width: 100%;
    }
    .widget ul{
        padding: 0;
        margin: 0;
    }
    .widget.categories-widget .widget-title{
        padding-bottom: 13px;
        border-bottom: none;
        margin-bottom: 0;
    }
    .widget.categories-widget ul li{
        display: block;
        width: 100%;
        float: left;
    }
    .widget.categories-widget .sub-cate{
        padding-left: 33px;
    }
    .widget.categories-widget .has-child-cate:not(.open) .sub-cate{
        display: none;
    }
    .has-child-cate .toggle-control{
        position: relative;
        width: 10px;
        font-size: 0;
        display: inline-block;
        float: left;
        height: 40px;
    }
    .has-child-cate .toggle-control:hover{
        cursor: pointer;
    }
    .has-child-cate .toggle-control::before{
        content: '';
        display: block;
        width: 10px;
        height: 2px;
        background-color: #444444;
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
    }
    .has-child-cate:not(.open) .toggle-control::after{
        content: '';
        display: block;
        width: 2px;
        height: 10px;
        background-color: #444444;
        position: absolute;
        top: 15px;
        left: 50%;
        transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
    }
    .widget .has-child-cate > a{
        display: inline-block;
        float: left;
        width: calc(100% - 10px);
        width: -webkit-calc(100% - 10px);
        width: -moz-calc(100% - 10px);
    }
    .widget.categories-widget .widget-content>ul>li:last-child{
        margin-bottom: 10px;
    }
</style>
@endpush

@section('content')         
<div class="row">
    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-2">
            <div class="container-fluid">
                <h1 class="navbar-brand shop-title" style="margin: 0;">All Categories</h1>
                
                <div class="row d-flex">
                    <div class="col-4">
                        <select name="orderby" class="form-control select-order-type" >
                            <option value="" selected="selected">Default sorting</option>
                            <option value="popularity">!Sort by popularity</option>
                            <option value="rating">!Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>

                    <div class="col-4">
                        <select class="form-control select-pagination-nom" >
                            <option value="3" selected="selected">3 per page</option>
                            <option value="12" >12 per page</option>
                            <option value="16">16 per page</option>
                            <option value="18">18 per page</option>
                            <option value="21">21 per page</option>
                            <option value="24">24 per page</option>
                            <option value="30">30 per page</option>
                            <option value="32">32 per page</option>
                        </select>
                    </div>
                    
                    <div class="col-4 d-flex justify-content-around">
                        <button data-grid-type="grid" class="btn btn-sm btn-dark display-mode active">
                            <i class="fa fa-th"></i> Grid
                        </button>
                        <button data-grid-type="list" class="btn btn-sm btn-dark display-mode">
                            <i class="fa fa-th-list"></i> List
                        </button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->

        <div class="products-container">    
            <div id="productsSpinner" style="margin-top: 120px">
                <div class="d-flex justify-content-center">
                    <span class="loader center-block"></span>
                </div>
            </div>

            <div class="row product-list">  
            </div><!-- /.row -->
        </div><!-- /.products-container -->

        <div class="pagination-container">
        </div><!-- /.pagination-container --> 
    </div><!--end main products area-->

    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
        <div class="widget mercado-widget categories-widget">
            <h2 class="widget-title cate-link" data-category-name="All Categories" data-category-id="" style="cursor: pointer;">All Categories</h2>
            <div class="widget-content">
                <ul class="list-category">
                    @foreach($main_categories as $category)
                        @if($category->children()->count())
                        <li class="category-item has-child-cate">
                            <a href="#" data-category-name="{{ $category[LaravelLocalization::getCurrentLocale().'_title'] }}" data-category-id="{{ $category->id }}" class="cate-link">{{ $category[LaravelLocalization::getCurrentLocale().'_title'] }}</a>
                            <span class="toggle-control">+</span>
                            <ul class="sub-cate">
                                @foreach($category->children as $category_child)
                                <li class="category-item"><a href="#" data-category-name="{{ $category_child[LaravelLocalization::getCurrentLocale().'_title'] }}" data-category-id="{{ $category_child->id }}" class="cate-link">{{ $category_child[LaravelLocalization::getCurrentLocale().'_title'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li class="category-item">
                            <a href="#" data-category-name="{{ $category[LaravelLocalization::getCurrentLocale().'_title'] }}" data-category-id="{{ $category->id }}" class="cate-link">{{$category[LaravelLocalization::getCurrentLocale().'_title']}}</a>
                        </li>
                        @endif
                    @endforeach
                </ul><!-- /.list-category -->
            </div><!-- /.widget-content -->
        </div><!-- Categories widget-->
    </div><!--end sitebar-->

</div><!--end row-->
@endsection

@push('custome-js')
<script>
$(document).ready(function () {
    console.log('start products script !!');

    let is_request_sent     = false;
    let pagination          = 3;
    let target_category_id  = '';
    let orderby_type        = '';
    let grid_type           = 'grid';
    let lang_prefix         = '{{ LaravelLocalization::getCurrentLocale() }}';

    function create_product_el (product) {
        let el_product = `
        <div class="product-el col-lg-4 col-md-6 col-sm-12 mb-2"> 
            <div class="card" style="height: 100%;">
                <a href="{{ url('/shop') }}/${product.slug}" title="${product[`${lang_prefix}_name`]}">
                    <img style="object-fit: cover;" class="card-img-top" src="{{ url('/') }}/${product.main_image}" alt="${product[`${lang_prefix}_name`]}">
                </a>
                <div class="card-body">
                    <div class="card-body">
                        <p class="card-text" data-bs-toggle="tooltip" data-bs-placement="top" title="${product[`${lang_prefix}_name`]}" style="height: 50px; text-overflow: ellipsis; margin: 0; overflow: hidden" !style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            ${product[`${lang_prefix}_name`]}
                        </p>
                        <h5 class="card-text text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-thumbs-up"></i>
                                </button>
                            </div>
                            <small class="text-muted">
                                ${product.price} SR
                            </small>
                        </div><!-- /.d-flex -->
                    </div><!-- /.card-body -->
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col-lg-4 -->
        `;

        return el_product;
    }

    function create_horz_product_el (product) {
        let el_product = `
        <div class="product-el !card col-12 col-sm-12 mb-2"> 
            <div class="row product product-style-3 equal-elem ">
                <div class="col-md-4">
                    <a href="{{ url('/shop') }}/${product.slug}" title="${product[`${lang_prefix}_name`]}">
                        <img class="img-thumbnail" src="{{ url('/') }}/${product.main_image}" alt="${product[`${lang_prefix}_name`]}">
                    </a>
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h3>${product[`${lang_prefix}_name`]}</h3>
                        <p>${ (product[`${lang_prefix}_small_description`]).length > 25 ? (product[`${lang_prefix}_small_description`]).slice(0, 25) + ' ...' : (product[`${lang_prefix}_small_description`])}</p>

                        <h5 class="card-text text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </h5>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-thumbs-up"></i>
                                </button>
                            </div>
                            <h5 class="text-muted">
                                ${product.price} SR
                            </h5>
                        </div><!-- /.d-flex -->
                    </div>
                </div>
            </div>
            
            <hr />
        </div>
        `;
        
        return el_product;
    }

    function create_pagination_el (products) {

        /**
         * Comes with pagination object
         * "total" interies
         * "per_page" values
         * "current_page"
         * "last_page"
         * "first_page_url"
         * "last_page_url"
         * "next_page_url"
         * "path"
         */
        $('.wrap-pagination-info').remove();
        
        const nom_of_pages = Math.ceil(products.total / products.per_page);
        let buttons_el = '';

        for ($i = 1; $i <= nom_of_pages; $i++) {
            buttons_el += `
                <li class="page-item ${$i === products.current_page ? 'active' : '' }" data-target-page="${$i}">
                    <span class="page-link ${$i === products.current_page ? 'current' : ''}">${$i}</span>
                </li>
            `;
        }

        const pagination_el = `
        <nav class="wrap-pagination-info">
            <ul class="pagination">
                ${buttons_el}
            </ul>
        </nav>
        `;

        $('.pagination-container').append(pagination_el);
    }

    function call_products (page_nom = 1, category = '', pagination = 3, orderby_type = '') {
        $("html, body").animate({ scrollTop: 100 }, "slow");
        $('.product-el').remove();
        $('#productsSpinner').show();
        
        setTimeout(() => {
            axios(`{{ url('api/products') }}?page=${page_nom}&category=${category}&pagination=${pagination}&orderby_type=${orderby_type}`)
            .then(res => {
                $('#productsSpinner').hide();
                
                if (res.data.success) {
                    res.data.products.data.forEach(product => {
                        const product_el = grid_type === 'grid' ? create_product_el(product) : create_horz_product_el(product);
                        // const product_el = create_horz_product_el(product);
                        $('.product-list').append(product_el);
                    });

                    create_pagination_el(res.data.products);
                    // $(".wrap-shop-control").scrollTop(0);
                }

                is_request_sent = false;
            });
        }, 100);    
    }

    call_products();

    // pagination event
    $('.pagination-container').on('click', '.page-item', function () {
        if (!$(this).hasClass('active') && !is_request_sent) {
            is_request_sent = true;
            let target_page = $(this).data('target-page');
            call_products(target_page, target_category_id, pagination, orderby_type);
        }
    });

    // category event
    $('.cate-link').click(function (e) {
        e.preventDefault();
        if (!is_request_sent) {
            is_request_sent     = true;
            target_category_id  = $(this).data('category-id');
            call_products(1, target_category_id, pagination, orderby_type);

            let category_name = $(this).data('category-name');
            $('.shop-title').text(category_name.length > 20 ? category_name.slice(0, 20) + '...': category_name);
        }
    });

    // select pagination nom event
    $('.select-pagination-nom').change(function (e) {
        e.preventDefault();
        if (!is_request_sent) {
            is_request_sent = true;
            pagination      = $(this).val();
            call_products(1, target_category_id, pagination, orderby_type);
        }
    });

    // select orderby type event
    $('.select-order-type').change(function (e) {
        e.preventDefault();
        if (!is_request_sent) {
            is_request_sent = true;
            orderby_type    = $(this).val();
            call_products(1, target_category_id, pagination, orderby_type);
        }
    });

    // select grid-display event
    $('.display-mode').click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('active') && !is_request_sent) {
            $('.display-mode').removeClass('active');
            $(this).addClass('active')
            is_request_sent = true;
            grid_type       = $(this).data('grid-type');
            call_products(1, target_category_id, pagination, orderby_type);
        }
    });

    // toggle categories
    $(document).on('click',".widget .has-child-cate .toggle-control", function(el){
        el.preventDefault();
        var _this = $(this);
        if(_this.parent().hasClass('open')){
            _this.parent().removeClass('open');
        }else {
            _this.closest('.widget-content').find('.open').removeClass('open');
            _this.parent().addClass('open');
        }
    });

});
</script>
@endpush