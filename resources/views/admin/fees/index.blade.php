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
                    <h1 class="m-0">@lang('fees.fees')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('fees.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('fees.fees')
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
                    <h5>@lang('fees.Fees_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('fees_add'))
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
                        <label for="s-title">@lang('fees.Title')</label>
                        <input type="text" class="form-control" id="s-title">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                <thead>
                    <th>#</th>
                    <th>@lang('fees.Title')</th>
                    <th>@lang('fees.Cost')</th>
                    <th>@lang('fees.Cost_Type')</th>
                    <th>@lang('fees.System')</th>
                    <th>@lang('fees.Active')</th>
                    <th>@lang('fees.Actions')</th>
                </thead>
                <tbody></tbody>
            </table>
        </div><!-- /.card --> 
        
        @include('admin.fees.incs._create')

        @include('admin.fees.incs._edit')
        

    </div>
</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.fees.index') }}",
            store_route   : "{{ route('admin.fees.store') }}",
            show_route    : "{{ url('admin/fees') }}",
            update_route  : "{{ url('admin/fees') }}",
            destroy_route : "{{ url('admin/fees') }}",
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
            fields_list     : ['id', 'title', 'description', 'cost', 'cost_type', 'is_fixed', 'is_active'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'cost', name: 'cost' },
            { data: 'cost_type', name: 'cost_type' },
            { data: 'is_fixed', name: 'is_fixed' },
            { data: 'is_active', name: 'is_active' },
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

        if (data.get('title') === '') {
            is_valide = false;
            let err_msg = '@lang("fees.title_is_required")';
            $(`#${prefix}titleErr`).text(err_msg);
            $(`#${prefix}titleErr`).slideDown(500);
        }

        if (data.get('description') === '') {
            is_valide = false;
            let err_msg = '@lang("fees.description_is_required")';
            $(`#${prefix}descriptionErr`).text(err_msg);
            $(`#${prefix}descriptionErr`).slideDown(500);
        }

        if (data.get('cost_type') === '' || data.get('cost_type') === null) {
            is_valide = false;
            let err_msg = '@lang("fees.cost_type_is_required")';
            $(`#${prefix}cost_typeErr`).text(err_msg);
            $(`#${prefix}cost_typeErr`).slideDown(500);
        }
        
        if (data.get('cost') == 0 || data.get('cost') === '') {
            is_valide = false;
            let err_msg = '@lang("fees.cost is required and can not be zero")';
            $(`#${prefix}costErr`).text(err_msg);
            $(`#${prefix}costErr`).slideDown(500);
        }

        return is_valide;
    };

    $('#dataTable').on('change', '.c-activation-btn', function () {
        let target_id = $(this).data('user-target');
        
        axios.post(`{{url('admin/fees')}}/${target_id}?activate_taxe=true`, {
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