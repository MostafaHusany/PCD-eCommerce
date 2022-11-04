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
                    <h1 class="m-0">@lang('roles.Roles')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('roles.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                        @lang('roles.Roles')
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
                    <h5>@lang('roles.Roles_Adminstration')</h5>
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
                <div class="col-6">
                    <div class="form-group search-action">
                        <label for="">@lang('roles.Name')</label>
                        <input type="text" class="form-control" id="s-name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-4 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                <thead>
                    <th>#</th>
                    <th>@lang('roles.Name')</th>
                    <th>@lang('roles.Description')</th>
                    <th>@lang('roles.Users')</th>
                    <th>@lang('roles.Actions')</th>
                </thead>
                <tbody></tbody>
            </table>
        </div><!-- /.card --> 
        
        @include('admin.roles.incs._create')

        @include('admin.roles.incs._edit')

        @include('admin.roles.incs._show')
        

    </div>
</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.roles.index') }}",
            store_route   : "{{ route('admin.roles.store') }}",
            show_route    : "{{ url('admin/roles') }}",
            update_route  : "{{ url('admin/roles') }}",
            destroy_route : "{{ url('admin/roles') }}",
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
            fields_list     : ['id', 'name', 'description', 'users', 'permissions'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'users', name: 'users' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-name').length)
            d.name = $('#s-name').val();                
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('name') === '') {
            is_valide = false;
            let err_msg = '@lang("roles.name_is_required")';
            $(`#${prefix}nameErr`).text(err_msg);
            $(`#${prefix}nameErr`).slideDown(500);
        }

        if (data.get('description') === '') {
            is_valide = false;
            let err_msg = '@lang("roles.description_is_required")';
            $(`#${prefix}descriptionErr`).text(err_msg);
            $(`#${prefix}descriptionErr`).slideDown(500);
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        $('#edit-id').val(data.id);

        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id) );
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        data.users.forEach(item => {
            let tmp = new Option(`${item.name} , email : (${item.email}) , phone : (${item.phone})`, item.id, false, true);
            $('#edit-users').append(tmp);
        });
        $('#edit-users').trigger('change');

        data.permissions.forEach(item => {
            let tmp = new Option(`${item.name}`, item.id, false, true);
            $('#edit-permissions').append(tmp);
        });
        $('#edit-permissions').trigger('change');
    }

    (function () {
        $('#users, #edit-users').select2({
            // allowClear: true,
            width: '100%',
            placeholder: '@lang("roles.Select_users")',
            ajax: {
                url: '{{ url("admin/users-search") }}',
                dataType: 'json',
                delay: 150,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: `${item.name} , email : (${item.email}) , phone : (${item.phone})`,
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
            placeholder: '@lang("roles.Select_permissions")',
            ajax: {
                url: '{{ url("admin/permissions-search") }}',
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
    })();
 
});
</script>
@endpush