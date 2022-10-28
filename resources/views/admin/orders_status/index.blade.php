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
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('order_status.Orders_Status')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('order_status.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('order_status.Orders_Status')
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
                    <h5>@lang('order_status.Orders_Status_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('order_status_add'))
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
                        <label for="s-title">@lang('order_status.Status')</label>
                        <input type="text" class="form-control" id="s-status" placeholder="Search by status code, or name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                <thead>
                    <th>@lang('order_status.Status_Code')</th>
                    <th>@lang('order_status.Status_Name')</th>
                    <th>@lang('order_status.Status_Color')</th>
                    <th>@lang('order_status.Actions')</th>
                </thead>
                <tbody></tbody>
            </table>
        </div><!-- /.card --> 
        
        @include('admin.orders_status.incs._create')

        @include('admin.orders_status.incs._edit')
        

    </div>
</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.order_status.index') }}",
            store_route   : "{{ route('admin.order_status.index') }}",
            show_route    : "{{ url('admin/order-status') }}",
            update_route  : "{{ url('admin/order-status') }}",
            destroy_route : "{{ url('admin/order-status') }}",
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
            fields_list     : ['id', 'status_code', 'status_name_en', 'status_name_ar', 'color'],
            imgs_fields     : []
        },
        [
            { data: 'status_code', name: 'status_code' },
            { data: 'status_name', name: 'status_name' },
            { data: 'status_color', name: 'status_color' },
            { data: 'actions', name: 'actions' },
        ],

        function (d) {
            if ($('#s-status').length)
            d.status = $('#s-status').val();              
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('status_code') === '') {
            is_valide = false;
            let err_msg = '@lang("order_status.status_code_is_required")';
            $(`#${prefix}status_codeErr`).text(err_msg);
            $(`#${prefix}status_codeErr`).slideDown(500);
        }

        if (data.get('status_name_ar') === '') {
            is_valide = false;
            let err_msg = '@lang("order_status.status_name_in_arabic_is_required")';
            $(`#${prefix}status_name_arErr`).text(err_msg);
            $(`#${prefix}status_name_arErr`).slideDown(500);
        }

        if (data.get('status_name_en') === '') {
            is_valide = false;
            let err_msg = '@lang("order_status.status_name_is_required")';
            $(`#${prefix}status_name_enErr`).text(err_msg);
            $(`#${prefix}status_name_enErr`).slideDown(500);
        }

        return is_valide;
    };

    $('#dataTable').on('change', '.c-activation-btn', function () {
        let target_id = $(this).data('user-target');
        
        axios.post(`{{url('admin/taxes')}}/${target_id}?activate_taxe=true`, {
            _token : "{{ csrf_token() }}",
            _method : 'PUT',
            activate_customer : true
        }).then(res => {
            if (!res.data.success) {
                $(this).prop('checked', !$(this).prop('checked'));
                $('#dangerAlert').text('Something went rong !! Please refresh your page').slideDown(500);

                setTimeout(() => {
                    $('#dangerAlert').text('').slideUp(500);
                }, 3000);
            }
        })// axios
    })

    $('#is_main').change(function () {
        let target = $(this).data('target');
        if ($(this).val() === '1') {
            $(target).attr('disabled', 'disabled');
        } else {
            $(target).attr('disabled', '');
            $(target).removeAttr('disabled');
        }
    });
 
});
</script>
@endpush