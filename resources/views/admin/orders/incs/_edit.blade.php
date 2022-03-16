
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
                <select id="edit-shipping" class="form-control"></select>
                <div style="padding: 5px 7px; display: none" id="edit-shippingErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->

            <div class="form-group col-4">
                <input type="number" min="0" value="0" id="edit-shipping_cost" class="form-control">
                <div style="padding: 5px 7px; display: none" id="edit-shipping_costErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->

            <div class="form-group col-2" style="padding: 5px 0px;">
                <input type="hidden" id="edit-is_free_shipping">
                <div class="custom-control custom-switch" value="0">
                    <input type="checkbox" class="custom-control-input" id="edit-is_free_shipping_toggle">
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
                        <span id="edit-selected_shipping_cost"> --- </span> SAR
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
     
    const StoreObject = (function () {
        /**
         * # Here we will store :
         * products_list all selected products will be stored here
         * products_meta each products selected quantity and price
         * shipping_data ....
         * 
         * taxes data the tax value for each selected tax, and the total of tax
         * 
         */

        let products_list = [];
        let products_meta = {
            /**
                product_id : {
                    quantity : 1,
                    price    : product.price
                }
            */
        };

        let shipping_data = {
            // id, is_free, cost
            id      : null,
            cost    : 0,
            is_free : 0
        };

        const tax_data = {
            taxe_total       : 0,
            each_taxes_total : {},
        };
        
        const fees_data = {
            selected_fees   : [],
            each_fees_total : {},
            fees_total      : 0
        };

        let sub_total    = 0;
        let total        = 0;

        // request product by id from the server
        const request_product = async (product_id) => {
            const response = await axios.get(`{{ url('admin/products') }}/${product_id}`, { params: { get_p : true }});
            return await response.data;
        };

        const request_shipping = async (shipping_id) => {
            const response = await axios.get(`{{ url("admin/shipping") }}/${shipping_id}`, { params: { fast_acc : true }});
            return await response.data;
        } 

        const request_fees = async (fees_ids) => {
            const response = await axios.get(`{{ url("admin/fees") }}/0`, {
                        params: {
                            fees_ids: JSON.stringify(fees_ids),
                            get_selected_fees : true
                        }
                    });

            return await response.data;
        }

        //  START PRODUCTS DATA EDITING
        const set_products_data = (input_products_list, input_products_meta) => {
            products_list = input_products_list;
            products_meta = input_products_meta;

            let keys = Object.keys(products_meta);
            keys.forEach(key => {
                products_meta[key] = {
                    quantity : parseInt(products_meta[key].quantity),
                    price    : parseFloat(products_meta[key].price)
                }
            });
            
            // re-calculate sub-total
            _calculate_order_sub_total();
        };

        // add new product to products list
        const add_new_product = (new_product) => {
            // update order products list and meta
            products_list.push(new_product);
            products_meta[new_product.id] = {
                quantity : 1,
                price    : new_product.price
            };

            // re-calculate sub-total
            _calculate_order_sub_total();

            return { products_list, products_meta};
        };

        // remove product from products list
        const remove_product = (product_id) => {
            products_list = products_list.filter(product => product.id != product_id);
            delete products_meta[product_id];

            // re-calculate sub-total
            _calculate_order_sub_total();

            return { products_list, products_meta};
        };

        // update products meta
        const update_products_meta = (new_products_meta) => {
            /**
             * # We use this method to update product price or quantity.
             */
            products_meta = new_products_meta;
            
            // re-calculate sub-total
            _calculate_order_sub_total();
        };
        
        // update product quantity
        const update_product_quantity = (product_id, quantity) => {
            products_meta[product_id].quantity = quantity;
            
            // re-calculate sub-total
            _calculate_order_sub_total();

            return products_meta;
        };
        
        // shipping methods
        const shipping_methods = {
            add_shipping : (shipping_obj) => {
                shipping_data = {
                    id      : shipping_obj.id,
                    cost    : shipping_obj.cost_with_tax,
                    is_free : 0
                }
                _calculate_order_sub_total();
                return shipping_data;
            },

            delete_shipping : () => {
                shipping_data = {
                    id      : null,
                    cost    : 0,
                    is_free : 0
                };
                _calculate_order_sub_total();
            },

            // update shipping cost
            update_shipping_cost : (cost) => {
                shipping_data.cost = cost;
                _calculate_order_sub_total();
                return shipping_data;
            },

            // toggle shipping is_free 
            toggle_shipping_is_free : () => {
                shipping_data.is_free = !shipping_data.is_free;
                _calculate_order_sub_total();
                return shipping_data;
            }
        };

        // fees methods
        const fees_methods = {
            update_fees_list : (new_fees_list) => {
                fees_data.selected_fees = new_fees_list;

                _calculate_order_sub_total();

                return fees_data;
            },

            get_fees_data : () => {
                return fees_data;
            }
        }

        // START ORDER CALCULATIONS
        // update order sub-total
        const _calculate_order_sub_total = () => {
            let tmp_sub_total = 0;
            let total_quantity = 0
            /**
             * Loop throgh the products_list
             * calculate product sub-total, and tax
             */
            products_list.forEach(product => {
                let { price, quantity } = products_meta[product.id];
                tmp_sub_total  += price * parseInt(quantity);
                total_quantity += parseInt(quantity);
            });

            sub_total = tmp_sub_total;

            // also we will calculate the taxes here !!
            // loop in the global variable of tax, and than 
            // calculate the tax for each product and store it 
            tax_data.taxe_total = 0;
            window.tax_ration.forEach(tax_obj => {
                // per item
                if (tax_obj.cost_type == 1) {
                    tax_data.each_taxes_total[tax_obj.id] = tax_obj.is_fixed ? tax_obj.cost * total_quantity
                        : tax_obj.cost * sub_total / 100;
                } else {
                    tax_data.each_taxes_total[tax_obj.id] = tax_obj.is_fixed ? tax_obj.cost 
                        : tax_obj.cost * sub_total / 100;
                }// end :: if
                
                tax_data.taxe_total += tax_data.each_taxes_total[tax_obj.id];
            });

            // also we will calculate fees sub-total here
            fees_data.fees_total = 0;
            fees_data.selected_fees.forEach(fee_obj => {
                if (fee_obj.cost_type == 1) {
                    fees_data.each_fees_total[fee_obj.id] = fee_obj.is_fixed ? fee_obj.cost * total_quantity
                        : tax_obj.cost * sub_total / 100;
                } else {
                    fees_data.each_fees_total[fee_obj.id] = fee_obj.is_fixed ? fee_obj.cost 
                        : fee_obj.cost * sub_total / 100;
                }
                
                fees_data.fees_total += fees_data.each_fees_total[fee_obj.id];
            });

            total = sub_total + tax_data.taxe_total + fees_data.fees_total;
            total += shipping_data.is_free ? 0 : parseFloat(shipping_data.cost);
        }
        
        // update product price NOT USED !!
        const update_product_price = (product_id, price) => {
            products_meta[product_id].price = price;
            
            // re-calculate sub-total
            _calculate_order_sub_total();

            return products_meta;
        };

        // START GETTERS
        const get_sub_total = () => {
            return sub_total;
        }

        const get_taxes_total = () => {
            return tax_data;
        }

        const get_total = () => {
            return total;
        }
        
        // check if product already exists
        const is_in_products_list = (product_id) => {
            return (product_id in products_meta)
        };
        
        return {
            // async methods
            request_product,
            request_shipping,
            request_fees,

            set_products_data,
            add_new_product,
            remove_product,
            is_in_products_list,
            update_products_meta,
            
            shipping_methods,//add_shipping,
            fees_methods,

            // getters
            get_sub_total,
            get_taxes_total,
            get_total
        };
    })();

    const ViewObject = (function (storeObject) {
        /**
         * # General purpose element selectore
         * '.edit-selected-product-rows' => tr product 
         */
        
        // private method :: create tax column for product row
        const _create_product_tax_columns = (target_product_id, target_product_meta) => {
            let tax_tr = '';
            let total_product_cost = 0;
            
            window.tax_ration.forEach(tax_obj => {
                if (tax_obj.cost_type === 1) {
                    if (tax_obj.is_fixed) {
                        tax_tr += `
                            <td id="edit-product-total-tax-${target_product_id}-${tax_obj.id}">
                                ${parseFloat(tax_obj.cost * target_product_meta.quantity).toFixed(2)}
                            </td>
                        `;
                        total_product_cost += tax_obj.cost * target_product_meta.quantity;
                    } else {
                        tax_tr += `
                            <td id="edit-product-total-tax-${target_product_id}-${tax_obj.id}">
                                ${parseFloat(tax_obj.cost * target_product_meta.price * target_product_meta.quantity / 100).toFixed(2)}
                            </td>
                        `;
                        total_product_cost += tax_obj.cost * target_product_meta.price * target_product_meta.quantity / 100;
                    }
                }// end :: if
            });

            return {tax_tr, total_product_cost};
        }

        // private method :: update tax column for product row
        const _update_product_tax_column = (product_id, product_price, product_quantity) => {
            let total_tax_cost = 0;

            window.tax_ration.forEach(tax_obj => {
                if (tax_obj.cost_type === 1) {
                    if (tax_obj.is_fixed) {
                        $(`#edit-product-total-tax-${product_id}-${tax_obj.id}`).text(parseFloat(tax_obj.cost * product_quantity).toFixed(2));
                        total_tax_cost += product_quantity * tax_obj.cost;
                    } else {
                        $(`#edit-product-total-tax-${product_id}-${tax_obj.id}`).text(parseFloat(tax_obj.cost * product_quantity * product_price / 100).toFixed(2))
                        total_tax_cost += tax_obj.cost * product_quantity * product_price / 100;
                    }
                }// end :: if
            });

            return total_tax_cost;
        }

        // show selected product table
        const show_selected_products = (products_list, products_meta) => {     
            /**
             * This method is used to show selcted ptoducts in products table
             * It take a list of products, and meta that store the quantityt and the price
             * */   
            // clear old products table
            $('.edit-selected-product-rows').remove();

            products_list.forEach(target_product => {
                
                let { tax_tr, total_product_cost } = _create_product_tax_columns (target_product.id, products_meta[target_product.id]);
                let {quantity, price} = products_meta[target_product.id];
                let product_tr = `
                    <tr class="edit-selected-product-rows edit-selected-product-row-${target_product.id}">
                        
                        <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                        <td>${target_product.ar_name} / ${target_product.en_name}</td>
                        <td>${target_product.sku}</td>

                        <td>${target_product.price}</td>
                        <td>
                            <input style="width: 80px" class="selected_product_price" type="number" value="${price}" step="1"
                                id="selected_product_price_${target_product.id}"
                                data-target="${target_product.id}" data-original-price="${target_product.price}" 
                                min="0"/>
                            SR
                        </td>
                        
                        <td id="selected_product_o_quantity_${target_product.id}" data-quantity="${target_product.quantity}">
                            ${target_product.quantity}
                        </td>
                        <td>
                            <input style="width: 80px" class="selected_product_quantity" type="number" value="${quantity}" step="1"
                                id="selected_product_quantity_${target_product.id}" 
                                data-target="${target_product.id}" data-max="${target_product.quantity}"
                                min="1" max="${target_product.quantity}" />
                        </td>

                        <td id="selected_product_td_sub_total_${target_product.id}">${target_product.price} SR</td>
                        ${tax_tr}
                        <td id="product-total-cost-${target_product.id}" style="font-weight: bold; color: red">
                            ${parseFloat(quantity * price + total_product_cost).toFixed(2)}
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
                $('#edit-find-products').val('').trigger('change');
            });

            // show the sub-total after showing the products
            update_sub_total();
        };

        // show alert that the product already exists
        const alert_product_exists = (product_id) => {
            $('#edit-createOrderWarningAlert').text('Product is already in the list').slideDown(500);
            $(`.edit-selected-product-row-${product_id}`).css('border', '1px solid red');
            
            setTimeout(() => {
                $('#edit-createOrderWarningAlert').text('').slideUp(500);
                $(`.edit-selected-product-row-${product_id}`).css('border', '');
            }, 3000);
        };

        const update_product_row = (product_id, product_quantity, product_price) => {
            // update the product number
            /**
             * get product price and quanity, and orogonal quantity
             * 
             * update each of the product left quantity, sub_total, tax, total
             */
            
            let original_quantity = $(`#selected_product_o_quantity_${product_id}`).data('quantity');
            $(`#selected_product_o_quantity_${product_id}`).text(original_quantity - product_quantity);
            
            // update item sub-total price
            $(`#selected_product_td_sub_total_${product_id}`).text(parseFloat(product_price * product_quantity).toFixed(2) + ' SR');

            // update tax fields
            let total_tax_cost = _update_product_tax_column (product_id, product_price, product_quantity);

            // update all total
            $(`#product-total-cost-${product_id}`).text(parseFloat(total_tax_cost + product_price * product_quantity).toFixed(2));

            update_sub_total();
        }; 

        // update form meta data 
        const update_product_hidden_fields = (selected_products) => {
            $('#edit-products_quantity').val(JSON.stringify(selected_products));
            $('#edit-products').val(JSON.stringify(Object.keys(selected_products)));
        };
        
        // START TOTALS TABLE
        const update_sub_total = () => {
            // update sub-total 
            let sub_total = storeObject.get_sub_total();
            $('#edit-selected_products_sub_total').text(sub_total);

            // update tax table, and tax sub-total
            let tax_data  = storeObject.get_taxes_total();
            let tax_keys = Object.keys(tax_data.each_taxes_total);
            tax_keys.forEach(tax_id => {
                // show total tax
                $(`#edit-total-cost-type-${tax_id}`).text(tax_data.each_taxes_total[tax_id]);
                
                $('#edit-selected_taxe_cost').text(tax_data.taxe_total);
            });

            let fees_data = storeObject.fees_methods.get_fees_data();
            update_fees(fees_data);
        }

        // update shipping data
        const update_shipping = (shipping_data = null) => {
            // this method works with shipping select field, is_free, and shipping sub-total in totals table 
            if (shipping_data == null) {
                // if there is no shipping yet clear all fields
                $(`#edit-is_free_shipping`).val(0);
                $(`#edit-is_free_shipping_toggle`).prop('checked', false);

                $(`#edit-shipping_cost`).val('').attr('disabled', 'disabled');
                $(`#edit-selected_shipping_cost`).text('---').css('text-decoration', '');
            } else {
                
                $(`#edit-shipping_cost`).val(shipping_data.cost);
                $(`#edit-selected_shipping_cost`).text(shipping_data.cost);

                if (shipping_data.is_free) {
                    $(`#edit-is_free_shipping`).val(1);
                    $(`#edit-is_free_shipping_toggle`).prop('checked', true);
                    $(`#edit-shipping_cost`).attr('disabled', 'disabled');
                    $(`#edit-selected_shipping_cost`).css('text-decoration', 'line-through')
                } else {
                    $(`#edit-is_free_shipping`).val(0);
                    $(`#edit-is_free_shipping_toggle`).prop('checked', false);
                    $(`#edit-shipping_cost`).removeAttr('disabled');
                    $(`#edit-selected_shipping_cost`).css('text-decoration', '');
                }
            }
            
            update_total();
        }

        // update fees data
        const update_fees = (fees_data) => {
            
            $('.fee-create-form-tr').remove();
            
            fees_data.selected_fees.forEach(fee_obj => {
                let fee_info_table_td = `
                    <tr class="fee-create-form-tr">
                        <td>${fee_obj.title}</td>
                        <td>${fee_obj.cost_type == 1 ? 'per-item' : 'per-package'}</td>
                        <td>${fee_obj.is_fixed == 1? 'fixed' : 'percentag'}</td>
                        <td>${fee_obj.cost}</td>
                        <td>${fees_data.each_fees_total[fee_obj.id]}</td>
                    </tr>
                `;
                $('#edit-fees_list_table_container').append(fee_info_table_td);
            });

            $('#edit-selected_fee_cost').text(fees_data.fees_total);
            
            update_total();
        }

        const update_total = () => {
            let total = storeObject.get_total();
            $(`#edit-selected_products_total`).text(total);
        }

        return {
            show_selected_products,
            alert_product_exists,
            update_product_row,
            update_product_hidden_fields,
            update_shipping,
            update_fees
        }
    })(StoreObject);

    window.EditControllerObject = (function (storeObject, viewObject) {
        /**
         * # Search and select customer 
         * 
         * # Search for a product, select the produst
         * and show it the selected products table.
         * 
         * # Delete product from the selected products table
         * 
         * # Update products quantity
         *  
         * # Update products price
         * 
         * # Select shipping service
         * 
         * # Update shipping service price
         * 
         * # Make shipping free
         */

        let products_list = [];
        let products_meta = {};

        const products_events = () => {
            
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
                
                if (!storeObject.is_in_products_list(target_product_id)) {
                    storeObject.request_product(target_product_id)
                    .then(res => {
                        if (res.success) {
                            // push data tp products_list
                            ({products_list, products_meta} = storeObject.add_new_product(res.data));
                            
                            // show products list
                            viewObject.show_selected_products(products_list, products_meta);

                            // update form products_quantity hidden field,
                            // Notice that we need change the name to products_meta
                            viewObject.update_product_hidden_fields(products_meta);
                        }
                    });
                } else {
                    viewObject.alert_product_exists(target_product_id);
                }// end :: if
            });

            /**
             * product update price
             * get the price of the product 
             */
            $('#edit-selected_product_table').on('click', '.remove_selected_item', function (e) {
                e.preventDefault();
                let target_product_id = $(this).data('target');

                // delete product from product list
                let {products_list, products_meta} = storeObject.remove_product(target_product_id);
                
                // show products list
                viewObject.show_selected_products(products_list, products_meta);

                // update form products_quantity hidden field,
                // Notice that we need change the name to products_meta
                viewObject.update_product_hidden_fields(products_meta)
            })
            .on('change keyup', '.selected_product_price', function () {
                let target_id   = $(this).data('target');
                let price       = products_meta[target_id].price = $(this).val();
                let quantity    = products_meta[target_id].quantity;

                // update product row numbers
                viewObject.update_product_row(target_id, quantity, price);
                
                // update storage products meta
                storeObject.update_products_meta(products_meta);
    
                // update form products_quantity hidden field,
                // Notice that we need change the name to products_meta
                viewObject.update_product_hidden_fields(products_meta);
            })
            .on('change keyup', '.selected_product_quantity', function () {
                let target_id   = $(this).data('target');
                let price       = products_meta[target_id].price;
                let quantity    = products_meta[target_id].quantity = $(this).val();

                // update product row numbers
                viewObject.update_product_row(target_id, quantity, price);
                
                // update storage products meta
                storeObject.update_products_meta(products_meta);
                
                // update form products_quantity hidden field,
                // Notice that we need change the name to products_meta
                viewObject.update_product_hidden_fields(products_meta);
            })


            /**
             * Select and update shipping
             */
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
                    // $('#createOrderLoddingSpinner').show();

                    storeObject.request_shipping(shipping_id)
                    .then(res => {
                        if (res.success) {
                            // add new shipping data
                            let shipping_data = storeObject.shipping_methods.add_shipping(res.data);
                            
                            // show shipping data
                            viewObject.update_shipping(shipping_data)
                        }
                    });
                } else {
                    // delete shipping
                    storeObject.shipping_methods.delete_shipping();

                    // clear shipping fields
                    viewObject.update_shipping()
                }
            });

            $('#edit-is_free_shipping_toggle').on('change', function () {
                
                let shipping_val = $(`#edit-shipping`).val();

                if (shipping_val != '' && shipping_val != null) {
                    // update shipping object
                    let shipping_data = storeObject.shipping_methods.toggle_shipping_is_free ();

                    // update shipping view
                    viewObject.update_shipping(shipping_data);
                } else {
                    // clear shipping fields
                    viewObject.update_shipping()
                }
            
            });

            $('#edit-shipping_cost').on('keyup change', function () {
                
                let shipping_val = $(`#edit-shipping`).val();

                if (shipping_val != '' && shipping_val != null) {
                    let shipping_cost = $(this).val();
                    
                    // update shipping object
                    let shipping_data = storeObject.shipping_methods.update_shipping_cost (shipping_cost);

                    // update shipping view
                    viewObject.update_shipping(shipping_data);
                } else {
                    // clear shipping fields
                    viewObject.update_shipping()
                }
            });


            /**
             * Select and update fees
             */
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
                let fees_ids = $(this).val();

                if (fees_ids !== null || fees_ids === '') {
                    storeObject.request_fees(fees_ids)
                    .then(res => {
                        // store the selected fees
                        let fees_data = storeObject.fees_methods.update_fees_list(res.data);

                        // update the fees table and total
                        viewObject.update_fees(fees_data);
                    });
                }
            });
            
        };

        const edit_products_update = (input_products_list, input_products_meta) => {
            products_list = input_products_list;
            products_meta = input_products_meta;
            
            storeObject.set_products_data (products_list, products_meta);

            viewObject.show_selected_products(products_list, products_meta);

            // update form products_quantity hidden field,
            // Notice that we need change the name to products_meta
            viewObject.update_product_hidden_fields(products_meta);
        }

        const init = () => {
            products_events();  
        };

        init();

        return {
            edit_products_update
        }
    })(StoreObject, ViewObject);

    const edit_special_options = (function  () {
        window.edit_selected_products = {};
        
        /**
         * Is there is a way to put the data in fields and run a method that call the 
         * the data from the fields to the storage object
         * 
         */
        return {
            // starter_event
        }
    })();

    // edit_special_options.starter_event();

});
</script>