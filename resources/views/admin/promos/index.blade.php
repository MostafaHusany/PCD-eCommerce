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
    $object_title = 'Promo Cods';
@endphp
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('promos.Promo_Cods')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('promos.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('promos.Promo_Cods')
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
                    <h5>@lang('promos.Promos_Codes_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('promo_add'))
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
                        <label for="s-title">@lang('promos.Code')</label>
                        <input type="text" class="form-control" id="s-title">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
                
                <div class="col-6">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('promos.Owner')</label>
                        <select type="text" class="form-control" id="s-owner"></select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <div class="overflow-table">
                <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                    <thead>
                        <th>#</th>
                        <th>@lang('promos.Code')</th>
                        <th>@lang('promos.Type')</th>
                        <th>@lang('promos.Value')</th>
                        <th>@lang('promos.Owner')</th>
                        <th>@lang('promos.Nom_Orders')</th>
                        <th>@lang('promos.Active')</th>
                        <th>@lang('promos.Actions')</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div><!-- /.overflow-table -->
        </div><!-- /.card --> 
        
        @include('admin.promos.incs._create')

        @include('admin.promos.incs._edit')
        

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
            index_route   : "{{ route('admin.promo.index') }}",
            store_route   : "{{ route('admin.promo.store') }}",
            show_route    : "{{ url('admin/promo-codes') }}",
            update_route  : "{{ url('admin/promo-codes') }}",
            destroy_route : "{{ url('admin/promo-codes') }}",
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
            fields_list     : ['id', 'code', 'owner', 'type', 'value', 'is_random'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'type', name: 'type' },
            { data: 'value', name : 'value'},
            { data: 'owner', name: 'owner' },
            { data: 'orders_count', name: 'orders_count' },
            { data: 'active', name: 'active' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-title').length)
            d.title = $('#s-title').val();   
            
            
            if ($('#s-owner').length)
            d.owner = $('#s-owner').val();   
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('is_random') == 'false' && data.get('code') == '') {
            is_valide = false;
            let err_msg = '@lang("promos.code_is_required")';
            $(`#${prefix}codeErr`).text(err_msg);
            $(`#${prefix}codeErr`).slideDown(500);
        }

        if (data.get('type') === '') {
            is_valide = false;
            let err_msg = '@lang("promos.type_is_required")';
            $(`#${prefix}typeErr`).text(err_msg);
            $(`#${prefix}typeErr`).slideDown(500);
        }
        
        if (data.get('value') == 0 || data.get('value') === '') {
            is_valide = false;
            let err_msg = '@lang("promos.value_is_required_and_cant_be_zero")';
            $(`#${prefix}valueErr`).text(err_msg);
            $(`#${prefix}valueErr`).slideDown(500);
        }

        if (data.get('owner') == 'null') {
            data.delete('owner');
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        // get customer data
        if (data.user) {
            var owner_option = new Option(`${data.user['name']} , email : (${data.user.email}) , phone : (${data.user.phone})`, data.user.id, false, true);
            $('#edit-owner').append(owner_option).trigger('change');
        }
    }

    const index_custome_events =  (function () {
        function start_event () {
            $('#owner, #edit-owner, #s-owner').select2({
                allowClear: true,
                width: '100%',
                placeholder: '@lang("promos.Select_User")',
                ajax: {
                    url: '{{ url("admin/users-search") }}',
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item.name} , email : (${item.email}) , phone : (${item.phone})`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#dataTable').on('change', '.c-activation-btn', function () {
                let target_id = $(this).data('object-target');
                
                axios.post(`{{url('admin/promo-codes')}}/${target_id}`, {
                    _token : "{{ csrf_token() }}",
                    _method : 'PUT',
                    activate_promo : true
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
                placeholder: '@lang("promos.Select_categories")',
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
        }

        start_event();

        return {};
    })();

});
</script>
@endpush