<div id="editForm" style="display: none;" class="clearfix" >
    <div class="row">
        <div class="col-6">
            <h5>@lang('cover.Edit_Slider')</h5>
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
        <label for="edit-sliderImage" class="col-sm-2 col-form-label">@lang('cover.Select_Image')</label>
        <div class="col-sm-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="edit-sliderImage" aria-describedby="inputGroupFileAddon04">
                <label class="custom-file-label" style="text-align: left !important" for="edit-sliderImage">@lang('cover.Choose_image')</label>
            </div>
            <div style="padding: 5px 7px; display: none" id="edit-sliderImageErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>

        <label for="edit-sliderOrder" class="col-sm-1 col-form-label">@lang('cover.Order')</label>
        <div class="col-sm-5">
            <div class="form-group">
                <input type="number" min="1" value="1" class="form-control" id="edit-sliderOrder">
            </div>
            <div style="padding: 5px 7px; display: none" id="edit-sliderOrderErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div><!-- /.form-group -->

    <div class="form-group row"> 
        <label for="edit-linkType" class="col-sm-2 col-form-label">@lang('cover.Link_Type')</label>
        <div class="col-sm-8">
            <select data-edit="true" disabled="disabled" type="text" tabindex="1" class="form-control" id="edit-linkType">
                <option value="">-- @lang('cover.select_link_type') --</option>
                <option value="product">@lang('cover.product')</option>
                <option value="category">@lang('cover.category')</option>
                <option value="externalLink">@lang('cover.external_link')</option>
            </select>
            <div style="padding: 5px 7px; display: none" id="edit-linkTypeErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="custom-control custom-switch mt-2">
                <input data-edit="true" type="checkbox" class="custom-control-input" id="edit-isClickable">
                <label class="custom-control-label" for="edit-isClickable">Is clickable</label>
            </div>
        </div>
    </div><!-- /.form-group -->

    <div style="display: none;" class="edit-category-link form-group row">
        <label for="edit-category" class="col-sm-2 col-form-label">@lang('cover.Category')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="edit-category">
                <option value="">-- @lang('cover.select_category') --</option>
                @foreach($all_categories as $category)
                <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                @endforeach
            </select>
            <div style="padding: 5px 7px; display: none" id="edit-categoryErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div>
    
    <div style="display: none;" class="edit-products-link form-group row">
        <label for="edit-product" class="col-sm-2 col-form-label">@lang('cover.Product')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="edit-product"></select>
            <div style="padding: 5px 7px; display: none" id="edit-productErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div>

    <div style="display: none;" class="edit-external-link form-group row">
        <div class="col-2">
            <label for="externalLink" class="form-label">@lang('cover.External_Link')</label>
        </div>
        <div class="col-10">
            <div class="form-group">
                <input id="edit-externalLink" type="url" placeholder="link url" class="form-control">
                <div style="padding: 5px 7px; display: none" id="edit-externalLinkErr"
                    class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.col-5 -->

    </div><!-- /.form-group -->
    
    <button !disabled="disabled" id="editLink" class="btn btn-warning float-right">@lang('cover.Edit_Slider')</button>
</div>
