@extends('layouts.admin.app')

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

@push('page_css')
    @if($is_ar)
        @include('layouts.admin.incs._rtl')
    @endif
@endpush


@section('content')
@php 
    $object_title = 'Products Names';
@endphp
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('products.Products_Names')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('products.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('products.Products_Names')
                        </li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="container-fluid">

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
                    <h5>@lang('products.Products_Names_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('shipping_add'))
                    <div class="toggle-btn btn btn-primary btn-sm" data-current-card="#objectsCard" data-target-card="#createObjectCard">
                        <i class="fas fa-plus"></i>
                    </div>
                    @endif
                </div>
            </div><!-- /.row -->

            <hr/>
            
            <!-- START SEARCH BAR -->
            <div class="row">
                <div class="col-6">
                    <div class="form-group search-action">
                        <label for="s-name">@lang('products.Name')</label>
                        <input type="text" class="form-control" id="s-name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->

                <div class="col-6">
                    <div class="form-group search-action">
                        <label for="s-sku">@lang('products.SKU')</label>
                        <input type="text" class="form-control" id="s-sku">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <div class="overflow-table">
                <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                    <thead>
                        <th>#</th>
                        <th>@lang('products.Name')</th>
                        <th>@lang('products.SKU')</th>
                        <th>@lang('products.Actions')</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div><!-- /.overflow-table --> 
        </div><!-- /.card --> 
        
        @include('admin.products_names.incs._create')
        
        @include('admin.products_names.incs._edit')
        
    </div>
</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.products_names.index') }}",
            store_route   : "{{ route('admin.products_names.store') }}",
            show_route    : "{{ url('admin/products-names') }}",
            update_route  : "{{ url('admin/products-names') }}",
            destroy_route : "{{ url('admin/products-names') }}",
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
            fields_list     : ['importFile', 'sku', 'id', 'name'],
            imgs_fields     : ['importFile']
        },
        [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name'},
            { data: 'sku', name: 'sku' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-name').length)
            d.name = $('#s-name').val();  
            
            if ($('#s-sku').length)
            d.sku = $('#s-sku').val();  
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (prefix == 'edit-') {
            if (data.get('name') === '') {
                is_valide = false;
                let err_msg = '@lang("products.name_is_required")';
                $(`#${prefix}nameErr`).text(err_msg);
                $(`#${prefix}nameErr`).slideDown(500);
            }

            if (data.get('sku') === '') {
                is_valide = false;
                let err_msg = '@lang("products.sku_is_required")';
                $(`#${prefix}skuErr`).text(err_msg);
                $(`#${prefix}skuErr`).slideDown(500);
            }
        } else {
            let valied_extensions = ['xlsx', 'xls', 'xls', 'xlw', 'csv'];
            let file_struc    = data.get('importFile').split('.');
            let is_file_exist = data.get('importFile') != '' && file_struc.length == 2;
            if (!is_file_exist || !valied_extensions.includes(file_struc[1])) {
                is_valide = false;
                $('#importFileErr').text('@lang("products.file_err")').slideDown(500);
            }
        }

        return is_valide;
    };

});
</script>
@endpush