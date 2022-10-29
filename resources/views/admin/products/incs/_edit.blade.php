<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('products.Update_Product')</h5>
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
            <label for="edit-en_name" class="col-sm-2 col-form-label">@lang('products.Name')</label>
            <div class="col-sm-10">
                <div class="row" dir="ltr">
                    <div class="col-sm-6">
                        <input id="edit-en_name" type="text" tabindex="1" class="form-control" style="text-align: left !important;" placeholder="Product Name">
                        <div style="padding: 5px 7px; display: none" id="edit-en_nameErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input id="edit-ar_name" type="text"  tabindex="4" class="form-control" style="text-align: right !important;" dir="rtl" placeholder="اسم المنتج">
                        <div style="padding: 5px 7px; display: none" id="edit-ar_nameErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-sm-10 -->
        </div><!-- /.form-group -->
      
        <div class="form-group row">
            <label for="edit-en_small_description" class="col-sm-2 col-form-label">@lang('products.Short_Description')</label>
            <div class="col-sm-10">
                <div class="row" dir="ltr">
                    <div class="col-sm-6">
                        <textarea id="edit-en_small_description" type="text" tabindex="2" class="form-control" style="text-align: left !important;" placeholder="Product Short Description"></textarea>
                        <div style="padding: 5px 7px; display: none" id="edit-en_small_descriptionErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <textarea id="edit-ar_small_description" type="text"  tabindex="5" class="form-control" style="text-align: right !important;" dir="rtl" placeholder="وصف مختصر للمنتج"></textarea>
                        <div style="padding: 5px 7px; display: none" id="edit-ar_small_descriptionErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.col-sm-10 -->
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-en_description" class="col-sm-2 col-form-label">@lang('products.Description')</label>
            <div class="col-sm-10">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="edit-nav-en_description-tab" data-toggle="tab" data-target="#edit-nav-en_description" type="button" role="tab" aria-controls="nav-en_description" aria-selected="true">EN</button>
                        <button class="nav-link" id="edit-nav-ar_description-tab" data-toggle="tab" data-target="#edit-nav-ar_description" type="button" role="tab" aria-controls="nav-ar_description" aria-selected="false">AR</button>
                    </div>
                </nav>
                <div class="tab-content mb-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="edit-nav-en_description" role="tabpanel" aria-labelledby="edit-nav-en_description-tab">
                        <textarea id="edit-en_description" type="text" tabindex="3"  class="form-control" placeholder="Product Description"></textarea>
                    </div>
                    <div class="tab-pane fade" id="edit-nav-ar_description" role="tabpanel" aria-labelledby="edit-nav-ar_description-tab">
                        <textarea id="edit-ar_description" type="text"  tabindex="6" class="form-control text-right" dir="rtl" placeholder="وصف المنتج"></textarea>
                    </div>
                </div>
                
                <div style="padding: 5px 7px; display: none" id="edit-ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>

                <div style="padding: 5px 7px; display: none" id="edit-en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.col-sm-10 -->
            <!-- <div class="col-sm-5">
                <textarea id="edit-en_description" type="text" tabindex="3"  class="form-control" placeholder="Product Description"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-en_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-5">
                <textarea id="edit-ar_description" type="text"  tabindex="6" class="form-control text-right" dir="rtl" placeholder="وصف المنتج"></textarea>
                <div style="padding: 5px 7px; display: none" id="edit-ar_descriptionErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div> -->
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-is_composite" class="col-sm-2 col-form-label">@lang('products.Product_Type')</label>
            <div class="col-sm-10">
                <select tabindex="8" name="edit-is_composite" class="form-control" id="edit-is_composite"
                    data-first-target=".edit-child-products-container" 
                    data-second-target="#edit-productQuantityContainer" 
                    data-third-target=".edit-upgradable-options">

                    <option value="0">@lang('products.Usual')</option>
                    <option value="1">@lang('products.Composite') (تجميعات, حزمة عروض)</option>
                    <option value="2">@lang('products.Upgradable') (تجميعات)</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="edit-is_compositeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-storage_quantity" class="col-sm-2 col-form-label">@lang('products.Storage_Quantity')</label>
            <div class="col-sm-10">
                <input type="number" tabindex="9"  class="form-control" min="0" id="edit-storage_quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-storage_quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div id="container-reserved_quantity" class="form-group row">
            <label for="edit-reserved_quantity" class="col-sm-2 col-form-label">@lang('products.Reserved_Quantity')</label>
            <div class="col-sm-10">
                <input disabled="disabled" type="number" tabindex="9"  class="form-control" min="0" id="edit-reserved_quantity-show" value="0">
            </div>
        </div><!-- /.form-group -->
        
        <div class="edit-upgradable-options edit-child-products-container form-group row" style="display: none;">
            <label for="edit-reserved_quantity" class="col-sm-2 col-form-label">@lang('products.Reserved_Quantity')</label>
            <div class="col-sm-10">
                <input type="number" tabindex="9"  class="form-control" min="0" id="edit-reserved_quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-reserved_quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-10 mt-2">
                <div style="padding: 5px 7px; !font-size: 12px" class="alert alert-info">
                    @lang('products.reserved_des_1')
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="edit-upgradable-options form-group row mt-4 mb-2 pt-2 pb-2" style="display: none;">
            <div class="col-sm-2">
                <label for="">@lang('products.Selected_Categories')</label>
            </div>
            <div class="col-sm-10">
                <select tabindex="9" !multiple="multiple" id="edit-categories-upgradable" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="edit-categories-upgradableErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.upgradable-options -->

        <div class="edit-upgradable-options form-group mb-4" style="display: none; !height: 350px; !overflow-y:scroll">
            <input type="hidden" id="edit-upgrade_option_categories">
            <input type="hidden" id="edit-upgrade_option_products">
            <input type="hidden" id="edit-upgrade_option_products_ids">

            <div class="d-flex justify-content-center mb-3">
                <div id="edit-childrenCategoriesLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="row">
                <div class="col-4" style="overflow-y: scroll; height: 450px;">
                    <ul class="list-group" id="edit-upgradableOptionsList">
                        <li class="list-group-item">
                            <h5>@lang('products.Expected_price') : <span id="edit-upgradeExpectedPrice" class="text-primary">0</span>SR<h5>
                        </li>
                    </ul>
                </div>
                <div class="col-8" style="overflow-y: scroll; min-height: 300px; height: 450px;">
                    <div class="form-group">
                        <select name="edit-findCategoryProduct" !multiple="multiple" id="edit-findCategoryProduct" class="form-control">
                            <option value="">-- @lang('products.select_product') --</option>
                        </select>
                    </div><!-- /.form-group -->
                    <table class="text-center table !table-responsive">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>@lang('products.Name')</td>
                                <td>@lang('products.SKU')</td>
                                <td>@lang('products.Price')</td>
                                <td>@lang('products.Edit_Price')</td>
                                <td>@lang('products.Valied_Quantity')</td>
                                <td>@lang('products.Quantity_For_Each Package')</td>
                                <td>@lang('products.Total_Quantity')</td>
                                <td>@lang('products.Is_Default')</td>
                                <td>@lang('products.Actions')</td>
                            </tr>
                        </thead>
                        <tbody id="edit-upgradableOptionCategoryProducts"></tbody>
                    </table>
                </div>
                <!-- <div class="col-4"></div> -->
            </div><!-- /. row -->
        </div><!-- /.upgradable-options -->

        <div class="edit-child-products-container form-group row mt-2 mb-2 pt-2 pb-2" style="display: none; !border: 1px solid #ddd; !border-radius: 5px">
            <div class="col-sm-2">
                <label for="">@lang('products.Child_Products')</label>
            </div>
            <div class="col-sm-10">
                <select name="edit-find_child_products" id="edit-find_child_products" class="form-control"></select>
            </div>
        </div><!-- /.form-group -->
        
        <div class="edit-child-products-container form-group" style="display: none; height: 250px; overflow-y:scroll">
            <input type="hidden" id="edit-child_products">
            <input type="hidden" id="edit-child_products_quantity">

            <div class="d-flex justify-content-center mb-3">
                <div id="edit-childrenProductsLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>@lang('products.Name')</td>
                        <td>@lang('products.SKU')</td>
                        <td>@lang('products.Price')</td>
                        <td>@lang('products.Valied Quantity')</td>
                        <td>@lang('products.Quantity For Each Package')</td>
                        <td>@lang('products.Total Quantity')</td>
                        <td>@lang('products.Actions')</td>
                    </tr>
                </thead>
                <tbody id="edit-selected_child_product_container"></tbody>
            </table>
        </div>

        <div id="edit-productQuantityContainer" class="form-group row">
            <label for="edit-quantity" class="col-sm-2 col-form-label">@lang('products.Quantity')</label>
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
            <label for="edit-price" class="col-sm-2 col-form-label">@lang('products.Price_Without_Tax')</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="9"  class="form-control" id="edit-price" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-priceErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <label for="edit-price_after_sale" class="col-sm-2 col-form-label">@lang('products.Price_After_Sale')</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="10"  class="form-control" id="edit-price_after_sale" value="0">
                <div style="padding: 5px 7px; display: none" id="edit-price_after_saleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-4">
                <div style="padding: 5px 7px;" class="alert alert-info">
                    @lang('products.price_des_1')
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-main_image" class="col-sm-2 col-form-label">@lang('products.Main_Image')</label>
            <div class="col-sm-10">
                <input id="edit-main_image" tabindex="12" type="file" data-jpreview-container="#demo-3-container">
                <div id="demo-3-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="edit-main_imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-images" class="col-sm-2 col-form-label">@lang('products.Product_Images')</label>
            <div class="col-sm-10">
                <input id="edit-images" name="edit-images[]" tabindex="13" type="file" multiple data-jpreview-container="#demo-4-container">
                <div id="demo-4-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="edit-imagesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="edit-images" class="col-sm-2 col-form-label">@lang('products.Brand')</label>
            <div class="col-sm-10">
                <select tabindex="15" id="edit-brand_id" name="edit-brand_id" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="edit-brandErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="edit-categories" class="col-sm-2 col-form-label">@lang('products.Category')</label>
            <div class="col-sm-10">
                <select type="text" tabindex="11" name="edit-categories[]" class="form-control"  multiple="multiple" id="edit-categories" placeholder="Category"></select>
                <div style="padding: 5px 7px; display: none" id="edit-categoriesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group" id="edit-custome-field-container">
            <input type="hidden" id="edit-custome_attr_id">
            <input type="hidden" id="edit-custome_field_attr">

            <div class="d-flex justify-content-center mb-3">
                <div id="edit-customrFieldLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div><!-- /.justify-content-center -->
        </div><!-- /.form-group -->


        <button class="update-object btn btn-warning float-right">@lang('products.Update_Product')</button>
    </form>
</div>


@push('page_scripts')
<script>
$(function () {
    const edit_form_custome_option = (function () {
        window.edit_selected_child_products          = [];
        window.edit_selected_child_products_quantity = {};

        function starter_event () {
            /**
                We had the edit form with same functionality that we use in the create form 
                we only use 
            */

            // clear old session 
            $('#dataTable').on('click', '.edit-object', function () {
                let target_card = $(this).data('target-card');
                if (target_card === '#editObjectsCard') {
                    edit_selected_child_products          = [];
                    edit_selected_child_products_quantity = {};
                    update_child_products_input_field();
                    $('.edit-selected-product-child').remove();
                    $('#edit-is_composite').val('0').trigger('change');
                    $('#edit-reserved_quantity').val(1);
                    $('#edit-main_image').val('');
                    $('#edit-images').val('');
                } 
            });

            $('#edit-find_child_products').change(function () {
                console.log('test done 11');
                let target_product_id     = $(this).val();
                let total_parent_quantity = $('#edit-reserved_quantity').val();
            
                if (target_product_id !== '' && target_product_id != null && ! (target_product_id in edit_selected_child_products_quantity)) {
                    $('#edit-childrenProductsLoddingSpinner').show(500);
                    // send request to the server and get product data
                    axios.get(`{{ url('admin/products') }}/${target_product_id}?fast_acc=true`)
                    .then(res => {
                        /**
                            1- track the selected quantity
                            2- track removed product
                            3- update selected product list

                            "#edit-selected_child_product_container" selected products table container
                            ".edit-selected-product-child" child product row general class
                            "#edit-selectd_child_product_${id}" child product row specific id

                            "edit-selected-product-child-quantity" child product row quantity field
                            "edit-selectd_child_product_quantity_${id}" child product row quantity secific field

                            ".remove-selected-product-child" remove child product row

                        */
                        const target_product = res.data.data;
                        create_child_product_tr (target_product, total_parent_quantity);
                    });
                } else if (target_product_id in edit_selected_child_products_quantity) {
                    $(`#edit-selectd_child_product_${target_product_id}`).css('border', '1px solid red');
                    $('#edit-find_child_productsErr').text('product already exits in the list').slideDown(500);

                    setTimeout(() => {
                        $(`#edit-selectd_child_product_${target_product_id}`).css('border', '');
                        $('#edit-find_child_productsErr').text('').slideUp(500);
                    }, 3000);
                }// end :: if
            });

            $('#edit-reserved_quantity').on('change keyup', function () {
                const total_parent_quantity = $(this).val();

                edit_selected_child_products.forEach(product_id => {
                    const original_valied_quantity = $(`#edit-selectd_child_product_${product_id}`).data('original-quantity');
                    
                    let left_quantity  = original_valied_quantity - (edit_selected_child_products_quantity[product_id] * total_parent_quantity);
                    let total_quantity = edit_selected_child_products_quantity[product_id] * total_parent_quantity;

                    left_quantity <= 0 ? $(`#edit-selectd_child_product_quantity_${product_id}`).css('color', 'red') : $(`#edit-selectd_child_product_quantity_${product_id}`).css('color', '') ; 
                    $(`#edit-selectd_child_product_quantity_${product_id}`).text(left_quantity);
                    $(`#edit-selectd_child_product_total_quantity_${product_id}`).text(total_quantity);

                });
            });

            $('#edit-selected_child_product_container').on('change keyup', '.edit-selected-product-child-quantity', function () {
                const original_valied_quantity = $(this).data('original-quantity');
                const selected_quantity_value  = $(this).val();
                const targted_product_id       = $(this).data('target');
                const total_parent_quantity    = $('#edit-reserved_quantity').val();

                let left_quantity  = original_valied_quantity - (selected_quantity_value * total_parent_quantity);
                let total_quantity = selected_quantity_value * total_parent_quantity;

                left_quantity <= 0 ? $(`#edit-selectd_child_product_quantity_${targted_product_id}`).css('color', 'red') : $(`#edit-selectd_child_product_quantity_${targted_product_id}`).css('color', '') ; 
                $(`#edit-selectd_child_product_quantity_${targted_product_id}`).text(left_quantity);
                $(`#edit-selectd_child_product_total_quantity_${targted_product_id}`).text(total_quantity);

                // update quantity list
                update_selected_child_products (targted_product_id, selected_quantity_value)
            });

            $('#edit-selected_child_product_container').on('click', '.edit-remove-selected-product-child', function (e) {
                e.preventDefault();
                let targted_product_id = $(this).data('target');
                
                $(`#edit-selectd_child_product_${targted_product_id}`).remove();
                remove_selected_child_products (targted_product_id)
            });
        }

        window.create_child_product_tr = function (target_product, total_parent_quantity, parent_meta = null) {
            let target_product_r_quantity = parent_meta !== null ? parent_meta.products_quantity[target_product.id] : 1;
            let total_needed_quantity     = target_product_r_quantity * total_parent_quantity;
            let original_quantity         = parent_meta !== null ? target_product.quantity + total_needed_quantity: target_product.quantity;
            let left_quantity             = parent_meta !== null ? target_product.quantity : target_product.quantity - total_needed_quantity;

            const product_row = `
                <tr class="edit-selected-product-child" id="edit-selectd_child_product_${target_product.id}"
                    data-original-quantity="${original_quantity}" 
                >
                    <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                    <td>${target_product.ar_name} / ${target_product.en_name}</td>
                    <td>${target_product.sku}</td>
                    <td>${target_product.price}</td>

                    <td id="edit-selectd_child_product_quantity_${target_product.id}" >
                        ${left_quantity}
                    </td>
                    <td>
                        <input class="edit-selected-product-child-quantity" 
                            value="${target_product_r_quantity}"
                            style="width: 100px;" type="number" min="1" step="1" max="${target_product.quantity}"
                            data-target="${target_product.id}"
                            data-original-quantity="${original_quantity}" 
                        />
                    </td>
                    <td id="edit-selectd_child_product_total_quantity_${target_product.id}" >
                        ${total_needed_quantity}
                    </td>

                    <td>
                        <button class="edit-remove-selected-product-child btn btn-sm btn-danger"
                            data-target="${target_product.id}"
                        >
                            <i class="fas fa-minus-circle"></i>
                        </button>
                    </td>
                </tr>
            `;

            $('#edit-selected_child_product_container').prepend(product_row);
            $('#edit-find_child_products').val('').trigger('change');
            $('#edit-childrenProductsLoddingSpinner').hide(500);
            
            update_selected_child_products (target_product.id, 1);
        }

        window.update_selected_child_products = function (targted_product_id, selected_quantity_value) {
            !edit_selected_child_products.includes(targted_product_id) && edit_selected_child_products.push(targted_product_id);
            edit_selected_child_products_quantity[targted_product_id] = parseInt(selected_quantity_value);
            
            // console.log(edit_selected_child_products_quantity, edit_selected_child_products);
            update_child_products_input_field()
        }

        function remove_selected_child_products (targted_product_id) {
            edit_selected_child_products = edit_selected_child_products.filter(product_id => product_id != targted_product_id);
            delete edit_selected_child_products_quantity[targted_product_id];
            
            // console.log(edit_selected_child_products_quantity, edit_selected_child_products);
            update_child_products_input_field()
        }

        function update_child_products_input_field () {
            $('#edit-child_products').val(JSON.stringify(edit_selected_child_products));
            $('#edit-child_products_quantity').val(JSON.stringify(edit_selected_child_products_quantity));

            // console.log($('#edit-child_products').val(), $('#edit-child_products_quantity').val());
        }

        return {
            starter_event : starter_event
        }
    })();

    edit_form_custome_option.starter_event();

    const upgradable_option = (function () {

        const starter_event = () => {
            $('#edit-findCategoryProduct').select2({width: '100%'});

            // clear old session 
            $('#dataTable').on('click', '.edit-object', function () {
                store.clearStore()
                render.render_products()
                render.render_categories()
                render.render_products_options()
                render.render_expected_price()
            });

            // add category to categories list
            $('#edit-categories-upgradable').change(function () {
                let target_category_id = $(this).val();

                if ( Boolean(target_category_id) ) {
                    $('#edit-childrenCategoriesLoddingSpinner').show(500);
                    // send request to the server and get product data
                    axios.get(`{{ url('admin/products-categories') }}/${target_category_id}`,  {
                        params : {
                            my_products : true
                        }
                    })
                    .then(res => {
                        if (res.data.success) {

                            store.addCategory(res.data.category, res.data.data);

                            render.render_categories();
                            
                            $(this).val('').trigger('change');
                        }// end :: if

                        $('#edit-childrenCategoriesLoddingSpinner').hide(500);
                    });
                }// end :: if
            });

            // select category to show it's products // remove category
            $('#edit-upgradableOptionsList').on('click', '.list-group-item', function () {
                const target_id = $(this).data('id');

                if (Boolean(target_id)) {
                    $('.list-group-item').removeClass('active');
                    $(this).addClass('active');
                    
                    store.selectedCategory(target_id);
                    
                    render.render_products_options();
                    render.render_products();
                    render.render_expected_price();
                }
            }).on('click', '.u-remove-category', function (e) {
                e.preventDefault();
                let category_id = $(this).data('id');
                
                if (Boolean(category_id)) {
                    store.removeCategory(category_id);
                    render.render_categories();
                    render.render_expected_price();
                }
            });

            // select product from category
            $('#edit-findCategoryProduct').change(function () {
                const product_id = $(this).val();
                if (Boolean(product_id)) {
                    store.selectProduct(product_id);
                    render.render_products();
                    $(this).val('').trigger('change');
                }
            });

            // manage product qunatity, price, is default and remove product || update price and hidden input
            $('#edit-upgradableOptionCategoryProducts').on('change', '.custom-control-input', function () {
                let product_id = $(this).data('id');
                
                store.selectDefaultProduct(product_id);
                render.render_products();
                render.render_expected_price();
            }).on('change', '.u-selected-product-quantity', function () {
                let quantity = $(this).val();
                let product_id = $(this).data('id');

                store.editProductQuantity(product_id, quantity);
                render.render_products();
                render.render_categories();
                render.render_expected_price();
                $(`.u-selected-product-quantity[data-id="${product_id}"]`).focus();

            }).on('change', '.u-selected-product-price', function () {
                let price = $(this).val();
                let product_id = $(this).data('id');

                store.editProductPrice(product_id, price);

                render.render_products();
                render.render_categories();
                render.render_expected_price();

                $(`.u-selected-product-price[data-id="${product_id}"]`).focus();
            }).on('click', '.u-remove-selected-product', function () {
                let product_id = $(this).data('id');

                store.removeProduct(product_id);
                render.render_products();
                render.render_expected_price();
            });

            // change total reserved quantity || update price and hidden input
            $('#edit-reserved_quantity').on('change', function () {
                store.addReservedQuantity(Number($(this).val()));
                render.render_products();
                render.render_expected_price();
            });
        }

        const store = (() => {
            let store = {
                expected_price    : 0,
                reserved_quantity : 1,
                selected_category : null,// the one we clicked on to show it products
                categories : [],// all selected categories
                categories_products : {},// each category products
                selected_categories_products : {},// each category selected product,
                "child_products_id" : [],
                "products_quantity" : {}
            };

            // getters
            const findCategory = (category_id) => {
                let target_category = store.categories.find(category => category.id == category_id);
                return Boolean(target_category) ? target_category : false;
            }

            const getCategories = () => ({s_category:  store.selected_category, categories : store.categories});

            const getCategoryProducts = () => {
                return Boolean(store.selected_category) ?
                store.categories_products[store.selected_category] : [];
            }
            
            const getCategoryProductsLength = (category_id) => {
                return store.categories_products[category_id].length;
            }

            const getSelectedCategoryProductsLength = (category_id) => {
                return store.selected_categories_products[category_id].length;
            }

            const getSelectedCategoryProducts = () => {
                return Boolean(store.selected_category) ?
                    store.selected_categories_products[store.selected_category] : [];
            }

            const getSelectedCategoriesProducts = () => store.selected_categories_products;

            const getReservedQuantity = () => store.reserved_quantity;

            const getExpectedPrice = () => store.expected_price

            // setters
            const addReservedQuantity = (quantity) => {
                store.reserved_quantity = quantity;
            }

            const addCategory = (new_category_obj, products_list) => {
                if (!findCategory(new_category_obj.id)) {
                    store.categories.push(new_category_obj);
                    store.categories_products[new_category_obj.id] = products_list;
                    store.selected_categories_products[new_category_obj.id] = [];

                    // parse updates in upgradable inputes fields
                    parseRequestData();
                }
            }

            const removeCategory = (category_id) => {
                store.categories = store.categories.filter(category => category.id != category_id);
                
                store.selected_categories_products[category_id].forEach(selectedProduct => {
                    store.child_products_id = store.child_products_id.filter(productId => productId != selectedProduct.id);
                    delete store.products_quantity[selectedProduct.id]
                });

                delete store.categories_products[category_id];
                delete store.selected_categories_products[category_id];
                
                // parse updates in upgradable inputes fields
                parseRequestData();
            }

            const selectedCategory = (category_id) => {
                store.selected_category = category_id;
                
                // parse updates in upgradable inputes fields
                parseRequestData();
            }

            // hidden fields
            const selectProduct = (product_id, meta = null) => {
                let is_exist = store.selected_categories_products[store.selected_category].find(product => product.id == product_id);

                if (!is_exist) {
                    const target_product = (store.categories_products[store.selected_category].find(product => product.id == product_id));
                    console.log('selectProduct : ', store.categories_products, product_id, target_product);
                    target_product.is_default      = Boolean(meta.is_default) ? meta.is_default      : false;
                    target_product.needed_quantity = Boolean(meta.needed_quantity) ? meta.needed_quantity : 0;
                    target_product.upgrade_price   = Boolean(meta.upgrade_price) ? meta.upgrade_price   : Number(target_product.price);

                    store.selected_categories_products[store.selected_category].push(target_product);
                    // added new
                    store.child_products_id.push(target_product.id);
                    store.products_quantity[target_product.id] = 1;
                }

                // parse updates in upgradable inputes fields
                parseRequestData();
            }

            // update price and hidden fields
            const removeProduct = (product_id) => {
                let products_list = getSelectedCategoryProducts();
                let new_products_list = [];
                let is_need_new_default = false;

                products_list.forEach((product, index) => {
                    if (product.id != product_id) {
                        new_products_list.push(product);
                    } else if(product.is_default) {
                        is_need_new_default = true;
                    }
                });

                // if (is_need_new_default) new_products_list[0].is_default = true;
                
                store.selected_categories_products[store.selected_category] = new_products_list;
                // added new
                store.child_products_id = store.child_products_id.filter(productId => productId != product_id);
                delete store.products_quantity[product_id];
                
                // parse updates in upgradable inputes fields
                parseRequestData();
                calculateExpectedPrice();
            }

            // update price and hidden fields
            const selectDefaultProduct = (product_id) => {
                store.selected_categories_products[store.selected_category].forEach(product => {
                    product.is_default = product.id == product_id ? !product.is_default : false;
                });
                
                // parse updates in upgradable inputes fields
                parseRequestData();

                // calculate expected price and update the price field
                calculateExpectedPrice();
            }

            // update price and hidden fields
            const editProductQuantity = (product_id, quantity) => {
                store.selected_categories_products[store.selected_category].forEach((product, index) => {
                    if (product.id == product_id) {
                        product.needed_quantity = quantity;
                        store.products_quantity[product_id] = quantity;
                        return;
                    }
                });

                // parse updates in upgradable inputes fields
                parseRequestData();
                calculateExpectedPrice();
            }

            // update price and hidden fields
            const editProductPrice = (product_id, price) => {
                store.selected_categories_products[store.selected_category].forEach((product, index) => {
                    if (product.id == product_id) {
                        product.upgrade_price = price;
                        return;
                    }
                });
                
                // parse updates in upgradable inputes fields
                parseRequestData();
                calculateExpectedPrice();
            }

            const clearStore = () => {
                store = {
                    expected_price    : 0,
                    reserved_quantity : 1,
                    selected_category : null,
                    categories : [],
                    categories_products : {},
                    selected_categories_products : {},
                    child_products_id : [],
                    products_quantity : {}
                };

                parseRequestData();
            }

            // private methods
            const calculateExpectedPrice = () => {
                store.expected_price = 0;
                store.categories.forEach(category => {
                    // console.log('test calc : ', store.selected_categories_products, category.id, store.selected_categories_products[category.id]);
                    store.selected_categories_products[category.id].forEach(product => {
                        store.expected_price += product.is_default 
                        ? product.needed_quantity * product.upgrade_price : 0;
                    });
                });
            }

            const parseRequestData = () => {
                let categoreis = store.categories.map(category => category.id);
                let selectedProdcuts = {};
                let selectedProdcutsIds = {};
                categoreis.forEach(category_id => {
                    
                    selectedProdcutsIds[category_id] = [];

                    selectedProdcuts[category_id] = {};

                    store.selected_categories_products[category_id].forEach(product => {
                        selectedProdcutsIds[category_id].push(product.id);
                        selectedProdcuts[category_id][product.id] = {id: product.id, upgrade_price : product.upgrade_price, needed_quantity : product.needed_quantity, is_default : product.is_default}
                    });
                });

                $('#edit-upgrade_option_categories').val(JSON.stringify(categoreis));
                $('#edit-upgrade_option_products').val(JSON.stringify(selectedProdcuts));
                $('#edit-upgrade_option_products_ids').val(JSON.stringify(selectedProdcutsIds));
                $('#edit-child_products').val(JSON.stringify(store.child_products_id));
                $('#edit-child_products_quantity').val(JSON.stringify(store.products_quantity));
                
                // console.log('parseRequestData 1: ', categoreis, selectedProdcuts, selectedProdcutsIds)
                // console.log('parseRequestData 2: ', store.child_products_id, store.products_quantity);
            };

            // special method for rendering the edit form
            const setStoreEditData = (data) => {

                // data.upgrade_categories;
                // data.upgrade_products;

                // categories : [],// all selected categories
                // categories_products : {},// each category products { cat_id : [] , }
                // selected_categories_products : {}// each category selected product { cat_id : [] , }

                let meta = JSON.parse(data.meta);
                console.log(meta);
                addReservedQuantity(data.quantity)
                
                let requests_count = 0;
                meta.upgrade_categories.forEach(category_id => {
                    $('#edit-childrenCategoriesLoddingSpinner').show(500);

                    axios.get(`{{ url('admin/products-categories') }}/${category_id}`,  {
                        params : {
                            my_products : true
                        }
                    }).then(res => {
                        if (res.data.success) {
                            // get category and related products
                            addCategory(res.data.category, res.data.data);
                            return res.data.category;
                        }// end :: if
                    }).then(category => {
                        console.log(category.id);
                        // store.categories.forEach(category => {
                        //     selectedCategory(category.id);
                        //     meta.upgrade_products_id[category.id].forEach(product_id => {
                        //         selectProduct(product_id, meta.upgrade_products[category.id][product_id]);
                        //     });
                        // });// end :: store.categories

                        selectedCategory(category.id);
                        meta.upgrade_products_id[category.id].forEach(product_id => {
                            console.log(meta.upgrade_products[category.id], meta.upgrade_products[category.id][product_id]);
                            selectProduct(product_id, meta.upgrade_products[category.id][product_id]);
                        });
                    

                        // selectedCategory(null);
                        calculateExpectedPrice();
                        render.render_categories();
                        render.render_expected_price();
                    }).then(() => {
                        requests_count++
                        if (requests_count === meta.upgrade_categories.length) {
                            $('#edit-childrenCategoriesLoddingSpinner').hide(500);
                        }
                        // console.log(requests_count, meta.upgrade_categories.length);
                    }).catch(err => {
                        console.log('Enable to finsh requesting upgradable products in 829_edit : ', err);
                        $('#edit-categories-upgradableErr').text('Enable to bring data successfully !!').slideDown(500);
                        setTimeout(() => {
                            $('#edit-categories-upgradableErr').text('').slideUp(500);
                        }, 5000);
                    });
                    
                });
            }

            return {
                getCategories,
                getCategoryProducts,
                getCategoryProductsLength,
                getSelectedCategoryProductsLength,
                getSelectedCategoryProducts,
                getSelectedCategoriesProducts,
                getReservedQuantity,
                editProductPrice,
                getExpectedPrice,

                addReservedQuantity,
                addCategory,
                removeCategory,
                selectedCategory,
                selectProduct,
                removeProduct,
                selectDefaultProduct,
                editProductQuantity,
                parseRequestData,
                clearStore,

                setStoreEditData
            }
        })();

        const render = ((store) => {
            const render_categories = () => {
                $('#edit-upgradableOptionsList .u-list-group-item').remove();
                const {s_category, categories} = store.getCategories();
                categories.forEach(category => {
                    let tmp_category_el = `
                        <li id="upgradeCategory${category.id}" style="cursor: pointer" data-id="${category.id}" class="${s_category == category.id ? 'active' : ''} upgrade-category-option u-list-group-item list-group-item">
                            <button data-id="${category.id}" class="u-remove-category btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i></button>
                            <span>${category.ar_title} / ${category.en_title}</span>
                            <br/> 
                            <span class="badge badge-light">Valied Products : ${store.getCategoryProductsLength(category.id)}</span>
                            <span class="badge badge-light">Selected Products : ${store.getSelectedCategoryProductsLength(category.id)}</span>
                        </li>
                    `;

                    $('#edit-upgradableOptionsList').append(tmp_category_el);
                });
            }

            const render_products_options = () => {
                // reset old options
                $('#edit-findCategoryProduct .selected-category-option').remove();
                
                // get related products for the category
                // const category_products = upgradable_option_store.categories_products[target_id];
                const products = store.getCategoryProducts();
                if (Boolean(products)) {
                    products.forEach(product => {
                        let option_el = `
                            <option class="selected-category-option" value="${product.id}">
                                ${product.ar_name} / ${product.en_name}
                            </option>
                        `;

                        $('#edit-findCategoryProduct').append(option_el);
                    });
                }

                // clear old value 
                $('#edit-findCategoryProduct').val('').trigger('change');
            }

            const render_products = () => {
                $('#edit-upgradableOptionCategoryProducts .selected-category-child').remove();
                const products = store.getSelectedCategoryProducts();

                if (Boolean(products)) {
                    let total_parent_quantity = store.getReservedQuantity();
                    products.forEach(target_product => {
                        let product_el = `
                            <tr class="selected-category-child" id="selectd_child_product_${target_product.id}"
                                data-original-quantity="${target_product.quantity}" 
                            >
                                <td><img style="heightL 80px" height="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                                <td>${target_product.ar_name} / ${target_product.en_name}</td>
                                <td>${target_product.sku}</td>
                                <td>${target_product.price}</td>
                                <td>
                                    <input class="u-selected-product-price" 
                                        data-id="${target_product.id}"
                                        value="${target_product.upgrade_price}"
                                        style="width: 100px;" type="number" min="1" step="1""
                                    />
                                </td>
                                <td>
                                    <span class="${target_product.quantity - target_product.needed_quantity * total_parent_quantity < 0 ? 'text-danger' : 'text-primary'} ">${target_product.quantity - target_product.needed_quantity * total_parent_quantity}</span>
                                </td>
                                <td>
                                    <input class="u-selected-product-quantity" 
                                        data-id="${target_product.id}"
                                        value="${target_product.needed_quantity}"
                                        style="width: 100px;" type="number" min="1" step="1" max="${target_product.quantity}"
                                    />
                                </td>
                                <td>
                                    ${target_product.needed_quantity * total_parent_quantity}
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" ${target_product.is_default ? 'checked="true"' : ''} data-id="${target_product.id}" id="customSwitch${target_product.id}">
                                        <label class="custom-control-label" for="customSwitch${target_product.id}"></label>
                                    </div>
                                </td>
                                <td>
                                    <button class="u-remove-selected-product btn btn-sm btn-danger"
                                        data-id="${target_product.id}"
                                    >
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        `;

                        $('#edit-upgradableOptionCategoryProducts').append(product_el);
                    });
                }
            } 

            const render_expected_price = () => {
                // console.log('expected price : ', store.getExpectedPrice());
                const price = store.getExpectedPrice();
                $('#edit-price').val(price);
                $('#edit-upgradeExpectedPrice').text(price);
            }

            return {
                render_products,
                render_categories,
                render_products_options,
                render_expected_price
            };
            
        })(store);

        return {
            starter_event : starter_event,
            setStoreEditData : store.setStoreEditData
        };
    })();

    upgradable_option.starter_event();
    window.setStoreEditData = upgradable_option.setStoreEditData
});
</script>
@endpush