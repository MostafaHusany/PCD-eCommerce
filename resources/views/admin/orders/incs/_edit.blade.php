
<div style="display: none" id="editObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('orders.Update_Order')</h5>
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
                <label for="edit-customer" class="col-sm-2 col-form-label">@lang('orders.Select_Customer')</label>
                <div class="col-sm-10">
                    <select class="form-control" id="edit-customer" data-prefix="edit-"></select>
                    <div style="padding: 5px 7px; display: none" id="edit-customerErr" class="err-msg mt-2 alert alert-danger">
                    </div>
                </div>
            </div><!-- /.form-group -->
            
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td>@lang('orders.Name')</td>
                        <td style="text-right" fir="rtl" id="edit-customer_name">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Email')</td>
                        <td id="edit-customer_email">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Phone')</td>
                        <td id="edit-customer_phone">---</td>
                    </tr>
                    
                    <tr>
                        <td>@lang('orders.Country')</td>
                        <td id="edit-customer_country">---</td>
                    </tr>

                    <tr>
                        <td>@lang('orders.Government')</td>
                        <td id="edit-customer_government">---</td>
                    </tr>

                    <tr>
                        <td>@lang('orders.Address')</td>
                        <td id="edit-customer_address">---</td>
                    </tr>
                </table>
            </div>
        </div><!-- /.customer-phase --> 

        <div class="product-pahse">
            <input type="hidden" id="edit-products_quantity" value="">
            <input type="hidden" id="edit-products" value="">

            <div class="form-group row">
                <label for="edit-find-products" class="col-sm-2 col-form-label">@lang('orders.Select_Products')</label>
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
                        <td>@lang('orders.Img')</td>
                        <td style="width: 160px">@lang('orders.Name')</td>
                        <td>@lang('orders.SKU')</td>
                        <td style="width: 100px">@lang('orders.Price')</td>
                        <td>@lang('orders.Is_Active')</td>
                        <td>@lang('orders.Edit_Price')</td>
                        <td>@lang('orders.Valied_Quantity')</td>
                        <td>@lang('orders.Requested_Quantity')</td>
                        <td id="edit-products_table_header">@lang('orders.Sub_Total_Price')</td>
                        <td>@lang('orders.Total_Price')</td>
                        <td>@lang('orders.Actions')</td>
                    </tr>
                    <tbody id="edit-selected_product_table">
                        
                    </tbody>
                </table>
            </div>
        </div><!-- /.product-pahse -->

        <!-- START SHIPPING PHASE -->
        <div class="form-group row">
            <label for="" class="col-2">@lang('orders.Shipping')</label>
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
                    <label class="custom-control-label" for="edit-is_free_shipping_toggle">@lang('orders.Free_Shipping')</label>
                </div>
                
                <div style="padding: 5px 7px; display: none" id="edit-is_free_shippingErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.form-group -->
        <!-- END SHIPPING PHASE -->

        <!-- START FEES PHASE -->
        <div class="form-group row">
            <label for="edit-fees" class="col-2">@lang('orders.Fees')</label>
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
                    <tbody id="edit-taxes_list_table_container"></tbody>
                </table>
            </div><!-- /.col-6 -->

            <div class="col-6">
                <h4>Fees</h4>
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
                    <tbody id="edit-fees_list_table_container"></tbody>
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
                        <span id="edit-selected_products_sub_total"> --- </span> @lang('orders.SAR')
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>@lang('orders.Shipping_Total')</h5>
                    </td>
                    <td>
                        <span id="edit-selected_shipping_cost"> --- </span> @lang('orders.SAR')
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>@lang('orders.Taxes_Total')</h5>
                    </td>
                    <td>
                        <span id="edit-selected_taxe_cost"> --- </span> @lang('orders.SAR')
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>@lang('orders.Fee_Total')</h5>
                    </td>
                    <td>
                        <span id="edit-selected_fee_cost"> --- </span> @lang('orders.SAR')
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="7">
                        <h5>@lang('orders.Total')</h5>
                    </td>
                    <td>
                        <span id="edit-selected_products_total"> --- </span> @lang('orders.SAR')
                    </td>
                    <td></td>
                </tr>
            </table>
        </div><!-- /.form-group -->
        

        <button !id="createorder" class="update-object btn btn-warning float-right">@lang('orders.Update_Order')</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-upgradableModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit-upgradableModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-upgradableModalLabel">@lang('orders.Upgradable_Product')</h5>
            </div><!-- /.modal-header -->
            
            <div class="modal-body" id="edit-upgradableModalBody" style="max-height: 450px; overflow-y:scroll">
            </div><!-- /.modal-body -->
            
            <div class="modal-footer" style="justify-content: space-between">
                <h3>@lang('orders.Total_Price') : <span class="text-primary my-2" id="edit-product-upgradable-price"> --- </span>@lang('orders.SAR')</h3>
                <div>
                    <button id="edit-upgradable-action-don" type="button" class="btn btn-primary" data-dismiss="modal">@lang('orders.Done')</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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
                    price    : product.price,
                    upgrade_options,
                    upgrade_options_list

                }
            */
        };
        
        // when user open upgrade modal we store the related product id here
        let upgrade_focus = null;
        let upgradable_products = {
            /**
                # Actions :
                => select category, show related products,
                => select child product for this category
                => update total product price 
                product_id : {
                    * upgradable product obj
                    * get from product meta 
                    *  upgrade_products_id : { category_id : [product_id, ...]}
                    *  products_quantity : { product_id : quantity }
                    *  upgrade_categories : [category_id...],
                    *  upgrade_products : {category_id : {product_id : {id, upgrade_price, needed_quantity, is_default} }},
                    * get from product
                    *  categories : [category_obj, ...]
                    *  products : [product_obj, ...]
                }
            **/
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

        const request_products = async (products_list) => {
            const response = await axios.get(`{{ url('admin/products') }}/0`, { params: { products_list : JSON.stringify(products_list) }});
            return await response.data;
        }

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
            products_list = JSON.parse(JSON.stringify(input_products_list));
            products_meta = JSON.parse(JSON.stringify(input_products_meta));

            let keys = Object.keys(products_meta);
            keys.forEach(key => {
                products_meta[key] = {
                    quantity : parseInt(input_products_meta[key].quantity),
                    price    : parseFloat(input_products_meta[key].price)
                }

                let target_product = input_products_list.find(product => product.id == key);
                
                if (target_product.is_composite == 2) {
                    /**
                     * Get the product default children,
                     * validate if the children has valied quantity
                     *  => if not valied we need to store a flag for render
                     */
                    let {upgrade_options, upgrade_options_list, is_valied} = upgradable_products_methods.get_upgradable_default(target_product, input_products_meta);
                    products_meta[target_product.id].is_upgradable = true;
                    products_meta[target_product.id].is_valied = true;
                    products_meta[target_product.id].upgrade_options = input_products_meta[target_product.id].upgrade_options;
                    products_meta[target_product.id].upgrade_options_list = input_products_meta[target_product.id].upgrade_options_list;

                    upgradable_products_methods.add_product(target_product);
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
                price    : new_product.price,
                is_upgradable : false,
            };
            
            if (new_product.is_composite == 2) {
                /**
                 * Get the product default children,
                 * validate if the children has valied quantity
                 *  => if not valied we need to store a flag for render
                 */
                let {upgrade_options, upgrade_options_list, is_valied} = upgradable_products_methods.get_upgradable_default(new_product);
                products_meta[new_product.id].is_upgradable = true;
                products_meta[new_product.id].is_valied = is_valied;
                products_meta[new_product.id].upgrade_options = upgrade_options;
                products_meta[new_product.id].upgrade_options_list = upgrade_options_list;

                upgradable_products_methods.add_product(new_product);
            }

            // re-calculate sub-total
            _calculate_order_sub_total();

            return { products_list, products_meta};
        };

        // upgradable products methods 
        const upgradable_products_methods = {
            /**
             * # get data from the product
             * => what data to get ?
             * => where to store ?
             * => how to use the data in the render ? 
             */
            
            add_product : (new_product) => {
                /**
                 * get from product meta 
                 *  upgrade_categories,
                 *  upgrade_products,
                 *  products_quantity
                 * get from product
                 *  categories
                 *  products
                 * 
                 */

                let meta = JSON.parse(new_product.meta);
                const {upgrade_categories, upgrade_products, products_quantity, upgrade_products_id} = meta; 
                const { upgrade_categories : categories, upgrade_products: products} = new_product;
                upgradable_products[new_product.id] = {
                    product : new_product,
                    upgrade_categories, upgrade_products, products_quantity, upgrade_products_id,
                    categories, products
                }
            }, // add_product

            validate_upgradable : (new_product, needed_quantity, product_id) => {
                // validate if the child product has valied quantity 
                let is_valied = true;
                const {upgrade_categories, upgrade_products} = new_product;

                upgrade_products.forEach(product => {
                    if (product.id == product_id) {
                        is_valied = product.quantity > needed_quantity;
                    }
                });

                return is_valied;
            }, // validate_upgradable

            re_validate_upgradable : (product_id) => {
                /**
                 * # Re-Validate upgradable after upgrade product 
                 * to make sure we can use it for order.
                 */
                let meta = products_meta[product_id];
                let {upgrade_categories, products} = upgradable_products[product_id];
                let is_valied = true;

                let total = 0;
                upgrade_categories.forEach(category_id => {
                    let selected_product_id = meta.upgrade_options[category_id];
                    is_valied = is_valied && (products.find(product => product.id == selected_product_id).quantity > 0)
                });

                // update upgradable product final price 
                products_meta[product_id].is_valied = is_valied;
            },

            get_upgradable_default  : function (new_product) {
                /**
                 * # Get the default product for each category
                 * and validate that default product quantity
                 */
                let meta = JSON.parse(new_product.meta);
                let upgrade_options = {};
                let upgrade_options_list = [];
                let is_valied = true;

                meta.upgrade_categories.forEach(category_id => {
                    meta.upgrade_products_id[category_id].forEach(product_id => {
                        if (meta.upgrade_products[category_id][product_id].is_default) {
                            upgrade_options[category_id] = product_id;
                            upgrade_options_list.push(product_id);
                            is_valied = is_valied && this.validate_upgradable(new_product, meta.products_quantity[product_id], product_id);
                        }
                    });
                });

                return {upgrade_options, upgrade_options_list, is_valied};
            }, // get_upgradable_meta

            find_product : (product_id) => {
                return  { product :upgradable_products[product_id], product_meta : products_meta[product_id]};
            }, // find_product
            
            is_upgradables_valied : () => {
                is_valied = true;
                products_list.forEach(product => {
                    if(products_meta[product.id].is_upgradable)
                    is_valied = is_valied && products_meta[product.id].is_valied 
                });
                
                return is_valied;
            },

            start_upgrade_mode : (product_id) => {
                upgrade_focus = product_id;
            },

            get_focus_value : () => {
                return upgrade_focus;
            },

            upgrade_action : (category_id, product_id) => {
                // update if the product is valied 
                if ((upgradable_products[upgrade_focus].products.find(product => product.id == product_id)).quantity > 0) {
                    // upgrade upgrade_options and upgrade_options_list
                    let old_selection = products_meta[upgrade_focus].upgrade_options[category_id];
                    products_meta[upgrade_focus].upgrade_options_list = (products_meta[upgrade_focus].upgrade_options_list).filter(p_id => p_id != old_selection);
                    products_meta[upgrade_focus].upgrade_options_list.push(product_id);
                    products_meta[upgrade_focus].upgrade_options[category_id] = product_id;
                }
            }, 

            update_upgrade_product_price (product_id) {
                /**
                 * From "products_meta" we can get : 
                 * 1- upgrade_options : where we can get the selected products for each category,
                 * and it's what we will send to the server to create order
                 * 2- price : we use it for rendering purpose only and we need to store the
                 * final result here
                 * 
                 * From "upgradable_products" we can get :
                 * 1- upgrade_categories : all categories list
                 * 2- upgrade_products : each category upgrade option with required data like price
                 * and quantity.
                 * */
                let meta = products_meta[product_id];
                let {upgrade_categories, upgrade_products} = upgradable_products[product_id];

                let total = 0;
                upgrade_categories.forEach(category_id => {
                    let selected_product_id = meta.upgrade_options[category_id];
                    let selected_product_info = upgrade_products[category_id][selected_product_id];

                    total += parseFloat(selected_product_info.upgrade_price);
                });

                // update upgradable product final price 
                products_meta[product_id].price = total;
            }
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
        const get_products_data = () => {
            // re-calculate sub-total
            _calculate_order_sub_total();
            return { products_list, products_meta};
        }

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
            request_products,
            request_shipping,
            request_fees,

            set_products_data,
            add_new_product,
            remove_product,
            is_in_products_list,
            update_products_meta,
            
            shipping_methods,//add_shipping,
            fees_methods,
            upgradable_products_methods,

            // getters
            get_products_data,
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
                let {quantity, price, is_upgradable, is_valied} = products_meta[target_product.id];
                let product_tr = `
                    <tr style="${ (is_upgradable && !is_valied) || (target_product.quantity <= 0) || (target_product.is_active == 0) ? 'background-color: #f8d7da' : '' }" class="edit-selected-product-rows edit-selected-product-row-${target_product.id}">
                        
                        <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${target_product.main_image}" /></td>
                        <td>${target_product.ar_name} / ${target_product.en_name}</td>
                        <td>${target_product.sku}</td>

                        <td>${target_product.price}</td>
                        <td>${target_product.is_active == 1 ? '<span class="text-primary">active</span>' : '<span class="text-danger">not active</span>'}</td>
                        <td>
                            <input style="width: 80px" class="selected_product_price" type="number" value="${price}" step="1"
                                id="selected_product_price_${target_product.id}"
                                data-target="${target_product.id}" data-original-price="${target_product.price}" 
                                min="0"/>
                            SR
                        </td>
                        
                        <td id="selected_product_o_quantity_${target_product.id}" data-quantity="${target_product.quantity + quantity}">
                            ${target_product.quantity}
                        </td>
                        <td>
                            <input style="width: 80px" class="selected_product_quantity" type="number" value="${quantity}" step="1"
                                id="selected_product_quantity_${target_product.id}" 
                                data-target="${target_product.id}" data-max="${target_product.quantity}"
                                min="1" max="${target_product.quantity + quantity}" />
                        </td>

                        <td id="selected_product_td_sub_total_${target_product.id}">${parseFloat(quantity * price).toFixed(2)} SR</td>
                        ${tax_tr}
                        <td id="product-total-cost-${target_product.id}" style="font-weight: bold; color: red">
                            ${parseFloat(quantity * price + total_product_cost).toFixed(2)}
                        </td>
                        <td>
                            ${ 
                                products_meta[target_product.id].is_upgradable ? 
                                `
                                    <button type="button" class="upgrade_selected_item btn btn-sm btn-warning"
                                        data-target="${target_product.id}"
                                    >
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                ` 
                                : ''
                            }
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

        // render upgradable products in the modal
        const upgradable_methods = {
            render_upgradable_modal : (target_product, meta) => {
                /**
                 * target_product :
                    * upgradable product obj
                    * get from product meta 
                    *  upgrade_products_id : { category_id : [product_id, ...]}
                    *  products_quantity : { product_id : quantity }
                    *  upgrade_categories : [category_id...],
                    *  upgrade_products : {category_id : {product_id : {id, upgrade_price, needed_quantity, is_default} }},
                    * get from product
                    *  categories : [category_obj, ...]
                    *  products : [product_obj, ...]
                * main element key = #upgradableModalBody 
                */
                
                let { upgrade_products_id, upgrade_products, categories, products } = target_product;

                let categories_el  = '';
                categories.forEach(category => {
                    let products_el = '';
                    let selected_product = meta.upgrade_options[category.id];
                    let products_id   = upgrade_products_id[category.id];
                    let is_not_category_valied = false;
                    

                    products_id.forEach(product_id => {
                        let product      = products.find(product => product.id == product_id);
                        let product_meta = upgrade_products[category.id][product.id];
                        
                        if (selected_product == product.id && product.quantity <= 0) {
                            is_not_category_valied = true;
                        }

                        products_el += `
                        <div data-category="${category.id}" data-product="${product.id}" id="upgradeProduct${category.id}${product.id}" class=" select-upgrade-product col-md-4" ${selected_product == product.id && ( product.quantity > 0 ? 'style="background-color: #007bff"' : 'style="background-color: #f8d7da"') } >
                            <div class="card">
                                <img src="{{ url('/') }}/${product.main_image}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5>{{$is_ar ? '${product.ar_name}' : '${product.en_name}' }}</h5>
                                    <p class="${product.quantity <= 0 && 'text-danger'}" style="margin: 0; padding: 0; display: flex; justify-content: space-between">
                                        <span>@lang('orders.Valied_Quantity') :</span> <span>${product.quantity}</span>
                                    </p>
                                    
                                    <p style="margin: 0; padding: 0; display: flex; justify-content: space-between">
                                        <span>@lang('orders.Requested_Quantity') :</span> <span>${product_meta.needed_quantity}</span>
                                    </p>
                                    
                                    <p style="margin: 0; padding: 0; display: flex; justify-content: space-between">
                                        <span>@lang('orders.Price') :</span> <span>${product_meta.upgrade_price}</span>
                                    </p>

                                    ${
                                        product_meta.is_default ?
                                        `<p style="margin: 0; padding: 0;">
                                            <span class="badge badge-pill badge-primary">@lang('orders.Default_Item')</span>
                                        </p>`
                                        : ''
                                    }

                                    ${
                                        product.quantity <= 0 ?
                                        `<p style="margin: 0; padding: 0;">
                                            <span class="badge badge-pill badge-danger">@lang('orders.Not_valied')</span>
                                        </p>`
                                        : ''
                                    }
                                    
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div><!-- /.col-md-4 -->
                        `; 
                    });

                    categories_el += `
                        <div class="card mb-3">
                            <div class="card-header" style="${is_not_category_valied && 'background-color: #f8d7da;'}">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>${category.ar_title}</h3>
                                    </div><!-- /.col-6 -->
                                    <div class="col-6 text-right">
                                        <i class="show-upgradable-category fas fa-caret-down" style="cursor: pointer; font-size: 1.5rem" data-target="${category.id}"></i>
                                    </div><!-- /.col-6 -->
                                </div><!-- /.row -->
                            </div><!-- /.card-header -->

                            <div id="upgradable-products-${category.id}" class="upgradable-products card-body" style="display: none;">
                                <div class="row">${ products_el }</div>
                            </div><!-- card-body -->
                        </div><!-- /.card -->
                    `;
                });
                
                $('#edit-upgradableModalBody').html(categories_el);
            },

            render_upgradable_category_product : (target_product, meta, category_id) => {
                let { upgrade_products_id, upgrade_products, categories, products } = target_product;
                
                let selected_product = meta.upgrade_options[category_id];
                let products_id      = upgrade_products_id[category_id];
                
                let products_el = '';
                products_id.forEach(product_id => {
                    let product      = products.find(product => product.id == product_id);
                    let product_meta = upgrade_products[category_id][product.id];

                    products_el += `
                    <div data-category="${category_id}" data-product="${product.id}" id="upgradeProduct${category_id}${product.id}" class=" select-upgrade-product col-md-4" ${selected_product == product.id && 'style="background-color: #007bff"' } >
                        <div class="card">
                            <img src="{{ url('/') }}/${product.main_image}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5>{{$is_ar ? '${product.ar_name}' : '${product.en_name}' }}</h5>
                                <p class="${product.quantity <= 0 && 'text-danger'}" style="margin: 0; padding: 0; display: flex; justify-content: space-between">
                                    <span>@lang('orders.Valied_Quantity') :</span> <span>${product.quantity}</span>
                                </p>
                                
                                <p style="margin: 0; padding: 0; display: flex; justify-content: space-between">
                                    <span>@lang('orders.Requested_Quantity') :</span> <span>${product_meta.needed_quantity}</span>
                                </p>
                                
                                <p style="margin: 0; padding: 0; display: flex; justify-content: space-between">
                                    <span>@lang('orders.Price') :</span> <span>${product_meta.upgrade_price}</span>
                                </p>

                                ${
                                    product_meta.is_default ?
                                    `<p style="margin: 0; padding: 0;">
                                        <span class="badge badge-pill badge-primary">@lang('orders.Default_Item')</span>
                                    </p>`
                                    : ''
                                }

                                ${
                                    product.quantity <= 0 ?
                                    `<p style="margin: 0; padding: 0;">
                                        <span class="badge badge-pill badge-danger">@lang('orders.Not_valied')</span>
                                    </p>`
                                    : ''
                                }
                                
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.col-md-4 -->
                    `; 
                });

                $(`#upgradable-products-${category_id}`).html(`<div class="row">${ products_el }</div>`);
            },
            
            render_upgradable_price : (price) => {
                $('#edit-product-upgradable-price').text(price);
            }
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
            upgradable_methods,
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
            }).on('click', '.upgrade_selected_item', function (e) {
                e.preventDefault();
                let target_product_id = $(this).data('target');

                StoreObject.upgradable_products_methods.start_upgrade_mode(target_product_id);
                // get target upgradable products
                let {product, product_meta} = StoreObject.upgradable_products_methods.find_product(target_product_id);
                viewObject.upgradable_methods.render_upgradable_modal(product, product_meta);
                viewObject.upgradable_methods.render_upgradable_price(product_meta.price);

                $('#edit-upgradableModal').modal('toggle')
            });

            
            /**
             * upgradable products modal
             */
            $('#edit-upgradableModalBody').on('click', '.show-upgradable-category', function () {
                let target_id  = $(this).data('target');
                let toggle_val = $(this).data('toggle-val');

                if (toggle_val == 'closed') {
                    $(this).data('toggle-val', 'open');
                    $(`#upgradable-products-${target_id}`).slideUp(500);
                } else {
                    $('.upgradable-products').slideUp();
                    $(`#upgradable-products-${target_id}`).slideDown(500);
                    $(this).data('toggle-val', 'closed');
                }
            }).on('click', '.select-upgrade-product', function () {
                let product_id  = $(this).data('product');
                let category_id = $(this).data('category');
                let target_product_id = StoreObject.upgradable_products_methods.get_focus_value();
                /**
                 * # We want to update upgradable product
                 * selected child option.
                 * # When the user select a product in the category
                 * update the upgradable product meta in "products_meta"
                 * than re-render the category products
                 */

                // upgrade action on category
                StoreObject.upgradable_products_methods.upgrade_action(category_id, product_id);
                StoreObject.upgradable_products_methods.update_upgrade_product_price(target_product_id);
                StoreObject.upgradable_products_methods.re_validate_upgradable(target_product_id);
                
                // render related info
                let {product, product_meta} = StoreObject.upgradable_products_methods.find_product(target_product_id);
                ({products_list, products_meta} = storeObject.get_products_data());

                viewObject.upgradable_methods.render_upgradable_category_product(product, product_meta, category_id);
                viewObject.upgradable_methods.render_upgradable_price(product_meta.price);

            });

            // close upgrade modal
            $('#edit-upgradable-action-don').on('click', function () {
                /* 
                    # After user done upgrade to the product :
                    re-render order products table and re-do 
                    the upgradable validation
                */
                ({products_list, products_meta} = storeObject.get_products_data());
                // show products list
                viewObject.show_selected_products(products_list, products_meta);

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
            
            storeObject.set_products_data (input_products_list, input_products_meta);

            viewObject.show_selected_products(input_products_list, input_products_meta);

            // update form products_quantity hidden field,
            // Notice that we need change the name to input_products_meta
            viewObject.update_product_hidden_fields(input_products_meta);
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
@endpush