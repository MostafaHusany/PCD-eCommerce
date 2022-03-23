
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row mb-1">
        <div class="col-6">
            <h5>Show {{ $object_title }}</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <hr/>

    <div action="/" id="objectForm">
        
        <div class="form-group row">
            <label for="show-en_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input disabled="disabled" id="show-en_name" type="text" tabindex="1"  class="form-control" placeholder="Product Name">
            </div>
            <div class="col-sm-5">
                <input disabled="disabled" id="show-ar_name" type="text"  tabindex="4" class="form-control text-right" dir="rtl" placeholder="اسم المنتج">
            </div>
        </div><!-- /.form-group -->
      
        <div class="form-group row">
            <label for="show-en_small_description" class="col-sm-2 col-form-label">Short Description</label>
            <div class="col-sm-5">
                <textarea disabled="disabled" id="show-en_small_description" type="text" tabindex="2"  class="form-control" placeholder="Product Short Description"></textarea>
            </div>
            <div class="col-sm-5">
                <textarea disabled="disabled" id="show-ar_small_description" type="text"  tabindex="5" class="form-control text-right" dir="rtl" placeholder="وصف مختصر للمنتج"></textarea>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="show-en_description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea disabled="disabled" id="show-en_description" type="text" tabindex="3"  class="form-control" placeholder="Product Description"></textarea>
            </div>
            <div class="col-sm-5">
                <textarea disabled="disabled" id="show-ar_description" type="text"  tabindex="6" class="form-control text-right" dir="rtl" placeholder="وصف المنتج"></textarea>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="show-is_composite" class="col-sm-2 col-form-label">Product Type</label>
            <div class="col-sm-10">
                <select disabled="disabled" tabindex="8" name="show-is_composite" data-first-target=".show-child-products-container" data-second-target="#show-productQuantityContainer" class="form-control" id="show-is_composite">
                    <option value="0">Usual product</option>
                    <option value="1">Composite Product (تجميعات, حزمة عروض)</option>
                </select>
            </div>
        </div><!-- /.form-group -->

        <div id="show-productQuantityContainer" class="form-group row">
            <label for="show-quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input disabled="disabled" tabindex="7"  class="form-control" min="0" id="show-quantity" value="0">
                <div style="padding: 5px 7px; display: none" id="show-quantityErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        {{--
        <div class="show-child-products-container form-group row" style="display: none;">
            <label for="show-reserved_quantity" class="col-sm-2 col-form-label">Reserved Quantity</label>
            <div class="col-sm-10">
                <input disabled="disabled" tabindex="9"  class="form-control" min="0" id="show-reserved_quantity" value="0">
            </div>
        </div><!-- /.form-group -->
        --}}

        <div class="show-child-products-container form-group" style="display: none; height: 250px; overflow-y:scroll">
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
                    </tr>
                </thead>
                <tbody id="show-selected_child_product_container"></tbody>
            </table>
        </div>

        <div class="form-group row">
            <label for="show-sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input disabled="disabled" type="text" tabindex="8"  class="form-control" id="show-sku" placeholder="SKU">
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="show-price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-4">
                <input disabled="disabled" type="number" min="0" step="0.5" tabindex="9"  class="form-control" id="show-price" value="0">
            </div>
            <label for="show-price_after_sale" class="col-sm-2 col-form-label">Price After Sale</label>
            <div class="col-sm-4">
                <input disabled="disabled" type="number" min="0" step="0.5" tabindex="10"  class="form-control" id="show-price_after_sale" value="0">
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="show-images" class="col-sm-2 col-form-label">Product Images</label>
            <div class="col-sm-10 row" id="show-images">
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="show-images" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10" id="show-brand">
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="show-categories" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10" id="show-categories">
                
            </div>
        </div><!-- /.form-group -->

        <div class="form-group" id="show-custome-field-container">
            <input type="hidden" id="show-custome_attr_id">
            <input type="hidden" id="show-custome_field_attr">

            <div class="d-flex justify-content-center mb-3">
                <div id="show-customrFieldLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div><!-- /.justify-content-center -->
        </div><!-- /.form-group -->

    </div>
</div>



@push('page_scripts')
<script>
    $('#dataTable').on('click', '.show-object', function () {
        // send request, to the server get the data about the order
        // we need data about the customer, the products of the order
        // and the total 

        $('#loddingSpinner').show();
        // $('.show-').remove();

        let promotion_id = $(this).data('object-id');
        axios.get(`{{ url('admin/products') }}/${promotion_id}?fast_acc=true`)
        .then(res => {
            const data = res.data.data;
            
            console.log(data);

            $('#show-ar_name').val(data.ar_name);
            $('#show-en_name').val(data.en_name);
            
            $('#show-ar_small_description').val(data.ar_small_description);
            $('#show-en_small_description').val(data.en_small_description);
            
            $('#show-ar_description').val(data.ar_description);
            $('#show-en_description').val(data.en_description);
            
            $('#show-is_composite').val(data.is_composite);

            if (data.is_composite) {
                $('.show-child-products-container').slideDown();
                $('.show-productQuantityContainer').slideUp();

                $('#show-quantity').val(data.quantity);
                $('#show-reserved_quantity').val(data.reserved_quantity);

                $('.show-selected-product-child').remove();
                const parent_product_meta = JSON.parse(data.meta);
                data.children.forEach(target_product => {
                    const total_parent_quantity = data.quantity;
                    show_child_product_tr (target_product, total_parent_quantity, parent_product_meta);
                });

            } else {
                $('.show-child-products-container').slideUp();
                $('.show-productQuantityContainer').slideDown();

                $('#show-quantity').val(data.quantity);
            }

            $('#show-sku').val(data.sku);

            $('#show-price').val(data.price);
            $('#show-price_after_sale').val(data.price_after_sale);

            $('.brand-badge').remove();
            if (data.brand != null) {
                let brand = `
                    <span class="brand-badge badge badge-primary">${data.brand['ar_title']} || ${data.brand['en_title']}</span>
                `;
                $('#show-brand').append(brand);
            }
            
            $('.category-badge').remove();
            data.categories.forEach(category => {
                let category_badge = `
                    <span class="category-badge badge badge-primary">${category['ar_title']} || ${category['en_title']}</span>
                `;
                $('#show-categories').append(category_badge);
            });

            $('.show-img').remove();
            let main_image = `
            <div class="show-img col-2">
                <img class="img-thumbnail" src="{{url('/')}}/${data.main_image}">
            </div>`;
            $('#show-images').append(main_image);

            // console.log(JSON.parse(data.images));
            let images = data.images != null ? JSON.parse(data.images) : [];
            images.forEach(image => {
                let main_image = `
                <div class="show-img col-2">
                    <img class="img-thumbnail" src="{{url('/')}}/${image}">
                </div>`;
                
                $('#show-images').append(main_image);
            });
            

            $('#objectsCard').slideUp(500);
            $('#showObjectCard').slideDown(500);
            $('#loddingSpinner').hide(500);
            
        }); 
    });

    show_child_product_tr = function (target_product, total_parent_quantity, parent_meta = null) {
            let target_product_r_quantity = parent_meta !== null ? parent_meta.products_quantity[target_product.id] : 1;
            let total_needed_quantity     = target_product_r_quantity * total_parent_quantity;
            let original_quantity         = parent_meta !== null ? target_product.quantity + total_needed_quantity: target_product.quantity;
            let left_quantity             = parent_meta !== null ? target_product.quantity : target_product.quantity - total_needed_quantity;

            const product_row = `
                <tr class="show-selected-product-child">
                    <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                    <td>${target_product.ar_name} / ${target_product.en_name}</td>
                    <td>${target_product.sku}</td>
                    <td>${target_product.price}</td>

                    <td>
                        ${left_quantity}
                    </td>
                    <td>
                        ${target_product_r_quantity}
                    </td>
                    <td>
                        ${total_needed_quantity}
                    </td>
                </tr>
            `;

            $('#show-selected_child_product_container').prepend(product_row);
        }
</script>
@endpush