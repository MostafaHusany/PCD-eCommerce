<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('brands.Update_Brand')</h5>
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
            <label for="edit-en_title" class="col-sm-2 col-form-label">@lang('brands.Title') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-5">
                <input type="text" tabindex="1"  class="form-control" id="edit-en_title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="edit-en_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input type="text"  tabindex="3" class="form-control text-right" dir="rtl" id="edit-ar_title" placeholder="العنوان">
                <div style="padding: 5px 7px; display: none" id="edit-ar_titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-en_description" class="col-sm-2 col-form-label">@lang('brands.Description') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-5">
                <textarea  tabindex="2" class="form-control" id="edit-en_description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea  tabindex="4" class="form-control text-right" id="edit-ar_description" dir="rtl" placeholder="الوصف"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

   
        <div class="form-group row">
            <label for="edit-image" class="col-sm-2 col-form-label">@lang('brands.Image') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input id="edit-image" tabindex="12" type="file" data-jpreview-container="#demo-3-container">
                <div id="demo-3-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="edit-imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button class="update-object btn btn-warning float-right">@lang('brands.Update_Brand')</button>
    </form>
</div>