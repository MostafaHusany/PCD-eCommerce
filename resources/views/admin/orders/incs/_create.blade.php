
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{$object_title}}</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#createObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <form action="/" id="objectForm">
        <div class="customer-phase">
            <div class="form-group row">
                <label for="customer" class="col-sm-2 col-form-label">Select Customer</label>
                <div class="col-sm-10">
                    <select class="form-control" id="customer" data-prefix=""></select>
                    <div style="padding: 5px 7px; display: none" id="customerErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->
            
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td style="text-right" fir="rtl" id="customer_name">---</td>
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td id="customer_email">---</td>
                    </tr>
                    
                    <tr>
                        <td>Phone</td>
                        <td id="customer_phone">---</td>
                    </tr>
                    
                    <tr>
                        <td>City</td>
                        <td id="customer_city">---</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td id="customer_address">---</td>
                    </tr>
                </table>
            </div>
        </div><!-- /.customer-phase --> 

        <div class="product-pahse">
            <input type="hidden" id="products_quantity" value="">
            <input type="hidden" id="products" value="">
            <!-- <input type="hidden" id="shipping" value=""> -->

            <div class="form-group row">
                <label for="find-products" class="col-sm-2 col-form-label">Select Products</label>
                <div class="col-sm-10">
                    <select class="form-control" id="find-products" data-prefix=""></select>
                    <div style="padding: 5px 7px; display: none" id="productsErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <div id="createOrderLoddingSpinner" style="display: none" class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div id="createOrderWarningAlert" style="display: none" class="alert alert-warning"></div>

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
                    <tbody id="selected_product_table">
                        <tr>
                            <td class="text-center" colspan="7">
                                <h3>Shipping</h3>
                            </td>
                            <td>
                               <span id="selected_shipping_cost" data-cost="" data-cost-type=""> --- </span> SAR
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="7">
                                <h3>Total</h3>
                            </td>
                            <td>
                                <span id="selected_products_sub_total"> --- </span> SAR
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.product-pahse -->
        
        <!-- START SHIPPING PHASE -->
        <div class="form-group row">
            <label for="" class="col-2">Shipping</label>
            <div class="form-group col-4">
                <select id="shipping" data-prefix="" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="shippingErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->

            <div class="form-group col-4">
                <input type="number" min="0" value="0" id="shipping_cost" data-prefix="" class="form-control">
                <div style="padding: 5px 7px; display: none" id="shipping_costErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->

            <div class="form-group col-2" style="padding: 5px 0px;">
                <input type="hidden" id="is_free_shipping">
                <div class="custom-control custom-switch" value="0">
                    <input type="checkbox" class="custom-control-input" data-prefix="" id="is_free_shipping_toggle">
                    <label class="custom-control-label" for="is_free_shipping_toggle">Free Shipping</label>
                </div>
                
                <div style="padding: 5px 7px; display: none" id="is_free_shippingErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.form-group -->
        <!-- END SHIPPING PHASE -->

        <button !id="createorder" class="create-object btn btn-primary float-right">Create Order</button>
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
    const create_special_options = (function  () {
        let selected_products = {};

        function startet_event () {
            $('#find-products').select2({
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
                
                if (!(target_product_id in selected_products)) {
                    if (target_product_id !== '') {
                        $('#createOrderLoddingSpinner').show(500);
                        
                        get_selected_product(target_product_id)
                        .then(target_product => {
                            if (target_product != null) {
                                create_selected_product_row(target_product);
                                $('#find-products').val('').trigger('change');
                                
                                $('#createOrderLoddingSpinner').hide(500);
                        
                                selected_products[target_product_id] = {
                                    quantity : 1,
                                    price    : target_product.price
                                } 

                                update_products_hidden_field();
                            }
                        });
                    }// end :: if            
                } else {
                    $('#createOrderWarningAlert').text('Product is already in the list').slideDown(500);
                    $(`.selected-product-row-${target_product_id}`).css('border', '1px solid red');
                    
                    setTimeout(() => {
                        $('#createOrderWarningAlert').text('').slideUp(500);
                        $(`.selected-product-row-${target_product_id}`).css('border', '');
                    }, 3000);
                }
            });

            // the selected product quantity, price change event, anf remove item event
            $('#selected_product_table').on('change', '.selected_product_quantity', function () {
                let target_id   = $(this).data('target');
                let price       = selected_products[target_id].price;
                let quantity    = selected_products[target_id].quantity = $(this).val();

                let original_quantity = $(`#selected_product_o_quantity_${target_id}`).data('quantity');
                $(`#selected_product_o_quantity_${target_id}`).text(original_quantity - quantity);
                
                // update item sub total price
                $(`#selected_product_td_sub_total_${target_id}`).text(parseFloat(price * quantity).toFixed(2) + ' SR');
                
                update_products_hidden_field();
            }).on('change', '.selected_product_price', function () {
                let target_id      = $(this).data('target');
                let original_price = $(this).data('original-price');
                let quantity       = selected_products[target_id].quantity;
                let price          = selected_products[target_id].price = $(this).val();
            
                price < original_price && $(`#selected_product_price_${target_id}`).css('color', 'red');
                price >= original_price && $(`#selected_product_price_${target_id}`).css('color', 'green');

                // update item sub total price
                $(`#selected_product_td_sub_total_${target_id}`).text(parseFloat(price * quantity).toFixed(2) + ' SR')
                
                update_products_hidden_field();
            }).on('click', '.remove_selected_item', function () {
                let target_id = $(this).data('target');

                $(`.selected-product-row-${target_id}`).remove();
                delete selected_products[target_id];
                
                update_products_hidden_field();
            });

            // clear old session
            $('.toggle-btn').click(function () {
                let target_card  = $(this).data('target-card');

                if (target_card === '#createObjectCard') {
                    selected_products = {};
                    $('#products').val('');
                    $('#products_quantity').val('');
                    $('.selected-product-rows').remove();
                }
            });
        }

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

        function create_selected_product_row (target_product) {
            let product_tr = `
                <tr class="selected-product-rows selected-product-row-${target_product.id}">
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

            $('#selected_product_table').prepend(product_tr);
        } 
        
        function update_products_hidden_field () {
            console.log(selected_products, Object.keys(selected_products));

            $('#products_quantity').val(JSON.stringify(selected_products));
            $('#products').val(JSON.stringify(Object.keys(selected_products)));
        }

        return {
            startet_event : startet_event
        }
    })();

    create_special_options.startet_event();

});
</script>