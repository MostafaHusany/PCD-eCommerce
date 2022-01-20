
<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{$object_title}}</h5>
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

        <div class="customer-phase">
            <div class="form-group row">
                <label for="edit-customer" class="col-sm-2 col-form-label">Select Customer</label>
                <div class="col-sm-10">
                    <select class="form-control" id="edit-customer" data-prefix="edit-"></select>
                    <div style="padding: 5px 7px; display: none" id="edit-customerErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->
            
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td style="text-right" fir="rtl" id="edit-customer_name">---</td>
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td id="edit-customer_email">---</td>
                    </tr>
                    
                    <tr>
                        <td>Phone</td>
                        <td id="edit-customer_phone">---</td>
                    </tr>
                    
                    <tr>
                        <td>City</td>
                        <td id="edit-customer_city">---</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td id="edit-customer_address">---</td>
                    </tr>
                </table>
            </div>
        </div><!-- /.customer-phase --> 

        <div class="product-pahse">
            <input type="hidden" id="edit-products_quantity" value="">
            <input type="hidden" id="edit-products" value="">

            <div class="form-group row">
                <label for="edit-find-products" class="col-sm-2 col-form-label">Select Products</label>
                <div class="col-sm-10">
                    <select class="form-control" id="edit-find-products" data-prefix=""></select>
                    <div style="padding: 5px 7px; display: none" id="edit-productsErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <div id="edit-createOrderLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div id="edit-createOrderWarningAlert" style="display: none" class="alert alert-warning"></div>

            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>Img</td>
                        <td>Name</td>
                        <td>SKU</td>
                        <td>Price</td>
                        <td>Edit Price</td>
                        <td>Valied Quantity</td>
                        <td>Requested Quantity</td>
                        <td>Sub Total Price</td>
                        <td>Actions</td>
                    </tr>
                    <tbody id="edit-selected_product_table">
                    <tr>
                        <td class="text-center" colspan="6">
                            <h3>Total</h3>
                        </td>
                        <td id="edit-selected_products_sub_total">---</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.product-pahse -->
        

        <button !id="createorder" class="update-object btn btn-warning float-right">Update Order</button>
    </form>
</div>


<script>
$(document).ready(function () {
    
    /**
        When the user search for product
        find the product , with another request
        show a row with the product
        the user should be able to add nom of products, customize the price
        remove the item from the list
        in next phase the item updates should be done asynchrnised
     */
     
    window.edit_selected_products = {"tmp" : 'test'};

    $('#edit-find-products').select2({
        allowClear: true,
        width: '100%',
        placeholder: 'Select products',
        ajax: {
            url: '{{ url("admin/products-search") }}/?all_products=true',
            dataType: 'json',
            delay: 150,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: `${item.ar_name} / ${item.en_name} , quantity : (${item.quantity})`,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    }).change(function (e) {
        let target_product_id = $(this).val();
        
        if (!(target_product_id in edit_selected_products)) {
            if (target_product_id !== '') {
                $('#edit-createOrderLoddingSpinner').show(500);
                
                get_selected_product(target_product_id)
                .then(target_product => {
                    if (target_product != null) {
                        edit_create_selected_product_row(target_product);
                        $('#edit-find-products').val('').trigger('change');
                        
                        $('#edit-createOrderLoddingSpinner').hide(500);
                
                        edit_selected_products[target_product_id] = {
                            quantity : 1,
                            price    : target_product.price
                        } 

                        edit_update_products_hidden_field();
                    }
                });
            }// end :: if            
        } else {
            $('#edit-createOrderWarningAlert').text('Product is already in the list').slideDown(500);
            $(`.edit-selected-product-row-${target_product_id}`).css('border', '1px solid red');
            
            setTimeout(() => {
                $('#edit-createOrderWarningAlert').text('').slideUp(500);
                $(`.edit-selected-product-row-${target_product_id}`).css('border', '');
            }, 3000);
        }
    });

    // the selected product quantity, price change event, anf remove item event
    $('#edit-selected_product_table').on('change keyup', '.selected_product_quantity', function () {
        let target_id   = $(this).data('target');
        let price       = edit_selected_products[target_id].price;
        let quantity    = edit_selected_products[target_id].quantity = $(this).val();

        let original_quantity = $(`#selected_product_o_quantity_${target_id}`).data('quantity');
        $(`#selected_product_o_quantity_${target_id}`).text(original_quantity - quantity);
        
        // update item sub total price
        $(`#selected_product_td_sub_total_${target_id}`).text(parseFloat(price * quantity).toFixed(2) + ' SR');
        
        edit_update_products_hidden_field();
    }).on('change keyup', '.selected_product_price', function () {
        let target_id      = $(this).data('target');
        let original_price = $(this).data('original-price');
        let quantity       = edit_selected_products[target_id].quantity;
        let price          = edit_selected_products[target_id].price = $(this).val();
    
        price < original_price && $(`#selected_product_price_${target_id}`).css('color', 'red');
        price >= original_price && $(`#selected_product_price_${target_id}`).css('color', 'green');

        // update item sub total price
        $(`#selected_product_td_sub_total_${target_id}`).text(parseFloat(price * quantity).toFixed(2) + ' SR')
        
        edit_update_products_hidden_field();
    }).on('click', '.remove_selected_item', function (e) {
        e.preventDefault();
        let target_id = $(this).data('target');

        $(`.edit-selected-product-row-${target_id}`).remove();
        delete edit_selected_products[target_id];
        
        edit_update_products_hidden_field();
    });

    async function get_selected_product (target_product_id) {
        const request  = axios.get(`{{ url('admin/products') }}/${target_product_id}?get_p=true`);
        const target_product = request.then(res => {
            if (res.data.success) {
                return res.data.data
            }

            return null;
        });

        return target_product;
    } 

    function edit_create_selected_product_row (target_product) {
        let product_tr = `
            <tr class="edit-selected-product-rows edit-selected-product-row-${target_product.id}">
                <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                <td>${target_product.ar_name} / ${target_product.en_name}</td>
                <td>${target_product.sku}</td>
                <td>${target_product.price}</td>
                <td>
                    <input style="width: 80px" class="selected_product_price" type="number" value="${target_product.price}" step="1"
                        id="selected_product_price_${target_product.id}"
                        data-target="${target_product.id}" data-original-price="${target_product.price}" 
                        min="0"/>
                    SR
                </td>
                <td id="selected_product_o_quantity_${target_product.id}" data-quantity="${target_product.quantity}">
                    ${target_product.quantity - 1}
                </td>
                <td>
                    <input style="width: 80px" class="selected_product_quantity" type="number" value="1" step="1"
                        id="selected_product_quantity_${target_product.id}" 
                        data-target="${target_product.id}" data-max="${target_product.quantity}"
                        min="1" max="${target_product.quantity}" />
                    </td>
                <td id="selected_product_td_sub_total_${target_product.id}">${target_product.price} SR</td>
                <td>
                    <button class="remove_selected_item btn btn-sm btn-danger"
                        data-target="${target_product.id}"
                    >
                        <i class="fas fa-minus-circle"></i>
                    </button>
                </td>
            </tr>
        `; 

        $('#edit-selected_product_table').prepend(product_tr);
    } 
    
    function edit_update_products_hidden_field () {
        console.log(edit_selected_products, Object.keys(edit_selected_products));

        $('#edit-products_quantity').val(JSON.stringify(edit_selected_products));
        $('#edit-products').val(JSON.stringify(Object.keys(edit_selected_products)));
    }

});
</script>