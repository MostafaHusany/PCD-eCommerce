
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Show Order</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <form action="/" id="objectForm">
        <div class="customer-phase">
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td style="text-right" fir="rtl" id="show-customer_name">---</td>
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td id="show-customer_email">---</td>
                    </tr>
                    
                    <tr>
                        <td>Phone</td>
                        <td id="show-customer_phone">---</td>
                    </tr>
                    
                    <tr>
                        <td>City</td>
                        <td id="show-customer_city">---</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td id="show-customer_address">---</td>
                    </tr>
                </table>
            </div><!-- /.form-group -->
        </div><!-- /.customer-phase --> 
        
        <hr/>

        <div class="product-pahse">
            <div class="form-group" style="height: 400px; overflow: scroll;">
                <table class="table" style="font-size: 12px; width: max-content; ">
                    <tr>
                        <td>Img</td>
                        <td>Name</td>
                        <td>SKU</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Restored</td>
                        <td id="show-products_table_header">Sub Total Price</td>
                        <td>Total Price</td>
                    </tr>
                    <tbody id="show-selected_product_table"></tbody>
                </table>
            </div>
        </div><!-- /.product-pahse -->

        <!-- START SHIPPING PHASE -->
        <div class="form-group row">
            <label for="" class="col-2">Shipping</label>
            <div class="form-group col-4">
                <input id="show-shipping-name" class="form-control" disabled="disabled">
            </div><!-- /.form-group -->

            <div class="form-group col-4">
                <input id="show-shipping-cost" class="form-control" disabled="disabled">
            </div><!-- /.form-group -->

            <div class="form-group col-2">
                <select id="show-shipping-is-free" disabled="disabled" class="form-control">
                    <option value="1">Free Shipping</option>
                    <option value="0">No Free Shipping</option>
                </select>
            </div><!-- /.form-group -->
        </div><!-- /.form-group -->
        <!-- END SHIPPING PHASE -->

        <hr/>


        <div class="form-group row">
            <div class="col-6">
                <h4>Taxes</h4>
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>Taxe</th>
                            <th>Calculation Type</th>
                            <th>Cost Type</th>
                            <th>Value</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="show-taxes_list_table_container"></tbody>
                </table>
            </div><!-- /.col-6 -->

            <div class="col-6">
                <h4>Fees</h4>
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>Fee</th>
                            <th>Calculation Type</th>
                            <th>Cost Type</th>
                            <th>Value</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="show-fees_list_table_container"></tbody>
                </table>
            </div><!-- /.col-6 -->
        </div>

        <div class="form-group">
            <table class="table">
                <tbody id="show-selected_product_table">
                    <tr>
                        <td class="text-center" colspan="6">
                            <h3>Sub Total</h3>
                        </td>
                        <td id="show-selected_products_sub_total">---</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>Shipping Total</h5>
                        </td>
                        <td>
                            <span id="show-selected_shipping_cost" data-cost=""> --- </span> SAR
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>Taxes Total</h5>
                        </td>
                        <td>
                            <span id="show-selected_taxe_cost"> --- </span> SAR
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>Fee Total</h5>
                        </td>
                        <td>
                            <span id="show-selected_fee_cost"> --- </span> SAR
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>Total</h5>
                        </td>
                        <td>
                            <span id="show-selected_products_total"> --- </span> SAR
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>



@push('page_scripts')
<script>
    $('#dataTable').on('click', '.show-object', function () {
        // send request, to the server get the data about the order
        // we need data about the customer, the products of the order
        // and the total 

        $('#loddingSpinner').show();
        $('.show-order-product-tr').remove();
        $('#show-selected_products_sub_total').text('');
        
        $('#show-customer_name').text('');
        $('#show-customer_email').text('');
        $('#show-customer_phone').text('');
        $('#show-customer_city').text('');
        $('#show-customer_address').text('');
        
        let order_id = $(this).data('object-id');
        axios.get(`{{ url('admin/orders') }}/${order_id}?show_order=true`)
        .then(res => {
            const data = res.data.data;
            const order_meta = JSON.parse(data.products_meta);
            
            console.log(data, 'show order meta :: ', order_meta);
            
            // get customer data
            $('#show-customer_name').text(`${data.customer.first_name} ${data.customer.second_name}`);
            $('#show-customer_email').text(data.customer.email);
            $('#show-customer_phone').text(data.customer.phone);
            $('#show-customer_city').text(data.customer.city);
            $('#show-customer_address').text(data.customer.address);

            // show shipping data
            $('#show-shipping-name').val(data.shipping.title);
            $('#show-shipping-cost').val(data.shipping_cost);
            $('#show-shipping-is-free').val(data.is_free_shipping);
            
            // show taxes table
            $('.show-tax').remove();
            order_meta.taxes.forEach(tax_obj => {
                console.log('');
                let tax_info_table_td = `
                <tr class="show-tax">
                    <td>${tax_obj.title}</td>
                    <td>${tax_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                    <td>${tax_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                    <td>${tax_obj.cost}</td>
                    <td>${tax_obj.tax_total}</td>
                </tr>
                `;

                $('#show-taxes_list_table_container').append(tax_info_table_td);
            })

            // show fees table 
            $('.show-fees').remove();
            order_meta.fees.forEach(fee_obj => {
                let fee_info_table_td = `
                    <tr class="show-fees fee-create-form-tr">
                        <td>${fee_obj.title}</td>
                        <td>${fee_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                        <td>${fee_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                        <td>${fee_obj.cost}</td>
                        <td>${fee_obj.fee_total}</td>
                    </tr>
                `;

                $('#show-fees_list_table_container').append(fee_info_table_td);
            });
            // show order products rows
            data.products.forEach(product => {
                console.log(product, order_meta);
                let product_quantity = (order_meta.products_quantity[product.id].quantity - order_meta.restored_quantity[product.id]);
                let product_cost     = order_meta.products_prices[product.id] * product_quantity;
                let total_tax        = 0;

                let product_tax_td = ``;
                order_meta.taxes.forEach(tax_obj => {
                    
                    if (tax_obj.cost_type == 1) {
                        let product_tax = tax_obj.is_fixed ? product_quantity * tax_obj.cost : product_quantity * product_cost * tax_obj.cost / 100;
                        total_tax       += product_tax;
                        product_tax_td += `
                            <td>${parseFloat(product_tax).toFixed(2)}</td>
                        `;
                    }// end :: if
                })

                let tmp_row = `
                    <tr class="show-order-product-tr">
                        <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                        <td>${product.ar_name} / ${product.en_name}</td>
                        <td>${product.sku}</td>
                        <td>${order_meta.products_prices[product.id]}</td>
                        <td>${order_meta.products_quantity[product.id].quantity}</td>
                        <td>
                            <span class="text-danger">${order_meta.restored_quantity[product.id]}</span>
                        </td>
                        <td>${parseFloat(product_cost).toFixed(2)} SR</td>
                        ${product_tax_td}
                        <td>${parseFloat(product_cost + total_tax).toFixed(2)}</td>  
                    </tr>
                `;
                $('#show-selected_product_table').prepend(tmp_row);
                // total_val += order_meta.products_prices[product.id] * order_meta.products_quantity[product.id].quantity;
            });

            let sub_total_val = 0;
            let total_quantity = 0;
            
            $('#show-selected_products_sub_total').text(data.sub_total + " SR")
            $('#show-selected_shipping_cost').text(data.shipping_cost);
            $('#show-selected_taxe_cost').text(data.taxe);
            $('#show-selected_fee_cost').text(data.fee);
            $('#show-selected_products_total').text(data.total);
            
            $('#objectsCard').slideUp(500);
            $('#showObjectCard').slideDown(500);
            $('#loddingSpinner').hide(500);

        }); 
    });
</script>
@endpush