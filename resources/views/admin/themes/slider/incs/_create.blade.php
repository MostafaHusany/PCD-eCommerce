<div id="createForm" class="clearfix">
    <div class="row">
        <div class="col-6">
            <h5>@lang('cover.Create_Slider')</h5>
        </div>
        <div class="col-6 text-right">
        </div>
    </div><!-- /.row -->

    <hr />
    
    <div class="form-group row"> 
        <label for="sliderImage" class="col-sm-2 col-form-label">@lang('cover.Select_Image')</label>
        <div class="col-sm-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="sliderImage" aria-describedby="inputGroupFileAddon04">
                <label class="custom-file-label" style="text-align: left !important" for="sliderImage">Choose image</label>
            </div>
            <div style="padding: 5px 7px; display: none" id="sliderImageErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>

        <label for="sliderOrder" class="col-sm-1 col-form-label">@lang('cover.Order')</label>
        <div class="col-sm-5">
            <div class="form-group">
                <input type="number" min="1" value="1" class="form-control" id="sliderOrder">
            </div>
            <div style="padding: 5px 7px; display: none" id="sliderOrderErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div><!-- /.form-group -->

    <div class="form-group row"> 
        <label for="linkType" class="col-sm-2 col-form-label">@lang('cover.Link_Type')</label>
        <div class="col-sm-8">
            <select disabled="disabled" type="text" tabindex="1" class="form-control" id="linkType">
                <option value="">-- @lang('cover.select_link_type') --</option>
                <option value="product">@lang('cover.product')</option>
                <option value="category">@lang('cover.category')</option>
                <option value="externalLink">@lang('cover.external_link')</option>
            </select>
            <div style="padding: 5px 7px; display: none" id="linkTypeErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="custom-control custom-switch mt-2">
                <input type="checkbox" class="custom-control-input" id="isClickable">
                <label class="custom-control-label" for="isClickable">@lang('cover.Is_clickable')</label>
            </div>
        </div>
    </div><!-- /.form-group -->

    <div style="display: none;" class="category-link form-group row">
        <label for="category" class="col-sm-2 col-form-label">@lang('cover.Category')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="category">
                <option value="">-- @lang('cover.select_category') --</option>
                @foreach($all_categories as $category)
                <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                @endforeach
            </select>
            <div style="padding: 5px 7px; display: none" id="categoryErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div>
    
    <div style="display: none;" class="products-link form-group row">
        <label for="product" class="col-sm-2 col-form-label">@lang('cover.Product')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="product"></select>
            <div style="padding: 5px 7px; display: none" id="productErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div>

    <div style="display: none;" class="external-link form-group row">
        <div class="col-2">
            <label for="" class="form-label">@lang('cover.External_Link')</label>
        </div>
        
        <div class="col-10">
            <div class="form-group">
                <input id="externalLink" type="url" placeholder="link url" class="form-control">
                <div style="padding: 5px 7px; display: none" id="externalLinkErr"
                    class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.col-5 -->

    </div><!-- /.form-group -->
    
    <button !disabled="disabled" id="addLink" class="btn btn-primary float-right">@lang('cover.Add_Link')</button>
</div>