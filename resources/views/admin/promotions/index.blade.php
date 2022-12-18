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
                    <h1 class="m-0">@lang('promotions.Promotions')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('promotions.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('promotions.Promotions')
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
                    <h5>@lang('promotions.Promotions_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('promotions_add'))
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
                        <label for="s-title">@lang('promotions.Title')</label>
                        <input type="text" class="form-control" id="s-title">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <div class="overflow-table">
                <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                    <thead>
                        <th>#</th>
                        <th>@lang('promotions.Title')</th>
                        <th>@lang('promotions.Start_Date')</th>
                        <th>@lang('promotions.End_Date')</th>
                        <th>@lang('promotions.Active')</th>
                        <th>@lang('promotions.Actions')</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div><!-- /.overflow-table -->
        </div><!-- /.card --> 
        
        @include('admin.promotions.incs._create')

        @include('admin.promotions.incs._edit')

        @include('admin.promotions.incs._show')
        

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
            index_route   : "{{ route('admin.promotions.index') }}",
            store_route   : "{{ route('admin.promotions.store') }}",
            show_route    : "{{ url('admin/promotions') }}",
            update_route  : "{{ url('admin/promotions') }}",
            destroy_route : "{{ url('admin/promotions') }}",
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
            fields_list     : ['id', 'title', 'start_date', 'end_date', 'meta', 'products', 'products_meta'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'start_date', name: 'start_date'},
            { data: 'end_date', name : 'end_date'},
            { data: 'active', name: 'active' },
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
            let err_msg = 'title is required';
            $(`#${prefix}titleErr`).text(err_msg);
            $(`#${prefix}titleErr`).slideDown(500);
        }

        if (data.get('start_date') === '') {
            is_valide = false;
            let err_msg = 'start date is required';
            $(`#${prefix}start_dateErr`).text(err_msg);
            $(`#${prefix}start_dateErr`).slideDown(500);
        }

        if (data.get('end_date') === '') {
            is_valide = false;
            let err_msg = 'end date is required';
            $(`#${prefix}end_dateErr`).text(err_msg);
            $(`#${prefix}end_dateErr`).slideDown(500);
        }

        const start_date = new Date(data.get('start_date'));
        const end_date   = new Date(data.get('end_date'));

        if (start_date.getTime() >= end_date.getTime()) {
            is_valide = false;
            let err_msg = 'dates is not valied';
            $(`#${prefix}start_dateErr, #${prefix}end_dateErr`).text(err_msg);
            $(`#${prefix}start_dateErr, #${prefix}end_dateErr`).slideDown(500);
        }

        if (data.get('products') == '' || data.get('products') == '[]') {
            is_valide = false;
            let err_msg = 'products is required';
            $(`#${prefix}productsErr`).text(err_msg);
            $(`#${prefix}productsErr`).slideDown(500);
        }
        
        return is_valide;
    };
    
    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        $('#edit-id').val(data.id);

        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        const products_meta = (JSON.parse(data.meta))['products_meta'];
        EditControllerObject.edit_promotions_update(data.products, products_meta);
    }

    $('#dataTable').on('change', '.c-activation-btn', function () {
        let target_id = $(this).data('user-target');
        
        axios.post(`{{url('admin/promotions')}}/${target_id}`, {
            _token : "{{ csrf_token() }}",
            _method : 'PUT',
            activate_promotion : true
        }).then(res => {
            if (!res.data.success) {
                $(this).prop('checked', !$(this).prop('checked'));
                $('#dangerAlert').text('Something went rong !! Please refresh your page').slideDown(500);

                setTimeout(() => {
                    $('#dangerAlert').text('').slideUp(500);
                }, 3000);
            }
        })// axios
    });
 
    $('#categories, #edit-categories').select2({
        allowClear: true,
        width: '100%',
        placeholder: 'Select categories',
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

});
</script>
@endpush