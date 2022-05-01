@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'User';
@endphp
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin') }}">Dashboard</a>
                    </li>
                    
                    <li class="breadcrumb-item active">
                        Users
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

                @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo(['users_add']))
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
        <!-- END   SEARCH BAR -->

        <div class="overflow-table">
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
        </div>
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
            fields_list     : ['id', 'name', 'email', 'phone', 'category', 'category', 'password', 'role', 'permissions', 'is_custome_permissions'],
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

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        $('#edit-id').val(data.id);

        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            if (el_id !== 'permissions' || el_id !== 'is_custome_permissions') {
                $(`#${prefix + el_id}`).val(data[el_id]).change();
            }
        });

        /**
         * Notice that we have an event in the edit form, that fires 
         * in the time when the category field trigger change event
         * sow we will set a flag that stops the change event while
         * we filling the edit form fields in first
         */
        if(data.category != 'admin') {
            if (data.role !== null) { 
                $('#edit-is_custome_permissions_flag').prop('checked', false).trigger('change');

                let tmp = new Option(`${data.role.name}`, data.role.id, false, true);
                $('#edit-role').append(tmp).trigger('change');
            } else {
                $('#edit-is_custome_permissions_flag').prop('checked', true).trigger('change');

                data.permissions.forEach(permission => {
                    let tmp = new Option(`${permission.name}`, permission.id, false, true);
                    $('#edit-permissions').append(tmp);
                });
                $('#edit-permissions').removeAttr('disabled').trigger('change');
            }
        }

        $("#edit_form_flag").val('ready');
    }

    (function () {
        $('#role, #edit-role').select2({
            // allowClear: true,
            width: '100%',
            placeholder: 'Select Rolle',
            ajax: {
                url: '{{ url("admin/roles-search") }}',
                dataType: 'json',
                delay: 150,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: `${item.display_name}`,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('#permissions, #edit-permissions').select2({
            allowClear: true,
            width: '100%',
            placeholder: 'Select customers',
            ajax: {
                url: '{{ url("admin/permissions-search") }}',
                dataType: 'json',
                delay: 150,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: `${item.display_name}`,
                                id: item.name
                            }
                        })
                    };
                },
                cache: true
            }
        });
    })();
 
});
</script>
@endpush