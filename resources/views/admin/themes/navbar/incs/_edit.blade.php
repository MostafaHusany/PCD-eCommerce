
<div style="display: none;" class="clearfix" id="editForm">
    <div class="row">
        <div class="col-6">
            <h5>@lang('navbar.Edit_Link')</h5>
        </div>
        <div class="col-6 text-right">
            <div id="closeEditForm" class="toggle-btn btn btn-default btn-sm" data-current-card="#selectNavbarCategories"
                data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <hr />

    <div class="form-group row"> 
        <label for="nav_selected_categories" class="col-sm-2 col-form-label">@lang('navbar.Link_Type')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="edit-linkType">
                <option value="">-- @lang('navbar.select_link_type') --</option>
                <option value="category">@lang('navbar.category')</option>
                <option value="externalLink">@lang('navbar.external_link')</option>
                <!-- <option value="subList">sub list</option> -->
            </select>
            <div style="padding: 5px 7px; display: none" id="edit-linkTypeErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div><!-- /.form-group -->

    <div style="display: none;" class="edit-category-link form-group row">
        <label for="edit-category" class="col-sm-2 col-form-label">@lang('navbar.Category')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="edit-category">
                <option value="">-- @lang('navbar.select_category') --</option>
                @foreach($all_categories as $category)
                <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                @endforeach
            </select>
            <div style="padding: 5px 7px; display: none" id="categoryErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div><!-- /.edit-category-link -->

    <div style="display: none;" class="edit-category-link form-group row">
        <label for="edit-category" class="col-sm-2 col-form-label">@lang('navbar.Category_Title')</label>
        <div class="col-sm-10">
            <div class="row" dir="ltr">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="edit-categoryTitleEn" type="text" style="text-align: left !important" placeholder="category title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-categoryTitleEnErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="edit-categoryTitleAr" type="text" style="text-align: right !important" dir="rtl" placeholder="عنوان الفئة" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-categoryTitleArErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
            </div><!-- /.row -->
        </div><!-- /.col-sm-10 -->
    </div><!-- /.edit-category-link -->

    <div style="display: none;" class="edit-external-link form-group row">
        <div class="col-2">
            <label for="" class="form-label">@lang('navbar.External_Link')</label>
        </div>
        <div class="col-10">
            <div class="form-group">
                <input id="edit-externalUrl" type="url" placeholder="link url" style="direction: ltr;" class="form-control">
                <div style="padding: 5px 7px; display: none" id="edit-externalUrlErr"
                    class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.col-10 -->
    </div><!-- /.form-group -->
    
    <div style="display: none;" class="edit-external-link form-group row">
        <label for="" class="col-sm-2 col-form-label">@lang('navbar.Link_Title')</label>
        <div class="col-sm-10">
            <div class="row" dir="ltr">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="edit-externalUrlTitleEn" type="text" placeholder="link title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-externalUrlTitleEnErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="edit-externalUrlTitleAr" type="text" style="text-align: right" placeholder="link title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="edit-externalUrlTitleArErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
            </div><!-- /.row -->
        </div><!-- /.col-sm-10 -->
    </div><!-- /.form-group -->
    
    <button id="editLink" class="btn btn-warning float-right">@lang('navbar.Edit_Link')</button>
</div>