
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

            <div class="form-group" style="height: 400px; overflow: scroll;">
                <table class="table" style="font-size: 12px; width: max-content; ">
                    <tr>
                        <td>Img</td>
                        <td style="width: 160px">Name</td>
                        <td>SKU</td>
                        <td style="width: 100px">Price</td>
                        <td>Edit Price</td>
                        <td>Valied Quantity</td>
                        <td>Requested Quantity</td>
                        <td id="edit-products_table_header">Sub Total Price</td>
                        <td>Total Price</td>
                        <td>Actions</td>
                    </tr>
                    <tbody id="edit-selected_product_table">
                        
                    </tbody>
                </table>
            </div>
        </div><!-- /.product-pahse -->

        <!-- START SHIPPING PHASE -->
        <div class="form-group row">
            <label for="" class="col-2">Shipping</label>
            <div class="form-group col-4">
                <select id="edit-shipping" data-prefix="edit-" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="edit-shippingErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->

            <div class="form-group col-4">
                <input type="number" min="0" value="0" id="edit-shipping_cost" data-prefix="edit-" class="form-control">
                <div style="padding: 5px 7px; display: none" id="edit-shipping_costErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->

            <div class="form-group col-2" style="padding: 5px 0px;">
                <input type="hidden" id="edit-is_free_shipping">
                <div class="custom-control custom-switch" value="0">
                    <input type="checkbox" class="custom-control-input" data-prefix="edit-" id="edit-is_free_shipping_toggle">
                    <label class="custom-control-label" for="edit-is_free_shipping_toggle">Free Shipping</label>
                </div>
                
                <div style="padding: 5px 7px; display: none" id="edit-is_free_shippingErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.form-group -->
        <!-- END SHIPPING PHASE -->

        <!-- START FEES PHASE -->
        <div class="form-group row">
            <label for="edit-fees" class="col-2">Fees</label>
            <div class="form-group col-10">
                <select id="edit-fees" data-prefix="" class="form-control" multiple="multiple"></select>
                <div style="padding: 5px 7px; display: none" id="edit-feesErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.form-group -->
        <!-- END FEES PHASE -->

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
                    <tbody id="edit-taxes_list_table_container"></tbody>
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
                    <tbody id="edit-fees_list_table_container"></tbody>
                </table>
            </div><!-- /.col-6 -->
        </div>
        
        <div class="form-group">
            <table class="table">
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>Sub Total</h5>
                    </td>
                    <td>
                        <span id="edit-selected_products_sub_total"> --- </span> SAR
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>Shipping Total</h5>
                    </td>
                    <td>
                        <span id="edit-selected_shipping_cost" data-cost=""> --- </span> SAR
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>Taxes Total</h5>
                    </td>
                    <td>
                        <span id="edit-selected_taxe_cost"> --- </span> SAR
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>Fee Total</h5>
                    </td>
                    <td>
                        <span id="edit-selected_fee_cost"> --- </span> SAR
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>Total</h5>
                    </td>
                    <td>
                        <span id="edit-selected_products_total"> --- </span> SAR
                    </td>
                    <td></td>
                </tr>
            </table>
        </div><!-- /.form-group -->
        

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
     
    const edit_special_options = (function  () {
        window.edit_selected_products = {};
        let tax_total = 0;
        let fees_ration = [];
        let edit_shipping_cost = null;

        function starter_event () {
            $('#edit-shipping').select2({
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
                let prefix      = $(this).data('prefix');
                let shipping_id = $(this).val();

                if (shipping_id !== null || shipping_id === '') {
                    $('#createOrderLoddingSpinner').show();

                    axios.get(`{{url("admin/shipping")}}/${shipping_id}?fast_acc=true`)
                    .then(res => {
                        $('#createOrderLoddingSpinner').hide();
                        const target_shipping = res.data.data;
                        target_shipping.cost  = edit_shipping_cost != null ? edit_shipping_cost : target_shipping.cost_with_tax;
                        set_shipping_fields(prefix, target_shipping);
                        edit_shipping_cost = null;
                        calculate_products_cost();
                    });
                } else {
                    set_shipping_fields(prefix);
                }
                
                calculate_products_cost();
            });

            $('#edit-is_free_shipping_toggle').on('change', function () {
                /**
                 * When the user check free_shipping ...
                 * we set the shipping cost to zero, and disable shipping_cost
                 * 
                 * If the user didn't select shipping show the user an error message 
                 */
                let prefix           = $(this).data('prefix');
                let shipping_val     = $(`#${prefix}shipping`).val();

                if (shipping_val != '' && shipping_val != null) {
                    let is_free_shipping = $(this).prop('checked');
                    
                    if (is_free_shipping) {
                        $(`#${prefix}shipping_cost`).val(0).attr('disabled', 'disabled');
                        
                        $(`#${prefix}selected_shipping_cost`)
                            .data('is_free_shipping', true)
                            .css('text-decoration', 'line-through');
                        
                        $(`#${prefix}is_free_shipping`).val(1);
                    } else {
                        let shipping_cost = $(`#${prefix}selected_shipping_cost`).data('cost');
                        $(`#${prefix}shipping_cost`).val(shipping_cost).removeAttr('disabled');
                                      
                        $(`#${prefix}selected_shipping_cost`)
                            .text(shipping_cost)
                            .data('is_free_shipping', false)
                            .css('text-decoration', '');
                        
                        $(`#${prefix}is_free_shipping`).val(0);
                    }
                } else {
                    $(this).prop('checked', false);
                    $(`#${prefix}is_free_shipping`).val(0);
                    $(`#${prefix}shippingErr`).text('please select shipping').slideDown();
                    setTimeout(() => {
                        $(`#${prefix}shippingErr`).text('').slideUp();
                    }, 3000);
                }
                
                calculate_products_cost();
            });

            $('#edit-shipping_cost').on('keyup change', function () {
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

            $('#edit-fees').select2({
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
                        if (res.data.success) {
                            fees_ration = res.data.data;
                            let products_fee_td = '';
                            let fee_info_table_td = '';

                            $('.fee-create-form-tr').remove();
                            
                            fees_ration.forEach(fee_obj => {
                                /**
                                    # Add tax column to products table
                                */
                                fee_info_table_td += `
                                <tr class="fee-create-form-tr">
                                    <td>${fee_obj.title}</td>
                                    <td>${fee_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                                    <td>${fee_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                                    <td>${fee_obj.cost}</td>
                                    <td id="edit-fee-total-cost-type-${fee_obj.id}">---</td>
                                </tr>
                                `;
                            });

                            $('#edit-fees_list_table_container').append(fee_info_table_td);
                            // calculate_products_cost();
                        }
                    });
                }
                // reset is_free_shipping
            });

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
                console.log('original_quantity : ', original_quantity);
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

        function edit_create_selected_product_row (target_product) {
            let total_product_cost = 0;
            let tax_tr = '';
            window.tax_ration.forEach(tax_obj => {
                if (tax_obj.cost_type === 1) {
                    if (tax_obj.is_fixed) {
                        tax_tr += `
                            <td id="edit-product-total-tax-${target_product.id}-${tax_obj.id}">${tax_obj.cost}</td>
                        `;
                        total_product_cost += tax_obj.cost;
                    } else {
                        tax_tr += `
                            <td id="edit-product-total-tax-${target_product.id}-${tax_obj.id}">${tax_obj.cost * target_product.price / 100}</td>
                        `;
                        total_product_cost += tax_obj.cost * target_product.price / 100;
                    }
                }// end :: if
            });

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

            $('#edit-selected_product_table').prepend(product_tr);
        } 
        
        function edit_update_products_hidden_field () {
            console.log(edit_selected_products, Object.keys(edit_selected_products));

            $('#edit-products_quantity').val(JSON.stringify(edit_selected_products));
            $('#edit-products').val(JSON.stringify(Object.keys(edit_selected_products)));
            calculate_products_cost()
        }

        function get_sub_total () {
            let sub_total = 0;
            selected_products_keys.forEach(product_key => {
                sub_total += edit_selected_products[product_key]['price'] 
                            * edit_selected_products[product_key]['quantity'];
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
            
            let selected_products_keys = Object.keys(edit_selected_products);
            selected_products_keys.forEach(product_key => {
                sub_total += edit_selected_products[product_key]['price'] 
                            * edit_selected_products[product_key]['quantity'];
            });

            // if (shipping_obj.)
            // console.log('test total', total_taxes, total_fees, shipping_obj);
            // console.log(sub_total + total_taxes + total_fees + shipping_cost);
            $('#edit-selected_products_sub_total').text(sub_total);
            $('#edit-selected_products_total').text(sub_total + total_taxes + total_fees + shipping_cost);
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
            selected_products_keys = Object.keys(edit_selected_products);
            tax_ration.forEach(tax_obj => {
                let total_tax_obj = 0;

                // calculate the tax depending on it's type and calculation rules
                if (tax_obj.cost_type == 1) {
                    selected_products_keys.forEach(product_key => {
                        let product_obj_total_tax = 0;

                        if (tax_obj.is_fixed) {
                            product_obj_total_tax += tax_obj.cost * edit_selected_products[product_key]['quantity'];
                        } else {
                            product_obj_total_tax += tax_obj.cost * edit_selected_products[product_key]['price'] * edit_selected_products[product_key]['quantity'] / 100;
                        }

                        // get product tax cost 
                        console.log('test tax cost : ', $(`#edit-product-total-tax-${product_key}-${tax_obj.id}`));
                        $(`#edit-product-total-tax-${product_key}-${tax_obj.id}`).text(product_obj_total_tax);
                        $(`#edit-product-total-cost-${product_key}`).text(product_obj_total_tax + edit_selected_products[product_key]['quantity'] * edit_selected_products[product_key]['price']);
                        total_tax_obj += product_obj_total_tax;
                    });
                } else {
                    // total_tax_obj += tax_obj.cost;
                    total_tax_obj += tax_obj.is_fixed ? tax_obj.cost : get_sub_total() * tax_obj.cost / 100;

                }
                
                // show total tax
                $(`#edit-total-cost-type-${tax_obj.id}`).text(total_tax_obj);
                all_total_tax += total_tax_obj;
            });
            
            $('#edit-selected_taxe_cost').text(all_total_tax);

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
            selected_products_keys = Object.keys(edit_selected_products);
            fees_ration.forEach(fee_object => {
                let total_fee_obj = 0;
                
                // calculate the tax depending on it's type and calculation rules
                if (fee_object.cost_type == 1) {
                    selected_products_keys.forEach(product_key => {
                        let product_obj_total_tax = 0;

                        if (fee_object.is_fixed) {
                            product_obj_total_tax += fee_object.cost * edit_selected_products[product_key]['quantity'];
                        } else {
                            product_obj_total_tax += fee_object.cost * edit_selected_products[product_key]['price'] * edit_selected_products[product_key]['quantity'] / 100;
                        }

                        $(`#edit-product-total-fee-${product_key}-${fee_object.id}`).text(product_obj_total_tax);
                        $(`#edit-product-total-fee-${product_key}`).text(product_obj_total_tax + edit_selected_products[product_key]['quantity'] * edit_selected_products[product_key]['price']);
                        total_fee_obj += product_obj_total_tax;
                    });
                } else {
                    total_fee_obj += fee_object.is_fixed ? fee_object.cost : get_sub_total() * fee_object.cost / 100;
                }

                all_total_fees += total_fee_obj;

                $(`#edit-fee-total-cost-type-${fee_object.id}`).text(total_fee_obj);
            });

            $('#edit-selected_fee_cost').text(all_total_fees);

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
            
            return shipping_data;
        }

        // start helper functions
        function set_shipping_fields (prefix = '', shipping = {
            id : '',
            cost : 0,
            is_free_taxes : ''
        }) {
            
            
            $(`#${prefix}is_free_shipping`).val(0);
            $(`#${prefix}is_free_shipping_toggle`).prop('checked', false);

            $(`#${prefix}shipping`).val(shipping.id);
            $(`#${prefix}shipping_cost`).val(shipping.cost).removeAttr('disabled');

            $(`#${prefix}selected_shipping_cost`).text(shipping.cost)
                .data('cost', shipping.cost)
                .data('is_free_shipping', false)
                .css('text-decoration', '');

        }

        return {
            starter_event
        }
    })();

    edit_special_options.starter_event();

});
</script>