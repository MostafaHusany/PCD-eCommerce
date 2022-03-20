
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
                <select tabindex="7" id="is_composite" name="is_composite" data-first-target=".child-products-container" data-second-target="#productQuantityContainer" class="form-control">
                    <option value="0">Usual product</option>
                    <option value="1">Composite Product (تجميعات, حزمة عروض)</option>
                </select>
                <div style="padding: 5px 7px; display: none" id="is_compositeErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="child-products-container form-group row" style="display: none;">
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
            <label for="price" class="col-sm-2 col-form-label">Price</label>
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
                
                if (target_product_id !== '' && target_product_id != null && ! (target_product_id in selected_child_products_quantity)) {
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
                    console.log(product_id, total_parent_quantity, original_valied_quantity, selected_child_products_quantity[product_id]);

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
            
            console.log(selected_child_products_quantity, selected_child_products);
            update_child_products_input_field()
        }

        function remove_selected_child_products (targted_product_id) {
            selected_child_products = selected_child_products.filter(product_id => product_id != targted_product_id);
            // selected_child_products.pop(targted_product_id);
            delete selected_child_products_quantity[targted_product_id];
            
            console.log(selected_child_products_quantity, selected_child_products);
            update_child_products_input_field()
        }

        function update_child_products_input_field () {
            $('#child_products').val(JSON.stringify(selected_child_products));
            $('#child_products_quantity').val(JSON.stringify(selected_child_products_quantity));

            console.log($('#child_products').val(), $('#child_products_quantity').val());
        }
        
        return {
            starter_event : starter_event
        }
    })();

    create_form_custome_option.starter_event()
    

});
</script>
@endpush