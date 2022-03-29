<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Update {{ $object_title }}y</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#editObjectsCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <form action="/" id="objectForm">
        <input type="hidden" id="edit-id">
        
        <div class="form-group row">
            <label for="edit-en_title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-5">
                <input type="text" tabindex="1"  class="form-control" id="edit-en_title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="edit-en_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input type="text"  tabindex="3" class="form-control text-right" dir="rtl" id="edit-ar_title" placeholder="العنوان">
                <div style="padding: 5px 7px; display: none" id="edit-ar_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-en_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea  tabindex="2" class="form-control" id="edit-en_description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea  tabindex="4" class="form-control text-right" id="edit-ar_description" dir="rtl" placeholder="الوصف"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-is_main" class="col-sm-2 col-form-label">Is Main</label>
            <div class="col-sm-5">
                <select class="form-control" id="edit-is_main" data-target="#category_id">
                    <option selected="selected" value="1">Is Main</option>
                    <option value="0">Is Sub</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-is_mainErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select class="form-control" id="edit-category_id" disabled="disabled">
                    <option value="">-- select main category --</option>
                    @foreach($all_categories as $category)
                    <option value="{{ $category->id }}">{{ $category['ar_title'] . '||' . $category['en_title'] }}</option>
                    @endforeach
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-category_idErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-rule" class="col-sm-2 col-form-label">Rule</label>
            <div class="col-sm-5">
                <input tabindex="5" type="number" class="form-control" id="edit-rule" min="0" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-ruleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <div style="padding: 5px 7px;" class="alert alert-info">
                    <b>If there is no rule leave the dafault value 0</b>  
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <?php
                $categories_icons = ['flaticon-tv', 'flaticon-responsive', 'flaticon-camera', 'flaticon-plugins',
                'flaticon-headphones', 'flaticon-console', 'flaticon-watch', 'flaticon-music-system', 'flaticon-monitor', 'flaticon-printer',
                'flaticon-mouse'  , 'fas fa-microchip', 'fas fa-memory', 'fas fa-gamepad'
            ];
            ?>
            <label for="rule" class="col-sm-2 col-form-label">Category Icon</label>
            <div class="col-5">
                <select id="edit-icon" class="form-control">
                    <option value="">-- select icon --</option>
                    @foreach($categories_icons as $icon)
                    <option data-icon="glyphicon-glass" value="{{$icon}}">
                        {{$icon}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-5">
                <i style="font-size: 25px;" id="edit-show-icon" class=""></i>
            </div>
        </div>

        <hr />

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label mt-4">Custome Fields</label>

            <div class="col-sm-2">
                <label for="edit-field_title">Field Title</label>
                <input tabindex="6" id="edit-field_title" class="form-control" placeholder="Field Title">
                <div style="padding: 5px 7px; display: none" id="edit-field_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-2">
                <label for="">Field Type</label>
                <select tabindex="7" id="edit-field_type" class="form-control">
                    <option value="options" selected="selected">Options</option>
                    <option value="number">Number</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-field_typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-3" style="!display: none">

                <div class="edit-field_values edit-field_options">
                    <label for="">Field Options</label>
                    <select tabindex="8" id="edit-field_options" multiple="multiple" name="" id="" class="form-control"></select>
                    <div style="padding: 5px 7px; display: none" id="edit-field_optionsErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.field_options -->

                <div class="row edit-field_values edit-field_number" style="display: none">
                    <div class="col-6">
                        <label for="edit-field_number_from">From</label>
                        <input tabindex="8" id="edit-field_number_from" type="number" min="0" class="form-control" placeholde="Start from">
                        <div style="padding: 5px 7px; display: none" id="edit-field_number_fromErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.col-6 -->
                    <div class="col-6">
                        <label for="edit-field_number_to">To</label>
                        <input tabindex="8" id="edit-field_number_to" type="number"  min="0" class="form-control" placeholde="end at">
                        <div style="padding: 5px 7px; display: none" id="edit-field_number_toErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.col-6 -->
                </div><!-- /. field_number -->
            </div><!-- /.col-sm-3 -->

            <div class="col-sm-2 edit-field_values edit-field_number" style="display: none">
                <label for="edit-field_number_metric">Metric</label>
                <input tabindex="9" id="edit-field_number_metric" class="form-control" placeholder="metric inc, ghz, etc..">
                <div style="padding: 5px 7px; display: none" id="edit-field_number_metricErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-2 -->

            <div class="col-sm-1">
                <button tabindex="10" class="btn btn-sm btn-primary edit-add_custome_field" style="margin-top: 35px">
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
                <input id="edit-custome_fields" type="hidden" value="">
                <tbody id="edit-fields_container"></tbody>
            </table>
        </div>

        <button class="update-object btn btn-warning float-right">Update User</button>
    </form>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    const create_form_custome_option = (function () {
        let count_fields      = 0;
        window.custome_fields = [];

        function starter_event () {
            /**
                START CUSTOME FIELD EVENTS
             */
            $('#edit-field_type').change(function () {
                let val = $(this).val();

                $('.edit-field_values').slideUp();
                $(`.edit-field_${val}`).slideDown();
            });

            $('.edit-add_custome_field').click(function (e) {
                e.preventDefault();
                const data      = get_custome_field_data('edit-');
                const is_valied = validate_custome_field(data, 'edit-');

                
                console.log('test 1', data);

                if (is_valied) {
                    create_field_row_el(data, 'edit-');
                    clear_custome_fields('edit-');

                    custome_fields.push(data);
                    $('#edit-custome_fields').val(JSON.stringify(custome_fields));
                }
            });

            $('#edit-fields_container').on('click', '.remove-tr-el', function (e) {
                e.preventDefault();
                let target_id  = $(this).data('target');
                custome_fields = custome_fields.filter(field => field.id != target_id);
                $('#edit-custome_fields').val(JSON.stringify(custome_fields));
                $(`#edit-custome_row_field-${target_id}`).remove();
            });

            $('#edit-icon').change(function () {
                let icon_class = $(this).val();
                $("#edit-show-icon").removeClass();
                $('#edit-show-icon').toggleClass(icon_class);
            });

        }// end :: starter_event

        function get_custome_field_data (prefix = '') {
            let data = {
                id : count_fields++,
                field_title : $(`#${prefix}field_title`).val(),
                field_type  : $(`#${prefix}field_type`).val(),
            };
            
            if (data.field_type == 'options') {
                data['field_options'] = $(`#${prefix}field_options`).val();
            } else if (data.field_type == 'number') {
                data['field_number_from']   = $(`#${prefix}field_number_from`).val();
                data['field_number_to']     = $(`#${prefix}field_number_to`).val();
                data['field_number_metric'] = $(`#${prefix}field_number_metric`).val();
            }

            return data;
        }

        function validate_custome_field (data, prefix = '') {
            let is_valied = true;
            
            if (data.field_title == '') {
                is_valied = false;
                show_field_alert('field_title', prefix);
            }

            if (data.field_type == '') {
                is_valied = false;
                show_field_alert('field_type', prefix);
            }
            
            if (data.field_type == 'options') {
                if (data.field_options.length == 0) {
                    is_valied = false;
                    show_field_alert('field_options', prefix);
                }
            }

            if (data.field_type == 'number') {
                if (data.field_number_from == 0) {
                    is_valied = false;
                    show_field_alert('field_number_from', prefix);
                }

                if (data.field_number_to == 0) {
                    is_valied = false;
                    show_field_alert('field_number_to', prefix);
                }

                if (data.field_number_metric == '') {
                    is_valied = false;
                    show_field_alert('field_number_metric', prefix);
                }
            }

            return is_valied;
        }

        function show_field_alert (field_id, prefix = '') {
            $(`#${prefix}${field_id}Err`).text('this field is required').slideDown(500);
            setTimeout(() => {
                $(`#${prefix}${field_id}Err`).text('this field is required').slideUp(500);    
            }, 4000); 
        }
        
        function create_field_row_el (data, prefix = '') {
            let field_values  = data.field_type == 'options' ? 
                            data.field_options.join(',') 
                                : 
                            'start from : ' + data.field_number_from  + ' <br/> end to : ' + data.field_number_to + ' <br/> metric : ' + data.field_number_metric;
                            
            let new_field_row = `
                <tr class="custome_ro_el" id="${prefix}custome_row_field-${data.id}">
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

            $(`#${prefix}fields_container`).prepend(new_field_row);
        }

        function clear_custome_fields (prefix = '') {
            $(`#${prefix}field_title`).val('');
            $(`#${prefix}field_options`).val('').trigger('change');
            $(`#${prefix}field_type`).val() !== 'options' && $('#field_type').val('options').trigger('change');;
            $(`#${prefix}field_number_from`).val(0);
            $(`#${prefix}field_number_to`).val(0);
            $(`#${prefix}field_number_metric`).val('');
        }

        return {
            starter_event : starter_event
        }
    })();
    
    create_form_custome_option.starter_event();
});
</script>
@endpush