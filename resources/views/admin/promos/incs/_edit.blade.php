<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('promos.Update_Promo_Code')</h5>
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
            <label for="edit-code" class="col-sm-2 col-form-label">@lang('promos.Code')</label>

            <div class="col-sm-10">
                <input disabled="disabled" tabindex="2" id="edit-code" class="form-control">
                <div style="padding: 5px 7px; display: none" id="edit-codeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-type" class="col-sm-2 col-form-label">@lang('promos.Type')</label>
            <div class="col-sm-10">
                <select  tabindex="3" class="form-control" id="edit-type">
                    <option selected="selected" value="fixed">@lang('promos.Fixed')</option>
                    <option value="percentage">@lang('promos.Percentage')</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="edit-value" class="col-sm-2 col-form-label">@lang('promos.Value')</label>
            <div class="col-sm-10">
                <input type="number" min="0" step="1" tabindex="3" id="edit-value" class="form-control">
                <div style="padding: 5px 7px; display: none" id="edit-valueErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <hr />

        <div class="alert alert-info">
            @lang('promos.owner_msg_1')
        </div>

        <div class="form-group row">
            <label for="edit-owner" class="col-sm-2 col-form-label">@lang('promos.Owner')</label>
            <div class="col-sm-10">
                <select tabindex="6" id="edit-owner" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="edit-ownerErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <button tabindex="7" class="update-object btn btn-warning float-right">@lang('promos.Update_Promo_Code')</button>
    </form>
</div>