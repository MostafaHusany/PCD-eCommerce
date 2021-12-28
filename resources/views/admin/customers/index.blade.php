@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'Customer';
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
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Active</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    @include('admin.customers.incs._create')

    @include('admin.customers.incs._edit')
    

</div>
@endsection

@push('page_scripts')

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
            fields_list     : ['id', 'first_name', 'second_name', 'name', 'email', 'phone', 'city', 'address', 'password'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'city', name: 'city' },
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
            
            if ($('#s-city').length)
            d.city = $('#s-city').val();                
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('name') === '') {
            is_valide = false;
            let err_msg = 'name is required';
            $(`#${prefix}nameErr`).text(err_msg);
            $(`#${prefix}nameErr`).slideDown(500);
        }

        if (data.get('email') === '') {
            is_valide = false;
            let err_msg = 'email name is required';
            $(`#${prefix}emailErr`).text(err_msg);
            $(`#${prefix}emailErr`).slideDown(500);
        }

        if (data.get('phone') === '') {
            is_valide = false;
            let err_msg = 'phone name is required';
            $(`#${prefix}phoneErr`).text(err_msg);
            $(`#${prefix}phoneErr`).slideDown(500);
        }

        return is_valide;
    };

    $('.search-action').on('keyup change', function () {
        console.log('test');
        objects_dynamic_table.table_object.draw();
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
    })
 
});
</script>
@endpush