@extends('layouts.admin.app')

@php 
    $is_ar = LaravelLocalization::getCurrentLocale() == 'ar'; 
@endphp

@push('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/input_img_privew/jpreview.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sceditor/minified/themes/default.min.css') }}" />

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
                    <h1 class="m-0">@lang('banks.Banks_Accounts')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('banks.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('banks.Banks_Accounts')
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
                    <h5>@lang('banks.Banks_Adminstration')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('banks_add'))
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
                        <label for="s-title">@lang('banks.Bank_Name')</label>
                        <input type="text" class="form-control" id="s-bank-name">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <div class="overflow-table">
                <table style="!font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                    <thead>
                        <th>#</th>
                        <th>@lang('banks.Image')</th>
                        <th>@lang('banks.Bank_Name')</th>
                        <th>@lang('banks.Account_Name')</th>
                        <th>@lang('banks.Number')</th>
                        <th>@lang('banks.IBAN')</th>
                        <th>@lang('banks.Active')</th>
                        <th>@lang('banks.Actions')</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div><!-- /.overflow-table -->
        </div><!-- /.card --> 
        
        @include('admin.banks.incs._create')

        @include('admin.banks.incs._edit')
        

    </div>
</div>
@endsection

@push('page_scripts')

<script src="{{ asset('plugins/input_img_privew/jpreview.js') }}"></script>

<script>
$(function () {
    
    const objects_dynamic_table = new DynamicTable(
        {
            index_route   : "{{ route('admin.banks.index') }}",
            store_route   : "{{ route('admin.banks.store') }}",
            show_route    : "{{ url('admin/banks') }}",
            update_route  : "{{ url('admin/banks') }}",
            destroy_route : "{{ url('admin/banks') }}",
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
            fields_list     : ['id', 'bank_name', 'account_name', 'number', 'iban', 'image'],
            imgs_fields     : ['image']
        },
        [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'bank_name', name: 'bank_name' },
            { data: 'account_name', name: 'account_name' },
            { data: 'number', name: 'number' },
            { data: 'iban', name: 'iban' },
            { data: 'is_active', name: 'is_active' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-bank-name').length)
            d.bank_name = $('#s-bank-name').val();              
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);

        if (data.get('bank_name') === '') {
            is_valide = false;
            let err_msg = '@lang("banks.bank_name_is_required")';
            $(`#${prefix}bank_nameErr`).text(err_msg);
            $(`#${prefix}bank_nameErr`).slideDown(500);
        }
        
        if (data.get('account_name') === '') {
            is_valide = false;
            let err_msg = '@lang("banks.account_name_is_required")';
            $(`#${prefix}account_nameErr`).text(err_msg);
            $(`#${prefix}account_nameErr`).slideDown(500);
        }

        if (data.get('number') === '') {
            is_valide = false;
            let err_msg = '@lang("banks.number_is_required")';
            $(`#${prefix}numberErr`).text(err_msg);
            $(`#${prefix}numberErr`).slideDown(500);
        }
        
        if (data.get('iban') === '') {
            is_valide = false;
            let err_msg = '@lang("banks.iban_is_required")';
            $(`#${prefix}ibanErr`).text(err_msg);
            $(`#${prefix}ibanErr`).slideDown(500);
        }

        if (prefix == '' && data.get('image') === '') {
            is_valide = false;
            let err_msg = '@lang("banks.image_is_required")';
            $(`#${prefix}imageErr`).text(err_msg);
            $(`#${prefix}imageErr`).slideDown(500);
        } else if (prefix == '' && data.get('image') === '') {
            data.delete('image')
        }
        
        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        fields_id_list = fields_id_list.filter(el_id => !imgs_fields.includes(el_id));
        fields_id_list.forEach(el_id => { 
            $(`#${prefix + el_id}`).val(data[el_id]).change();
        });

        
        $('#edit-demo-1-container .jpreview-image').remove();
        let image = `<div class="jpreview-image" style="background-image: url({{url('/')}}/${data.image})"></div>`;
        $('#edit-demo-1-container').append(image);
    };

    $('#image, #images,#edit-image, #edit-images').jPreview();

    $('#dataTable').on('change', '.c-activation-btn', function () {
        let target_id = $(this).data('user-target');
        
        axios.post(`{{url('admin/banks')}}/${target_id}?activate_taxe=true`, {
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