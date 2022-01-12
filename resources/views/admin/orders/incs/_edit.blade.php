<div style="display: !none" id="editObjectsCard" class="card card-body">
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

        <div class="form-group" style="background-color: #edecec; padding: 10px; border: 1px solid #555; border-radius: 10px">
            <h4>Product Requested</h4>
            <table class="table">
                <tr>
                    <td>Img</td>
                    <td>Name</td>
                    <td>SKU</td>
                    <td>Current Price</td>
                    <td>Price When Order</td>
                    <td>Action</td>
                </tr>
                <tbody id="edit-old_selected_product_table">
                    <tr>
                        <td class="text-center" colspan="7">
                            <h3>Total</h3>
                        </td>
                        <td id="edit-old_selected_products_sub_total">---</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="product-pahse">
            <input type="hidden" id="edit-products_quantity" value="">
            <input type="hidden" id="tmp-products_quantity" value="">
            <div class="form-group row">
                <label for="edit-products" class="col-sm-2 col-form-label">Add More Products</label>
                <div class="col-sm-10">
                    <select class="form-control" id="edit-products" data-prefix="edit-" multiple="multiple"></select>
                    <div style="padding: 5px 7px; display: none" id="edit-productsErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>Img</td>
                        <td>Name</td>
                        <td>SKU</td>
                        <td>Price</td>
                        <td>Valied Quantityt</td>
                        <td>Requested Quantityt</td>
                        <td>Sub Total Price</td>
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
        

        <button !id="createorder" class="update-object btn btn-warning float-right">Create Order</button>
    </form>
</div>


<script>
$(document).ready(function () {
    let edit_selected_products = [];
    let tmp_edit_quantity      = {};


    function update_sub_total () {
        /**
         * We use this function to update sub total
         */
        let total = 0.0;

        edit_selected_products.forEach(product_id => {
            let tmp_price     = $(`#edit-selected_product_quantity_${product_id}`).data('price');
            let tmp_quantity  = $(`#edit-selected_product_quantity_${product_id}`).val();
            
            total += tmp_price * tmp_quantity;
        });

        $('#edit-selected_products_sub_total').text(parseFloat(total).toFixed(2) + ' SR');
    }

    function update_products () {
        let products = {};
        edit_selected_products.forEach(product_id => {
            let tmp_quantity     = $(`#edit-selected_product_quantity_${product_id}`).val();
            products[product_id] = tmp_quantity;
        });

        $('#edit-products_quantity').val(JSON.stringify(products));
    }

    function edit_quantity () {
        let products_quantity = $('#tmp-products_quantity').val()

        if (products_quantity != '') {
            tmp_edit_quantity = JSON.parse(products_quantity);
        }

        $('#tmp-products_quantity').val('')
    }

    function create_order_product_row (product, tmp_o_r_quantity, tmp_r_quantity) {
        const template_tr = `
            <tr class="edit-selected_product_tr" id="edit-selected_product_tr_${product.id}">
                <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                <td>${product.ar_name} / ${product.en_name}</td>
                <td>${product.sku}</td>
                <td>${product.price}</td>
                <td id="edit-selected_product_o_quantity_${product.id}" data-quantity="${tmp_o_r_quantity}">${product.quantity}</td>
                <td><input style="width: 80px" class="edit-selected_product_quantity" id="edit-selected_product_quantity_${product.id}" data-price="${product.price}" data-target="${product.id}" type="number" min="1" max="${tmp_o_r_quantity}" value="${tmp_r_quantity}" step="1" data-max="${product.quantity}"/></td>
                <td id="edit-selected_product_td_sub_total_${product.id}">${product.price * tmp_r_quantity} SR</td>
            </tr>
        `;

        return template_tr;
    }

    $('#edit-products').select2({
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
    }).change(function () {
        // get edit quantity if exists
        edit_quantity();

        let tmp_selected_products = $('#edit-products').val();

        // check new products added to the list
        let new_selected_products = tmp_selected_products.filter(product_id => {
            /**  
             *  Here we will add more functionality for grapping the products from the server
             * */
            
            const is_not_in_list = !edit_selected_products.includes(product_id);

            if (is_not_in_list) {
                // If this a new data need to get, send request to the server
                axios.get(`{{ url('admin/products') }}/${product_id}?fast_acc=true`)
                .then(res => {
                    if (res.data.success) {
                        const tmp_r_quantity   = tmp_edit_quantity[res.data.product.id] != null ? tmp_edit_quantity[res.data.product.id] : 1;
                        const tmp_o_quantity   = res.data.product.quantity;
                        const tmp_o_r_quantity = parseInt(res.data.product.quantity) + parseInt(tmp_r_quantity);

                        const template_tr = create_order_product_row(res.data.product, tmp_o_r_quantity, tmp_r_quantity);
                        
                        $('#edit-selected_product_table').prepend(template_tr);
                    }
                }).then( () => {
                    update_products();
                    update_sub_total();
                });
            }

            return is_not_in_list && product_id;
        });

        // check products that been removed from the list
        edit_selected_products = edit_selected_products.filter(product_id => {
            /**
             * Here we will get ride from the data that been removed from the list
             * */

            const is_in_list = tmp_selected_products.includes(product_id);

            if (!is_in_list) {
                $(`#edit-selected_product_tr_${product_id}`).remove();
            }

            return tmp_selected_products.includes(product_id) && product_id;
        })

        // update selected products
        edit_selected_products = edit_selected_products.concat(new_selected_products);

        tmp_selected_products.length == 0 && $('#edit-selected_products_sub_total').text('---')

    });

    // the selected product quantity, price change
    $('#edit-selected_product_table').on('change', '.edit-selected_product_quantity', function () {
        let target   = $(this).data('target');
        let price    = $(this).data('price');
        let quantity = $(this).val();

        let original_quantity = $(`#edit-selected_product_o_quantity_${target}`).data('quantity');
        
        $(`#edit-selected_product_o_quantity_${target}`).text(parseInt(original_quantity) - parseInt(quantity));
        $(`#edit-selected_product_td_sub_total_${target}`).text(parseFloat(price * quantity).toFixed(2) + ' SR');

        // update products input
        update_products();
        // update sub_total
        update_sub_total();
    });

});
</script>