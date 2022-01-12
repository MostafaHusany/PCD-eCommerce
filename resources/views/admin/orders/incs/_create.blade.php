
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
            <div class="form-group row">
                <label for="products" class="col-sm-2 col-form-label">Select Products</label>
                <div class="col-sm-10">
                    <select class="form-control" id="products" data-prefix="" multiple="multiple"></select>
                    <div style="padding: 5px 7px; display: none" id="productsErr" class="err-msg mt-2 alert alert-danger">
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
                        <td>Valied Quantity</td>
                        <td>Requested Quantity</td>
                        <td>Sub Total Price</td>
                        <!--
                            <td>Fees</td>
                            <td>Tax</td>
                            <td>Total</td>
                        -->
                    </tr>
                    <tbody id="selected_product_table">
                    <tr>
                        <td class="text-center" colspan="6">
                            <h3>Total</h3>
                        </td>
                        <td id="selected_products_sub_total">---</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.product-pahse -->
        

        <button !id="createorder" class="create-object btn btn-primary float-right">Create Order</button>
    </form>
</div>


<script>
$(document).ready(function () {
    let selected_products = [];


    function update_sub_total () {
        /**
         * We use this function to update sub total
         */
        let total = 0.0;

        selected_products.forEach(product_id => {
            let tmp_price     = $(`#selected_product_quantity_${product_id}`).data('price');
            let tmp_quantity  = $(`#selected_product_quantity_${product_id}`).val();

            // console.log(total, tmp_price , tmp_quantity, (parseFloat(tmp_price) * parseInt(tmp_quantity)).toFixed(2));
            
            total += tmp_price * tmp_quantity;
        });

        $('#selected_products_sub_total').text(parseFloat(total).toFixed(2) + ' SR');
    }

    function update_products () {
        let products = {};
        selected_products.forEach(product_id => {
            let tmp_quantity     = $(`#selected_product_quantity_${product_id}`).val();
            products[product_id] = tmp_quantity;
        });

        $('#products_quantity').val(JSON.stringify(products));
    }

    $('#products').select2({
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
        let tmp_selected_products = $('#products').val();

        // check new products added to the list
        let new_selected_products = tmp_selected_products.filter(product_id => {
            /**  
             *  Here we will add more functionality for grapping the products from the server
             * */
            
            const is_not_in_list = !selected_products.includes(product_id);

            if (is_not_in_list) {
                // If this a new data need to get, send request to the server
                axios.get(`{{ url('admin/products') }}/${product_id}?fast_acc=true`)
                .then(res => {
                    if (res.data.success) {
                        let tmp = `
                            <tr class="selected_product_tr" id="selected_product_tr_${res.data.product.id}">
                                <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${res.data.product.main_image}" /></td>
                                <td>${res.data.product.ar_name} / ${res.data.product.en_name}</td>
                                <td>${res.data.product.sku}</td>
                                <td>${res.data.product.price}</td>
                                <td id="selected_product_o_quantity_${res.data.product.id}" data-quantity="${res.data.product.quantity}">${res.data.product.quantity - 1}</td>
                                <td><input style="width: 80px" class="selected_product_quantity" id="selected_product_quantity_${res.data.product.id}" data-price="${res.data.product.price}" data-target="${res.data.product.id}" type="number" min="1" max="${res.data.product.quantity}" value="1" step="1" data-max="${res.data.product.quantity}"/></td>
                                <td id="selected_product_td_sub_total_${res.data.product.id}">${res.data.product.price} SR</td>
                                <!--
                                <td id="selected_product_td_fees_${res.data.product.id}">---</td>
                                <td id="selected_product_td_tax_${res.data.product.id}">---</td>
                                <td id="selected_product_td_total_${res.data.product.id}">---</td>
                                -->
                            </tr>
                        `;

                        $('#selected_product_table').prepend(tmp);
                    }
                }).then( () => {
                    update_products();
                    update_sub_total();
                });
            }

            return is_not_in_list && product_id;
        });

        // check products that been removed from the list
        selected_products = selected_products.filter(product_id => {
            /**
             * Here we will get ride from the data that been removed from the list
             * */

            const is_in_list = tmp_selected_products.includes(product_id);

            if (!is_in_list) {
                $(`#selected_product_tr_${product_id}`).remove();
            }

            return tmp_selected_products.includes(product_id) && product_id;
        })

        // update selected products
        selected_products = selected_products.concat(new_selected_products);

        tmp_selected_products.length == 0 && $('#selected_products_sub_total').text('---')

    });

    // the selected product quantity, price change
    $('#selected_product_table').on('change', '.selected_product_quantity', function () {
        let target   = $(this).data('target');
        let price    = $(this).data('price');
        let quantity = $(this).val();

        let original_quantity = $(`#selected_product_o_quantity_${target}`).data('quantity');
        $(`#selected_product_o_quantity_${target}`).text(original_quantity - quantity);

        // console.log(target, price, quantity);

        $(`#selected_product_td_sub_total_${target}`).text(parseFloat(price * quantity).toFixed(2) + ' SR')

        // update products input
        update_products();
        // update sub_total
        update_sub_total();
    });

});
</script>