@extends('layouts.admin.app')

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

@push('page_css')
    @if($is_ar)
        @include('layouts.admin.incs._rtl')
    @endif
@endpush

@push('page_css')
<style>
.child-el-row-line {
    display: inline-block;
    width: 0%;
    height: 3px;
    background: red;
}
</style>
@endpush

@section('content')
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="text-left">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@lang('districts.Districts')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('districts.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('districts.Districts')
                        </li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

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
                    <h5>@lang('districts.Districts_Adminstration')</h5>
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
                        <label for="">@lang('districts.Name')</label>
                        <input type="text" class="form-control" id="s-name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
                
                <div class="col-6">
                    <div class="form-group search-action">
                        <label for="">@lang('districts.Country')</label>
                        <select type="text" class="form-control" id="s-country"></select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                <thead>
                    <th>#</th>
                    <th>@lang('districts.Type')</th>
                    <th>@lang('districts.Name')</th>
                    <th>@lang('districts.Code')</th>
                    <th>@lang('districts.Parent')</th>
                    <th>@lang('districts.Customers')</th>
                    <th>@lang('districts.Orders')</th>
                    <th>@lang('districts.Active')</th>
                    <th>@lang('districts.Actions')</th>
                </thead>
                <tbody></tbody>
            </table>
        </div><!-- /.card --> 
        
        @include('admin.districts.incs._create')
        
        @include('admin.districts.incs._edit')
        
        {{--
        @include('admin.tags.incs._show')
        --}}
        
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
            index_route   : "{{ route('admin.districts.index') }}",
            store_route   : "{{ route('admin.districts.store') }}",
            show_route    : "{{ url('admin/districts') }}",
            update_route  : "{{ url('admin/districts') }}",
            destroy_route : "{{ url('admin/districts') }}",
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
            fields_list     : ['id', 'name', 'children_tags', 'phone_code'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'type', name: 'name' },
            { data: 'name', name: 'name' },
            { data: 'phone_code', name: 'phone_code' },
            { data: 'parent', name: 'parent' },
            { data: 'customers', name: 'customers' },
            { data: 'orders', name: 'orders' },
            { data: 'activation', name: 'activation' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-name').length)
            d.name = $('#s-name').val();     
            
            
            if ($('#s-country').length)
            d.country = $('#s-country').val();     
            
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);
        
        if (data.get('name') === '') {
            is_valide = false;
            let err_msg = '@lang("districts.name_is_required")';
            $(`#${prefix}nameErr`).text(err_msg);
            $(`#${prefix}nameErr`).slideDown(500);
        }
        
        if ($('#is-main').val() === 'main' && data.get('phone_code') === '') {
            is_valide = false;
            let err_msg = '@lang("districts.phone_code_is_required")';
            $(`#${prefix}phone_codeErr`).text(err_msg);
            $(`#${prefix}phone_codeErr`).slideDown(500);
        }

        if ($('#is-main').val() === 'main' && (data.get('children_tags') === '' || data.get('children_tags') === '[]')) {
            is_valide = false;
            let err_msg = '@lang("districts.children_tags_is_required")';
            $(`#${prefix}children_tagsErr`).text(err_msg);
            $(`#${prefix}children_tagsErr`).slideDown(500);
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        console.log(data, prefix, fields_id_list);
        
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        
        $('.edit-child-el-row').remove();
        window.children_tags_list = [];

        if (data.type === 'gove') {
            $('.parent-el').slideUp(500);
            $('#is-main').val('child')
        } else {
            $('.parent-el').slideDown(500);
            $('#is-main').val('main')

            data.children_districts.forEach(child_el => {
                console.log(child_el);
                let child_el_row = draw_child_el_row(child_el.name);

                $('#edit-childrenTableContainer').append(child_el_row);
            });

            $('#edit-children_tags').val(JSON.stringify(children_tags_list));

            function draw_child_el_row (target_field_val) {
                
                children_tags_list.push(target_field_val);

                let target_el_index = children_tags_list.indexOf(target_field_val);

                return target_el_row = `
                    <tr class="edit-child-el-row" id="edit-childElRow${target_el_index}">
                        <td>
                            ${target_field_val}
                            <br/>
                            <span class="child-el-row-line" id="edit-childElRow${target_el_index}Line"></span>
                        </td>
                        <td>
                            <button class="edit-delete-child-el btn btn-sm btn-danger" 
                                data-target-val="${target_field_val}" 
                                data-target-id="#childElRow${target_el_index}">
                                <i class="fas fa-minus-circle"></i>
                            </button>
                        </td>
                    </tr>
                `;
            }// end :: draw_child_el_row
        }// end :: if
    }
    
    $('#dataTable').on('click', '.show-object', function () {
        let target_id    = $(this).data('object-id');
        let target_card  = $(this).data('target-card'); 
        let current_card = $(this).data('current-card'); 

        $('#loddingSpinner').show();
        axios.get(`{{ url('admin/districts') }}/${target_id}?fast_acc=true`)
        .then(res => {
            console.log(res);
            if (res.data.success) {
                
                $('#show-name').val(res.data.data.name);
                $('#show-description').val(res.data.data.description);

                $('.show-child-el-row').remove();
                res.data.data.children.forEach(child_el => {
                    console.log(child_el);
                    const child_el_row = `
                        <tr class="show-child-el-row">
                            <td>
                                ${child_el.name}
                            </td>
                        </tr>
                    `;

                    $('#show-childrenTableContainer').append(child_el_row);
                });

                $(`${current_card}`).slideUp(500);
                $(`${target_card}`).slideDown(500);
            }

            $('#loddingSpinner').hide();
        });
    });
    
    $('#dataTable').on('change', '.c-activation-btn', function () {
        let target_id = $(this).data('user-target');
        
        axios.post(`{{url('admin/districts')}}/${target_id}?activate_object=true`, {
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
    });

    (function (){
        $('#s-country').select2({
            allowClear: true,
            width: '100%',
            placeholder: '@lang("districts.Select_country")',
            ajax: {
                url: '{{ url("admin/districts-search") }}',
                dataType: 'json',
                delay: 150,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
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