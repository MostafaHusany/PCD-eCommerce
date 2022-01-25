@extends('layouts.admin.app')


@section('content')
@php 
    $object_title = 'Taxe';
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
                <th>Title</th>
                <th>Cost</th>
                <th>Cost Type</th>
                <th>System</th>
                <th>Active</th>
                <th>Actions</th>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /.card --> 
    
    @include('admin.taxes.incs._create')

    @include('admin.taxes.incs._edit')
    

</div>
@endsection

@push('page_scripts')

<script>
$(function () {
    
    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.taxes.index') }}",
            store_route   : "{{ route('admin.taxes.store') }}",
            show_route    : "{{ url('admin/taxes') }}",
            update_route  : "{{ url('admin/taxes') }}",
            destroy_route : "{{ url('admin/taxes') }}",
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
            fields_list     : ['id', 'title', 'description', 'cost', 'cost_type', 'is_fixed', 'is_active'],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'cost', name: 'cost' },
            { data: 'cost_type', name: 'cost_type' },
            { data: 'is_fixed', name: 'is_fixed' },
            { data: 'is_active', name: 'is_active' },
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

        if (data.get('is_main') === '0' && data.get('category_id') === '') {
            is_valide = false;
            let err_msg = 'main category is required';
            $(`#${prefix}category_idErr`).text(err_msg);
            $(`#${prefix}category_idErr`).slideDown(500);
        }

        return is_valide;
    };

    $('#dataTable').on('change', '.c-activation-btn', function () {
        let target_id = $(this).data('user-target');
        
        axios.post(`{{url('admin/taxes')}}/${target_id}?activate_taxe=true`, {
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
 
});
</script>
@endpush