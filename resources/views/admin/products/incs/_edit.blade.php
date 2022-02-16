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

        <div class="edit-child-products-container form-group row mt-2 mb-2 pt-2 pb-2" style="display: none; !border: 1px solid #ddd; !border-radius: 5px">
            <div class="col-sm-2">
                <label for="">Child Products</label>
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
                        <td>Name</td>
                        <td>SKU</td>
                        <td>Price</td>
                        <td>Valied Quantity</td>
                        <td>Quantity For Each Package</td>
                        <td>Total Quantity</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody id="edit-selected_child_product_container"></tbody>
            </table>
        </div>

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
        
        <div class="form-group row">
            <label for="edit-categories" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select type="text" tabindex="11" name="edit-categories[]" class="form-control"  multiple="multiple" id="edit-categories" placeholder="SKU"></select>
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


        <button class="update-object btn btn-warning float-right">Update Product</button>
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
                    console.log('test')
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

    
    
    
});
</script>
@endpush