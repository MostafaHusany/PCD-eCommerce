@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'Order';
@endphp
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
                <h5>{{$object_title}}s Adminstration</h5>
            </div>
            <div class="col-6 text-right">
                
                <div class="relode-btn btn btn-info btn-sm">
                    <i class="relode-btn-icon fas fa-redo"></i>
                    <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                </div>
                
                <div class="toggle-btn btn btn-primary btn-sm" data-current-card="#objectsCard" data-target-card="#createObjectCard">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
        </div><!-- /.row -->

        <hr/>
        
        <!-- START SEARCH BAR -->
        <div class="row">
            <div class="col-2">
                <div class="form-group search-action">
                    <label for="">Code</label>
                    <input type="text" class="form-control" id="s-code">
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
            
            <div class="col-2">
                <div class="form-group search-action">
                    <label for="">Status</label>
                    <select type="text" class="form-control" id="s-status">
                        <option value="">-- select category --</option>
                        <option>مرتجع</option>
                        <option>قيد التجهيز</option>
                        <option>مرحلة الشحن</option>
                        <option>تم الاستلام</option>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col-3 -->

            <div class="col-2">
                <div class="form-group search-action">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="s-name">
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
            
            <div class="col-2">
                <div class="form-group search-action">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="s-email">
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->

            <div class="col-2">
                <div class="form-group search-action">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" id="s-phone">
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->

            <div class="col-2">
                <div class="form-group search-action">
                    <label for="">City</label>
                    <select disabled="disabled" type="text" class="form-control" id="s-city">
                        <option value="">-- select category --</option>
                        <option>city 1</option>
                        <option>city 2</option>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
        </div><!-- /.row --> 
        <!-- END   SEARCH BAR -->

        <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
            <thead>
                <th>#</th>
                <th>Code</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>Status</th>
                <th>Total</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    @include('admin.orders.incs._show')
    @include('admin.orders.incs._create')
    @include('admin.orders.incs._edit')


</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
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
            fields_list     : ['id', 'customer', 'products', 'products_quantity', 'shipping', 'shipping_cost', 'is_free_shipping'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'customer', name: 'customer' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'city', name: 'city' },
            { data: 'status', name: 'status' },
            { data: 'total', name: 'total' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-code').length)
            d.code = $('#s-code').val(); 
            
            if ($('#s-status').length)
            d.status = $('#s-status').val(); 

            if ($('#s-name').length)
            d.name = $('#s-name').val(); 

            if ($('#s-email').length)
            d.email = $('#s-email').val();  
            
            if ($('#s-phone').length)
            d.phone = $('#s-phone').val();
            
            if ($('#s-city').length)
            d.city = $('#s-city').val();                
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
            let err_msg = 'customer is required';
            $(`#${prefix}customerErr`).text(err_msg);
            $(`#${prefix}customerErr`).slideDown(500);
        }

        if (data.get('products') == '' || data.get('products') == '[]') {
            is_valide = false;
            let err_msg = 'products is required';
            $(`#${prefix}productsErr`).text(err_msg);
            $(`#${prefix}productsErr`).slideDown(500);
        }
        
        if (data.get('shipping') == '' || data.get('shipping') == 'null') {
            is_valide = false;
            let err_msg = 'shipping is required';
            $(`#${prefix}shippingErr`).text(err_msg);
            $(`#${prefix}shippingErr`).slideDown(500);
        }

        if (data.get('is_free_shipping') == '0' && data.get('shipping_cost') <=0) {
            is_valide = false;
            let err_msg = 'shipping cost is required';
            $(`#${prefix}shipping_costErr`).text(err_msg);
            $(`#${prefix}shipping_costErr`).slideDown(500);
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        // console.log(data, edit_selected_products);
        // clear ol session
        edit_selected_products = {};
        $('.edit-selected-product-rows').remove();

        const order_meta = JSON.parse(data.products_meta);
        
        // selected 
        const products_quantity = (JSON.parse(data.products_meta))['products_quantity'];
        $('#tmp-products_quantity').val(JSON.stringify(products_quantity));

        var customer_option = new Option(`${data.customer['first_name']} ${data.customer['second_name']}`, data.customer.id, false, true);
        $('#edit-customer').append(customer_option).trigger('change');
        
        $('#edit-products').val('').trigger('change');
        data.products.forEach(target_product => {
            edit_selected_products[target_product.id] = {
                price    : order_meta.products_prices[target_product.id],
                quantity : order_meta.products_quantity[target_product.id].quantity,
            };
            
            let selected_quantity = parseInt(edit_selected_products[target_product.id].quantity) - parseInt(order_meta.restored_quantity[target_product.id]);
            selected_quantity = selected_quantity === 0 ? 1 : selected_quantity;
            // total quantity of the value still in the storage, and the requested of the order_product sumed togather
            const total_quantity = parseInt(target_product.quantity) + selected_quantity;

            let product_tr = `
                <tr class="edit-selected-product-rows edit-selected-product-row-${target_product.id}">
                    <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                    <td>${target_product.ar_name} / ${target_product.en_name}</td>
                    <td>${target_product.sku}</td>
                    <td>${target_product.price}</td>
                    <td>
                        <input style="width: 80px" class="selected_product_price" type="number" value="${edit_selected_products[target_product.id].price}" step="1"
                            id="selected_product_price_${target_product.id}"
                            data-target="${target_product.id}" data-original-price="${target_product.price}" 
                            min="0"/>
                        SR
                    </td>
                    <td id="selected_product_o_quantity_${target_product.id}" data-quantity="${total_quantity}">
                        ${target_product.quantity}
                    </td>
                    <td>
                        <input style="width: 80px" class="selected_product_quantity" type="number" value="${selected_quantity}" step="1"
                            id="selected_product_quantity_${target_product.id}" 
                            data-target="${target_product.id}" data-max="${total_quantity}"
                            min="1" max="${total_quantity}" />
                    </td>
                    <td id="selected_product_td_sub_total_${target_product.id}">
                        ${parseFloat(edit_selected_products[target_product.id].price * edit_selected_products[target_product.id].quantity).toFixed(2)} SR
                    </td>
                    <td>
                        <button class="remove_selected_item btn btn-sm btn-danger"
                            data-target="${target_product.id}"
                        >
                            <i class="fas fa-minus-circle"></i>
                        </button>
                    </td>
                </tr>
            `; 

            $('#edit-selected_product_table').prepend(product_tr);
        });

        $('#edit-id').val(data.id);
        $('#edit-products_quantity').val(JSON.stringify(edit_selected_products));
        $('#edit-products').val(JSON.stringify(Object.keys(edit_selected_products)));

        edit_shipping_cost = data.shipping_cost;
        var shipping_option = new Option(data.shipping.title, data.shipping.id, false, true);
        $('#edit-shipping').append(shipping_option).trigger('change');
        $('#edit-shipping_cost').val(data.shipping_cost);
        // edit_shipping_cost

    }

    const index_custome_events =  (function () {
        function start_events () {
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
                                    text: `${item.first_name} ${item.second_name} , email : (${item.email}) , phone : (${item.phone})`,
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
                            $(`#${prefix}customer_name`).text(res.data.data.first_name + ' ' + res.data.data.second_name);
                            $(`#${prefix}customer_email`).text(res.data.data.email);
                            $(`#${prefix}customer_phone`).text(res.data.data.phone);
                            $(`#${prefix}customer_city`).text(res.data.data.city);
                            $(`#${prefix}customer_address`).text(res.data.data.address);
                        }
                    });
                } else {
                    $('#customer_name').text('---');
                    $('#customer_email').text('---');
                    $('#customer_phone').text('---');
                    $('#customer_city').text('---');
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
                console.log('test restore');
                $('#loddingSpinner').show(500);

                let target_order_id   = $(this).data('object-id');
                let target_order_code = $(this).data('object-name');
                
                let flag = confirm(`Are you sure you want to restor "${target_order_code}"`);
                
                if (flag) {
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
                }// end :: if
            });

            // make selected fee free
            $('#fees_list_table_container').on('change', '.c-activation-btn', function () {
                let target_fee_id = $(this).data('target');
                console.log('fee id : ', target_fee_id);
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
            
            get_taxes_ratios();
            get_fees_ratios();

        }

        function get_fees_ratios () {
            /**
             * Get taxes value from the server, and set a tax global variable.
             */
            window.fees_ration = [];

            axios.get("{{ url('admin/fees') }}/0", { params: { get_all_fees: true }})
            .then(res => {
                if (res.data.success) {
                    window.fees_ration = res.data.data;
                    // products_column_header
                    console.log('fee list : ', fees_ration);
                    let products_fee_td = '';
                    let fee_info_table_td = '';
                    fees_ration.forEach(fee_obj => {
                        /**
                            # Add tax column to products table
                        */
                        products_fee_td += fee_obj.cost_type === 1 ? `
                            <td>${fee_obj.title}</td>
                        ` : '';

                        fee_info_table_td += `
                        <tr>
                            <td>${fee_obj.title}</td>
                            <td>${fee_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                            <td>${fee_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                            <td>${fee_obj.cost}</td>
                            <td id="fee-total-cost-type-${fee_obj.id}">---</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input class="c-activation-btn custom-control-input" id="customSwitch${fee_obj.id}" data-target="${fee_obj.id}" type="checkbox" checked="true">
                                    <label class="custom-control-label" for="customSwitch${fee_obj.id}"></label>
                                </div>
                            </td>
                        </tr>
                        `;
                    });
                    $('#products_table_header').after(products_fee_td);
                    $('#fees_list_table_container').append(fee_info_table_td);
                }
            });
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
                    });
                    $('#products_table_header').after(products_tax_td);
                    $('#taxes_list_table_container').append(tax_info_table_td);
                }
            });
        }

        
        
        return {
            start_events : start_events
        }
    })();

    index_custome_events.start_events();
    
    let edit_shipping_cost = null;// a global variable to show order shipping cost value in edit form 
    const shipping_object = (function () {
        /**
         * #shipping select2 field to find targted shipping system
         * #shipping_cost number field to edit the shipping field
         * #is_free_shipping_toggle the checkbox field where we can activate/disabled free shipping
         * #is_free_shipping the hidden field where we store the real value of the is_free_shipping value
         * #selected_shipping_cost an span where we show the cost of the shipping
         */

        let events = function () {
            $('#shipping, #edit-shipping').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select Shipping',
                ajax: {
                    url: '{{ url("admin/shipping-search") }}',
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item.title}`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            }).change(function () {
                let prefix      = $(this).data('prefix');
                let shipping_id = $(this).val();

                if (shipping_id !== null || shipping_id === '') {
                    $('#createOrderLoddingSpinner').show();

                    axios.get(`{{url("admin/shipping")}}/${shipping_id}?fast_acc=true`)
                    .then(res => {
                        $('#createOrderLoddingSpinner').hide();
                        const target_shipping = res.data.data;
                        target_shipping.cost  = edit_shipping_cost != null ? edit_shipping_cost : target_shipping.cost;
                        set_shipping_fields(prefix, target_shipping);
                        edit_shipping_cost = null;
                    });
                } else {
                    set_shipping_fields(prefix);
                }
                
                // reset is_free_shipping
            });

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

            $('#is_free_shipping_toggle, #edit-is_free_shipping_toggle').on('change', function () {
                /**
                 * When the user check free_shipping ...
                 * we set the shipping cost to zero, and disable shipping_cost
                 * 
                 * If the user didn't select shipping show the user an error message 
                 */
                let prefix           = $(this).data('prefix');
                let shipping_val     = $(`#${prefix}shipping`).val();
                
                console.log(shipping_val, $(this).prop('checked'), $(this).val());

                if (shipping_val != '' && shipping_val != null) {
                    let is_free_shipping = $(this).prop('checked');
                    
                    if (is_free_shipping) {
                        $(`#${prefix}shipping_cost`).val(0).attr('disabled', 'disabled');
                        $(`#${prefix}selected_shipping_cost`).css('text-decoration', 'line-through');
                        $(`#${prefix}is_free_shipping`).val(1);
                    } else {
                        let shipping_cost    = $(`#${prefix}selected_shipping_cost`).data('cost');
                        $(`#${prefix}shipping_cost`).val(shipping_cost).removeAttr('disabled');
                        $(`#${prefix}selected_shipping_cost`).text(shipping_cost);                
                        $(`#${prefix}selected_shipping_cost`).css('text-decoration', '');
                        $(`#${prefix}is_free_shipping`).val(0);
                    }
                } else {
                    $(this).prop('checked', false);
                    $(`#${prefix}is_free_shipping`).val(0);
                    $(`#${prefix}shippingErr`).text('please select shipping').slideDown();
                    setTimeout(() => {
                        $(`#${prefix}shippingErr`).text('').slideUp();
                    }, 3000);
                }
            });

            $('#shipping_cost, #edit-shipping_cost').on('keyup change', function () {
                let prefix          = $(this).data('prefix');
                const shipping_cost = $(this).val();
                const selected_shipping_cost = $(`#${prefix}selected_shipping_cost`).data('cost');
                
                if (shipping_cost < selected_shipping_cost) {
                    $(this).css('color', 'red');
                } else {
                    $(this).css('color', '');
                }

                $(`#${prefix}selected_shipping_cost`).text(shipping_cost);                
            });
        }

        // start helper functions
        function set_shipping_fields (prefix = '', shipping = {
            id : '',
            cost : 0,
            cost_type : ''
        }) {
            
            
            $(`#${prefix}is_free_shipping`).val(0);
            $(`#${prefix}is_free_shipping_toggle`).prop('checked', false);

            $(`#${prefix}shipping`).val(shipping.id);
            $(`#${prefix}shipping_cost`).val(shipping.cost).removeAttr('disabled');

            $(`#${prefix}selected_shipping_cost`).text(shipping.cost)
                .data('cost', shipping.cost)
                .data('cost-type', shipping.cost_type)
                .data('is_free_shipping', false)
                .css('text-decoration', '');

        }

        return {
            events : events,
            edit_shipping_cost
        }
    })();

    shipping_object.events();

});
</script>
@endpush