<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Update {{ $object_title }}y</h5>
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
            <label for="edit-en-title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-5">
                <input type="text" tabindex="1"  class="form-control" id="edit-en-title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="edit-en-titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input type="text"  tabindex="3" class="form-control text-right" dir="rtl" id="edit-ar-title" placeholder="العنوان">
                <div style="padding: 5px 7px; display: none" id="edit-ar-titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-en-description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea  tabindex="2" class="form-control" id="edit-en-description" placeholder="Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-en-descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea  tabindex="4" class="form-control text-right" id="edit-ar-description" dir="rtl" placeholder="الوصف"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-ar-descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        
        
        <div class="form-group row">
            <label for="edit-is_main" class="col-sm-2 col-form-label">Is Main</label>
            <div class="col-sm-5">
                <select class="form-control" id="edit-is_main" data-target="#category_id">
                    <option selected="selected" value="1">Is Main</option>
                    <option value="0">Is Sub</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-is_mainErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>

            <div class="col-sm-5">
                <select class="form-control" id="edit-category_id" disabled="disabled">
                    <option value="">-- select main category --</option>
                    @foreach($all_categories as $category)
                    <option value="{{ $category->id }}">{{ $category['ar-title'] . '||' . $category['en-title'] }}</option>
                    @endforeach
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-category_idErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-rule" class="col-sm-2 col-form-label">Rule</label>
            <div class="col-sm-5">
                <input tabindex="5" type="number" class="form-control" id="edit-rule" min="0" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-ruleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <div style="padding: 5px 7px;" class="alert alert-info">
                    <b>If there is no rule leave the dafault value 0</b>  
                </div>
            </div>
        </div><!-- /.form-group -->


        <button class="update-object btn btn-warning float-right">Update User</button>
    </form>
</div>