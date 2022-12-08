
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('products.Upload_Product_Names')</h5>
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
            <label for="importFile" class="col-sm-2 col-form-label">@lang('products.Select_Excel_File')</label>
            <div class="col-sm-10">
                <input type="file" tabindex="1" id="importFile" placeholder="importFile" accept=".xlsx,.xls,.xls,.xlw,.csv">
                <div style="padding: 5px 7px; display: none" id="importFileErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        

        <button tabindex="8" class="create-object btn btn-primary float-right">@lang('products.Upload_Products')</button>
    </form>
</div>