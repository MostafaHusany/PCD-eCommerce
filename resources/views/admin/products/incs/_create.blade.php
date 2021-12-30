
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{ $object_title }}y</h5>
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
            <label for="en_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input id="en_name" type="text" tabindex="1"  class="form-control" placeholder="Product Name">
                <div style="padding: 5px 7px; display: none" id="en_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input id="ar_name" type="text"  tabindex="4" class="form-control text-right" dir="rtl" placeholder="اسم المنتج">
                <div style="padding: 5px 7px; display: none" id="ar_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
      
        <div class="form-group row">
            <label for="en_small_description" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-5">
                <textarea id="en_small_description" type="text" tabindex="2"  class="form-control" placeholder="Product Short Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="en_small_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea id="ar_small_description" type="text"  tabindex="5" class="form-control text-right" dir="rtl" placeholder="وصف مختصر للمنتج"></textarea>
                <div style="padding: 5px 7px; display: none" id="ar_small_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="en_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea id="en_description" type="text" tabindex="3"  class="form-control" placeholder="Product Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea id="ar_description" type="text"  tabindex="6" class="form-control text-right" dir="rtl" placeholder="وصف المنتج"></textarea>
                <div style="padding: 5px 7px; display: none" id="ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="number" tabindex="7"  class="form-control" min="0" id="quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" tabindex="8"  class="form-control" id="sku" placeholder="SKU">
                <div style="padding: 5px 7px; display: none" id="skuErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="9"  class="form-control" id="price" value="0">
                <div style="padding: 5px 7px; display: none" id="priceErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <label for="price_after_sale" class="col-sm-2 col-form-label">Price After Sale</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="10"  class="form-control" id="price_after_sale" value="0">
                <div style="padding: 5px 7px; display: none" id="price_after_saleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-4">
                <div style="padding: 5px 7px;" class="alert alert-info">
                    Leave price after sale emty if there is no sale
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="categories" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select type="text" tabindex="11" name="categories[]" class="form-control"  multiple="multiple" id="categories" placeholder="SKU"></select>
                <div style="padding: 5px 7px; display: none" id="categoriesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="main_image" class="col-sm-2 col-form-label">Main Image</label>
            <div class="col-sm-10">
                <input id="main_image" tabindex="12" type="file" data-jpreview-container="#demo-1-container">
                <div id="demo-1-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="main_imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="images" class="col-sm-2 col-form-label">Product Images</label>
            <div class="col-sm-10">
                <input id="images" name="images[]" tabindex="13" type="file" multiple data-jpreview-container="#demo-2-container">
                <div id="demo-2-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="imagesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <button tabindex="11" class="create-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>