<div class="clearfix" id="createForm">
    <div class="row">
        <div class="col-6">
            <h5>@lang('navbar.Create_New_Link')</h5>
        </div>
        <div class="col-6 text-right">
        </div>
    </div><!-- /.row -->

    <hr />

    <div class="form-group row"> 
        <label for="nav_selected_categories" class="col-sm-2 col-form-label">@lang('navbar.Link_Type')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="linkType">
                <option value="">-- @lang('navbar.select_link_type') --</option>
                <option value="category">@lang('navbar.category')</option>
                <option value="externalLink">@lang('navbar.external_link')</option>
                <!-- <option value="subList">sub list</option> -->
            </select>
            <div style="padding: 5px 7px; display: none" id="linkTypeErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div><!-- /.form-group -->

    <div style="display: none;" class="category-link form-group row">
        <label for="category" class="col-sm-2 col-form-label">@lang('navbar.Category')</label>
        <div class="col-sm-10">
            <select type="text" tabindex="1" class="form-control" id="category">
                <option value="">-- @lang('navbar.select_category') --</option>
                @foreach($all_categories as $category)
                <option value="{{ $category->id }}">{{ $category->ar_title . ' || ' . $category->ar_title }}</option>
                @endforeach
            </select>
            <div style="padding: 5px 7px; display: none" id="categoryErr"
                class="err-msg mt-2 alert alert-danger">
            </div>
        </div>
    </div><!-- /.category-link -->

    <div style="display: none;" class="category-link form-group row">
        <label for="categoryTitle" class="col-sm-2 col-form-label">@lang('navbar.Category_Title')</label>
        <div class="col-sm-10">
            <div class="row" dir="ltr">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="categoryTitleEn" type="text" style="text-align: left !important;" placeholder="category title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="categoryTitleEnErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="categoryTitleAr" type="text"  style="text-align: right !important;" dir="rtl" placeholder="عنوان الفئة" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="categoryTitleArErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
            </div><!-- /.row -->
        </div><!-- /.col-sm-10 -->
    </div><!-- /.category-link -->


    <div style="display: none;" class="external-link form-group row">
        <label for="" class="col-sm-2 col-form-label">@lang('navbar.External_Link')</label>
        <div class="col-10">
            <div class="form-group">
                <input id="externalUrl" type="url" style="text-align: left !important;" placeholder="link url" class="form-control">
                <div style="padding: 5px 7px; display: none" id="externalUrlErr"
                    class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.col-10 -->
    </div><!-- /.external-link -->

    <div style="display: none;" class="external-link form-group row">
        <label for="categoryTitle" class="col-sm-2 col-form-label">@lang('navbar.Link_Title')</label>
        <div class="col-sm-10">
            <div class="row" dir="ltr">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="externalUrlTitleEn" type="text" style="text-align: left !important" placeholder="link english title" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="externalUrlTitleEnErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="externalUrlTitleAr" type="text" style="text-align: right !important" dir="rtl" placeholder="عنوان الرابط" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="externalUrlTitleArErr"
                            class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.col-6 -->
            </div><!-- /.row -->
        </div><!-- /.col-sm-10 -->
    </div><!-- /.external-link -->
    
    <button !disabled="disabled" id="addLink" class="btn btn-primary float-right">@lang('navbar.Add_Link')</button>
</div>
