@extends('layouts.shop.app')

@section('content')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="{{ url('/') }}" class="link">Home</a></li>
        <li class="item-link"><span>Shop</span></li>
    </ul>
</div>

            
<div class="row">

    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

        <div class="wrap-shop-control" style="margin-top: 0;">

            <h1 class="shop-title">All Categories</h1>

            <div class="wrap-right">

                <div class="sort-item orderby ">
                    <select name="orderby" class="use-chosen select-order-type" >
                        <option value="" selected="selected">Default sorting</option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                    </select>
                </div>

                <div class="sort-item product-per-page">
                    <select name="post-per-page" class="use-chosen select-pagination-nom" >
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
                
                <div class="change-display-mode">
                    <a href="#" data-grid-type="grid" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                    <a href="#" data-grid-type="list" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                </div>

            </div><!-- /.wrap-right -->

        </div><!--end wrap shop control-->

        <div class="row">   
            
            <div id="productsSpinner" class="col-xs-12" style="margin-top: 120px">
                <div class="loader center-block"></div>
            </div>

            <ul class="product-list grid-products equal-container">
                
            </ul>
        </div><!-- /.row -->

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
                </ul>
            </div>
        </div><!-- Categories widget-->
        
        {{--
            <div class="widget mercado-widget filter-widget brand-widget">
                <h2 class="widget-title">Brand</h2>
                <div class="widget-content">
                    <ul class="list-style vertical-list list-limited" data-show="6">
                        <li class="list-item"><a class="filter-link active" href="#">Fashion Clothings</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Laptop Batteries</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Printer & Ink</a></li>
                        <li class="list-item"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Sound & Speaker</a></li>
                        <li class="list-item"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Printer & Ink</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">CPUs & Prosecsors</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Sound & Speaker</a></li>
                        <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li>
                        <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div><!-- brand widget-->
        --}}
        
        {{--
        <div class="widget mercado-widget filter-widget price-filter">
            <h2 class="widget-title">Price</h2>
            <div class="widget-content">
                <div id="slider-range"></div>
                <p>
                    <label for="amount">Price:</label>
                    <input type="text" id="amount" readonly style="max-width: 150px">
                    <button class="filter-submit">Filter</button>
                </p>
            </div>
        </div><!-- Price-->
        --}}

        {{--
            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Color</h2>
                <div class="widget-content">
                    <ul class="list-style vertical-list has-count-index">
                        <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                    </ul>
                </div>
            </div><!-- Color -->

            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Size</h2>
                <div class="widget-content">
                    <ul class="list-style inline-round ">
                        <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                        <li class="list-item"><a class="filter-link " href="#">M</a></li>
                        <li class="list-item"><a class="filter-link " href="#">l</a></li>
                        <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                    </ul>
                    <div class="widget-banner">
                        <figure><img src="{{ asset('shop_assets/images/size-banner-widget.jpg') }}" width="270" height="331" alt=""></figure>
                    </div>
                </div>
            </div><!-- Size -->

            <div class="widget mercado-widget widget-product">
                <h2 class="widget-title">Popular Products</h2>
                <div class="widget-content">
                    <ul class="products">
                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('shop_assets/images/products/digital_01.jpg') }}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('shop_assets/images/products/digital_17.jpg') }}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('shop_assets/images/products/digital_18.jpg') }}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="{{ asset('shop_assets/images/products/digital_20.jpg') }}" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div><!-- brand widget-->
        --}}

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
        <li class="product-el col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
            <div class="product product-style-3 equal-elem ">
                <div class="product-thumnail">
                    <a href="{{ url('/shop') }}/${product.slug}" title="${product[`${lang_prefix}_name`]}">
                        <figure><img src="{{ url('/') }}/${product.main_image}" alt="${product[`${lang_prefix}_name`]}"></figure>
                    </a>
                </div>
                <div class="product-info">
                    <a href="#" class="product-name"><span>${product[`${lang_prefix}_name`]}</span></a>
                    <div class="wrap-price"><span class="product-price">${product.price} SR</span></div>
                    <a href="#" class="btn add-to-cart">Add To Cart</a>
                </div>
            </div>
        </li>  
        `;

        return el_product;
    }

    function create_horz_product_el (product) {
        let el_product = `
        <li class="product-el col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="row product product-style-3 equal-elem ">
                <div class="col-md-3" style="overflow: hidden">
                    <div class="product-thumnail">
                        <a href="{{ url('/shop') }}/${product.slug}" title="${product[`${lang_prefix}_name`]}">
                            <figure><img style="!width: 200px" src="{{ url('/') }}/${product.main_image}" alt="${product[`${lang_prefix}_name`]}"></figure>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 !col-lg-3 product-info" style="padding-top: 25px">
                    <a href="#" class="product-name">
                        <h3>${product[`${lang_prefix}_name`]}</h3>
                        <p>${(product[`${lang_prefix}_small_description`]).slice(0, 25)}</p>
                    </a>
                </div>
                <div class="col-md-3 !col-lg-3">
                    <div class="wrap-price">
                        <h3 class="product-price text-center">${product.price} SR</h3>
                    </div>
                    <a href="#" class="btn add-to-cart">Add To Cart</a>
                </div>
            </div>
        </li>
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
        const nom_of_pages = products.total / products.per_page;
        let buttons_el = '';
        for ($i = 1; $i <= nom_of_pages; $i++) {
            buttons_el += `
                <li class="page-number-il ${$i === products.current_page ? 'active' : '' }" data-target-page="${$i}"><span class="page-number-item ${$i === products.current_page ? 'current' : ''}">${$i}</a></li>
            `;
        }

        const pagination_el = `
        <div class="wrap-pagination-info">
            <ul class="page-numbers">
                ${buttons_el}
            </ul>
            <p class="result-count">Showing ${products.per_page} of ${products.total} result</p>
        </div>
        `;

        $('.pagination-container').append(pagination_el);
    }

    function call_products (page_nom = 1, category = '', pagination = 3, orderby_type = '') {
        
        // $(window).scrollTop(0);
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
    $('.pagination-container').on('click', '.page-number-il', function () {
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
            $('.shop-title').text(category_name);
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

});
</script>
@endpush