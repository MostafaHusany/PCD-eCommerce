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
                <div class="toggle-btn btn btn-primary btn-sm" data-current-card="#objectsCard" data-target-card="#createObjectCard">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
        </div><!-- /.row -->

        <hr/>
        
        <!-- START SEARCH BAR -->
        <div class="row">
            <div class="col-3">
                <div class="form-group search-action">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="s-name">
                </div><!-- /.form-group -->
            </div><!-- /.col-3 -->
            
            <div class="col-3">
                <div class="form-group search-action">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="s-email">
                </div><!-- /.form-group -->
            </div><!-- /.col-3 -->

            <div class="col-3">
                <div class="form-group search-action">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" id="s-phone">
                </div><!-- /.form-group -->
            </div><!-- /.col-3 -->

            <div class="col-3">
                <div class="form-group search-action">
                    <label for="">City</label>
                    <select type="text" class="form-control" id="s-city">
                        <option value="">-- select category --</option>
                        <option>city 1</option>
                        <option>city 2</option>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col-3 -->
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

    {{--
    @include('admin.orders.incs._edit')
    --}}
    

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
            fields_list     : ['id', 'customer', 'products', 'products_quantity'],
            // fields_list     : [],
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
            // if ($('#s-name').length)
            // d.name = $('#s-name').val(); 

            // if ($('#s-email').length)
            // d.email = $('#s-email').val();  
            
            // if ($('#s-phone').length)
            // d.phone = $('#s-phone').val();
            
            // if ($('#s-city').length)
            // d.city = $('#s-city').val();                
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
        console.log('test', data.get('customer'), data.get('products'), prefix);
        if (data.get('customer') == '' || data.get('customer') == 'null') {
            is_valide = false;
            let err_msg = 'customer is required';
            $(`#${prefix}customerErr`).text(err_msg);
            $(`#${prefix}customerErr`).slideDown(500);
        }

        if (data.get('products') == '') {
            is_valide = false;
            let err_msg = 'products is required';
            $(`#${prefix}productsErr`).text(err_msg);
            $(`#${prefix}productsErr`).slideDown(500);
        }

        return is_valide;
    };
    

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {

        // selected 
        const products_quantity = (JSON.parse(data.products_meta))['products_quantity'];
        $('#tmp-products_quantity').val(JSON.stringify(products_quantity));

        var customer_option = new Option(`${data.customer['first_name']} ${data.customer['second_name']}`, data.customer.id, false, true);
        $('#edit-customer').append(customer_option).trigger('change');
        
        $('#edit-products').val('').trigger('change');
        data.products.forEach(product => {
            console.log(product);
            const template_tr = `
                <tr class="edit-selected_product_tr" id="edit-selected_product_tr_${product.id}">
                    <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                    <td>${product.ar_name} / ${product.en_name}</td>
                    <td>${product.sku}</td>
                    <td>${product.price}</td>
                    <td>${product.pivot.price_when_order} SR</td>
                    <td>
                        <button class="btn btn-sm btn-danger"></button>
                    </td>
                </tr>
            `;

            $('#edit-old_selected_product_table').prepend(template_tr)
        //     var product_option = new Option(`${product.ar_name} / ${product.en_name} , quantity : (${product.quantity})`, product.id, false, true);
        //     $('#edit-products').append(product_option).trigger('change');
        });

        $('#edit-id').val(data.id);
    }


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
    })

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
        let prefix = $(this).data('prefix');
        let customer_id = $(this).val();

        if (customer_id !== null) {
            axios.get(`{{url("admin/customers")}}/${customer_id}?fast_acc=true`)
            .then(res => {
                console.log(res.data.data, res.data.data.email, res.data.data.phone, res.data.data.city, res.data.data.address);
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
 
});
</script>
@endpush