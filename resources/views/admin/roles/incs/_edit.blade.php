<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Update {{ $object_title }}</h5>
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
            <label for="edit-name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edit-name" placeholder="Name">
                <div style="padding: 5px 7px; display: none" id="edit-nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-description" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <textarea class="form-control" id="edit-description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-permissions" class="col-sm-2 col-form-label">Permissions</label>
            <div class="col-sm-10">
                <select name="permissions[]" id="edit-permissions" class="form-control" multiple="multiple"></select>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-users" class="col-sm-2 col-form-label">Assign Users</label>
            <div class="col-sm-10">
                <select class="form-control" id="edit-users" data-prefix="" multiple="multiple"></select>
                <div style="padding: 5px 7px; display: none" id="edit-usersErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button class="update-object btn btn-warning float-right">Update {{ $object_title }}</button>
    </form>
</div>