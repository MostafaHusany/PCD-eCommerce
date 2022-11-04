<div style="display: none" id="showObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Show User</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showObjectsCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div class="form-group">
        <table class="table">
            <tr>
                <td>@lang('customers.Name')</td>
                <td id="show-full-name"></td>
            </tr>
            <tr>
                <td>@lang('customers.Email')</td>
                <td id="show-email"></td>
            </tr>
            <tr>
                <td>@lang('customers.Phone')</td>
                <td id="show-phone"></td>
            </tr>
            <tr>
                <td>@lang('customers.Country')</td>
                <td id="show-country"></td>
            </tr>
            <tr>
                <td>@lang('customers.Government')</td>
                <td id="show-government"></td>
            </tr>
            <tr>
                <td>@lang('customers.Address')</td>
                <td id="show-address"></td>
            </tr>
        </table>
    </div><!-- /.form-group -->

    <div class="form-group" style="height: 400px; overflow-y: scroll">
        <label for="">@lang('customers.Customer_Orders')</label>
        <table class="table">
            <tr>
                <th>#</th>
                <th>@lang('customers.Code')</th>
                <th>@lang('customers.Total')</th>
                <th>@lang('customers.Status')</th>
                <th>@lang('customers.Actions')</th>
            </tr>
            <tbody id="show-customer-order-body">

            </tbody>
        </table><!-- /.table -->
    </div><!-- /.form-group -->
</div><!-- /.card -->

<div style="display: none" id="showOrderCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('orders.Show_Order')</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showOrderCard" data-target-card="#showObjectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <div action="/" id="objectForm">
        <div class="product-pahse">
            <div class="form-group" style="height: 400px; overflow: scroll;">
                <table class="table" style="font-size: 12px; width: max-content; ">
                    <tr>
                        <td>@lang('orders.Img')</td>
                        <td>@lang('orders.Name')</td>
                        <td>@lang('orders.SKU')</td>
                        <td>@lang('orders.Price')</td>
                        <td>@lang('orders.Quantity')</td>
                        <td>@lang('orders.Restored')</td>
                        <td id="show-products_table_header">@lang('orders.Sub_Total_Price')</td>
                        <!-- <td>Total Price</td> -->
                    </tr>
                    <tbody id="show-selected_product_table"></tbody>
                </table>
            </div>
        </div><!-- /.product-pahse -->

        <!-- START SHIPPING PHASE -->
        <div class="form-group row">
            <label for="" class="col-2">@lang('orders.Shipping')</label>
            <div class="form-group col-4">
                <input id="show-shipping-name" class="form-control" disabled="disabled">
            </div><!-- /.form-group -->

            <div class="form-group col-4">
                <input id="show-shipping-cost" class="form-control" disabled="disabled">
            </div><!-- /.form-group -->

            <div class="form-group col-2">
                <select id="show-shipping-is-free" disabled="disabled" class="form-control">
                    <option value="1">@lang('orders.Free_Shipping')</option>
                    <option value="0">@lang('orders.No_Free_Shipping')</option>
                </select>
            </div><!-- /.form-group -->
        </div><!-- /.form-group -->
        <!-- END SHIPPING PHASE -->

        <hr/>

        <div class="form-group row">
            <div class="col-6">
                <h4>@lang('orders.Taxes')</h4>
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>@lang('orders.Taxe')</th>
                            <th>@lang('orders.Calculation_Type')</th>
                            <th>@lang('orders.Cost_Type')</th>
                            <th>@lang('orders.Value')</th>
                            <th>@lang('orders.Total')</th>
                        </tr>
                    </thead>
                    <tbody id="show-taxes_list_table_container"></tbody>
                </table>
            </div><!-- /.col-6 -->

            <div class="col-6">
                <h4>@lang('orders.Fees')</h4>
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>@lang('orders.Fee')</th>
                            <th>@lang('orders.Calculation_Type')</th>
                            <th>@lang('orders.Cost_Type')</th>
                            <th>@lang('orders.Value')</th>
                            <th>@lang('orders.Total')</th>
                        </tr>
                    </thead>
                    <tbody id="show-fees_list_table_container"></tbody>
                </table>
            </div><!-- /.col-6 -->
        </div><!-- /.form-group -->

        <div class="form-group">
            <table class="table">
                <tbody id="show-selected_product_table">
                    <tr>
                        <td class="text-center" colspan="6">
                            <h3>@lang('orders.Sub_Total')</h3>
                        </td>
                        <td id="show-selected_products_sub_total">---</td> @lang('orders.SAR')
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>@lang('orders.Shipping_Total')</h5>
                        </td>
                        <td>
                            <span id="show-selected_shipping_cost" data-cost=""> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>@lang('orders.Taxes_Total')</h5>
                        </td>
                        <td>
                            <span id="show-selected_taxe_cost"> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>@lang('orders.Fee_Total')</h5>
                        </td>
                        <td>
                            <span id="show-selected_fee_cost"> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>@lang('orders.Discount')</h5>
                        </td>
                        <td>
                            <span id="show-selected_Discount_cost" data-cost=""> --- </span> @lang('orders.SAR')
                        </td>
                        <td>
                            <h5 class="my-3" style="display: inline">@lang('orders.Promo_Code') : </h5> <span id="show-selected_Discount_code" data-cost=""> --- </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">
                            <h5>@lang('orders.Total')</h5>
                        </td>
                        <td>
                            <span id="show-selected_products_total"> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.form-group -->
    </div>
</div>


@push('page_scripts')
<script>
    /**
     * in the show modal, we want to get all customer information, 
     * those information is consist of ....
     * 
     * main info like, name, phone, email and address,
     * 
     * the orders that the user have and its status, and we want to
     * make a show for each order
     */
    function show_modal () {
        $('#objectsCard').slideUp();
        $('#showObjectsCard').slideDown();
    }

    function show_customer_info (customer_info) {
        console.log('216 customer_info : ', customer_info);
        $('#show-full-name').text(customer_info.name);
        $('#show-email').text(Boolean(customer_info.email) ? customer_info.email : '---');
        $('#show-phone').text(customer_info.phone);
        $('#show-country').text(Boolean(customer_info.country) ? customer_info.country.name : '---');
        $('#show-government').text(Boolean(customer_info.government) ? customer_info.government.name : '---');
        $('#show-address').text(Boolean(customer_info.address) ? customer_info.address : '---');
    }

    function show_customer_orders (orders) {
        console.log(orders);
        // clear old order sessions
        $('.show-customer-order-tr').remove();
        
        let tr_el = '';
        orders.forEach(order => {
            let status = {'6' : 'مستلم', '4' : 'الشحن', '3' : 'اعداد', '1' : 'اختباري', '0' : 'انتظار', '-1' : 'مرتجع'}
            tr_el += `
                <tr class="show-customer-order-tr">
                    <td>${order.id}</td>
                    <td>${order.code}</td>
                    <td>${order.total}</td>
                    <td>${status[order.status]}</td>
                    <td>
                        <button class="show-customer-order btn btn-sm btn-info"
                            data-object-id="${order.id}"
                        >
                            <i class="fas fa-eye"></i>                    
                        </button>
                    </td>
                </tr>
            `;
        });

        $('#show-customer-order-body').append(tr_el);
    }

    $(document).ready(function () {
        $('#dataTable').on('click', '.show-object', function () {
            console.log('test show ..');
            let target_id = $(this).data('object-id');

            /**  
             * send request to show data
             * We need the customer main infoo, ....
             * get the customer orders 
             * */
            $('#loddingSpinner').show(500);

            axios.get(`{{ url('admin/customers') }}/${target_id}`, { params : {
                fast_acc : true,
                get_orders : true
            }}).then(res => {
                $('#loddingSpinner').hide(500);
                
                if(res.data.success) {
                    show_modal ();

                    // show customer info
                    show_customer_info (res.data.data);

                    // show customer related orders 
                    show_customer_orders (res.data.data.orders);
                }
            });

        });

        $('#show-customer-order-body').on('click', '.show-customer-order', function () {
            let order_id = $(this).data('object-id');

            console.log('test ... ', order_id);

            $('#loddingSpinner').show(500);
            $('.show-order-product-tr').remove();
            $('#show-selected_products_sub_total').text('');
            
            axios.get(`{{ url('admin/orders') }}/${order_id}?show_order=true`)
            .then(res => {
                const data = res.data.data;
                const order_meta = JSON.parse(data.products_meta);
                
                console.log(data, 'show order meta :: ', order_meta);
                
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

                // show promo-code discount
                if(Boolean(data.promo_code_discount)) {
                    $('#show-selected_Discount_cost').html(`<span class="text-danger" style="text-align:right;">-${data.promo_code_discount}</span>`);
                    $('#show-selected_Discount_code').text(`"${data.promo_code}"`);

                } else {
                    $('#show-selected_Discount_cost').html( '---' );
                    $('#show-selected_Discount_code').html( '---' );
                }

                // show order products rows
                data.products.forEach(product => {
                    let product_quantity = (order_meta.products_quantity[product.id].quantity - order_meta.restored_quantity[product.id]);
                    let product_cost     = order_meta.products_prices[product.id] * product_quantity;
                    let total_tax        = 0;

                    let product_tax_td = ``;
                    // order_meta.taxes.forEach(tax_obj => {
                        
                    //     if (tax_obj.cost_type == 1) {
                    //         let product_tax = tax_obj.is_fixed ? product_quantity * tax_obj.cost : product_quantity * product_cost * tax_obj.cost / 100;
                    //         total_tax       += product_tax;
                    //         product_tax_td += `
                    //             <td>${parseFloat(product_tax).toFixed(2)}</td>
                    //         `;
                    //     }// end :: if
                    // })

                    let tmp_row = `
                        <tr class="show-order-product-tr">
                            <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                            <td>${product.ar_name} / ${product.en_name}</td>
                            <td>${product.sku}</td>
                            <td>${order_meta.products_quantity[product.id].price} SR</td>
                            <td>${order_meta.products_quantity[product.id].quantity}</td>
                            <td>
                                <span class="text-danger">${order_meta.restored_quantity[product.id]}</span>
                            </td>
                            <td>${parseFloat(order_meta.products_quantity[product.id].quantity * order_meta.products_quantity[product.id].price).toFixed(2)} SR</td>  
                        </tr>
                    `;
                    $('#show-selected_product_table').prepend(tmp_row);
                    // total_val += order_meta.products_prices[product.id] * order_meta.products_quantity[product.id].quantity;
                });

                let sub_total_val = 0;
                let total_quantity = 0;
                
                $('#show-selected_products_sub_total').text(data.sub_total)
                $('#show-selected_shipping_cost').text(data.shipping_cost);
                $('#show-selected_taxe_cost').text(data.taxe);
                $('#show-selected_fee_cost').text(data.fee);
                $('#show-selected_products_total').text(data.total);
                
                $('#showObjectsCard').slideUp(500);
                $('#showOrderCard').slideDown(500);
                $('#loddingSpinner').hide(500);
            });// end :: axios 

        });
    });
</script>
@endpush