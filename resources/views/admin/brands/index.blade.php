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
    $object_title = 'Brand';
@endphp
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('brands.Brands')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('brands.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('brands.Brands')
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
                    <h5>@lang('brands.Brands_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('brands_add'))
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
                        <label for="s-title">@lang('brands.Title')</label>
                        <input type="text" class="form-control" id="s-title">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                <thead>
                    <th>#</th>
                    <th>@lang('brands.AR_Title')</th>
                    <th>@lang('brands.EN_Title')</th>
                    <th>@lang('brands.Image')</th>
                    <th>@lang('brands.Actions')</th>
                </thead>
                <tbody></tbody>
            </table>
        </div><!-- /.card --> 
        
        @include('admin.brands.incs._create')
        @include('admin.brands.incs._show')
        @include('admin.brands.incs._edit')
        

    </div>
</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.brands.index') }}",
            store_route   : "{{ route('admin.brands.store') }}",
            show_route    : "{{ url('admin/brands') }}",
            update_route  : "{{ url('admin/brands') }}",
            destroy_route : "{{ url('admin/brands') }}",
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
            fields_list     : ['id', 'ar_title', 'en_title', 'ar_description', 'en_description','image'],
            imgs_fields     : ['image']

        },
        [
            { data: 'id', name: 'id' },
            { data: 'ar_title', name: 'ar_title' },
            { data: 'en_title', name: 'en_title' },
            { data: 'image', name: 'image' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-title').length)
            d.title = $('#s-title').val();              
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('ar_title') === '') {
            is_valide = false;
            let err_msg = 'arabic title is required';
            $(`#${prefix}ar_titleErr`).text(err_msg);
            $(`#${prefix}ar_titleErr`).slideDown(500);
        }

        if (data.get('en_title') === '') {
            is_valide = false;
            let err_msg = 'english title is required';
            $(`#${prefix}en_titleErr`).text(err_msg);
            $(`#${prefix}en_titleErr`).slideDown(500);
        }

        if (data.get('ar_description') === '') {
            is_valide = false;
            let err_msg = 'arabic description is required';
            $(`#${prefix}ar_descriptionErr`).text(err_msg);
            $(`#${prefix}ar_descriptionErr`).slideDown(500);
        }

        if (data.get('en_description') === '') {
            is_valide = false;
            let err_msg = 'english description is required';
            $(`#${prefix}en_descriptionErr`).text(err_msg);
            $(`#${prefix}en_descriptionErr`).slideDown(500);
        }

        if (prefix === '' && data.get('image') === '') {
            is_valide = false;
            let err_msg = ' image is required';
            $(`#${prefix}imageErr`).text(err_msg);
            $(`#${prefix}imageErr`).slideDown(500);
        }
        return is_valide;
    };
 
});
</script>
@endpush