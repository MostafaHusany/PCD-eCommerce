
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
            <label for="is_composite" class="col-sm-2 col-form-label">Product Type</label>
            <div class="col-sm-10">
                <select tabindex="7" id="is_composite" name="is_composite" 
                    data-first-target=".child-products-container" 
                    data-second-target="#productQuantityContainer"
                    data-third-target=".upgradable-options"
                     
                    class="form-control">
                    <option value="0">Usual product</option>
                    <option value="1">Composite Product (تجميعات, حزمة عروض)</option>
                    <option value="2">Upgradable Product (تجميعات)</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="is_compositeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="storage_quantity" class="col-sm-2 col-form-label">Storage Quantity</label>
            <div class="col-sm-10">
                <input type="number" tabindex="9"  class="form-control" min="0" id="storage_quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="storage_quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="upgradable-options child-products-container form-group row" style="display: none;">
            <label for="reserved_quantity" class="col-sm-2 col-form-label">Reserved Quantity</label>
            <div class="col-sm-10">
                <input type="number" tabindex="8"  class="form-control" min="0" id="reserved_quantity" value="1">
                <div style="padding: 5px 7px; display: none" id="reserved_quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-10 mt-2">
                <div style="padding: 5px 7px; !font-size: 12px" class="alert alert-info">
                    This quantity will be reserved from the child products and will not sold as individual products 
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="child-products-container form-group row mt-2 mb-2 pt-2 pb-2" style="display: none;">
            <div class="col-sm-2">
                <label for="">Child Products</label>
            </div>
            <div class="col-sm-10">
                <select name="find_child_products"  !multiple="multiple" id="find_child_products" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="find_child_productsErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="upgradable-options form-group row mt-4 mb-2 pt-2 pb-2" style="display: none;">
            <div class="col-sm-2">
                <label for="">Selected Categories</label>
            </div>
            <div class="col-sm-10">
                <select name="categories-upgradable" tabindex="9"  !multiple="multiple" id="categories-upgradable" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="categories-upgradableErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.upgradable-options -->

        <div class="upgradable-options form-group mb-4" style="display: none; !height: 350px; !overflow-y:scroll">
            <input type="hidden" id="upgrade_option_categories">
            <input type="hidden" id="upgrade_option_products">
            <input type="hidden" id="upgrade_option_products_ids">

            <div class="d-flex justify-content-center mb-3">
                <div id="childrenCategoriesLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="row">
                <div class="col-4" style="overflow-y: scroll; height: 450px;">
                    <ul class="list-group" id="upgradableOptionsList">
                        <li class="list-group-item">
                            <h5>Expected price : <span id="upgradeExpectedPrice" class="text-primary">0</span>SR<h5>
                        </li>
                    </ul>
                </div>
                <div class="col-8" style="overflow-y: scroll; min-height: 300px; height: 450px;">
                    <div class="form-group">
                        <select name="findCategoryProduct" !multiple="multiple" id="findCategoryProduct" class="form-control">
                            <option value="">-- select product --</option>
                        </select>
                    </div><!-- /.form-group -->
                    <table class="text-center table !table-responsive">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>SKU</td>
                                <td>Price</td>
                                <td>Edit Price</td>
                                <td>Valied Quantity</td>
                                <td>Quantity For Each Package</td>
                                <td>Total Quantity</td>
                                <td>Is Default</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody id="upgradableOptionCategoryProducts"></tbody>
                    </table>
                </div>
                <!-- <div class="col-4"></div> -->
            </div><!-- /. row -->
        </div><!-- /.upgradable-options -->

        <div class="child-products-container form-group" style="display: none; height: 250px; overflow-y:scroll">
            <input type="hidden" id="child_products">
            <input type="hidden" id="child_products_quantity">

            <div class="d-flex justify-content-center mb-3">
                <div id="childrenProductsLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>SKU</td>
                        <td>Price</td>
                        <td>Valied Quantity</td>
                        <td>Quantity For Each Package</td>
                        <td>Total Quantity</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody id="selected_child_product_container"></tbody>
            </table>
        </div>

        <div id="productQuantityContainer" class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="number" tabindex="9"  class="form-control" min="0" id="quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" tabindex="10"  class="form-control" id="sku" placeholder="SKU">
                <div style="padding: 5px 7px; display: none" id="skuErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price Without Tax</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="11"  class="form-control" id="price" value="0">
                <div style="padding: 5px 7px; display: none" id="priceErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
            <label for="price_after_sale" class="col-sm-2 col-form-label">Price After Sale</label>
            <div class="col-sm-2">
                <input type="number" min="0" step="0.5" tabindex="12"  class="form-control" id="price_after_sale" value="0">
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
            <label for="main_image" class="col-sm-2 col-form-label">Main Image</label>
            <div class="col-sm-10">
                <input id="main_image" tabindex="13" type="file" data-jpreview-container="#demo-1-container">
                <div id="demo-1-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="main_imageErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="images" class="col-sm-2 col-form-label">Product Images</label>
            <div class="col-sm-10">
                <input id="images" name="images[]" tabindex="14" type="file" multiple data-jpreview-container="#demo-2-container">
                <div id="demo-2-container" class="jpreview-container"></div>
                <div style="padding: 5px 7px; display: none" id="imagesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="images" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <select tabindex="15" id="brand_id" name="brand_id" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="brandErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="categories" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select type="text" tabindex="16" name="categories[]" class="form-control"  multiple="multiple" id="categories"></select>
                <div style="padding: 5px 7px; display: none" id="categoriesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group" id="custome-field-container">
            <input type="hidden" id="custome_attr_id">
            <input type="hidden" id="custome_field_attr">

            <div class="d-flex justify-content-center mb-3">
                <div id="customrFieldLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div><!-- /.justify-content-center -->
        </div><!-- /.form-group -->

        <button tabindex="17" class="create-object btn btn-primary float-right">Create {{ $object_title }}y</button>
    </form>
</div>


@push('page_scripts')
<script>
$(function () {
    
    const create_form_custome_option = (function () {
        
        let selected_child_products          = [];
        let selected_child_products_quantity = {};

        function starter_event () {
            // clear old session 
            $('.toggle-btn').click(function () {
                let target_card = $(this).data('target-card');
                if (target_card === '#createObjectCard') {
                    selected_child_products          = [];
                    selected_child_products_quantity = {};

                    update_child_products_input_field();
                    
                    $('.selected-product-child').remove();
                    $('#is_composite').val('0').trigger('change');
                    $('#reserved_quantity').val(1);
                } 
            });

            $('#find_child_products').change(function () {
                let target_product_id     = $(this).val();
                let total_parent_quantity = $('#reserved_quantity').val();
                
                if ( Boolean(target_product_id)  && ! (target_product_id in selected_child_products_quantity)) {
                    $('#childrenProductsLoddingSpinner').show(500);
                    // send request to the server and get product data
                    axios.get(`{{ url('admin/products') }}/${target_product_id}?fast_acc=true`)
                    .then(res => {
                        /**
                            1- track the selected quantity
                            2- track removed product
                            3- update selected product list

                            "#selected_child_product_container" selected products table container
                            ".selected-product-child" child product row general class
                            "#selectd_child_product_${id}" child product row specific id

                            "selected-product-child-quantity" child product row quantity field
                            "selectd_child_product_quantityt_${id}" child product row quantity secific field

                            ".remove-selected-product-child" remove child product row

                        */
                        const target_product = res.data.data;
                        const product_row = `
                            <tr class="selected-product-child" id="selectd_child_product_${target_product.id}"
                                data-original-quantity="${target_product.quantity}" 
                            >
                                <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                                <td>${target_product.ar_name} / ${target_product.en_name}</td>
                                <td>${target_product.sku}</td>
                                <td>${target_product.price}</td>
                                <td id="selectd_child_product_quantity_${target_product.id}" >
                                    ${target_product.quantity - total_parent_quantity}
                                </td>
                                <td>
                                    <input class="selected-product-child-quantity" 
                                        value="1"
                                        style="width: 100px;" type="number" min="1" step="1" max="${target_product.quantity}"
                                        data-target="${target_product.id}"
                                        data-original-quantity="${target_product.quantity}" 
                                    />
                                </td>
                                <td id="selectd_child_product_total_quantity_${target_product.id}" >
                                    ${1 * total_parent_quantity}
                                </td>
                                <td>
                                    <button class="remove-selected-product-child btn btn-sm btn-danger"
                                        data-target="${target_product.id}"
                                    >
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        `;

                        $('#selected_child_product_container').prepend(product_row);
                        update_selected_child_products (target_product.id, 1);
                        $('#find_child_products').val('').trigger('change');
                        $('#childrenProductsLoddingSpinner').hide(500);
                    });
                } else if (target_product_id in selected_child_products_quantity) {
                    $(`#selectd_child_product_${target_product_id}`).css('border', '1px solid red');
                    $('#find_child_productsErr').text('product already exits in the list').slideDown(500);

                    setTimeout(() => {
                        $(`#selectd_child_product_${target_product_id}`).css('border', '');
                        $('#find_child_productsErr').text('').slideUp(500);
                    }, 3000);
                }// end :: if
            });

            $('#reserved_quantity').on('change keyup', function () {
                const total_parent_quantity = $(this).val();

                selected_child_products.forEach(product_id => {
                    const original_valied_quantity = $(`#selectd_child_product_${product_id}`).data('original-quantity');
                    
                    let left_quantity  = original_valied_quantity - (selected_child_products_quantity[product_id] * total_parent_quantity);
                    let total_quantity = selected_child_products_quantity[product_id] * total_parent_quantity;

                    left_quantity <= 0 ? $(`#selectd_child_product_quantity_${product_id}`).css('color', 'red') : $(`#selectd_child_product_quantity_${product_id}`).css('color', '') ; 
                    $(`#selectd_child_product_quantity_${product_id}`).text(left_quantity);
                    $(`#selectd_child_product_total_quantity_${product_id}`).text(total_quantity);

                });
            });

            $('#selected_child_product_container').on('change keyup', '.selected-product-child-quantity', function () {
                const original_valied_quantity = $(this).data('original-quantity');
                const selected_quantity_value  = $(this).val();
                const targted_product_id       = $(this).data('target');
                const total_parent_quantity    = $('#reserved_quantity').val();

                let left_quantity  = original_valied_quantity - (selected_quantity_value * total_parent_quantity);
                let total_quantity = selected_quantity_value * total_parent_quantity;

                left_quantity <= 0 ? $(`#selectd_child_product_quantity_${targted_product_id}`).css('color', 'red') : $(`#selectd_child_product_quantity_${targted_product_id}`).css('color', '') ; 
                $(`#selectd_child_product_quantity_${targted_product_id}`).text(left_quantity);
                $(`#selectd_child_product_total_quantity_${targted_product_id}`).text(total_quantity);

                // update quantity list
                update_selected_child_products (targted_product_id, selected_quantity_value)
            });

            $('#selected_child_product_container').on('click', '.remove-selected-product-child', function (e) {
                e.preventDefault();
                let targted_product_id = $(this).data('target');
                
                $(`#selectd_child_product_${targted_product_id}`).remove();
                remove_selected_child_products (targted_product_id)
            });
        }
        
        function update_selected_child_products (targted_product_id, selected_quantity_value) {
            !selected_child_products.includes(targted_product_id) && selected_child_products.push(targted_product_id);
            selected_child_products_quantity[targted_product_id] = parseInt(selected_quantity_value);
            
            update_child_products_input_field()
        }

        function remove_selected_child_products (targted_product_id) {
            selected_child_products = selected_child_products.filter(product_id => product_id != targted_product_id);
            // selected_child_products.pop(targted_product_id);
            delete selected_child_products_quantity[targted_product_id];
            
            update_child_products_input_field()
        }

        function update_child_products_input_field () {
            $('#child_products').val(JSON.stringify(selected_child_products));
            $('#child_products_quantity').val(JSON.stringify(selected_child_products_quantity));
        }
        
        return {
            starter_event : starter_event
        }
    })();

    create_form_custome_option.starter_event()

    const upgradable_option = (function () {

        const starter_event = () => {
            $('#findCategoryProduct').select2({width: '100%'});

            // clear old session 
            $('.toggle-btn').click(function () {
                store.clearStore()

                render.render_products()
                render.render_categories()
                render.render_products_options()
                render.render_expected_price()
            });

            // add category to categories list
            $('#categories-upgradable').change(function () {
                let target_category_id = $(this).val();

                if ( Boolean(target_category_id) ) {
                    $('#childrenCategoriesLoddingSpinner').show(500);
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

                        $('#childrenCategoriesLoddingSpinner').hide(500);
                    });
                }// end :: if
            });

            // select category to show it's products // remove category
            $('#upgradableOptionsList').on('click', '.list-group-item', function () {
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
            $('#findCategoryProduct').change(function () {
                const product_id = $(this).val();
                if (Boolean(product_id)) {
                    store.selectProduct(product_id);
                    render.render_products();
                    $(this).val('').trigger('change');
                }
            });

            // manage product qunatity, price, is default and remove product || update price and hidden input
            $('#upgradableOptionCategoryProducts').on('change', '.custom-control-input', function () {
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
            $('#reserved_quantity').on('change', function () {
                console.log('test');
                store.addReservedQuantity(Number($(this).val()));
                render.render_products();
                render.render_expected_price();
            });
        }

        const store = (() => {
            let store = {
                expected_price    : 0,
                reserved_quantity : 1,
                selected_category : null,
                categories : [],
                categories_products : {},
                selected_categories_products : {}
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
            const selectProduct = (product_id) => {
                let is_exist = store.selected_categories_products[store.selected_category].find(product => product.id == product_id);

                if (!is_exist) {
                    const target_product = (store.categories_products[store.selected_category].find(product => product.id == product_id));
                    target_product.is_default      =  false;
                    target_product.needed_quantity = 0;
                    target_product.upgrade_price   = Number(target_product.price);

                    store.selected_categories_products[store.selected_category].push(target_product);
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
                    selected_categories_products : {}
                };

                parseRequestData();
            }

            // private methods
            const calculateExpectedPrice = () => {
                store.expected_price = 0;
                store.categories.forEach(category => {
                    console.log('test calc : ', store.selected_categories_products, category.id, store.selected_categories_products[category.id]);
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

                $('#upgrade_option_categories').val(JSON.stringify(categoreis));
                $('#upgrade_option_products').val(JSON.stringify(selectedProdcuts));
                $('#upgrade_option_products_ids').val(JSON.stringify(selectedProdcutsIds));
                console.log(categoreis, selectedProdcuts, selectedProdcutsIds);
            };

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
                clearStore
            }
        })();

        const render = ((store) => {
            const render_categories = () => {
                $('.u-list-group-item').remove();
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

                    $('#upgradableOptionsList').append(tmp_category_el);
                });
            }

            const render_products_options = () => {
                // reset old options
                $('.selected-category-option').remove();
                
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

                        $('#findCategoryProduct').append(option_el);
                    });
                }

                // clear old value 
                $('#findCategoryProduct').val('').trigger('change');
            }

            const render_products = () => {
                $('.selected-category-child').remove();
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

                        $('#upgradableOptionCategoryProducts').append(product_el);
                    });
                }
            } 

            const render_expected_price = () => {
                const price = store.getExpectedPrice();
                $('#price').val(price);
                $('#upgradeExpectedPrice').text(price);
            }

            return {
                render_products,
                render_categories,
                render_products_options,
                render_expected_price
            };
            
        })(store);

        return {
            starter_event : starter_event
        };
    })();
    
    upgradable_option.starter_event();

});
</script>
@endpush