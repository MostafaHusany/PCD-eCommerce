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
                    <h1 class="m-0">@lang('sms.sms')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin') }}">@lang('sms.Dashboard')</a>
                        </li>
                        
                        <li class="breadcrumb-item active">
                            @lang('sms.sms')
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
                    <h5>@lang('sms.SMS_Settings')</h5>
                </div>
                <div class="col-6 text-right">
                    <div class="relode-btn btn btn-info btn-sm">
                        <i class="relode-btn-icon fas fa-redo"></i>
                        <span class="relode-btn-loader spinner-grow spinner-grow-sm" style="display: none;" role="status" aria-hidden="true"></span>
                    </div>

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('edit_sms_template'))
                    <div class="edit-sms-btn toggle-btn btn btn-warning btn-sm" data-current-card="#objectsCard" data-target-card="#editObjectsCard">
                        <i class="fas fa-edit"></i>
                    </div>
                    @endif

                    @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('send_sms'))
                    <div class="toggle-btn btn btn-primary btn-sm" data-current-card="#objectsCard" data-target-card="#createObjectCard">
                        <i class="fas fa-sms"></i>
                    </div>
                    @endif
                </div>
            </div><!-- /.row -->

            <hr/>
            
            <!-- START SEARCH BAR -->
            <div class="row">
                <div class="col-6">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('sms.Phone')</label>
                        <input type="text" class="form-control" id="s-phone">
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
                
                <div class="col-6">
                    <div class="form-group search-action">
                        <label for="s-title">@lang('sms.Status')</label>
                        <select type="text" class="form-control" id="s-status">
                            <option value="">all</option>
                            <option value="1">success</option>
                            <option value="0">no response</option>
                            <option value="-1">failed</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-6 -->
            </div><!-- /.row --> 
            <!-- END   SEARCH BAR -->

            <table style="font-size: 12px !important" id="dataTable" class="table table-sm table-bordered">
                <thead>
                    <th>#</th>
                    <th>@lang('sms.Phone')</th>
                    <th>@lang('sms.SMS')</th>
                    <th>@lang('sms.Status')</th>
                    <th>@lang('sms.Date')</th>
                    <th>@lang('sms.Err_Code')</th>
                    <th>@lang('sms.Err_Msg')</th>
                    <th>@lang('sms.Resend')</th>
                    <th>@lang('sms.Actions')</th>
                </thead>
                <tbody></tbody>
            </table>
        </div><!-- /.card --> 
        
        @include('admin.sms.incs._create')

        @include('admin.sms.incs._edit')
        
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
            index_route   : "{{ route('admin.sms.index') }}",
            store_route   : "{{ route('admin.sms.store') }}",
            show_route    : "{{ url('admin/sms') }}",
            update_route  : "{{ url('admin/sms') }}",
            destroy_route : "{{ url('admin/sms') }}",
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
            fields_list     : ['id', 'phone', 'sms', 
                                'verification-sms', 'verification-sms-active', 
                                'welcome-sms', 'welcome-sms-active', 
                                'create-order-sms', 'create-order-sms-active',
                                'order-status-sms', 'order-status-sms-active'
                              ],
            imgs_fields     : []
        },
        [
            { data: 'id', name: 'id' },
            { data: 'phone', name: 'phone' },
            { data: 'message', name: 'message' },
            { data: 'status', name: 'status' },
            { data: 'date', name: 'date' },
            { data: 'err_code', name : 'err_code'},
            { data: 'err_msg', name: 'err_msg' },
            { data: 'resend', name: 'resend' },
            { data: 'actions', name: 'actions' },
        ],
        function (d) {
            if ($('#s-phone').length)
            d.phone = $('#s-phone').val();    
            
            if ($('#s-status').length)
            d.status = $('#s-status').val();    
                      
        }
    );

    objects_dynamic_table.validateData = (data, prefix = '') => {
        // inite validation flag
        let is_valide = true;

        // clear old validation session
        $('.err-msg').slideUp(500);
        if (prefix == '') {
            if (!Boolean(data.get('phone')) || data.get('phone') == 'null') {
                is_valide = false;
                let err_msg = '@lang("sms.phone_is_required")';
                $(`#phoneErr`).text(err_msg);
                $(`#phoneErr`).slideDown(500);
            }

            if (!Boolean(data.get('sms'))) {
                is_valide = false;
                let err_msg = '@lang("sms.sms_is_required")';
                $(`#smsErr`).text(err_msg);
                $(`#smsErr`).slideDown(500);
            }

            if (Boolean(data.get('sms')) && data.get('sms').length > 50) {
                is_valide = false;
                let err_msg = '@lang("sms.sms_max_length_is_50")';
                $(`#smsErr`).text(err_msg);
                $(`#smsErr`).slideDown(500);
            }
        } else if (prefix == 'edit-') {
            
            console.log(prefix, prefix == 'edit-', Boolean(data.get('verification-sms')), data.get('verification-sms'), data.get('welcome-sms'));
            if (!Boolean(data.get('verification-sms'))) {
                is_valide = false;
                let err_msg = '@lang("sms.verification sms is required")';
                $(`#${prefix}verification-smsErr`).text(err_msg);
                $(`#${prefix}verification-smsErr`).slideDown(500);
            }

            if (!Boolean(data.get('welcome-sms'))) {
                is_valide = false;
                let err_msg = '@lang("sms.welcome_sms_is_required")"';
                $(`#${prefix}welcome-smsErr`).text(err_msg);
                $(`#${prefix}welcome-smsErr`).slideDown(500);
            }

            if (!Boolean(data.get('create-order-sms'))) {
                is_valide = false;
                let err_msg = '@lang("sms.order_sms_is_required")';
                $(`#${prefix}create-order-smsErr`).text(err_msg);
                $(`#${prefix}create-order-smsErr`).slideDown(500);
            }

            if (!Boolean(data.get('order-status-sms'))) {
                is_valide = false;
                let err_msg = '@lang("sms.status_sms_sms_is_required")';
                $(`#${prefix}order-status-smsErr`).text(err_msg);
                $(`#${prefix}order-status-smsErr`).slideDown(500);
            }

            data.append('system_settings', true);
        }

        return is_valide;
    };

    objects_dynamic_table.addDataToForm = (fields_id_list, imgs_fields, data, prefix) => {
        fields_id_list.forEach(el_id => {
            $(`#${prefix + el_id}`).val(data[el_id]);
        });
        
        // ['verification-sms-active', 'welcome-sms-active', 
        // 'create-order-sms-active', 'order-status-sms-active'].forEach(key => {
        //     $(`#edit-${key}`).prop('checked', data[key]);
        // });
    };

    $('#dataTable').on('click', '.resend-btn', function () {
        let target_id = $(this).data('target');
        
        $(this).find('.resend-btn-icon').hide();
        $(this).find('.resend-btn-loader').show();

        axios.post(`{{url('admin/sms')}}/${target_id}`, {
            _token : "{{ csrf_token() }}",
            _method : 'PUT',
            resend_msg : true
        }).then(res => {
            if (!res.data.success) {
                $(this).prop('checked', !$(this).prop('checked'));
                $('#dangerAlert').text('Something went rong !! Please refresh your page').slideDown(500);

                setTimeout(() => {
                    $('#dangerAlert').text('').slideUp(500);
                }, 3000);
            } else {
                throw 'error'
            }
        }).catch(err => {

        }).finally(() => {
            $(this).find('.resend-btn-icon').show();
            $(this).find('.resend-btn-loader').hide();
        })// axios
    });

    $('#phone').select2({
        // allowClear: true,
        width: '100%',
        placeholder: 'Select customers',
        ajax: {
            url: '{{ url("admin/customers-search") }}',
            dataType: 'json',
            delay: 150,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: `${item.name}, phone : (${item.phone})`,
                            id: item.phone
                        }
                    })
                };
            },
            cache: true
        }
    })
    
    $('.edit-sms-btn').click(function () {
        $('#loddingSpinner').hide(500);

        objects_dynamic_table._getRequest(objects_dynamic_table.routs.show_route + `/0`)
        .then(res => {
                if (res.success) {
                    // show object data in edit form 
                    objects_dynamic_table.addDataToForm(objects_dynamic_table.table_el_ids.fields_list, objects_dynamic_table.table_el_ids.imgs_fields, res.data, 'edit-');
                } else {
                    objects_dynamic_table.showAlertMsg('Somthing went wrong please refresh the page !!', objects_dynamic_table.msg_container.danger_el);
                    console.log('my err response', res);// keep me for debuging
                }// end :: if
                
                $('#loddingSpinner').hide(500);
            }).catch(err => {
                objects_dynamic_table.showAlertMsg('Somthing went wrong please refresh the page !!', objects_dynamic_table.msg_container.danger_el);
                console.log('Bad Request Result : ', err);
            }).finally(() => {
                $('#loddingSpinner').hide(500);
            });
    });

});
</script>
@endpush