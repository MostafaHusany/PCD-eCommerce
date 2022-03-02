
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
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>Img</td>
                        <td>Name</td>
                        <td>SKU</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Restored</td>
                        <td>Sub Total Price</td>
                    </tr>
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
        </div><!-- /.product-pahse -->
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
            // console.log('show order data :: ', data, data.shipping);
            console.log('show order meta :: ', order_meta);
            // get customer data
            $('#show-customer_name').text(`${data.customer.first_name} ${data.customer.second_name}`);
            $('#show-customer_email').text(data.customer.email);
            $('#show-customer_phone').text(data.customer.phone);
            $('#show-customer_city').text(data.customer.city);
            $('#show-customer_address').text(data.customer.address);

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
    })
</script>
@endpush