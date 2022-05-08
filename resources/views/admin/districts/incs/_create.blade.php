
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{$object_title}}</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#createObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div action="/" id="objectForm">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Name">
                <div style="padding: 5px 7px; display: none" id="nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="phone_code" class="col-sm-2 col-form-label">Phone Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone_code" placeholder="Phone code">
                <div style="padding: 5px 7px; display: none" id="phone_codeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <input type="hidden" id="children_tags">
            <label for="child_tag_field" class="col-sm-2">Governorate</label>
            <div class="col-sm-8">
                <input class="form-control" id="child_tag_field">
                <div style="padding: 5px 7px; display: none" id="children_tagsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-2">
                <button class="add-child-tag-btn mt-1 btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </div>

        <div class="form-group row" style="height: 300px; overflow-y: scroll">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                    <tbody id="childrenTableContainer">

                    </tbody>
                </table>
            </div><!-- /.col-sm-10 -->
        </div>

        <button class="create-object btn btn-primary float-right">Create {{$object_title}}y</button>
    </div>
</div>


@push('page_scripts')
<script>
$(document).ready(function () {
    
    $('.toggle-btn').on('click', function () {
        let target_card = $(this).data('target-card');

        if (target_card === '#createObjectCard') {
            $('.child-el-row').remove();   
        }
    })

    const children_starter = (function () {
        let children_tags_list = [];

        function starte_event_listener () {
            $('.add-child-tag-btn').click(function (e) {
                e.preventDefault();
                let target_field_val = $('#child_tag_field').val();

                if (target_field_val !== '') {
                    if (children_tags_list.includes(target_field_val)) {
                        const target_el_index = children_tags_list.indexOf(target_field_val);
                        
                        show_err_alert(`#childElRow${target_el_index}Line`, {width : '100%'}, {width : '0%'});
                    } else {
                        const target_el_row = draw_child_el_row (target_field_val)
                        $('#childrenTableContainer').append(target_el_row);
                        
                        $('#children_tags').val(JSON.stringify(children_tags_list));
                    }// end :: if
                } else {
                    $('#child_tag_field').css('border', '1px solid red');
                    setTimeout(() => {
                        $('#child_tag_field').css('border', '');
                    }, 3000);
                }// end :: if 

                // clear field value
                $('#child_tag_field').val('');
            });

            $('#childrenTableContainer').on('click', '.delete-child-el', function () {
                let target_child_id     = $(this).data('target-id');
                let target_child_val    = $(this).data('target-val');

                $('.child-el-row').remove();
                let tmp_children_tags_list = children_tags_list.filter(child_val => child_val !== target_child_val);
                children_tags_list = [];
                
                tmp_children_tags_list.forEach(child_val => {
                    const target_el_row = draw_child_el_row (child_val)
                    $('#childrenTableContainer').append(target_el_row);
                });
                
                $('#children_tags').val(JSON.stringify(children_tags_list));
            });
        }

        function draw_child_el_row (target_field_val) {
        
            children_tags_list.push(target_field_val);

            let target_el_index = children_tags_list.indexOf(target_field_val);

            return target_el_row = `
                <tr class="child-el-row" id="childElRow${target_el_index}">
                    <td>
                        ${target_field_val}
                        <br/>
                        <span class="child-el-row-line" id="childElRow${target_el_index}Line"></span>
                    </td>
                    <td>
                        <button class="delete-child-el btn btn-sm btn-danger" 
                            data-target-val="${target_field_val}" 
                            data-target-id="#childElRow${target_el_index}">
                            <i class="fas fa-minus-circle"></i>
                        </button>
                    </td>
                </tr>
            `;
        }// end :: draw_child_el_row

        function show_err_alert (target_el, show_property, hide_property) {
            $(target_el).animate(show_property);

            setTimeout(() => {
                $(target_el).animate(hide_property);
            }, 3000);
        }

        return {
            starte_event_listener : starte_event_listener
        }
    })();

    // start children_tag table events
    children_starter.starte_event_listener()
});
</script>
@endpush