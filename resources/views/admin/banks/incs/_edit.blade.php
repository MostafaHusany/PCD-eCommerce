<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('banks.Update_Banks_Accounts')</h5>
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
            <label for="edit-bank_name" class="col-sm-2 col-form-label">@lang('banks.Bank_Name') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="edit-bank_name" placeholder="@lang('banks.Bank_Name')">
                <div style="padding: 5px 7px; display: none" id="edit-bank_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-account_name" class="col-sm-2 col-form-label">@lang('banks.Account_Name') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="edit-account_name" placeholder="@lang('banks.Account_Name')">
                <div style="padding: 5px 7px; display: none" id="edit-account_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-number" class="col-sm-2 col-form-label">@lang('banks.Number') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="edit-number" placeholder="@lang('banks.Number')">
                <div style="padding: 5px 7px; display: none" id="edit-numberErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-iban" class="col-sm-2 col-form-label">@lang('banks.IBAN') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="edit-iban" placeholder="@lang('banks.IBAN')">
                <div style="padding: 5px 7px; display: none" id="edit-ibanErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-image" class="col-sm-2 col-form-label">@lang('banks.Image')</label>
            <div class="col-sm-10">
                <input id="edit-image" tabindex="13" type="file" data-jpreview-container="#edit-demo-1-container">
                <div id="edit-demo-1-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="edit-imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="6" class="update-object btn btn-warning float-right">@lang('banks.Update_Banks_Accounts')</button>
    </form>
</div>