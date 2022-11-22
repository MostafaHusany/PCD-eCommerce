
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('orders.Show_Order')</h5>
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
                        <td>@lang('orders.Name')</td>
                        <td style="text-right" fir="rtl" id="show-customer_name">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Email')</td>
                        <td id="show-customer_email">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Phone')</td>
                        <td id="show-customer_phone">---</td>
                    </tr>
                    
                    <!-- <tr>
                        <td>City</td>
                        <td id="show-customer_city">---</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td id="show-customer_address">---</td>
                    </tr> -->
                    
                    <tr>
                        <td>@lang('orders.Country')</td>
                        <td id="show-customer_country">---</td>
                    </tr>

                    <tr>
                        <td>@lang('orders.Government')</td>
                        <td id="show-customer_government">---</td>
                    </tr>

                    <tr>
                        <td>@lang('orders.Address')</td>
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
                        <th style="width: 120px;">@lang('orders.Img')</th>
                        <th>@lang('orders.Name')</th>
                        <th>@lang('orders.SKU')</th>
                        <th>@lang('orders.Price')</th>
                        <th>@lang('orders.Quantity')</th>
                        <th>@lang('orders.Restored')</th>
                        <th id="show-products_table_header">@lang('orders.Sub_Total_Price')</th>
                        <th>@lang('orders.Total_Price')</th>
                        <th>@lang('orders.Actions')</th>
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
                <h4>Taxes</h4>
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>@lang('orders.Taxes')</th>
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
                            <th>@lang('orders.Fees')</th>
                            <th>@lang('orders.Calculation_Type')</th>
                            <th>@lang('orders.Cost_Type')</th>
                            <th>@lang('orders.Value')</th>
                            <th>@lang('orders.Total')</th>
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
                            <h3>@lang('orders.Sub_Total')</h3>
                        </td>
                            <td>
                                <span id="show-selected_products_sub_total"> --- </span> @lang('orders.SAR')
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
                            <h5>@lang('orders.Shipping_Total')</h5>
                        </td>
                        <td>
                            <span id="show-selected_shipping_cost" data-cost=""> --- </span> @lang('orders.SAR')
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
        </div>
    </form>
</div>

<!-- Modal -->
<div dir="{{ $is_ar ? 'rtl' : 'ltr' }}" class="modal fade" id="showOrderProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="showOrderProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showOrderProductLabel">@lang('orders.Composite_Product')</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="show-upgradable-products" style="height: 400px; overflow-y: scroll; overflow-x: hidden;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('orders.Done')</button>
                <!-- <button type="button" class="btn btn-primary">@lang('orders.Done')</button> -->
            </div>
        </div>
    </div>
</div>

@push('page_scripts')
<script>
    const ShowOrderStore = (function () {
        let orderProducts = null;
        let productsQuantity = null;
        /*
        orderMeta =  {
                fees : [],
                products_id : ['53'],
                products_prices : {53: 1891},
                products_quantity : {
                    53 : {
                        is_upgradable: true
                        is_valied : true
                        price : 2020
                        quantity : 1
                        upgrade_options : {1: 2, 2: 47, 4: 51, 7: 16, 11: 48}
                        upgrade_options_list : [2, 47, 51, 16, 48]
                    }
                },
                restored_quantity : {
                    53: 0
                }
                taxes : [
                    cost: 15
                    cost_type: 0
                    id : 1
                    is_active : 1
                    is_fixed: 0
                    tax_total : 303
                    title : "ضريبة القيمة المضافة"
                ] 
            }
        */

        let setters = {
            setData (order_meta, order_products) {
                orderProducts = order_products;
                productsQuantity = structuredClone(order_meta.products_quantity);
            },

            clearData () {
                orderMeta = null;
                orderProducts = null
            }
        };

        let getters = {
            getCompositeUpgradable (productId) {
                let upgrade_options_list = productsQuantity[productId].upgrade_options_list;
                let selected_upgrades    = [];
                
                orderProducts.forEach(order_product => {
                    if (upgrade_options_list.includes(order_product.product_id)) {
                        selected_upgrades.push(order_product.product);
                    }
                });

                return selected_upgrades;
            }
        };

        return {
            setters,
            getters
        };
    })();

    
    function renderUpgradeSelection (products) {
        let row = '';
        
        products.forEach(product => {
            row += `
            <div class="col-4 my-3">
                <div class="card" style="height: 100%">
                    <img src="{{ url('/') }}/${product.main_image}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>{{$is_ar ? '${product.ar_name}' : '${product.en_name}' }}</h5>
                        
                        <button 
                            type="button" 
                            class="copy-sku btn btn-primary btn-block" 
                            data-id="${product.id}" data-sku="${product.sku}" 
                            data-toggle="tooltip" data-placement="top" title="Click to copy !"
                        >
                            SKU : <span>${product.sku}</span> 
                            <i style="display: none" class="fas fa-check-circle done-${product.id}"></i>
                        </button>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>
            `;
        });
        // row = `<div class="row">${row}</div>`;

        
        $('.show-upgradable-products').html(`<div class="row">${row}</div>`);
    }

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
            
            ShowOrderStore.setters.setData(order_meta, data.order_products);

            // get customer data
            $('#show-customer_name').text(`${data.customer.name}`);
            $('#show-customer_email').text(data.customer.email);
            $('#show-customer_phone').text(data.customer.phone);
            $('#show-customer_city').text(data.customer.city);
            $('#show-customer_address').text(data.customer.address);

            
            $('#show-customer_country').text(data.customer.country);
            $('#show-customer_government').text(data.customer.government);
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
                        <td><img width="120px"class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                        <td>${product.ar_name} <br/> ${product.en_name}</td>
                        <td>${product.sku}</td>
                        <td>${order_meta.products_prices[product.id]}</td>
                        <td>${order_meta.products_quantity[product.id].quantity}</td>
                        <td>
                            <span class="text-danger">${order_meta.restored_quantity[product.id]}</span>
                        </td>
                        <td>${parseFloat(product_cost).toFixed(2)} SR</td>
                        ${product_tax_td}
                        <td>${parseFloat(product_cost + total_tax).toFixed(2)}</td>  
                        ${
                            product.is_composite != 0 ? 
                            `<td>
                                <button type="button" data-product-id="${product.id}" class="show-composite-product btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>`
                            : '---'
                        }
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
            
            $('#objectsCard').slideUp(500);
            $('#showObjectCard').slideDown(500);
            $('#loddingSpinner').hide(500);

        }); 
    });

    $('#show-selected_product_table').on('click', '.show-composite-product', function () {
        /**
         * # Get composite product child products ...
         * => get selected product id
         * => find the product in the ShowOrderStore
         */
        let product_id = $(this).data('product-id');

        let tragetProducts = ShowOrderStore.getters.getCompositeUpgradable(product_id);
        renderUpgradeSelection(tragetProducts);

        $('#showOrderProduct').modal('toggle')
    });

    $('.show-upgradable-products').on('click', '.copy-sku', function () {
        let targe_id  = $(this).data('id');
        let targe_sku = $(this).data('sku');
        let $temp     = $("<input>");

        $(this).append($temp);
        $temp.val(targe_sku).select();
        document.execCommand("copy", false, $temp.val());
        $temp.remove();
        
        $(`.done-${targe_id}`).show(300);
        setTimeout(() => {
            $(`.done-${targe_id}`).hide();
        }, 2000);

    });
</script>
@endpush