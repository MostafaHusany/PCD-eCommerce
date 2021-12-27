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
                <select class="form-control" id="edit-category" placeholder="category">
                    <option value="technical">Technical</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="permissions" class="col-sm-2 col-form-label">Permissions</label>
            <div class="col-sm-10">
                <select class="form-control" id="edit-permissions" name="permissions[]" multiple="multiple">
                    <option>permission 1</option>
                    <option>permission 2</option>
                    <option>permission 3</option>
                </select>
            </div>
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