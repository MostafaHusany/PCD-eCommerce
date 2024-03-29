<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('sms.Update_SMS_Templates')</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#editObjectsCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <form action="/" id="objectForm">
        <div class="form-group row">
            <label for="edit-verification-sms" class="col-sm-2 col-form-label">@lang('sms.Verification_SMS')</label>
            <div class="col-sm-10">
                <textarea tabindex="0" id="edit-verification-sms" maxlength="200" class="form-control" placeholder="@lang('sms.Verification_sms_template')"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-verification-smsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <!-- <div class="form-check col-sm-3">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked="checked" disabled id="customSwitch2">
                    <label class="custom-control-label" for="customSwitch2">Activate Me</label>
                </div>
            </div> -->
        </div>

        <div class="form-group row">
            <label for="edit-welcome-sms" class="col-sm-2 col-form-label">@lang('sms.Welcome_SMS')</label>
            <div class="col-sm-7">
                <textarea tabindex="0" id="edit-welcome-sms" class="form-control" maxlength="200" placeholder="@lang('sms.Welcome_sms_template')"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-welcome-smsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="form-check col-sm-3">
                <select class="custom-select" id="edit-welcome-sms-active">
                    <option value="true">Activate</option>
                    <option selected value="false">De Activate</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="edit-create-order-sms" class="col-sm-2 col-form-label">@lang('sms.Create_Order_SMS')</label>
            <div class="col-sm-7">
                <textarea tabindex="0" id="edit-create-order-sms" class="form-control" maxlength="200" placeholder="@lang('sms.Create_order_sms_template')"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-create-order-smsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="form-check col-sm-3">
                <select class="custom-select" id="edit-create-order-sms-active">
                    <option value="true">Activate</option>
                    <option selected value="false">De Activate</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="edit-order-status-sms" class="col-sm-2 col-form-label">@lang('sms.Order_Status_SMS')</label>
            <div class="col-sm-7">
                <textarea tabindex="0" id="edit-order-status-sms" class="form-control" maxlength="200" placeholder="@lang('sms.Order_Status_sms_template')"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-order-status-smsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="form-check col-sm-3">
                <select class="custom-select" id="edit-order-status-sms-active">
                    <option value="true">Activate</option>
                    <option selected value="false">De Activate</option>
                </select>
            </div>
        </div>

        <button tabindex="7" class="update-object btn btn-warning float-right">@lang('sms.Update_SMS')</button>
    </form>
</div>