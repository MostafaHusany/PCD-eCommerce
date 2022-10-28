
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('sms.Send_Custome_SMS')</h5>
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
            <label for="phone" class="col-sm-2 col-form-label">@lang('sms.Phone')</label>
            <div class="col-sm-10">
                <select type="text" tabindex="1"  class="form-control" id="phone" placeholder="@lang('sms.User_Phone')"></select>
                <div style="padding: 5px 7px; display: none" id="phoneErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="sms" class="col-sm-2 col-form-label">SMS</label>
            <div class="col-sm-10">
                <textarea tabindex="2" class="form-control" maxlength="50" id="sms" placeholder="SMS"></textarea>
                <div style="padding: 5px 7px; display: none" id="smsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="8" class="create-object btn btn-primary float-right">@lang('sms.Send_SMS')</button>
    </form>
</div>