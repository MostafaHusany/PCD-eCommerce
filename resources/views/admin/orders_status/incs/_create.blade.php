
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{ $object_title }}</h5>
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
            <label for="status_code" class="col-sm-2 col-form-label">Status Code</label>
            <div class="col-sm-10">
                <input type="number" tabindex="1"  class="form-control" id="status_code" placeholder="Status Code">
                <div style="padding: 5px 7px; display: none" id="status_codeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="status_name" class="col-sm-2 col-form-label">Status Name</label>
            <div class="col-sm-10">
                <input type="text" tabindex="2"  class="form-control" id="status_name" placeholder="Status Name">
                <div style="padding: 5px 7px; display: none" id="status_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="color" class="col-sm-2 col-form-label">Status Color</label>
            <div class="col-sm-10">
                <input type="color" tabindex="3"  class="form-control" id="color">
                <div style="padding: 5px 7px; display: none" id="colorErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="6" class="create-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>