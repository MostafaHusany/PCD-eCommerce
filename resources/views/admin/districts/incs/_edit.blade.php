<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Update {{$object_title}}</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#editObjectsCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div action="/" id="objectForm">
        <input type="hidden" id="edit-id">
        <input type="hidden" id="is-main" value="main">
        
        <div class="form-group row">
            <label for="edit-name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edit-name" placeholder="Name">
                <div style="padding: 5px 7px; display: none" id="edit-nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="parent-el form-group row">
            <input type="hidden" id="edit-children_tags">
            <label for="edit-child_tag_field" class="col-sm-2">Governorate</label>
            <div class="col-sm-8">
                <input class="form-control" id="edit-child_tag_field">
                <div style="padding: 5px 7px; display: none" id="children_tagsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-2">
                <button class="edit-add-child-tag-btn mt-1 btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle"></i>
                </button>
            </div>
        </div>

        <div class="parent-el form-group row" style="height: 300px; overflow-y: scroll">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                    <tbody id="edit-childrenTableContainer">

                    </tbody>
                </table>
            </div><!-- /.col-sm-10 -->
        </div>
        
        <button class="update-object btn btn-warning float-right">Update {{$object_title}}</button>
    </div>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    
    const children_starter = (function () {
        window.children_tags_list = [];

        function starte_event_listener () {
            $('.edit-add-child-tag-btn').click(function (e) {
                e.preventDefault();
                let target_field_val = $('#edit-child_tag_field').val();

                if (target_field_val !== '') {
                    if (children_tags_list.includes(target_field_val)) {
                        const target_el_index = children_tags_list.indexOf(target_field_val);
                        
                        show_err_alert(`#edit-childElRow${target_el_index}Line`, {width : '100%'}, {width : '0%'});
                    } else {
                        const target_el_row = draw_child_el_row (target_field_val)
                        $('#edit-childrenTableContainer').append(target_el_row);
                        
                        $('#edit-children_tags').val(JSON.stringify(children_tags_list));
                    }// end :: if
                } else {
                    $('#edit-child_tag_field').css('border', '1px solid red');
                    setTimeout(() => {
                        $('#edit-child_tag_field').css('border', '');
                    }, 3000);
                }// end :: if 

                // clear field value
                $('#edit-child_tag_field').val('');
            });

            $('#edit-childrenTableContainer').on('click', '.edit-delete-child-el', function () {
                let target_child_id     = $(this).data('target-id');
                let target_child_val    = $(this).data('target-val');

                $('.edit-child-el-row').remove();
                let tmp_children_tags_list = children_tags_list.filter(child_val => child_val !== target_child_val);
                children_tags_list = [];
                
                tmp_children_tags_list.forEach(child_val => {
                    const target_el_row = draw_child_el_row (child_val)
                    $('#edit-childrenTableContainer').append(target_el_row);
                });
                
                $('#edit-children_tags').val(JSON.stringify(children_tags_list));
            });
        }

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