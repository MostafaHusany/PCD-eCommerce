
<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('orders.Create_New_Order')</h5>
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
                <label for="customer" class="col-sm-2 col-form-label">@lang('orders.Select_Customer')</label>
                <div class="col-sm-10">
                    <select class="form-control" id="customer" data-prefix=""></select>
                    <div style="padding: 5px 7px; display: none" id="customerErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->
            
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>@lang('orders.Name')</td>
                        <td style="text-right" fir="rtl" id="customer_name">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Email')</td>
                        <td id="customer_email">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Phone')</td>
                        <td id="customer_phone">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Country')</td>
                        <td id="customer_country">---</td>
                    </tr>

                    <tr>
                        <td>@lang('orders.Government')</td>
                        <td id="customer_government">---</td>
                    </tr>

                    <tr>
                        <td>@lang('orders.Address')</td>
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
                <label for="find-products" class="col-sm-2 col-form-label">@lang('orders.Select_Products')</label>
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

            <div class="form-group" style="height: 400px; overflow: scroll;">
                <table class="table" style="font-size: 12px; width: max-content; ">
                    <thead>
                        <tr>
                            <td>@lang('orders.Img')</td>
                            <td style="width: 160px">@lang('orders.Name')</td>
                            <td>@lang('orders.SKU')</td>
                            <td style="width: 100px">@lang('orders.Price')</td>
                            <td>@lang('orders.Edit_Price')</td>
                            <td>@lang('orders.Valied_Quantity')</td>
                            <td>@lang('orders.Requested_Quantity')</td>
                            <td id="products_table_header">@lang('orders.Sub_Total_Price')</td>
                            <td>@lang('orders.Total_Price')</td>
                            <td>@lang('orders.Actions')</td>
                        </tr>
                    </thead>
                    <tbody id="selected_product_table">
                       
                    </tbody>
                </table>
            </div>

            <!-- START SHIPPING PHASE -->
            <div class="form-group row">
                <label for="" class="col-2">@lang('orders.Shipping')</label>
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
                        <label class="custom-control-label" for="is_free_shipping_toggle">@lang('orders.Free_Shipping')</label>
                    </div>
                    
                    <div style="padding: 5px 7px; display: none" id="is_free_shippingErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.form-group -->

            </div><!-- /.form-group -->
            <!-- END SHIPPING PHASE -->

            <!-- START FEES PHASE -->
            <div class="form-group row">
                <label for="fees" class="col-2">@lang('orders.Fees')</label>
                <div class="form-group col-10">
                    <select id="fees" data-prefix="" class="form-control" multiple="multiple"></select>
                    <div style="padding: 5px 7px; display: none" id="feesErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div><!-- /.form-group -->
                {{--
                    <div class="form-group col-10">
                        <input type="number" min="0" value="0" id="fees_cost" data-prefix="" class="form-control">
                        <div style="padding: 5px 7px; display: none" id="fees_costErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.form-group -->
                    
                    <div class="form-group col-2" style="padding: 5px 0px;">
                        <input type="hidden" id="is_free_fees">
                        <div class="custom-control custom-switch" value="0">
                            <input type="checkbox" class="custom-control-input" data-prefix="" id="is_free_fees_toggle">
                            <label class="custom-control-label" for="is_free_fees_toggle">Free Fees</label>
                        </div>
                        
                        <div style="padding: 5px 7px; display: none" id="is_free_feesErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.form-group -->
                --}}
            </div><!-- /.form-group -->
            <!-- END FEES PHASE -->
            
            
            <hr/>
            
            <div class="form-group row">
                <div class="col-6">
                    <h4>@lang('orders.Taxes')</h4>
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
                        <tbody id="taxes_list_table_container"></tbody>
                    </table>
                </div><!-- /.col-6 -->

                <div class="col-6">
                    <h4>@lang('orders.Fees')</h4>
                    {{--
                    <div class="form-group">
                        <select id="fees" data-prefix="" class="form-control" multiple="multiple"></select>
                        <div style="padding: 5px 7px; display: none" id="feesErr" class="err-msg mt-2 alert alert-danger">
                        </div>
                    </div><!-- /.form-group -->
                    --}}
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
                        <tbody id="fees_list_table_container"></tbody>
                    </table>
                </div><!-- /.col-6 -->
            </div>

            <div class="form-group">
                <table class="table">
                    <tr>
                        <td class="text-center" colspan="7">
                            <h5>@lang('orders.Sub_Total')</h5>
                        </td>
                        <td>
                            <span id="selected_products_sub_total"> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h5>@lang('orders.Shipping_Total')</h5>
                        </td>
                        <td>
                            <span id="selected_shipping_cost" data-cost=""> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h5>@lang('orders.Taxes_Total')</h5>
                        </td>
                        <td>
                            <span id="selected_taxe_cost"> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h5>@lang('orders.Fee_Total')</h5>
                        </td>
                        <td>
                            <span id="selected_fee_cost"> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h5>@lang('orders.Total')</h5>
                        </td>
                        <td>
                            <span id="selected_products_total"> --- </span> @lang('orders.SAR')
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div><!-- /.product-pahse -->

        <button !id="createorder" class="create-object btn btn-primary float-right">@lang('orders.Create_Order')</button>
    </form>
</div>



@push('page_scripts')
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
        let tax_total = 0;
        let fees_ration = [];


        function startet_event () {
            /**
                # Initialize the select2 plugin to #find-product field
                the #find-product works with ajax to get latest products

                # When there is a change on the #find-product this mean that 
                the user selected a product and we need to call all the 
                products info from the server and show it on the list of
                selected products. 

                # To collect the selected products we store the data 
                in "selected_products" variable, this variable is a list
                of objects each object is consist of the product id as key,
                quantityt and the price and this because the price and 
                the quantityt is editable !

                selected_products[target_product_id] = {
                    quantity : 1,
                    price    : target_product.price
                } 

                # After collecting the data in "selected_products" list
                we parse the data into json and emped it as json in hidden 
                fields #products & #products_quantity the first stores the 
                selected products id's, and the second stores the qunatity 
                and the prics.

                # Notice that update_products_hidden_field() is where we 
                add the products ids' and the quntityt as json in the hidden
                fields.

            */
            $('#shipping').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select Shipping',
                ajax: {
                    url: '{{ url("admin/shipping-search") }}',
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item.title}`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            }).change(function () {
                let shipping_id = $(this).val();

                if (shipping_id !== null || shipping_id === '') {
                    $('#createOrderLoddingSpinner').show();

                    axios.get(`{{url("admin/shipping")}}/${shipping_id}?fast_acc=true`)
                    .then(res => {
                        $('#createOrderLoddingSpinner').hide();
                        const target_shipping = res.data.data;
                        target_shipping.cost  = target_shipping.cost_with_tax;
                        set_shipping_fields(target_shipping);
                        edit_shipping_cost = null;
                        calculate_products_cost();

                    });
                } else {
                    set_shipping_fields();
                }
                
                // reset is_free_shipping
            });

            $('#is_free_shipping_toggle').on('change', function () {
                /**
                 * When the user check free_shipping ...
                 * we set the shipping cost to zero, and disable shipping_cost
                 * 
                 * If the user didn't select shipping show the user an error message 
                 */
                let shipping_val = $(`#shipping`).val();

                if (shipping_val != '' && shipping_val != null) {
                    let is_free_shipping = $(this).prop('checked');
                    
                    if (is_free_shipping) {
                        $(`#shipping_cost`).val(0).attr('disabled', 'disabled');
                        
                        $(`#selected_shipping_cost`)
                            .data('is_free_shipping', true)
                            .css('text-decoration', 'line-through');
                        
                        $(`#is_free_shipping`).val(1);
                    } else {
                        let shipping_cost = $(`#selected_shipping_cost`).data('cost');
                        $(`#shipping_cost`).val(shipping_cost).removeAttr('disabled');
                                      
                        $(`#selected_shipping_cost`)
                            .text(shipping_cost)
                            .data('is_free_shipping', false)
                            .css('text-decoration', '');
                        
                        $(`#is_free_shipping`).val(0);
                    }
                } else {
                    $(this).prop('checked', false);
                    $(`#is_free_shipping`).val(0);
                    $(`#shippingErr`).text('please select shipping').slideDown();
                    setTimeout(() => {
                        $(`#shippingErr`).text('').slideUp();
                    }, 3000);
                }

                calculate_products_cost();
            });

            $('#shipping_cost').on('keyup change', function () {
                let prefix          = $(this).data('prefix');
                const shipping_cost = $(this).val();
                const selected_shipping_cost = $(`#${prefix}selected_shipping_cost`).data('cost');
                
                if (shipping_cost < selected_shipping_cost) {
                    $(this).css('color', 'red');
                } else {
                    $(this).css('color', '');
                }

                $(`#${prefix}selected_shipping_cost`).text(shipping_cost);      
                
                calculate_products_cost();          
            });
            // end shipping events
            
            $('#fees').select2({
                allowClear: true,
                width: '100%',
                placeholder: 'Select Fees',
                ajax: {
                    url: '{{ url("admin/fees-search") }}',
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item.title}`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            }).change(function () {
                let prefix   = $(this).data('prefix');
                let fees_ids = $(this).val();

                if (fees_ids !== null || fees_ids === '') {
                    $('#createOrderLoddingSpinner').show();
                    
                    axios.get(`{{url("admin/fees")}}/0?get_selected_fees=true`, {
                        params: {
                            fees_ids: JSON.stringify(fees_ids),
                        },
                    })
                    .then(res => {
                        $('#createOrderLoddingSpinner').hide();
                        console.log(res.data, res.data.success);
                        if (res.data.success) {
                            fees_ration = res.data.data;
                            let products_fee_td = '';
                            let fee_info_table_td = '';

                            $('.fee-create-form-tr').remove();
                            fees_ration.forEach(fee_obj => {
                                /**
                                    # Add tax column to products table
                                */
                                // products_fee_td += fee_obj.cost_type === 1 ? `
                                //     <td>${fee_obj.title}</td>
                                // ` : '';

                                fee_info_table_td += `
                                <tr class="fee-create-form-tr">
                                    <td>${fee_obj.title}</td>
                                    <td>${fee_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                                    <td>${fee_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                                    <td>${fee_obj.cost}</td>
                                    <td id="fee-total-cost-type-${fee_obj.id}">---</td>
                                </tr>
                                `;
                            });
                            // $('#products_table_header').after(products_fee_td);
                            $('#fees_list_table_container').append(fee_info_table_td);
                            calculate_products_cost();
                        }
                    });
                } else {
                    // set_shipping_fields(prefix);
                }
                
                // reset is_free_shipping
            });

            //
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
                // before adding the product make sure that the product is not already selected
                if (!(target_product_id in selected_products)) {
                    if (target_product_id !== '') {
                        $('#createOrderLoddingSpinner').show(500);
                        
                        /** 
                            # Here we get the targted product info, and 
                            than show the product info in the table ...
                        */
                        get_selected_product(target_product_id)
                        .then(target_product => {
                            const meta = JSON.parse(target_product.meta);
                            console.log('target_product : ', meta);
                            if (target_product != null) {
                                create_selected_product_row(target_product);
                                $('#find-products').val('').trigger('change');
                                $('#createOrderLoddingSpinner').hide(500);
                                
                                /**
                                 * Here we check the product type,
                                 * if the product is upgradable we need
                                 * to get the default options and also
                                 * give the options to show upgrade functionality
                                 * for the product 
                                 * 
                                 */
                                
                                selected_products[target_product_id] = {
                                    quantity : 1,
                                    price    : target_product.price
                                } 

                                if (target_product.is_composite == 2) {
                                    let meta = JSON.parse(target_product.meta);
                                    let upgrade_options = {};
                                    let upgrade_options_list = [];

                                    meta.upgrade_categories.forEach(category_id => {
                                        meta.upgrade_products_id[category_id].forEach(product_id => {
                                            if (meta.upgrade_products[category_id][product_id].is_default) {
                                                upgrade_options[category_id] = product_id;
                                                upgrade_options_list.push(product_id);
                                            }
                                        });
                                    });

                                    selected_products[target_product_id].upgrade_options = upgrade_options;
                                    selected_products[target_product_id].upgrade_options_list = upgrade_options_list;
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

            // the selected product quantity, price change event, and remove item event
            $('#selected_product_table').on('change keyup', '.selected_product_quantity', function () {
                let target_id   = $(this).data('target');
                let price       = selected_products[target_id].price;
                let quantity    = selected_products[target_id].quantity = $(this).val();

                let original_quantity = $(`#selected_product_o_quantity_${target_id}`).data('quantity');
                $(`#selected_product_o_quantity_${target_id}`).text(original_quantity - quantity);
                
                // update item sub total price
                $(`#selected_product_td_sub_total_${target_id}`).text(parseFloat(price * quantity).toFixed(2) + ' SR');
                
                update_products_hidden_field();
            }).on('change keyup', '.selected_product_price', function () {
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
            /**
            * draw selected product row in products table
            * get tax list and calculate the tax for each product
            * get fees list and calculate the fees
            */

            let total_product_cost = 0;

            let tax_tr = '';
            window.tax_ration.forEach(tax_obj => {
                if (tax_obj.cost_type === 1) {
                    if (tax_obj.is_fixed) {
                        tax_tr += `
                            <td id="product-total-tax-${target_product.id}-${tax_obj.id}">${tax_obj.cost}</td>
                        `;
                        total_product_cost += tax_obj.cost;
                    } else {
                        tax_tr += `
                            <td id="product-total-tax-${target_product.id}-${tax_obj.id}">${tax_obj.cost * target_product.price / 100}</td>
                        `;
                        total_product_cost += tax_obj.cost * target_product.price / 100;
                    }
                }// end :: if
            });

            let product_tr = `
                <tr class="selected-product-rows selected-product-row-${target_product.id}">
                    <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                    <td>${target_product.ar_name} / ${target_product.en_name}</td>
                    <td>${target_product.sku}</td>
                    <td>${target_product.price} SR</td>
                    <td>
                        <input style="width: 75px" class="selected_product_price" type="number" value="${target_product.price}" step="1"
                            id="selected_product_price_${target_product.id}"
                            data-target="${target_product.id}" data-original-price="${target_product.price}" 
                            min="0"/>
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
                    ${tax_tr}
                    <td id="product-total-cost-${target_product.id}" style="font-weight: bold; color: red">
                        ${target_product.price + total_product_cost}
                    </td>
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
            $('#products_quantity').val(JSON.stringify(selected_products));
            $('#products').val(JSON.stringify(Object.keys(selected_products)));

            calculate_products_cost();
        }

        function get_sub_total () {
            let sub_total = 0;
            selected_products_keys.forEach(product_key => {
                sub_total += selected_products[product_key]['price'] 
                            * selected_products[product_key]['quantity'];
            });
            return sub_total;
        }

        function calculate_products_cost () {
            /**
             * # Calculate sub total, and total 
             * Here we get all costs products sub total, feesm taxes and shipping
             * and than calculate teh total
            */
            let sub_total = 0;
            let total_taxes = calculate_taxes();
            let total_fees  = calculate_fees();
            let shipping_obj = get_shipping();
            let shipping_cost = shipping_obj.is_free_shipping ? 0 : parseInt(shipping_obj.shipping_cost);
            
            let selected_products_keys = Object.keys(selected_products);
            selected_products_keys.forEach(product_key => {
                sub_total += selected_products[product_key]['price'] 
                            * selected_products[product_key]['quantity'];
            });

            // if (shipping_obj.)
            // console.log('test total', total_taxes, total_fees, shipping_obj);
            // console.log(sub_total + total_taxes + total_fees + shipping_cost);
            $('#selected_products_sub_total').text(sub_total);
            $('#selected_products_total').text(sub_total + total_taxes + total_fees + shipping_cost);
        }

        function calculate_taxes () {
            /**
                get the products list, and the tax list and 
                start calculation tax and sum the results and
                show in the card. 

                tax list : window.tax_ration
                selected products : selected_products 
             */
            let all_total_tax = 0;
            selected_products_keys = Object.keys(selected_products);
            tax_ration.forEach(tax_obj => {
                let total_tax_obj = 0;

                // calculate the tax depending on it's type and calculation rules
                if (tax_obj.cost_type == 1) {
                    selected_products_keys.forEach(product_key => {
                        let product_obj_total_tax = 0;

                        if (tax_obj.is_fixed) {
                            product_obj_total_tax += tax_obj.cost * selected_products[product_key]['quantity'];
                        } else {
                            product_obj_total_tax += tax_obj.cost * selected_products[product_key]['price'] * selected_products[product_key]['quantity'] / 100;
                        }

                        $(`#product-total-tax-${product_key}-${tax_obj.id}`).text(product_obj_total_tax);
                        $(`#product-total-cost-${product_key}`).text(product_obj_total_tax + selected_products[product_key]['quantity'] * selected_products[product_key]['price']);
                        total_tax_obj += product_obj_total_tax;
                    });
                } else {
                    // total_tax_obj += tax_obj.cost;
                    total_tax_obj += tax_obj.is_fixed ? tax_obj.cost : get_sub_total() * tax_obj.cost / 100;

                }
                
                // show total tax
                $(`#total-cost-type-${tax_obj.id}`).text(total_tax_obj);
                all_total_tax += total_tax_obj;
            });
            
            $('#selected_taxe_cost').text(all_total_tax);

            return all_total_tax;
        }
        
        function calculate_fees () {
            /**
                get the products list, and the fee list and 
                start calculation tax and sum the results and
                show in the card. 

                fees list : window.fees_ration
                selected products : selected_products 
            */
            let all_total_fees = 0;
            selected_products_keys = Object.keys(selected_products);
            fees_ration.forEach(fee_object => {
                let total_fee_obj = 0;
                
                // calculate the tax depending on it's type and calculation rules
                if (fee_object.cost_type == 1) {
                    selected_products_keys.forEach(product_key => {
                        let product_obj_total_tax = 0;

                        if (fee_object.is_fixed) {
                            product_obj_total_tax += fee_object.cost * selected_products[product_key]['quantity'];
                        } else {
                            product_obj_total_tax += fee_object.cost * selected_products[product_key]['price'] * selected_products[product_key]['quantity'] / 100;
                        }

                        $(`#product-total-fee-${product_key}-${fee_object.id}`).text(product_obj_total_tax);
                        $(`#product-total-fee-${product_key}`).text(product_obj_total_tax + selected_products[product_key]['quantity'] * selected_products[product_key]['price']);
                        total_fee_obj += product_obj_total_tax;
                    });
                } else {
                    total_fee_obj += fee_object.is_fixed ? fee_object.cost : get_sub_total() * fee_object.cost / 100;
                }

                all_total_fees += total_fee_obj;

                $(`#fee-total-cost-type-${fee_object.id}`).text(total_fee_obj);
            });

            $('#selected_fee_cost').text(all_total_fees);

            return all_total_fees;
        }

        function get_shipping () {
            /*
                selected_shipping_cost
                cost
                cost-type
                is_free_shipping
            */
            
            const shipping_data = {
                // shipping_cost : $('#selected_shipping_cost').data('cost'),
                shipping_cost    : $('#shipping_cost').val(),
                is_free_shipping : $('#selected_shipping_cost').data('is_free_shipping')
            };

            console.log('get_shipping::fun shipping data = ', shipping_data);

            return shipping_data;
        }

        // start helper functions
        function set_shipping_fields (shipping = {
            id : '',
            cost : 0,
            is_free_taxes : ''
        }) {
            
            
            $(`#is_free_shipping`).val(0);
            $(`#is_free_shipping_toggle`).prop('checked', false);

            $(`#shipping`).val(shipping.id);
            $(`#shipping_cost`).val(shipping.cost).removeAttr('disabled');

            $(`#selected_shipping_cost`).text(shipping.cost)
                .data('cost', shipping.cost)
                .data('is_free_shipping', false)
                .css('text-decoration', '');

        }

        return {
            startet_event : startet_event
        }
    })();

    create_special_options.startet_event();

    class UpgradableModel {
        _meta;
        _categories;
        _products;

        constructor () {

        }

        getCategories
    };

});
</script>
@endpush