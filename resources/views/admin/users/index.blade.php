@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'Users';
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
        
        <div class="row">
            <div class="col-4">
                <div class="form-group search-action">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="s-name">
                </div><!-- /.form-group -->
            </div><!-- /.col-4 -->
            
            <div class="col-4">
                <div class="form-group search-action">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="s-email">
                </div><!-- /.form-group -->
            </div><!-- /.col-4 -->

            <div class="col-4">
                <div class="form-group search-action">
                    <label for="">Category</label>
                    <select type="text" class="form-control" id="s-category">
                        <option value="">-- select category --</option>
                        <option value="technical">Technical</option>
                        <option value="admin">Admin</option>
                    </select>
                </div><!-- /.form-group -->
            </div><!-- /.col-4 -->
        </div><!-- /.row --> 

        <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Category</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    @include('admin.users.incs._create')

    @include('admin.users.incs._edit')
    

</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.users.index') }}",
            store_route   : "{{ route('admin.users.store') }}",
            show_route    : "{{ url('admin/users') }}",
            update_route  : "{{ url('admin/users') }}",
            destroy_route : "{{ url('admin/users') }}",
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
            fields_list     : ['id', 'name', 'email', 'phone', 'category', 'category', 'password', 'permissions'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'category', name: 'category' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-name').length)
            d.name = $('#s-name').val(); 

            if ($('#s-email').length)
            d.email = $('#s-email').val();  
            
            if ($('#s-category').length)
            d.category = $('#s-category').val();                
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
 
});
</script>
@endpush