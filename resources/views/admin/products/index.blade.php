@extends('layouts.admin.app')


@push('page_css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/input_img_privew/jpreview.css') }}">
@endpush

@section('content')
@php 
    $object_title = 'Product';
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
            <div class="col-6">
                <div class="form-group search-action">
                    <label for="s-title">Title</label>
                    <input type="text" class="form-control" id="s-title">
                </div><!-- /.form-group -->
            </div><!-- /.col-6 -->
        </div><!-- /.row --> 
        <!-- END   SEARCH BAR -->

        <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
            <thead>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Sale Price</th>
                <th>Categories</th>
                <th>Quantity</th>
                <th>Action</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    
    @include('admin.products.incs._create')
    @include('admin.products.incs._edit')
    

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
                               'quantity', 'main_image', 'images', 'price', 'price_after_sale'],
            imgs_fields     : ['main_image', 'images']
        },
        [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'ar_name', name: 'ar_name' },
            { data: 'price',    name: 'price' },
            { data: 'price_after_sale',    name: 'price_after_sale' },
            { data: 'categories', name: 'categories' },
            { data: 'quantity', name: 'quantity' },
            { data: 'actions' , name: 'actions' },
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

        if (data.get('quantity') === '' || data.get('quantity') < 0) {
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
            let err_msg = 'price_after_sale can\'t be negative';
            $(`#${prefix}price_after_saleErr`).text(err_msg);
            $(`#${prefix}price_after_saleErr`).slideDown(500);
        }
       
        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {

        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });
        
        data.categories.forEach(category => {
            var categoryOption = new Option(`${category['ar-title']} || ${category['en-title']}`, category.id, false, true);
            $('#edit-categories').append(categoryOption).trigger('change');
        });

        $('#demo-3-container .jpreview-image, #demo-4-container .jpreview-image').remove()
        let main_image = `<div class="jpreview-image" style="background-image: url({{url('/')}}/${data.main_image})"></div>`;
        $('#demo-3-container').append(main_image);

        // console.log(JSON.parse(data.images));
        let images = data.images != null ? JSON.parse(data.images) : [];
        images.forEach(image => {
            let main_image = `<div class="jpreview-image" style="background-image: url({{url('/')}}/${image})"></div>`;
            $('#demo-4-container').append(main_image);
        });
        // $('demo-4-container')
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

    $('#is_main').change(function () {
        let target = $(this).data('target');
        if ($(this).val() === '1') {
            $(target).attr('disabled', 'disabled');
        } else {
            $(target).attr('disabled', '');
            $(target).removeAttr('disabled');
        }
    });

    $('#categories, #edit-categories').select2({
        width: '100%',
        placeholder: 'Select categories',
        ajax: {
            url: '{{ url("admin/products-search") }}',
            dataType: 'json',
            delay: 150,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: `${item['ar-title']} || ${item['en-title']}`,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#main_image, #images,#edit-main_image, #edit-images').jPreview();
});
</script>
@endpush