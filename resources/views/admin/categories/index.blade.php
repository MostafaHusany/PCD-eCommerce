@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'Categor';
@endphp

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{$object_title}}ies</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin') }}">Dashboard</a>
                    </li>
                    
                    <li class="breadcrumb-item active">
                        {{$object_title}}ies
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
                <h5>{{$object_title}}ies Adminstration</h5>
            </div>
            <div class="col-6 text-right">
                {{--
                <div class="!toggle-btn  update-categories-navbar btn btn-warning btn-sm" 
                    data-current-card="#objectsCard" data-target-card="#selectNavbarCategories"
                    data-toggle="tooltip" data-placement="top" title="Select Categories For Navbar"
                >
                    <i class="fas fa-stream"></i>
                </div>
                --}}

                <div class="relode-btn btn btn-info btn-sm">
                    <i class="relode-btn-icon fas fa-redo"></i>
                    <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                </div>

                @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_add'))
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
                    <label for="s-title">Title</label>
                    <input type="text" class="form-control" id="s-title">
                </div><!-- /.form-group -->
            </div><!-- /.col-6 -->
            <div class="col-6">
                <div class="form-group search-action">
                    <label for="s-title">Type</label>
                    <select type="text" class="form-control" id="s-is_main">
                        <option value="">All</option>
                        <option value="1">is main</option>
                        <option value="0">is sub</option>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col-6 -->
        </div><!-- /.row --> 
        <!-- END   SEARCH BAR -->

        <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
            <thead>
                <th>#</th>
                <th>Icon</th>
                <th>Ar Title</th>
                <th>En Title</th>
                <th>Is Main</th>
                <th>Parent</th>
                <th>Products</th>
                <th>Rule</th>
                <th>Active</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    @include('admin.categories.incs._create')

    @include('admin.categories.incs._edit')

    @include('admin.categories.incs._show')
    
    @include('admin.categories.incs._custome_fields')

    {{--
    @include('admin.categories.incs._settings')
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
            index_route   : "{{ route('admin.products-categories.index') }}",
            store_route   : "{{ route('admin.products-categories.store') }}",
            show_route    : "{{ url('admin/products-categories') }}",
            update_route  : "{{ url('admin/products-categories') }}",
            destroy_route : "{{ url('admin/products-categories') }}",
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
            fields_list     : ['id', 'ar_title', 'en_title', 'ar_description', 'en_description',
                            'is_main', 'category_id', 'rule', 'brands', 'custome_fields', 'icon'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'icon', name: 'icon' },
            { data: 'en_title', name: 'en_title' },
            { data: 'ar_title', name: 'ar_title' },
            { data: 'is_main', name: 'is_main' },
            { data: 'parent', name: 'parent' },
            { data: 'products', name: 'products' },
            { data: 'rule', name: 'rule' },
            { data: 'active', name: 'active' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-title').length)
            d.title = $('#s-title').val();       
            
            if($('#s-is_main').length)
            d.is_main = $('#s-is_main').val();       
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('ar_title') === '') {
            is_valide = false;
            let err_msg = 'arabic title is required';
            $(`#${prefix}ar_titleErr`).text(err_msg);
            $(`#${prefix}ar_titleErr`).slideDown(500);
        }

        if (data.get('en_title') === '') {
            is_valide = false;
            let err_msg = 'english title is required';
            $(`#${prefix}en_titleErr`).text(err_msg);
            $(`#${prefix}en_titleErr`).slideDown(500);
        }

        if (data.get('ar_description') === '') {
            is_valide = false;
            let err_msg = 'arabic description is required';
            $(`#${prefix}ar_descriptionErr`).text(err_msg);
            $(`#${prefix}ar_descriptionErr`).slideDown(500);
        }

        if (data.get('en_description') === '') {
            is_valide = false;
            let err_msg = 'english description is required';
            $(`#${prefix}en_descriptionErr`).text(err_msg);
            $(`#${prefix}en_descriptionErr`).slideDown(500);
        }

        if (data.get('is_main') === '0' && data.get('category_id') === '') {
            is_valide = false;
            let err_msg = 'main category is required';
            $(`#${prefix}category_idErr`).text(err_msg);
            $(`#${prefix}category_idErr`).slideDown(500);
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        
        $(`#edit-show-icon`).attr('class', '');

        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        $(`#${prefix}-show-icon`).attr('class', '');

        custome_fields = [];
        $('.custome_ro_el').remove();
        $('#edit-custome_fields').val(JSON.stringify([]));
    };

    const index_custome_events =  (function () {
        function start_events () {
            $('#dataTable').on('change', '.c-activation-btn', function () {
                let target_id = $(this).data('user-target');
                
                axios.post(`{{url('admin/products-categories')}}/${target_id}`, {
                    _token : "{{ csrf_token() }}",
                    _method : 'PUT',
                    activate_product : true
                }).then(res => {
                    if (res.status != 200) {
                        $(this).prop('checked', !$(this).prop('checked'));
                        $('#dangerAlert').text('Something went rong !! Please refresh your page').slideDown(500);

                        setTimeout(() => {
                            $('#dangerAlert').text('').slideUp(500);
                        }, 3000);
                    }
                })// axios
            });

            $('#field_options, #edit-field_options').select2({
                tags  : true,
                width : '100%'
            });

            $('#is_main, #edit-is_main').change(function () {
                let target = $(this).data('target');
                if ($(this).val() === '1') {
                    $(target).attr('disabled', 'disabled');
                } else {
                    $(target).attr('disabled', '');
                    $(target).removeAttr('disabled');
                }
            });

            $('#category_id, #edit-category_id, #s-category').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select categories',
                ajax: {
                    url: '{{ url("admin/products-categories-search") }}?is_main=true',
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

            $('#brands, #edit-brands').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select Brands',
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

            $('.update-categories-navbar').click(function () {
                $('#loddingSpinner').show(500);

                axios.get("{{ url('admin/products-categories') }}/0", {params : {get_is_nav : true}})
                .then(res => {
                    $('#loddingSpinner').hide(500);
                    
                    if (res.data.success) {
                        res.data.data.forEach(category => {
                            var category_option = new Option(`${category['ar_title']} || ${category['en_title']}`, category.id, true, true);
                            $('#nav_selected_categories').append(category_option)
                        });
                        $('#nav_selected_categories').trigger('change');

                        $('#objectsCard').slideUp(500);    
                        $('#selectNavbarCategories').slideDown(500);  
                    } else {
                        $('#dangerAlert').text('Something went wrong, please contact admin !!').slideDown(500);
                        setTimeout(() => {
                            $('#dangerAlert').text('').slideUp(500);
                        }, 3000);
                    }
                });
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