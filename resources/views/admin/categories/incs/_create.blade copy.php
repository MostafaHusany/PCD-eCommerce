
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{ $object_title }}y</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#createObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <form action="/" id="objectForm">
        <div class="form-group row">
            <label for="en_title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-5">
                <input type="text" tabindex="1"  class="form-control" id="en_title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="en_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input type="text"  tabindex="3" class="form-control text-right" dir="rtl" id="ar_title" placeholder="العنوان">
                <div style="padding: 5px 7px; display: none" id="ar_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="en_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea  tabindex="2" class="form-control" id="en_description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea  tabindex="4" class="form-control text-right" id="ar_description" dir="rtl" placeholder="الوصف"></textarea>
                <div style="padding: 5px 7px; display: none" id="ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="is_main" class="col-sm-2 col-form-label">Is Main</label>
            <div class="col-sm-5">
                <select class="form-control" id="is_main" data-target="#category_id">
                    <option selected="selected" value="1">Is Main</option>
                    <option value="0">Is Sub</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="is_mainErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select class="form-control" id="category_id" disabled="disabled">
                    <option value="">-- select main category --</option>
                    @foreach($all_categories as $category)
                    <option value="{{ $category->id }}">{{ $category['ar_title'] . '||' . $category['en_title'] }}</option>
                    @endforeach
                </select>
                <div style="padding: 5px 7px; display: none" id="category_idErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="rule" class="col-sm-2 col-form-label">Rule</label>
            <div class="col-sm-5">
                <input tabindex="5" type="number" class="form-control" id="rule" min="0" value="0">
                <div style="padding: 5px 7px; display: none" id="ruleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <div style="padding: 5px 7px;" class="alert alert-info">
                    <b>If there is no rule leave the dafault value 0</b>  
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="brands" class="col-sm-2 col-form-label">Brands</label>
            <div class="col-sm-10">
                <select tabindex="5" class="form-control" id="brands" min="0" value="0" multiple="multiple"></select>
                <div style="padding: 5px 7px; display: none" id="brandsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <?php
                $categories_icons = ['flaticon-tv', 'flaticon-responsive', 'flaticon-camera', 'flaticon-plugins',
                'flaticon-headphones', 'flaticon-console', 'flaticon-watch', 'flaticon-music-system', 'flaticon-monitor', 'flaticon-printer'];
            ?>
            <label for="rule" class="col-sm-2 col-form-label">Category Icon</label>
            <div class="col-5">
                <select id="icon" class="form-control">
                    <option value="">-- select icon --</option>
                    @foreach($categories_icons as $icon)
                    <option data-icon="glyphicon-glass" value="{{$icon}}">
                        {{$icon}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-5">
                <i style="font-size: 25px;" id="show-icon" class=""></i>
            </div>
        </div><!-- /.form-group -->

        <hr />

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label mt-4">Custome Fields</label>

            <div class="col-sm-2">
                <label for="field_title">Field Title</label>
                <input tabindex="6" id="field_title" class="form-control" placeholder="Field Title">
                <div style="padding: 5px 7px; display: none" id="field_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-2">
                <label for="">Field Type</label>
                <select tabindex="7" id="field_type" class="form-control">
                    <option value="options" selected="selected">Options</option>
                    <option value="number">Number</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="field_typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-3" style="!display: none">

                <div class="field_values field_options">
                    <label for="">Field Options</label>
                    <select tabindex="8" id="field_options" multiple="multiple" name="" id="" class="form-control"></select>
                    <div style="padding: 5px 7px; display: none" id="field_optionsErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.field_options -->

                <div class="row field_values field_number" style="display: none">
                    <div class="col-6">
                        <label for="field_number_from">From</label>
                        <input tabindex="8" id="field_number_from" type="number" min="0" class="form-control" placeholde="Start from">
                        <div style="padding: 5px 7px; display: none" id="field_number_fromErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.col-6 -->
                    <div class="col-6">
                        <label for="field_number_to">To</label>
                        <input tabindex="8" id="field_number_to" type="number"  min="0" class="form-control" placeholde="end at">
                        <div style="padding: 5px 7px; display: none" id="field_number_toErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.col-6 -->
                </div><!-- /. field_number -->
            </div><!-- /.col-sm-3 -->

            <div class="col-sm-2 field_values field_number" style="display: none">
                <label for="">Metric</label>
                <input tabindex="9" id="field_number_metric" class="form-control" placeholder="metric inc, ghz, etc..">
                <div style="padding: 5px 7px; display: none" id="field_number_metricErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-1">
                <button tabindex="10" class="btn btn-sm btn-primary add_custome_field" style="margin-top: 35px">
                    <i class="fas fa-plus"></i>
                </button>
            </div><!-- /.col-sm-2 -->
        </div><!-- /.form-group -->

        <div class="form-group" style="height: 300px; overflow-y: scroll">
            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>Type</td>
                    <td>Values</td>
                    <td>Actions</td>
                </tr>
                <input id="custome_fields" type="hidden" value="">
                <tbody id="fields_container"></tbody>
            </table>
        </div>

        <button class="create-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    const create_form_custome_option = (function () {
        let count_fields   = 0;
        let custome_fields = [];

        function starter_event () {
            $('#field_options').select2({
                tags  : true,
                width : '100%'
            });

            $('.toggle-btn').click(function () {
                let target_card = $(this).data('target-card')

                if (target_card == '#createObjectCard') {
                    $('.custome_ro_el').remove();
                    $('#custome_fields').val(JSON.stringify([]));
                }
            });

            /**
                START CUSTOME FIELD EVENTS
             */
            $('#field_type').change(function () {
                let val = $(this).val();

                $('.field_values').slideUp();
                $(`.field_${val}`).slideDown();
            });

            $('.add_custome_field').click(function (e) {
                e.preventDefault();
                
                const data      = get_custome_field_data();
                const is_valied = validate_custome_field(data);

                if (is_valied) {
                    create_field_row_el(data);
                    clear_custome_fields();

                    custome_fields.push(data);
                    console.log(custome_fields);
                    $('#custome_fields').val(JSON.stringify(custome_fields));
                }
            });

            $('#fields_container').on('click', '.remove-tr-el', function (e) {
                e.preventDefault();
                let target_id  = $(this).data('target');
                custome_fields = custome_fields.filter(field => field.id != target_id);
                $('#custome_fields').val(JSON.stringify(custome_fields));
                $(`#custome_row_field-${target_id}`).remove();
            });

            $('#icon').change(function () {
                let icon_class = $(this).val();
                $("#show-icon").removeClass();
                $('#show-icon').addClass(icon_class);
            });

        }// end :: starter_event

        function get_custome_field_data () {
            let data = {
                id : count_fields++,
                field_title : $('#field_title').val(),
                field_type  : $('#field_type').val(),
            };
            
            if (data.field_type == 'options') {
                data['field_options'] = $('#field_options').val();
            } else if (data.field_type == 'number') {
                data['field_number_from']   = $('#field_number_from').val();
                data['field_number_to']     = $('#field_number_to').val();
                data['field_number_metric'] = $('#field_number_metric').val();
            }

            return data;
        }

        function validate_custome_field (data) {
            let is_valied = true;
            
            if (data.field_title == '') {
                is_valied = false;
                show_field_alert('field_title');
            }

            if (data.field_type == '') {
                is_valied = false;
                show_field_alert('field_type');
            }
            
            if (data.field_type == 'options') {
                if (data.field_options.length == 0) {
                    is_valied = false;
                    show_field_alert('field_options');
                }
            }

            if (data.field_type == 'number') {
                if (data.field_number_from == 0) {
                    is_valied = false;
                    show_field_alert('field_number_from');
                }

                if (data.field_number_to == 0) {
                    is_valied = false;
                    show_field_alert('field_number_to');
                }

                if (data.field_number_metric == '') {
                    is_valied = false;
                    show_field_alert('field_number_metric');
                }
            }

            return is_valied;
        }

        function show_field_alert (field_id) {
            $(`#${field_id}Err`).text('this field is required').slideDown(500);
            setTimeout(() => {
                $(`#${field_id}Err`).text('this field is required').slideUp(500);    
            }, 4000); 
        }
        
        function create_field_row_el (data) {
            let field_values  = data.field_type == 'options' ? 
                            data.field_options.join(',') 
                                : 
                            'start from : ' + data.field_number_from  + ' <br/> end to : ' + data.field_number_to + ' <br/> metric : ' + data.field_number_metric;
                            
            let new_field_row = `
                <tr class="custome_ro_el" id="custome_row_field-${data.id}">
                    <td>${data.field_title}</td>
                    <td>${data.field_type}</td>
                    <td>
                        ${
                            field_values
                        }
                    </td>
                    <td>
                        <button data-target="${data.id}" class="remove-tr-el btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            `;

            $('#fields_container').prepend(new_field_row);
        }

        function clear_custome_fields () {
            $('#field_title').val('');
            $('#field_options').val('').trigger('change');
            $('#field_type').val() !== 'options' && $('#field_type').val('options').trigger('change');;
            $('#field_number_from').val(0);
            $('#field_number_to').val(0);
            $('#field_number_metric').val('');
        }

        return {
            starter_event : starter_event
        }
    })();
    
    create_form_custome_option.starter_event();
});
</script>
@endpush