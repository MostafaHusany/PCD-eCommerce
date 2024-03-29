@extends('layouts.admin.app')

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

@push('page_css')
    @if($is_ar)
        @include('layouts.admin.incs._rtl')
    @endif
@endpush

@push('page_css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/input_img_privew/jpreview.css') }}">
@endpush

@section('content')
@php 
    $object_title = 'Sold Product';
@endphp
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('sold_products.Sold_Products')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('sold_products.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('sold_products.Sold_Products')
                        </li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container-fluid pt-3">

        <div id="successAlert" style="display: none" class="alert alert-success"></div>
        
        <div id="dangerAlert"  style="display: none" class="alert alert-danger"></div>
            
        <div id="warningAlert" style="display: none" class="alert alert-warning"></div>

        <div class="d-flex justify-content-center mb-3">
            <div id="loddingSpinner" style="display: none" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div id="objectsCard" class="card card-body">
            <div class="row">
                <div class="col-6">
                    <h5>@lang('sold_products.Sold_Products_Adminstration')</h5>
                </div>
                
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>
                    
                    {{--
                    <!-- There is no create for sold products -->
                    <div class="toggle-btn btn btn-primary btn-sm" data-current-card="#objectsCard" data-target-card="#createObjectCard">
                        <i class="fas fa-plus"></i>
                    </div>
                    --}}
                </div>
            </div><!-- /.row -->

            <hr/>
            
            <!-- START SEARCH BAR -->
            <div class="row">
                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('sold_products.Name')</label>
                        <input type="text" class="form-control" id="s-name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-2 -->
                
                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('sold_products.Order_Code')</label>
                        <input type="text" class="form-control" id="s-code">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->

                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-status">Status</label>
                        <select class="form-control" id="s-status">
                            <option value="">-- @lang('sold_products.select_status') --</option>
                            <option value="1">@lang('sold_products.Sold')</option>
                            <option value="0">@lang('sold_products.Restored')</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->
                
                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('sold_products.SKU')</label>
                        <input type="text" class="form-control" id="s-sku">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->

                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-status">@lang('sold_products.Start_Date')</label>
                        <input type="date" class="form-control" id="s-start_date">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->

                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-status">@lang('sold_products.End_Date')</label>
                        <input type="date" class="form-control" id="s-end_date">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->
                
                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('sold_products.Type')</label>
                        <select class="form-control" id="s-type">
                            <option value="">@lang('sold_products.All')</option>
                            <option value="0">@lang('sold_products.Usual')</option>
                            <option value="1">@lang('sold_products.Composite')</option>
                            <option value="2">@lang('sold_products.Upgradable')</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->

                <div class="col-3">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('sold_products.Category')</label>
                        <select class="form-control" id="s-category"></select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->
                
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->
                        
            <div class="overflow-table">
                <table style="font-size: 14px !important" id="dataTable" class="table table-sm table-bordered">
                    <thead>
                        <th>#</th>
                        <th>@lang('sold_products.Image')</th>
                        <th>@lang('sold_products.Order_Code')</th>
                        <th>@lang('sold_products.Name')</th>
                        <th>@lang('sold_products.Type')</th>
                        <th>@lang('sold_products.Parent')</th>
                        <th>@lang('sold_products.Status')</th>
                        <th>@lang('sold_products.Categories')</th>
                        <th>@lang('sold_products.SKU')</th>
                        <th>@lang('sold_products.Price')</th>
                        <th>@lang('sold_products.Date')</th>
                        <th>@lang('sold_products.Action')</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div><!-- /.overflow-table -->
        </div><!-- /.card --> 
        
        
        @include('admin.orders.incs._show')
        {{--
            @include('admin.products.incs._edit')
            <!-- There is no create for sold products -->
            @include('admin.products.incs._create')
        --}}

    </div>
</div>
@endsection

@push('page_scripts')

<script src="{{ asset('plugins/input_img_privew/jpreview.js') }}"></script>

<script>
$(function () {
    
    

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.sold_products.index') }}",
            store_route   : "{{ route('admin.products.store') }}",
            show_route    : "{{ url('admin/products') }}",
            update_route  : "{{ url('admin/products') }}",
            destroy_route : "{{ url('admin/sold-products') }}",
        },
        '#dataTable',
        {
            success_el : '#successAlert',
            danger_el  : '#dangerAlert',
            warning_el : '#warningAlert'
        },
        {
            table_id        : '#dataTable',
            toggle_btn      : '.toggle-btn',
            create_obj_btn  : '.create-object',
            update_obj_btn  : '.update-object',
            fields_list     : ['id', 'ar_name', 'ar_small_description', 'ar_description',
                               'en_name', 'en_small_description', 'en_description', 'sku', 'categories',
                               'quantity', 'main_image', 'images', 'price', 'price_after_sale', 'reserved_quantity',
                                'is_active', 'is_composite', 'child_products'],
            imgs_fields     : ['main_image', 'images']
        },
        [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'type', name: 'type' },
            { data: 'parent', name: 'parent' },
            { data: 'status', name: 'status' },
            { data: 'categories', name: 'categories' },
            { data: 'sku', name: 'sku' },
            { data: 'price', name: 'price' },
            { data: 'created_at', name: 'created_at' },
            { data: 'actions' , name: 'actions' },
        ],
        function (d) {
            if ($('#s-name').length)
            d.name = $('#s-name').val();    
            
            if ($('#s-code').length)
            d.code = $('#s-code').val();    
            
            if ($('#s-sku').length)
            d.sku = $('#s-sku').val();  
            
            if ($('#s-start_date').length)
            d.start_date = $('#s-start_date').val();  
            
            if ($('#s-end_date').length)
            d.end_date = $('#s-end_date').val();
            
            if ($('#s-type').length)
            d.type = $('#s-type').val();
            
            if ($('#s-status').length)
            d.status = $('#s-status').val();    
            
            if ($('#s-category').length)
            d.category = $('#s-category').val();            
        }
    );

    (function () {
        $('#permissions').select2({width: '100%'});
        $('#edit-permissions').select2({width: '100%'});
        
        $('#s-category').select2({
            allowClear: true,
            width: '100%',
            placeholder: '@lang("sold_products.Select_categories")',
            ajax: {
                url: '{{ url("admin/products-categories-search") }}',
                dataType: 'json',
                delay: 150,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: `${item['ar_title']} || ${item['en_title']}`,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        
        $('#dataTable').on('click', '.restore-object', function () {
            $('#loddingSpinner').show(500);

            let target_order_product_id   = $(this).data('object-id');
            let target_order_product_name = $(this).data('object-name');
            
            let flag = confirm(`@lang('sold_products.restore_1') "${target_order_product_name}"`);
            
            if (flag) {
                axios.post(`{{ url('admin/sold-products') }}/${target_order_product_id}`, {
                    _method  : 'DELETE',
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    restore_product : true
                }).then(res => {
                    
                    $('#loddingSpinner').hide(500);
                    
                    if (res.data.success) {
                        objects_dynamic_table.table_object.draw();

                        $('#warningAlert').text('@lang("sold_products.restore_2")').slideDown();
                        setTimeout(() => {
                            $('#warningAlert').text('').slideUp();
                        }, 3000);
                    }// end :: if
                });
            }
        });

    })();

});
</script>
@endpush