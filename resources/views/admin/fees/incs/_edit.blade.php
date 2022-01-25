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
            <label for="edit-title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="edit-title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="edit-titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea tabindex="2" class="form-control" id="edit-description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-cost_type" class="col-sm-2 col-form-label">Cost Type</label>
            <div class="col-sm-10">
                <select  tabindex="3" class="form-control" id="edit-cost_type">
                    <option selected="selected" value="0">Per Package</option>
                    <option value="1">Per Item</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-cost_typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-cost" class="col-sm-2 col-form-label">Cost</label>
            <div class="col-sm-5">
                <input tabindex="4" type="number" min="0" value="1" step="0.5" class="form-control" id="edit-cost">
                <div style="padding: 5px 7px; display: none" id="edit-costErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select tabindex="5" class="form-control" id="edit-is_fixed">
                    <option value="0">Percentage</option>
                    <option value="1">Fixed</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-is_fixedErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="6" class="update-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>