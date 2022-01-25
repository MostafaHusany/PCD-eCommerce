
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
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea tabindex="2" class="form-control" id="description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="cost_type" class="col-sm-2 col-form-label">Cost Type</label>
            <div class="col-sm-10">
                <select  tabindex="3" class="form-control" id="cost_type">
                    <option selected="selected" value="0">Per Package</option>
                    <option value="1">Per item</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="cost_typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="cost" class="col-sm-2 col-form-label">Cost</label>
            <div class="col-sm-5">
                <input tabindex="4" type="number" min="0" value="1" step="0.5" class="form-control" id="cost">
                <div style="padding: 5px 7px; display: none" id="costErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select tabindex="5" class="form-control" id="is_fixed">
                    <option value="0">Percentage</option>
                    <option value="1">Fixed</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="is_fixedErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <hr />

        <div class="alert alert-info">
            Leave rules fields empty if there is no exception
        </div>

        <div class="form-group row">
            <label for="categories" class="col-sm-2 col-form-label">Free For Categories</label>
            <div class="col-sm-10">
                <select tabindex="6" id="categories" class="form-control" multiple="multiple"></select>
                <div style="padding: 5px 7px; display: none" id="categoriesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="free_on_cost_above" class="col-sm-2 col-form-label">Free For Cost Above</label>
            <div class="col-sm-10">
                <input tabindex="7" id="free_on_cost_above" class="form-control" type="number" min="0">
                <div style="padding: 5px 7px; display: none" id="free_on_cost_aboveErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <button tabindex="8" class="create-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>