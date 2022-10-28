
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('order_status.Create_Orders_Status')</h5>
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
            <label for="status_code" class="col-sm-2 col-form-label">@lang('order_status.Status_Code')</label>
            <div class="col-sm-10">
                <input type="number" tabindex="1"  class="form-control" id="status_code" placeholder="@lang('order_status.Status_Code')">
                <div style="padding: 5px 7px; display: none" id="status_codeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="status_name" class="col-sm-2 col-form-label">@lang('order_status.Status_Name')</label>
            <div class="col-sm-10">
                <div class="row" dir="ltr">
                    <div class="col-sm-6">
                        <input type="text" tabindex="2"  class="form-control"  style="text-align: left !important;" id="status_name_en" placeholder="Status Name">
                        <div style="padding: 5px 7px; display: none" id="status_name_enErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input style="direction: rtl" type="text" tabindex="1"  style="text-align: right !important;"  dir="rtl" class="form-control" id="status_name_ar" placeholder="اسم الحالة">
                        <div style="padding: 5px 7px; display: none" id="status_name_arErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-sm-10 -->
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="color" class="col-sm-2 col-form-label">@lang('order_status.Status_Color')</label>
            <div class="col-sm-10">
                <input type="color" tabindex="3"  class="form-control" id="color">
                <div style="padding: 5px 7px; display: none" id="colorErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="6" class="create-object btn btn-primary float-right">@lang('order_status.Create_Orders_Status')</button>
    </form>
</div>