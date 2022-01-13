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
            <label for="edit-en_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input id="edit-en_name" type="text" tabindex="1"  class="form-control" placeholder="Product Name">
                <div style="padding: 5px 7px; display: none" id="edit-en_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <input id="edit-ar_name" type="text"  tabindex="4" class="form-control text-right" dir="rtl" placeholder="اسم المنتج">
                <div style="padding: 5px 7px; display: none" id="edit-ar_nameErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
      
        <div class="form-group row">
            <label for="edit-en_small_description" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-5">
                <textarea id="edit-en_small_description" type="text" tabindex="2"  class="form-control" placeholder="Product Short Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-en_small_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea id="edit-ar_small_description" type="text"  tabindex="5" class="form-control text-right" dir="rtl" placeholder="وصف مختصر للمنتج"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-ar_small_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-en_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea id="edit-en_description" type="text" tabindex="3"  class="form-control" placeholder="Product Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea id="edit-ar_description" type="text"  tabindex="6" class="form-control text-right" dir="rtl" placeholder="وصف المنتج"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-categories" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select type="text" tabindex="11" name="edit-categories[]" class="form-control"  multiple="multiple" id="edit-categories" placeholder="SKU"></select>
                <div style="padding: 5px 7px; display: none" id="edit-categoriesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-is_composite" class="col-sm-2 col-form-label">Product Type</label>
            <div class="col-sm-10">
                <select tabindex="8" name="edit-is_composite" data-first-target=".edit-child-products-container" data-second-target="#edit-productQuantityContainer" class="form-control" id="edit-is_composite">
                    <option value="0">Usual product</option>
                    <option value="1">Composite Product (تجميعات, حزمة عروض)</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-is_compositeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="edit-child-products-container form-group row mt-2 mb-2 pt-2 pb-2" style="display: none; !border: 1px solid #ddd; !border-radius: 5px">
            <div class="col-sm-2">
                <label for="">Child Products</label>
            </div>
            <div class="col-sm-10">
                <select name="edit-child_products"  multiple="multiple" id="edit-child_products" class="form-control"></select>
            </div>
        </div><!-- /.form-group -->
        

        <div class="edit-child-products-container form-group row" style="display: none;">
            <label for="edit-reserved_quantity" class="col-sm-2 col-form-label">Reserved Quantity</label>
            <div class="col-sm-10">
                <input type="number" tabindex="9"  class="form-control" min="0" id="edit-reserved_quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-reserved_quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-10 mt-2">
                <div style="padding: 5px 7px; !font-size: 12px" class="alert alert-info">
                    This quantity will be reserved from the child products and will not sold as individual products 
                </div>
            </div>
        </div><!-- /.form-group -->

        <div id="edit-productQuantityContainer" class="form-group row">
            <label for="edit-quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="number" tabindex="7"  class="form-control" min="0" id="edit-quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" tabindex="8"  class="form-control" id="edit-sku" placeholder="SKU">
                <div style="padding: 5px 7px; display: none" id="edit-skuErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="9"  class="form-control" id="edit-price" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-priceErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <label for="edit-price_after_sale" class="col-sm-2 col-form-label">Price After Sale</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="10"  class="form-control" id="edit-price_after_sale" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-price_after_saleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-4">
                <div style="padding: 5px 7px;" class="alert alert-info">
                    Leave price after sale emty if there is no sale
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-main_image" class="col-sm-2 col-form-label">Main Image</label>
            <div class="col-sm-10">
                <input id="edit-main_image" tabindex="12" type="file" data-jpreview-container="#demo-3-container">
                <div id="demo-3-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="edit-main_imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-images" class="col-sm-2 col-form-label">Product Images</label>
            <div class="col-sm-10">
                <input id="edit-images" name="edit-images[]" tabindex="13" type="file" multiple data-jpreview-container="#demo-4-container">
                <div id="demo-4-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="edit-imagesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->


        <button class="update-object btn btn-warning float-right">Update Product</button>
    </form>
</div>