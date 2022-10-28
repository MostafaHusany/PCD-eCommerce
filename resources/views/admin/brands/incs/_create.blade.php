
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('brands.Create_Brand')</h5>
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
            <label for="en_title" class="col-sm-2 col-form-label">@lang('brands.Title') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <div class="row" dir="ltr">
                    <div class="col-sm-6">
                        <input type="text" tabindex="1"  class="form-control" style="text-align: left !important;"  id="en_title" placeholder="Title">
                        <div style="padding: 5px 7px; display: none" id="en_titleErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input type="text"  tabindex="3" class="form-control" style="text-align: right !important;" dir="rtl" id="ar_title" placeholder="العنوان">
                        <div style="padding: 5px 7px; display: none" id="ar_titleErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-sm-10 -->
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="en_description" class="col-sm-2 col-form-label">@lang('brands.Description') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <div class="row" dir="ltr">
                    <div class="col-sm-6">
                        <textarea  tabindex="2" class="form-control" style="text-align: left !important;" id="en_description" placeholder="Description"></textarea>
                        <div style="padding: 5px 7px; display: none" id="en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <textarea  tabindex="4" class="form-control" style="text-align: right !important;" id="ar_description" dir="rtl" placeholder="الوصف"></textarea>
                        <div style="padding: 5px 7px; display: none" id="ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-sm-10 -->
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">@lang('brands.Image') <span class="text-danger float-right">*</span></label>
            <div class="col-sm-10">
                <input id="image" tabindex="13" type="file" data-jpreview-container="#demo-1-container">
                <div id="demo-1-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

  

        <button tabindex="6" class="create-object btn btn-primary float-right">@lang('brands.Create_Brand')</button>
    </form>
</div>