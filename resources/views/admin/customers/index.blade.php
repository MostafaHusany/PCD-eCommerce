@extends('layouts.admin.app')

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

@push('page_css')
    <link rel="stylesheet" href="{{ asset('plugins/telphone_code/css/intlTelInput.min.css') }}">

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
                    <h1 class="m-0">@lang('customers.Customers')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('customers.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('customers.Customers')
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
                    <h5>@lang('customers.Customers_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('customers_add'))
                    <div class="toggle-btn btn btn-primary btn-sm" data-current-card="#objectsCard" data-target-card="#createObjectCard">
                        <i class="fas fa-plus"></i>
                    </div>
                    @endif
                </div>
            </div><!-- /.row -->

            <hr/>
            
            <!-- START SEARCH BAR -->
            <div class="row">
                <div class="col-2">
                    <div class="form-group search-action">
                        <label for="">@lang('customers.Name')</label>
                        <input type="text" class="form-control" id="s-name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->
                
                <div class="col-2">
                    <div class="form-group search-action">
                        <label for="">@lang('customers.Email')</label>
                        <input type="text" class="form-control" id="s-email">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->

                
                <div class="col-2">
                    <div class="form-group search-action">
                        <label for="">@lang('customers.Phone')</label>
                        <input type="text" class="form-control" id="s-phone">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->

                <div class="col-2">
                    <div class="form-group search-action">
                        <label for="">@lang('customers.Country')</label>
                        <select type="text" class="form-control" id="s-country">
                            <option value="">-- @lang('customers.select_country') --</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-2 -->

                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('customers.Governorate')</label>
                        <select type="text" class="form-control" id="s-governorate" multiple="multiple">
                            <option value="">-- @lang('customers.select_governorate') --</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->

            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                <thead>
                    <th>#</th>
                    <th>@lang('customers.Name')</th>
                    <th>@lang('customers.Email')</th>
                    <th>@lang('customers.Phone')</th>
                    <th>@lang('customers.Country')</th>
                    <th>@lang('customers.Government')</th>
                    <th>@lang('customers.Active')</th>
                    <th>@lang('customers.Actions')</th>
                </thead>
                <tbody></tbody>
            </table>
        </div><!-- /.card --> 
        
        @include('admin.customers.incs._create')

        @include('admin.customers.incs._edit')

        @include('admin.customers.incs._show')
        

    </div>
</div>
@endsection

@push('page_scripts')
<script src="{{ asset('plugins/telphone_code/js/intlTelInput-jquery.min.js') }}"></script>

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.customers.index') }}",
            store_route   : "{{ route('admin.customers.store') }}",
            show_route    : "{{ url('admin/customers') }}",
            update_route  : "{{ url('admin/customers') }}",
            destroy_route : "{{ url('admin/customers') }}",
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
            fields_list     : ['id', 'name', 'email', 'phone', 'address', 'password', 'country_id', 'gove_id', 'phone_code'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'country', name: 'country' },
            { data: 'government', name: 'government' },
            { data: 'active', name: 'active' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-name').length)
            d.name = $('#s-name').val(); 

            if ($('#s-email').length)
            d.email = $('#s-email').val();  
            
            if ($('#s-phone').length)
            d.phone = $('#s-phone').val();
            
            if ($('#s-country').length)
            d.country = $('#s-country').val();      
            
            if ($('#s-governorate').length)
            d.governorate = $('#s-governorate').val();                
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('name') === '') {
            is_valide = false;
            let err_msg = '@lang("customers.name_is_required")';
            $(`#${prefix}nameErr`).text(err_msg);
            $(`#${prefix}nameErr`).slideDown(500);
        }

        if (data.get('email') === '') {
            // is_valide = false;
            // let err_msg = 'email is required';
            // $(`#${prefix}emailErr`).text(err_msg);
            // $(`#${prefix}emailErr`).slideDown(500);
            // data.delete('email')
        }

        if (data.get('phone') === '') {
            is_valide = false;
            let err_msg = '@lang("customers.phone_is_required")';
            $(`#${prefix}phoneErr`).text(err_msg);
            $(`#${prefix}phoneErr`).slideDown(500);
        }

        if (data.get('country_id') === '') {
            is_valide = false;
            let err_msg = '@lang("customers.country_is_required")';
            $(`#${prefix}country_idErr`).text(err_msg);
            $(`#${prefix}country_idErr`).slideDown(500);
        }

        if (data.get('gove_id') === '') {
            is_valide = false;
            let err_msg = '@lang("customers.governorate_is_required")';
            $(`#${prefix}gove_idErr`).text(err_msg);
            $(`#${prefix}gove_idErr`).slideDown(500);
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        if (data.government) {
            let option = `<option selected="selected" class="sub-district" value="${data.government.id}">${data.government.name}</option>`;
            $(`#edit-gove_id`).append(option);
        }
        
    }

    const index_custome_events =  (function () {
        function start_events () {
            $('#dataTable').on('change', '.c-activation-btn', function () {
                let target_id = $(this).data('user-target');
                
                axios.post(`{{url('admin/customers')}}/${target_id}`, {
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
            })// end :: #dataTable

            $('#country_id, #edit-country_id').change(function () {
                /** 
                 * Here we will check the 
                 * 
                 * */
                // clear olde session ..
                $('.sub-district').remove();
                
                let prefix      = $(this).data('prefix');
                let country_id  = $(this).val();
                let phone_code  = $(this).find(':selected').data('code');
                $(`#${prefix}phone_code`).val(phone_code);

                if (country_id) {
                    $('#loddingSpinner').show(500);

                    axios.get("{{url('admin/districts-search')}}", {
                        params : {
                            q : '',
                            district_id : country_id
                        }
                    }).then(res => {
                        if (res.data) {
                            res.data.forEach(district => {
                                let option = `<option class="sub-district" value="${district.id}">${district.name}</option>`;
                                $(`#${prefix}gove_id`).append(option);
                            });
                        } else {
                            $('#dangerAlert').text('Something went wrong! Please refresh the page.').slideDown(500);
                            setTimeout(() => {
                                $('#dangerAlert').slideUp(500).text('');
                            }, 3000);
                        }

                        $('#loddingSpinner').hide(500);
                    });
                }// end :: if
            });

            $('#s-country').change(function () {
                window.district_id = $(this).val();
            });

            $('#s-governorate').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select brand',
                ajax: {
                    url: `{{ url("admin/districts-search") }}`,
                    dataType: 'json',
                    delay: 150,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page_limit: 10,
                            district_id : window.district_id
                        };
                    },
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            // Load taxes ratio
            /**
             * When the user press the create btn, send a request to the server
             * and ask the server for the latest tax ratios
             * the ratio will be stored in global variable
             * than every time the user request new product in the order astimate the tax on all
             * products, and show the tax value for each product, and total
             * 
             * get_taxes_ratios is a function that gets taxes data from the server and reset the
             * taxe_ration global variable
             */
            // get_taxes_ratios();
        }

        function get_taxes_ratios () {
            /**
             * Get taxes value from the server, and set a tax global variable.
             */
            window.tax_ration = [];

            axios.get("{{ url('admin/taxes') }}/0", { params: { get_all_taxe: true }})
            .then(res => {
                if (res.data.success) {
                    window.tax_ration = res.data.data;
                    // products_column_header
                    let products_tax_td = '';
                    let tax_info_table_td = '';
                    let edit_tax_info_table_td = '';
                    tax_ration.forEach(tax_obj => {
                        /**
                            # Add tax column to products table
                        */
                        products_tax_td += tax_obj.cost_type === 1 ? `
                            <td>${tax_obj.title}</td>
                        ` : '';

                        tax_info_table_td += `
                        <tr>
                            <td>${tax_obj.title}</td>
                            <td>${tax_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                            <td>${tax_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                            <td>${tax_obj.cost}</td>
                            <td id="total-cost-type-${tax_obj.id}">---</td>
                        </tr>
                        `;

                        edit_tax_info_table_td += `
                        <tr>
                            <td>${tax_obj.title}</td>
                            <td>${tax_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                            <td>${tax_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                            <td>${tax_obj.cost}</td>
                            <td id="edit-total-cost-type-${tax_obj.id}">---</td>
                        </tr>
                        `;
                    });
                    $('#products_table_header, #edit-products_table_header, #show-products_table_header').after(products_tax_td);
                    $('#taxes_list_table_container').append(tax_info_table_td);
                    $('#edit-taxes_list_table_container').append(edit_tax_info_table_td);
                }
            });
        }
    
        return {
            start_events : start_events
        }
    })();

    index_custome_events.start_events();
 
});
</script>
@endpush