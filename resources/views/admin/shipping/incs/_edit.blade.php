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
            <label for="edit-title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input tabindex="1" type="text"  class="form-control" id="edit-title" placeholder="Title">
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
        
        {{--
        <div class="form-group row">
            <label for="edit-cost_type" class="col-sm-2 col-form-label">Cost Type</label>
            <div class="col-sm-10">
                <select tabindex="3" class="form-control" id="edit-cost_type">
                    <option selected="selected" value="0">On Package</option>
                    <option value="1">Per item</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-cost_typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        --}}

        {{--
        <div class="form-group row">
            <label for="edit-is_free_taxes" class="col-sm-2 col-form-label">Is Free Taxes ?</label>
            <div class="col-sm-10">
                <select  tabindex="3" class="form-control" id="edit-is_free_taxes">
                    <option selected="selected" value="1">Free Taxes</option>
                    <option value="0">With Taxes</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-is_free_taxesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>
        --}}
        
        <div class="form-group row">
            <label for="edit-cost" class="col-sm-2 col-form-label">Cost In SAR</label>
            <div class="col-sm-10">
                <input tabindex="4" type="number" min="0" value="1" step="0.5" class="form-control" id="edit-cost">
                <div style="padding: 5px 7px; display: none" id="edit-costErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        {{--
        <hr />

        <div class="alert alert-info">
            Leave rules fields empty if there is no exception
        </div>

        <div class="form-group row">
            <label for="edit-categories" class="col-sm-2 col-form-label">Free For Categories</label>
            <div class="col-sm-10">
                <select tabindex="5" id="edit-categories" class="form-control" multiple="multiple"></select>
                <div style="padding: 5px 7px; display: none" id="edit-categoriesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="edit-free_on_cost_above" class="col-sm-2 col-form-label">Free For Cost Above</label>
            <div class="col-sm-10">
                <input tabindex="6" id="free_on_cost_above" class="form-control" type="number" min="0">
                <div style="padding: 5px 7px; display: none" id="free_on_cost_aboveErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>
        --}}

        <button tabindex="7" class="update-object btn btn-warning float-right">Update {{$object_title}}</button>
    </form>
</div>