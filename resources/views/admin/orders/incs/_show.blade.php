
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Show {{$object_title}}</h5>
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
                        <td>Sub Total Price</td>
                    </tr>
                    <tbody id="show-selected_product_table">
                    <tr>
                        <td class="text-center" colspan="5">
                            <h3>Total</h3>
                        </td>
                        <td id="show-selected_products_sub_total">---</td>
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
            // console.log('data, and order_meta', data, order_meta);
            // get customer data
            $('#show-customer_name').text(`${data.customer.first_name} ${data.customer.second_name}`);
            $('#show-customer_email').text(data.customer.email);
            $('#show-customer_phone').text(data.customer.phone);
            $('#show-customer_city').text(data.customer.city);
            $('#show-customer_address').text(data.customer.address);

            let total_val = 0;
            data.products.forEach(product => {
                // console.log(product);
                let tmp_row = `
                    <tr class="show-order-product-tr">
                        <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                        <td>${product.ar_name} / ${product.en_name}</td>
                        <td>${product.sku}</td>
                        <td>${order_meta.products_prices[product.id]}</td>
                        <td>${order_meta.products_quantity[product.id]}</td>
                        <td>${parseFloat(order_meta.products_prices[product.id] * order_meta.products_quantity[product.id]).toFixed(2)}</td>
                    </tr>
                `;

                $('#show-selected_product_table').prepend(tmp_row);
                total_val += order_meta.products_prices[product.id] * order_meta.products_quantity[product.id];
            });

            $('#show-selected_products_sub_total').text(parseFloat(total_val).toFixed(2))

            
            $('#objectsCard').slideUp(500);
            $('#showObjectCard').slideDown(500);
            $('#loddingSpinner').hide(500);

        }); 
    })
</script>
@endpush