@extends('layouts.admin.app')


@push('page_css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/input_img_privew/jpreview.css') }}">
@endpush

@section('content')
@php 
    $object_title = 'Product';
@endphp

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$object_title}}s</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin') }}">Dashboard</a>
                    </li>
                    
                    <li class="breadcrumb-item active">
                        {{$object_title}}s
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
            <div class="col-3">
                <div class="form-group search-action">
                    <label for="s-title">Name</label>
                    <input type="text" class="form-control" id="s-name">
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
            
            <div class="col-3">
                <div class="form-group search-action">
                    <label for="s-title">SKU</label>
                    <input type="text" class="form-control" id="s-sku">
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
            
            <div class="col-2">
                <div class="form-group search-action">
                    <label for="s-title">Category</label>
                    <select class="form-control" id="s-category"></select>
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
            
            <div class="col-2">
                <div class="form-group search-action">
                    <label for="s-title">Type</label>
                    <select class="form-control" id="s-type">
                        <option value="">-- select product type --</option>
                        <option value="0">usual</option>
                        <option value="1">composite</option>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
            
            <div class="col-2">
                <div class="form-group search-action">
                    <label for="s-active">Active</label>
                    <select class="form-control" id="s-active">
                        <option value="">-- select product type --</option>
                        <option value="1">Active</option>
                        <option value="0">De-Active</option>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col-2 -->
        </div><!-- /.row --> 
        <!-- END   SEARCH BAR -->

        <table style="font-size: 14px !important" id="dataTable" class="table table-sm table-bordered">
            <thead>
                <th>#</th>
                <th>Image</th>
                <th style="width: 80px">Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Sale Price</th>
                <th>Categories</th>
                <th>Quantity</th>
                <th>R-Quantity</th>
                <th>Active</th>
                <th>Type</th>
                <th>Action</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    
    @include('admin.products.incs._create')
    @include('admin.products.incs._edit')
    @include('admin.products.incs._show')

    {{--
    @include('admin.products.incs._composite_product_upgrade_option')
    --}}

</div>
@endsection

@push('page_scripts')

<script src="{{ asset('plugins/input_img_privew/jpreview.js') }}"></script>

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.products.index') }}",
            store_route   : "{{ route('admin.products.store') }}",
            show_route    : "{{ url('admin/products') }}",
            update_route  : "{{ url('admin/products') }}",
            destroy_route : "{{ url('admin/products') }}",
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
            fields_list     : ['id', 'ar_name', 'ar_small_description', 'ar_description',
                               'en_name', 'en_small_description', 'en_description', 'sku', 'categories',
                               'quantity', 'main_image', 'images', 'price', 'price_after_sale', 'reserved_quantity',
                                'is_active', 'is_composite', 'child_products', 'child_products_quantity',
                                'custome_attr_id', 'custome_field_attr', 'brand_id'],
            imgs_fields     : ['main_image', 'images']
        },
        [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'name', name: 'name' },
            { data: 'sku', name: 'sku' },
            { data: 'price',    name: 'price' },
            { data: 'price_after_sale',    name: 'price_after_sale' },
            { data: 'categories', name: 'categories' },
            { data: 'quantity', name: 'quantity' },
            { data: 'reserved_quantity', name: 'reserved_quantity' },
            { data: 'active', name: 'active' },
            { data: 'is_composite', name: 'is_composite' },
            { data: 'actions' , name: 'actions' },
        ],
        function (d) {
            if ($('#s-name').length)
            d.name = $('#s-name').val();    
            
            if ($('#s-sku').length)
            d.sku = $('#s-sku').val();    
            
            if ($('#s-category').length)
            d.category = $('#s-category').val();    
            
            if ($('#s-type').length)
            d.type = $('#s-type').val();   

            if ($('#s-active').length)
            d.active = $('#s-active').val();              
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('ar_name') === '') {
            is_valide = false;
            let err_msg = 'arabic name is required';
            $(`#${prefix}ar_nameErr`).text(err_msg);
            $(`#${prefix}ar_nameErr`).slideDown(500);
        }

        if (data.get('ar_small_description') === '') {
            is_valide = false;
            let err_msg = 'arabic short description is required';
            $(`#${prefix}ar_small_descriptionErr`).text(err_msg);
            $(`#${prefix}ar_small_descriptionErr`).slideDown(500);
        }

        if (data.get('ar_description') === '') {
            is_valide = false;
            let err_msg = 'arabic description is required';
            $(`#${prefix}ar_descriptionErr`).text(err_msg);
            $(`#${prefix}ar_descriptionErr`).slideDown(500);
        }

        if (data.get('en_name') === '') {
            is_valide = false;
            let err_msg = 'english name is required';
            $(`#${prefix}en_nameErr`).text(err_msg);
            $(`#${prefix}en_nameErr`).slideDown(500);
        }

        if (data.get('en_small_description') === '') {
            is_valide = false;
            let err_msg = 'english short description is required';
            $(`#${prefix}en_small_descriptionErr`).text(err_msg);
            $(`#${prefix}en_small_descriptionErr`).slideDown(500);
        }

        if (data.get('en_description') === '') {
            is_valide = false;
            let err_msg = 'english description is required';
            $(`#${prefix}en_descriptionErr`).text(err_msg);
            $(`#${prefix}en_descriptionErr`).slideDown(500);
        }

        if (data.get('is_composite') !== '1' && (data.get('quantity') === '' || data.get('quantity') < 0)) {
            is_valide = false;
            let err_msg = 'quantity is required';
            $(`#${prefix}quantityErr`).text(err_msg);
            $(`#${prefix}quantityErr`).slideDown(500);
        }
        
        if (data.get('sku') === '') {
            is_valide = false;
            let err_msg = 'sku is required';
            $(`#${prefix}skuErr`).text(err_msg);
            $(`#${prefix}skuErr`).slideDown(500);
        }
        
        if (prefix === '' && data.get('main_image') === '') {
            is_valide = false;
            let err_msg = 'main image is required';
            $(`#${prefix}main_imageErr`).text(err_msg);
            $(`#${prefix}main_imageErr`).slideDown(500);
        }

        if (data.get('price') === '' || data.get('price') <= '0') {
            is_valide = false;
            let err_msg = 'price is required';
            $(`#${prefix}priceErr`).text(err_msg);
            $(`#${prefix}priceErr`).slideDown(500);
        }

        if (data.get('price_after_sale') < 0) {
            is_valide = false;
            let err_msg = 'price after sale can\'t be negative';
            $(`#${prefix}price_after_saleErr`).text(err_msg);
            $(`#${prefix}price_after_saleErr`).slideDown(500);
        }

        if (data.get('is_composite') === '1' && data.get('reserved_quantity') <= 0) {
            is_valide = false;
            let err_msg = 'reserved quantity can\'t be zero';
            $(`#${prefix}reserved_quantityErr`).text(err_msg);
            $(`#${prefix}reserved_quantityErr`).slideDown(500);
        }

        if (data.get('is_composite') === '1' && (data.get('child_products') === '[]' || data.get('child_products') === '')) {
            is_valide = false;
            $(`#${prefix}find_child_productsErr`).text('You need to select child product').slideDown(500);    
        }

        if (data.get('is_composite') === '1' && (data.get('child_products_quantity') === '{}' || data.get('child_products') === '')) {
            is_valide = false;
            $(`#${prefix}find_child_productsErr`).text('You need to select child product').slideDown(500);    
        }

        if (data.get('brand_id') == 'null') {
            data.delete('brand_id');
        }
       
        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        console.log(data, fields_id_list);
        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        if (data.is_composite) {
            $(`#${prefix}reserved_quantity`).val(data['quantity']);
        }
        
        if (data.brand != null) {
            var brand_option = new Option(`${data.brand['ar_title']} || ${data.brand['en_title']}`, data.brand.id, true, true);
            $('#edit-brand_id').append(brand_option);
        }
        

        data.categories.forEach(category => {
            var category_option = new Option(`${category['ar_title']} || ${category['en_title']}`, category.id, true, true);
            $('#edit-categories').append(category_option)
        });
        $('#edit-categories').trigger('change');


        // $('#child_products').val()

        $('#demo-3-container .jpreview-image, #demo-4-container .jpreview-image').remove()
        let main_image = `<div class="jpreview-image" style="background-image: url({{url('/')}}/${data.main_image})"></div>`;
        $('#demo-3-container').append(main_image);

        // console.log(JSON.parse(data.images));
        let images = data.images != null ? JSON.parse(data.images) : [];
        images.forEach(image => {
            let main_image = `<div class="jpreview-image" style="background-image: url({{url('/')}}/${image})"></div>`;
            $('#demo-4-container').append(main_image);
        });

        
        if (data.is_composite) {
            $('.edit-child-products-container').slideDown(500);
            $('#edit-productQuantityContainer').slideUp(500);
            const parent_product_meta = JSON.parse(data.meta);
            data.children.forEach(target_product => {
                // var product_option = new Option(`${product['ar_name']} || ${product['en_name']}, quantity (${product.quantity})`, product.id, true, true);
                // $('#edit-child_products').append(product_option).trigger('change');
                // const target_product = res.data.data;
                const total_parent_quantity = data.quantity;
                create_child_product_tr (target_product, total_parent_quantity, parent_product_meta);
            });
        } 

        // store custome field values in global variable
        // after rendering the custome fields
        // get the data and show it in the fields
        window.custome_field_values = data.product_custome_fields;
    }

    const index_custome_events =  (function () {
        function start_events () {
            $('#dataTable').on('change', '.c-activation-btn', function () {
                let target_id = $(this).data('user-target');
                
                axios.post(`{{url('admin/products')}}/${target_id}`, {
                    _token : "{{ csrf_token() }}",
                    _method : 'PUT',
                    activate_product : true
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

            $('#categories, #edit-categories, #s-category').select2({
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

            $('#brand_id, #edit-brand_id, #s-brand_id').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select brand',
                ajax: {
                    url: '{{ url("admin/brand-search") }}',
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

            $('#main_image, #images,#edit-main_image, #edit-images').jPreview();

            /**
            * Composite Products Events
            * 1/2/2022
            * I desided to make this an upgrade option, and use a traditional way for
            * selecting the composite product components
            */
            $('#is_composite, #edit-is_composite').change(function () {
                let is_composite  = $(this).val();
                let first_target  = $(this).data('first-target');
                let second_target = $(this).data('second-target');
                
                if (is_composite == 1) {
                    $(first_target).slideDown(500);
                    $(second_target).slideUp(500);
                } else {
                    $(second_target).slideDown(500);
                    $(first_target).slideUp(500);
                    // $('#child_products, #edit-child_products').val('').change();
                }
            });

            $('#find_child_products, #edit-find_child_products').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select products, by name, id, or sku',
                ajax: {
                    url: '{{ url("admin/products-search") }}',
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item['en_name']} / ${item['ar_name']} , valied quantity (${item['quantity']})`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            // start custome field events 
            custome_fields_events();
        }

        function custome_fields_events () {
            $('#categories').change(function () {
                /**
                    Get category custome attributes
                 */
                let categoreis_id = $(this).val();
                
                $('.custome-field-el').remove();
                $('#customrFieldLoddingSpinner').show();

                // axios.get(`{{ url('admin/products-categories') }}/0`, { params: { categoreis_id: categoreis_id,  group_acc : true }})
                get_product_categories_with_attr(categoreis_id)
                .then(res => {
                    if (res.data.success) {
                        const categoreis = res.data.data;
                        
                        categoreis.forEach(category => {
                            render_custome_field_el (category);
                            get_custome_fields_arr();
                        });
                    }
                    
                    $('#customrFieldLoddingSpinner').hide();
                });
            });

            $('#edit-categories').change(function () {
                /**
                    # Get category custome attributes
                    # In the edit version we need to add additional option !
                    this option is about how to show the stored data of the product custome field
                    not just the default fields
                 */
                let categoreis_id = $(this).val();
                
                // remove old custome-field
                $('.edit-custome-field-el').remove();
                // so a silly animation effect while waiting for the response
                $('#edit-customrFieldLoddingSpinner').show();

                get_product_categories_with_attr(categoreis_id)
                .then(res => {
                    if (res.data.success) {
                        const categoreis = res.data.data;
                        
                        categoreis.forEach(category => {
                            render_custome_field_el (category, 'edit-');
                            get_custome_fields_arr('edit-');
                        });

                        custome_field_values.forEach(custome_field_val_obj => {
                            $(`[data-attr-id="${custome_field_val_obj.category_attribute_id}"]`).val(custome_field_val_obj.value);
                        });
                    }
                    
                    $('#edit-customrFieldLoddingSpinner').hide();
                });
            });

            $('#edit-custome-field-container').on('change keyup', '.custome-field', function () {
                get_custome_fields_arr('edit-');
            });

            $('#custome-field-container').on('change keyup', '.custome-field', function () {
                get_custome_fields_arr();
            });
        }

        async function get_product_categories_with_attr (categoreis_id) {
            const resposne = await axios.get(`{{ url('admin/products-categories') }}/0`, 
                                { 
                                    params: { categoreis_id: categoreis_id,  group_acc : true 
                                }
                            });

            return resposne;
        }

        function render_custome_field_el (category, prefix = '') {
            let custome_field_el    = '';
            let category_attributes = category.attributes;

            category_attributes.forEach(attribute => {
                if (attribute.type == 'options') {
                    let meta = JSON.parse(attribute.meta);
                    
                    let options_tr = '';
                    meta.options.forEach(option => {
                        options_tr += `<option>${option}</option>`
                    });

                    custome_field_el += `
                        <div class="custome-field-el form-group row">
                            <label for="" class="col-sm-2 text-capitalize">${attribute.title}</label>
                            <div class="col-sm-10">
                                <select class="form-control custome-field" data-attr-id="${attribute.id}">
                                    ${options_tr}
                                </select>
                            </div><!-- /.col-sm-10 -->
                        </div><!-- /.form-group -->
                    `;

                } else if (attribute.type == 'number') {
                    let meta = JSON.parse(attribute.meta);

                    custome_field_el += `
                        <div class="form-group row">
                            <label for="" class="col-sm-2 text-capitalize">${attribute.title}</label>
                            <div class="col-sm-10">
                                <input class="form-control custome-field" data-attr-id="${attribute.id}" type="number" value="${meta.number.field_number_from}" min="${meta.number.field_number_from}" max="${meta.number.field_number_to}">
                            </div><!-- /.col-sm-10 -->
                        </div><!-- /.form-group -->
                    `;
                }// end :: if
            });

            let custome_field_container = `
                <div class="${prefix}custome-field-el" style="padding: 15px 10px;
                margin: 10px 0;
                border: 2px solid #ddd;
                border-radius: 10px;">
                    <h4>${category.en_title}</h4>
                    <hr/>
                    ${custome_field_el}
                </div>
            `;

            category_attributes.length && $(`#${prefix}custome-field-container`).append(custome_field_container);
        }

        function get_custome_fields_arr (prefix = '') {
            let custome_field = Array.from($('.custome-field'));
            let custome_field_vals = {};
            let custome_field_ids  = [];

            custome_field.forEach(field => {
                custome_field_ids.push($(field).data('attr-id'));
                custome_field_vals[$(field).data('attr-id')] = $(field).val();
            });

            $(`#${prefix}custome_attr_id`).val(JSON.stringify(custome_field_ids));
            $(`#${prefix}custome_field_attr`).val(JSON.stringify(custome_field_vals));
        }

        return {
            start_events : start_events
        }
    })();

    index_custome_events.start_events();

    {{--
    $('#dataTable').on('click', '.composite-object', function () {
        let target_product_id = $(this).data('object-id');  
        
        if ($('#targetCompositeProduct').val() != target_product_id) {
            $('#targetCategoryGroup').val('').change();
            $('.category_product_group').remove();
        }
        
        $('#targetCompositeProduct').val(target_product_id);
        
        let current_el_id = $(this).data('current-card');
        let target_el_id  = $(this).data('target-card');
        $(current_el_id).slideUp(500);
        $(target_el_id).slideDown(500);
    });
    --}}

});
</script>
@endpush