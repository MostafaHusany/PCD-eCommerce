<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('products.Update_Products')</h5>
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
        <input type="file" style="display:none" id="edit-importFile">

        <div class="form-group row">
            <label for="edit-name" class="col-sm-2 col-form-label">@lang('products.Name')</label>
            <div class="col-sm-10">
                <input tabindex="1" type="text"  class="form-control" id="edit-name" placeholder="@lang('products.Name')">
                <div style="padding: 5px 7px; display: none" id="edit-nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <textarea tabindex="2" class="form-control" id="edit-sku" placeholder="SKU"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-skuErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="7" class="update-object btn btn-warning float-right">@lang('products.Update_Products')</button>
    </form>
</div>