
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('users.Create_New_User')</h5>
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
            <label for="name" class="col-sm-2 col-form-label">@lang('users.Name')  <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="@lang('users.Name')">
                <div style="padding: 5px 7px; display: none" id="nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">@lang('users.Email')  <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="@lang('users.Email')">
                <div style="padding: 5px 7px; display: none" id="emailErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">@lang('users.Phone')  <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="phone" class="form-control" id="phone" placeholder="@lang('users.Phone')">
                <div style="padding: 5px 7px; display: none" id="phoneErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">@lang('users.Category')  <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" id="category">
                    <option selected="selected" value="admin">Admin</option>
                    <option value="technical">Technical</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="categoryErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row technical-options" style="display: none">
            <label for="role" class="col-sm-2 col-form-label">@lang('users.Role') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <select class="form-control" id="role"></select>
                <div style="padding: 5px 7px; display: none" id="roleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row technical-options" style="display: none">
            <label for="permissions" class="col-sm-2 col-form-label">@lang('users.Permissions')</label>
            <div class="col-sm-6">
                <select name="permissions[]" id="permissions" class="form-control" multiple="multiole" disabled="disabled"></select>
            </div>
            <label class="col-sm-3 pt-1">
                <span class="pr-2">@lang('users.Custome_Permissions')</span>
                <input type="hidden" id="is_custome_permissions" value="false">
                <input type="checkbox" id="is_custome_permissions_flag"> 
            </label>
            <div class="col-sm-1">
                <div id="spinner-border" style="display: none;" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div><!-- /.col-sm-1 -->
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">@lang('users.Password')</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" placeholder="@lang('users.Password')">
            </div>
        </div><!-- /.form-group -->

        <button class="create-object btn btn-primary float-right">@lang('users.Create_User')</button>
    </form>
</div>

<script>
$(document).ready(function () {
    
    // clear old session 
    $('.toggle-btn').click(function () {
        $('#category').val('admin').trigger('change');
    });

    $('#category').change(function () {
        if ($(this).val() == 'admin') {
            $('.technical-options').slideUp(500);
        } else {
            $('.technical-options').slideDown(500);
        }
    });

    $('#role').change(function () {
        /**
         * get requested category permissions
         */

        // clear old session
        $('#spinner-border').show(500);
        $('#permissions').val('').trigger('change');
        let category_id = $(this).val();

        axios.get(`{{ url("admin/roles") }}/${category_id}`, {
            params : {
                'fast_acc': true
            }
        }).then(res => {
            if (res.data.success) {
                res.data.data.permissions.length && res.data.data.permissions.forEach(item => {
                    let tmp = new Option(`${item.name}`, item.id, false, true);
                    $('#permissions').append(tmp);
                });

                $('#permissions').trigger('change');
            }

            $('#spinner-border').hide(500);
        });

    });

    $('#is_custome_permissions_flag').change(function () {
        if ($(this).prop('checked')) {
            $('#role').attr('disabled', 'disabled');
            $('#permissions').removeAttr('disabled');
            $('#is_custome_permissions').val('true');
        } else {
            $('#role').removeAttr('disabled');
            $('#permissions').attr('disabled', 'disabled');
            $('#is_custome_permissions').val('false');
        }
    });
});
</script>