@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'Brand';
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
                <th>AR Title</th>
                <th>EN Title</th>
                <th>Image</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    @include('admin.brands.incs._create')
    @include('admin.brands.incs._show')
    @include('admin.brands.incs._edit')
    

</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    $('#edit-permissions').select2({width: '100%'});
    $('#permissions').select2({width: '100%'});

    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.brands.index') }}",
            store_route   : "{{ route('admin.brands.store') }}",
            show_route    : "{{ url('admin/brands') }}",
            update_route  : "{{ url('admin/brands') }}",
            destroy_route : "{{ url('admin/brands') }}",
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
            fields_list     : ['id', 'ar_title', 'en_title', 'ar_description', 'en_description','image'],
            imgs_fields     : ['image']

        },
        [
            { data: 'id', name: 'id' },
            { data: 'ar_title', name: 'ar_title' },
            { data: 'en_title', name: 'en_title' },
            { data: 'image', name: 'image' },
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

        if (prefix === '' && data.get('image') === '') {
            is_valide = false;
            let err_msg = ' image is required';
            $(`#${prefix}imageErr`).text(err_msg);
            $(`#${prefix}imageErr`).slideDown(500);
        }
        return is_valide;
    };
 
});
</script>
@endpush