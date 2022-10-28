
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('promos.Create_Promo_Code')</h5>
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
            <label for="code" class="col-sm-2 col-form-label">@lang('promos.Code')</label>

            <div class="col-sm-5">
                <input disabled="disabled" tabindex="2" id="code" class="form-control">
                <div style="padding: 5px 7px; display: none" id="codeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select tabindex="2" id="is_random" class="form-control">
                    <option selected="selected" value="true">@lang('promos.create_random_code')</option>
                    <option value="false">@lang('promos.insert_code_value')</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="is_randomErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">@lang('promos.Type')</label>
            <div class="col-sm-10">
                <select  tabindex="3" class="form-control" id="type">
                    <option selected="selected" value="fixed">@lang('promos.Fixed')</option>
                    <option value="percentage">@lang('promos.Percentage')</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="typeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="value" class="col-sm-2 col-form-label">@lang('promos.Value')</label>
            <div class="col-sm-10">
                <input type="number" min="0" step="1" tabindex="3" id="value" class="form-control">
                <div style="padding: 5px 7px; display: none" id="valueErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <hr />

        <div class="alert alert-info">
            @lang('promos.owner_msg_1')
        </div>

        <div class="form-group row">
            <label for="owner" class="col-sm-2 col-form-label">@lang('promos.Owner')</label>
            <div class="col-sm-10">
                <select tabindex="6" id="owner" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="ownerErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <button tabindex="8" class="create-object btn btn-primary float-right">@lang('promos.Create_Promo_Code')</button>
    </form>
</div>

@push('page_scripts')
<script>
$(document).ready(function () {
    $('#is_random').change(function () {
        console.log('test value :: ', $(this).val());
        let is_random = $(this).val();

        if (is_random == 'true') {
            $('#code').val('').attr('disabled', 'disabled');
        } else {
            $('#code').removeAttr('disabled');
        }
    });

    
    
});
</script>
@endpush
