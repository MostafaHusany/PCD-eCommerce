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
                    <h1 class="m-0">@lang('orders.orders')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('orders.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('orders.orders')
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
                    <h5>@lang('orders.Orders_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>
                    
                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('orders_add'))
                    <div class="toggle-btn btn btn-primary btn-sm" data-current-card="#objectsCard" data-target-card="#createObjectCard">
                        <i class="fas fa-plus"></i>
                    </div>
                    @endif
                </div>
            </div><!-- /.row -->

            <hr/>
            
            <!-- START SEARCH BAR -->
            <div class="row">
                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('orders.Code')</label>
                        <input type="text" class="form-control" id="s-code">
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->

                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('orders.Customer')</label>
                        <input type="text" class="form-control" id="s-name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-3 -->

                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('orders.Phone')</label>
                        <input type="text" class="form-control" id="s-phone">
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->
                
                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('orders.Country')</label>
                        <select type="text" class="form-control" id="s-country">
                            <option value="">-- @lang('orders.all') --</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->

                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('orders.Governorate')</label>
                        <select type="text" class="form-control" id="s-governorate" multiple="multiple">
                            <option value="">-- select category --</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->
                
                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('orders.Payment_status')</label>
                        <select class="form-control" id="s-payment-status">
                            <option value="">-- @lang('orders.all') --</option>
                            <option value="waiting_payment">@lang('orders.waiting_payment')</option>
                            <option value="check_payment_transaction">@lang('orders.check_payment_transaction')</option>
                            <option value="paid">@lang('orders.paid')</option>
                            <option value="refused">@lang('orders.refused')</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->

                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="s-status">@lang('orders.Start_Date')</label>
                        <input type="date" class="form-control" id="s-start_date">
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->

                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="s-status">@lang('orders.End_Date')</label>
                        <input type="date" class="form-control" id="s-end_date">
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->
                
                <div class="col-4">
                    <div class="form-group search-action">
                        <label for="">@lang('orders.Status')</label>
                        <select type="text" class="form-control" id="s-status">
                            <option value="">-- @lang('orders.all') --</option>
                            @foreach(order_status() as $order_status)
                            <option value="{{$order_status->status_code}}">{{$order_status->status_name_en}}</option>
                            @endforeach
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->

            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <div class="overflow-table">
                <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                    <thead>
                        <th>#</th>
                        <th styel="width: 160px !important">@lang('orders.Code')</th>
                        <th>@lang('orders.Customer')</th>
                        <th>@lang('orders.Phone')</th>
                        <th>@lang('orders.Email')</th>
                        <th>@lang('orders.Country')</th>
                        <th>@lang('orders.Government')</th>
                        <th>@lang('orders.Total')</th>
                        <th styel="width: 160px !important">@lang('orders.Date')</th>
                        <th>@lang('orders.Payment')</th>
                        <th>@lang('orders.Status')</th>
                        <th>@lang('orders.Status_Action')</th>
                        <th>@lang('orders.Actions')</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div><!-- /.card --> 
        
        @include('admin.orders.incs._show')
        @include('admin.orders.incs._create')
        @include('admin.orders.incs._edit')
        @include('admin.orders.incs._invoice')


    </div>
</div>
@endsection

@push('page_scripts')
<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    window.objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.orders.index') }}",
            store_route   : "{{ route('admin.orders.store') }}",
            show_route    : "{{ url('admin/orders') }}",
            update_route  : "{{ url('admin/orders') }}",
            destroy_route : "{{ url('admin/orders') }}",
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
            fields_list     : ['id', 'customer', 'products', 'products_quantity', 'upgradable_is_valied', 'shipping', 'shipping_cost', 'is_free_shipping', 'fees'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'customer', name: 'customer' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'country', name: 'country' },
            { data: 'government', name: 'government' },
            { data: 'total', name: 'total' },
            { data: 'created_at', name: 'created_at' },
            { data: 'payment_status', name: 'payment_status' },
            { data: 'status', name: 'status' },
            { data: 'status_action', name: 'status_action' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-code').length)
            d.code = $('#s-code').val(); 
            
            if ($('#s-status').length)
            d.status = $('#s-status').val(); 

            if ($('#s-name').length)
            d.name = $('#s-name').val(); 

            if ($('#s-payment-status').length)
            d.payment_status = $('#s-payment-status').val();  
            
            if ($('#s-phone').length)
            d.phone = $('#s-phone').val();
            
            if ($('#s-start_date').length)
            d.start_date = $('#s-start_date').val();  
            
            if ($('#s-end_date').length)
            d.end_date = $('#s-end_date').val();

            if ($('#s-country').length)
            d.country = $('#s-country').val();      
            
            if ($('#s-governorate').length)
            d.governorate = $('#s-governorate').val();     
        },
        {
            delete_msg : 'Are you sure you want to restore this order '
        }
    );
    
    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);
        // console.log('test', data.get('customer'), data.get('products'), prefix);

        if (data.get('customer') == '' || data.get('customer') == 'null') {
            is_valide = false;
            let err_msg = '@lang("orders.customer_is_required")';
            $(`#${prefix}customerErr`).text(err_msg);
            $(`#${prefix}customerErr`).slideDown(500);
        }

        if (data.get('products') == '' || data.get('products') == '[]') {
            is_valide = false;
            let err_msg = '@lang("orders.products_is_required")';
            $(`#${prefix}productsErr`).text(err_msg);
            $(`#${prefix}productsErr`).slideDown(500);
        }
        
        // if (data.get('upgradable_is_valied') == 'false') {
        //     is_valide = false;
        //     let err_msg = '@lang("orders.upgradable_products_is_not_valied")';
        //     $(`#${prefix}productsErr`).text(err_msg);
        //     $(`#${prefix}productsErr`).slideDown(500);
        // }

        if (data.get('shipping') == '' || data.get('shipping') == 'null') {
            is_valide = false;
            let err_msg = '@lang("orders.shipping_is_required")';
            $(`#${prefix}shippingErr`).text(err_msg);
            $(`#${prefix}shippingErr`).slideDown(500);
        }

        if (data.get('is_free_shipping') == '0' && data.get('shipping_cost') <=0) {
            is_valide = false;
            let err_msg = '@lang("orders.shipping_cost_is_required")';
            $(`#${prefix}shipping_costErr`).text(err_msg);
            $(`#${prefix}shipping_costErr`).slideDown(500);
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        $('#edit-id').val(data.id);
        
        // get customer data
        var customer_option = new Option(`${data.customer['name']}`, data.customer.id, false, true);
        $('#edit-customer').append(customer_option).trigger('change');
        
        const products_quantity = JSON.parse(JSON.stringify(data.products_quantity));
        EditControllerObject.edit_products_update(data.products, products_quantity);
        
        // get fees data
        $('#edit-fees').val('').trigger('change');
        
        // get products meta
        const order_meta = JSON.parse(data.products_meta);
        order_meta.fees.forEach(fee_obj => {
            let tmp = new Option(fee_obj.title, fee_obj.id, false, true);
            // fee_list.push($tmp)
            // console.log(fee_obj);
            $('#edit-fees').append(tmp);
        });
        $('#edit-fees').trigger('change');

        // get shippinf data
        edit_shipping_cost = data.shipping_cost;
        var shipping_option = new Option(data.shipping.title, data.shipping.id, false, true);
        $('#edit-shipping').append(shipping_option).trigger('change');
        $('#edit-shipping_cost').val(data.shipping_cost);
    };

    objects_dynamic_table.showValidationErr = (msgs, prefix = '') => {
        console.log('showValidationErr : ', msgs, prefix);
        if (msgs == 'not_valied_product') {
            window.relode_create_prodcuts_table();
        } else {
            let keys = Object.keys(msgs);
            keys.forEach(key => {
                // for case of sub validation specialy for images !!
                let tmp_key = (key.split('.'))[0];
                $(`#${prefix}${tmp_key}Err`).html(msgs[key]).slideDown(500);
            });
        }
    };

    const index_custome_events =  (function () {
        function start_events () {
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

            $('#customer, #edit-customer').select2({
                // allowClear: true,
                width: '100%',
                placeholder: 'Select customers',
                ajax: {
                    url: '{{ url("admin/customers-search") }}',
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item.name}, email : (${item.email}) , phone : (${item.phone})`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            }).change(function () {
                /** 
                 * Here we will check the 
                 * 
                 * */
                let prefix      = $(this).data('prefix');
                let customer_id = $(this).val();

                if (customer_id !== null) {
                    axios.get(`{{url("admin/customers")}}/${customer_id}?fast_acc=true`)
                    .then(res => {
                        console.log('test :: #customer, #edit-customer ', res.data.data, res.data.data.email, res.data.data.phone, res.data.data.city, res.data.data.address);
                        if (res.data.success) {
                            console.log(res.data);
                            // $(`#${prefix}customer_name`).text(res.data.data.first_name + ' ' + res.data.data.second_name);
                            $(`#${prefix}customer_name`).text(res.data.data.name);
                            $(`#${prefix}customer_email`).text(res.data.data.email);
                            $(`#${prefix}customer_phone`).text(res.data.data.phone);
                            $(`#${prefix}customer_country`).text(res.data.data.country.name);
                            $(`#${prefix}customer_government`).text(res.data.data.government.name);
                            $(`#${prefix}customer_address`).text(res.data.data.address);
                        }
                    });
                } else {
                    $('#customer_name').text('---');
                    $('#customer_email').text('---');
                    $('#customer_phone').text('---');
                    $('#customer_country').text('---');
                    $('#customer_government').text('---');
                    $('#customer_address').text('---');
                }

            });

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
            }).on('click', '.restore-object', function () {
                $('#loddingSpinner').show(500);

                let target_order_id   = $(this).data('object-id');
                let target_order_code = $(this).data('object-name');
                
                let flag = confirm(`Are you sure you want to restor "${target_order_code}"`);
                
                if (flag) {
                    /*
                    axios.post(`{{ url('admin/orders') }}/${target_order_id}`, {
                        _method  : 'DELETE',
                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                        restore_product : true
                    }).then(res => {
                        
                        $('#loddingSpinner').hide(500);
                        
                        if (res.data.success) {
                            objects_dynamic_table.table_object.draw();

                            $('#warningAlert').text('You restored the order successfully').slideDown();
                            setTimeout(() => {
                                $('#warningAlert').text('').slideUp();
                            }, 3000);
                        }// end :: if
                    });
                    */

                    fetch(`{{ url('admin/orders') }}/${target_order_id}`, {
                        method : 'POST',
                        headers : {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            _method  : 'DELETE',
                            '_token' : $('meta[name="csrf-token"]').attr('content'),
                            restore_product : true
                        })
                    })
                    .then(res => res.json()) 
                    .then(res => {
                        // console.log('res.data', res.data);
                        $('#loddingSpinner').hide(500);
                        
                        if (res.success) {
                            objects_dynamic_table.table_object.draw();

                            $('#warningAlert').text('You restored the order successfully').slideDown();
                            setTimeout(() => {
                                $('#warningAlert').text('').slideUp();
                            }, 3000);
                        }// end :: if
                    });

                }// end :: if
            });

            $('#dataTable').on('click', '.change-order-status-btn', function (e) {
                e.preventDefault();
                let order_id    = $(this).data('id');
                let status_code = $(this).data('status');
                
                $('#loddingSpinner').show(500);

                axios.post(`{{ url('admin/orders') }}/${order_id}`, {
                    _token   : "{{ csrf_token() }}",
                    _method  : 'PUT',
                    order_id : order_id,
                    update_status : status_code,
                })
                .then(res => {
                    $('#loddingSpinner').hide(500);
                        
                    if (res.data.success) {
                        objects_dynamic_table.table_object.draw();

                        $('#successAlert').text('You updated the order status successfully').slideDown();
                        setTimeout(() => {
                            $('#successAlert').text('').slideUp();
                        }, 3000);
                    } else {
                        $('#dangerAlert').text('Something went wrong ! please refresh the page or contact the admin.').slideDown();
                        setTimeout(() => {
                            $('#dangerAlert').text('').slideUp();
                        }, 5000);
                    }// end :: if
                });
            })

            

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
            
            get_taxes_ratios();
            // get_fees_ratios();

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
                    $('#products_table_header, #edit-products_table_header').after(products_tax_td);
                    // $('#show-products_table_header').after(products_tax_td);
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
    
    const shipping_object = (function () {

        let events = function () { 
            // clear shipping session
            $('.toggle-btn').click(function () {
                let target_card  = $(this).data('target-card');

                if (target_card === '#createObjectCard') {
                    $('#shipping').val('').trigger('change');
                    $('#shipping_cost').val(0);
                    $('#is_free_shipping').val(0)
                    $('#is_free_shipping_toggle').prop('checked', false);
                    $('#selected_shipping_cost').text('---').css('text-decoartion', '');
                }
            });
        }

        return {
            events : events,
        }
    })();

    shipping_object.events();

});
</script>
@endpush