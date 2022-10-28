<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('order_status.Update_Orders_Status')</h5>
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
            <label for="edit-status_code" class="col-sm-2 col-form-label">@lang('order_status.Status_Code')</label>
            <div class="col-sm-10">
                <input type="number" tabindex="1"  class="form-control" id="edit-status_code" placeholder="@lang('order_status.Status_Code')">
                <div style="padding: 5px 7px; display: none" id="edit-status_codeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-status_name_ar" class="col-sm-2 col-form-label">@lang('order_status.Status_Name')</label>
            <div class="col-sm-5">
                <input type="text" tabindex="1"  class="form-control" id="edit-status_name_en" placeholder="Status Name">
                <div style="padding: 5px 7px; display: none" id="edit-status_name_enErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input style="direction: rtl" type="text" tabindex="1"  class="form-control" id="edit-status_name_ar" placeholder="مسمي الحالة">
                <div style="padding: 5px 7px; display: none" id="edit-status_name_arErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-color" class="col-sm-2 col-form-label">@lang('order_status.Status_Color')</label>
            <div class="col-sm-10">
                <input type="color" tabindex="3"  class="form-control" id="edit-color">
                <div style="padding: 5px 7px; display: none" id="edit-colorErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="6" class="update-object btn btn-warning float-right">@lang('order_status.Update_Orders_Status')</button>
    </form>
</div>