<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Update User</h5>
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
        
        <input type="hidden" id="edit_form_flag" value="ready">

        <div class="form-group row">
            <label for="edit-name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edit-name" placeholder="Name">
                <div style="padding: 5px 7px; display: none" id="edit-nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="edit-email" placeholder="Email">
                <div style="padding: 5px 7px; display: none" id="edit-emailErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="phone" class="form-control" id="edit-phone" placeholder="Phone">
                <div style="padding: 5px 7px; display: none" id="edit-phoneErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="form-control" id="edit-category">
                    <option selected="selected" value="admin">Admin</option>
                    <option value="technical">Technical</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-categoryErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row edit-technical-options" style="display: none">
            <label for="edit-role" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-control" id="edit-role"></select>
                <div style="padding: 5px 7px; display: none" id="edit-roleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row edit-technical-options" style="display: none">
            <label for="edit-permissions" class="col-sm-2 col-form-label">Permissions</label>
            <div class="col-sm-6">
                <select name="permissions[]" id="edit-permissions" class="form-control" multiple="multiole" disabled="disabled"></select>
            </div>
            <label class="col-sm-3 pt-1">
                <span class="pr-2">Custome Permissions</span>
                <input type="hidden" id="edit-is_custome_permissions" value="false">
                <input type="checkbox" id="edit-is_custome_permissions_flag"> 
            </label>
            <div class="col-sm-1">
                <div id="edit-spinner-border" style="display: none;" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div><!-- /.col-sm-1 -->
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edit-password" placeholder="Password">
            </div>
        </div><!-- /.form-group -->

        <button class="update-object btn btn-warning float-right">Update User</button>
    </form>
</div>

<script>
$(document).ready(function () {
    
    $('#edit-category').change(function () {
        if ($(this).val() == 'admin') {
            $('.edit-technical-options').slideUp(500);
        } else {
            $('.edit-technical-options').slideDown(500);
        }
    });

    $('#edit-role').change(function () {
        /**
         * get requested role permissions
         */

        // clear old session
        $('#edit-spinner-border').show(500);
        $('#edit-permissions').val('').trigger('change');
        let category_id = $(this).val();

        axios.get(`{{ url("admin/roles") }}/${category_id}`, {
            params : {
                'fast_acc': true
            }
        }).then(res => {
            if (res.data.success) {
                res.data.data.permissions.length && res.data.data.permissions.forEach(item => {
                    let tmp = new Option(`${item.name}`, item.id, false, true);
                    $('#edit-permissions').append(tmp);
                });

                $('#edit-permissions').trigger('change');
            }

            $('#edit-spinner-border').hide(500);
        });
    });

    $('#edit-is_custome_permissions_flag').change(function () {
        if ($(this).prop('checked')) {
            $('#edit-role').attr('disabled', 'disabled');
            $('#edit-permissions').removeAttr('disabled');
            $('#edit-is_custome_permissions').val('true');
        } else {
            $('#edit-role').removeAttr('disabled');
            $('#edit-permissions').attr('disabled', 'disabled');
            $('#edit-is_custome_permissions').val('false');
        }
    });
});
</script>