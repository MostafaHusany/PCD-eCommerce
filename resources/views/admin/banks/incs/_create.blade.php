
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('banks.Create_Banks_Accounts')</h5>
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
            <label for="bank_name" class="col-sm-2 col-form-label">@lang('banks.Bank_Name') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="bank_name" placeholder="@lang('banks.Bank_Name')">
                <div style="padding: 5px 7px; display: none" id="bank_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="account_name" class="col-sm-2 col-form-label">@lang('banks.Account_Name') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="account_name" placeholder="@lang('banks.Account_Name')">
                <div style="padding: 5px 7px; display: none" id="account_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="number" class="col-sm-2 col-form-label">@lang('banks.Number') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="number" placeholder="@lang('banks.Number')">
                <div style="padding: 5px 7px; display: none" id="numberErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="iban" class="col-sm-2 col-form-label">@lang('banks.IBAN') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="iban" placeholder="@lang('banks.IBAN')">
                <div style="padding: 5px 7px; display: none" id="ibanErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">@lang('banks.Image') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input id="image" tabindex="13" type="file" data-jpreview-container="#demo-1-container">
                <div id="demo-1-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="6" class="create-object btn btn-primary float-right">@lang('banks.Create_Banks_Accounts')</button>
    </form>
</div>