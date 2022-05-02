@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'Shipping';
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
                <h5>{{$object_title}} Adminstration</h5>
            </div>
            <div class="col-6 text-right">
                <div class="relode-btn btn btn-info btn-sm">
                    <i class="relode-btn-icon fas fa-redo"></i>
                    <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                </div>

                @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('shipping_add'))
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
        </div><!-- /.row --> 
        <!-- END   SEARCH BAR -->

        <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Cost</th>
                <th>Free Taxes</th>
                <!-- <th>Cost Type</th>
                <th>System</th> -->
                <th>Orders</th>
                <th>Active</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    @include('admin.shipping.incs._create')

    @include('admin.shipping.incs._edit')
    

</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.shipping.index') }}",
            store_route   : "{{ route('admin.shipping.store') }}",
            show_route    : "{{ url('admin/shipping') }}",
            update_route  : "{{ url('admin/shipping') }}",
            destroy_route : "{{ url('admin/shipping') }}",
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
            fields_list     : ['id', 'title', 'description', 'cost', 'free_on_cost_above', 'meta', 'is_free_taxes'
                                    // , 'cost_type', 'is_fixed'
                                ],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'cost', name: 'cost' },
            { data: 'is_free_taxes', name : 'is_free_taxes'},
            {{--
            { data: 'cost_type', name: 'cost_type' },
            { data: 'is_fixed', name: 'is_fixed' },
            --}}
            { data: 'orders', name: 'orders' },
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

        if (data.get('description') === '') {
            is_valide = false;
            let err_msg = 'description is required';
            $(`#${prefix}descriptionErr`).text(err_msg);
            $(`#${prefix}descriptionErr`).slideDown(500);
        }

        // if (data.get('cost_type') === '' || data.get('cost_type') === null) {
        //     is_valide = false;
        //     let err_msg = 'cost type is required';
        //     $(`#${prefix}cost_typeErr`).text(err_msg);
        //     $(`#${prefix}cost_typeErr`).slideDown(500);
        // }
        
        if (data.get('cost') == 0 || data.get('cost') === '') {
            is_valide = false;
            let err_msg = 'cost is required and can\'t be zero';
            $(`#${prefix}costErr`).text(err_msg);
            $(`#${prefix}costErr`).slideDown(500);
        }
        
        return is_valide;
    };

    $('#dataTable').on('change', '.c-activation-btn', function () {
        let target_id = $(this).data('user-target');
        
        axios.post(`{{url('admin/shipping')}}/${target_id}`, {
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