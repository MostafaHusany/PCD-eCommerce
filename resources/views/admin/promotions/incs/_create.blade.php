<div style="display: none" id="createObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Create New {{ $object_title }}y</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#createObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <form action="/" id="objectForm">
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" tabindex="1"  class="form-control" id="title" placeholder="Title">
                <div style="padding: 5px 7px; display: none" id="titleErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="start_date" class="col-sm-2 col-form-label">Start Time</label>
            <div class="col-sm-10">
                <input type="date" id="start_date" class="form-control">
                <div style="padding: 5px 7px; display: none" id="start_dateErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
            <div class="col-sm-10">
                <input type="date" id="end_date" class="form-control">
                <div style="padding: 5px 7px; display: none" id="end_dateErr" class="err-msg mt-2 alert alert-danger">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="find-products" class="col-sm-2 col-form-label">Select Products</label>
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
        <input type="hidden" id="products">
        <input type="hidden" id="products_meta">
        <div class="form-group" style="height: 400px; overflow: scroll;">
            <table class="table" style="font-size: 12px; !width: max-content;">
                <thead>
                    <tr>
                        <td>Img</td>
                        <td style="width:100px;">Name</td>
                        <td>SKU</td>
                        <td>Price</td>
                        <td>Price On Sale</td>
                        <td>Sale Ratio</td>
                        <td>Valied Quantity</td>
                        <td>Quantity On Sale</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody id="selected_product_table"></tbody>
            </table>
        </div>

        <button tabindex="8" class="create-object btn btn-primary float-right">Create {{ $object_title }}</button>
    </form>
</div>


@push('page_scripts')
<script>
$(document).ready(function () {
    const StoreObject = (function () {
        const data = {
            products_list : [],
            products_meta : {
                // product_id : {
                //     quantity,
                //     price,
                // }
            }
        };
        
        // request product by id from the server
        const request_product = async (product_id) => {
            const response = await axios.get(`{{ url('admin/products') }}/${product_id}`, { params: { get_p : true }});
            return await response.data;
        };

        // add new product to products list
        const add_new_product = (new_product) => {
            // update order products list and meta
            data.products_list.push(new_product);
            data.products_meta[new_product.id] = {
                quantity : new_product.quantity,
                price    : new_product.price
            };
            
            return {products_list : data.products_list, products_meta : data.products_meta};
        };

        // remove product from products list
        const remove_product = (product_id) => {
            data.products_list = data.products_list.filter(product => product.id != product_id);
            delete data.products_meta[product_id];

            return { products_list : data.products_list, products_meta : data.products_meta};
        };

        // update products meta
        const update_products_meta = (new_products_meta) => {
            /**
             * # We use this method to update product price or quantity.
             */
            products_meta = new_products_meta;
        };

        // check if product already exists
        const is_in_products_list = (product_id) => {
            return (product_id in data.products_meta)
        };

        return {
            request_product,
            add_new_product,
            remove_product,
            update_products_meta,
            is_in_products_list
        };
    })();

    const ViewObject = (function () {
        // update form meta data 
        const update_product_hidden_fields = (selected_products) => {
            $('#products_meta').val(JSON.stringify(selected_products));
            $('#products').val(JSON.stringify(Object.keys(selected_products)));
        };

        // show selected product table
        const show_selected_products = (products_list, products_meta) => {     
            /**
             * This method is used to show selcted ptoducts in products table
             * It take a list of products, and meta that store the quantityt and the price
             * */   
            // clear old products table
            $('.selected-product-rows').remove();

            products_list.forEach(target_product => {
                let {quantity, price} = products_meta[target_product.id];
                
                let product_tr = `
                    <tr class="selected-product-rows selected-product-row-${target_product.id}">
                        
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
                        <td id="sale-ratio-${target_product.id}" data-original-price="${target_product.price}">${parseFloat(100 - (price / target_product.price * 100)).toFixed(2)} %</td>
                        
                        <td id="selected_product_o_quantity_${target_product.id}" data-quantity="${target_product.quantity}">
                            ${target_product.quantity}
                        </td>
                        <td>
                            <input style="width: 80px" class="selected_product_quantity" type="number" value="${quantity}" step="1"
                                id="selected_product_quantity_${target_product.id}" 
                                data-target="${target_product.id}" data-max="${target_product.quantity}"
                                min="1" max="${target_product.quantity}" />
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
                $('#find-products').val('').trigger('change');
            });
        };

        // show alert that the product already exists
        const alert_product_exists = (product_id) => {
            $('#createOrderWarningAlert').text('Product is already in the list').slideDown(500);
            $(`.selected-product-row-${product_id}`).css('border', '1px solid red');
            
            setTimeout(() => {
                $('#createOrderWarningAlert').text('').slideUp(500);
                $(`.selected-product-row-${product_id}`).css('border', '');
            }, 3000);
        };

        const update_product_row = (product_id, product_quantity, product_price) => {
            // update the product number
            /**
             * get product price and quanity, and orogonal quantity
             * 
             * update each of the product left quantity, sub_total, tax, total
             */
            
            let original_price = $(`#sale-ratio-${product_id}`).data('original-price');
            $(`#sale-ratio-${product_id}`).text(`${parseFloat(100 - (product_price / original_price * 100)).toFixed(2)} %`);
            
        }; 

        return {
            update_product_hidden_fields,
            show_selected_products,
            alert_product_exists,
            update_product_row
        };
    })();

    const ControllerObject = (function (storeObject, viewObject) {
        let products_list = [];
        let products_meta = {};

        const products_events = () => {
            
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
                
                if (!storeObject.is_in_products_list(target_product_id)) {
                    storeObject.request_product(target_product_id)
                    .then(res => {
                        if (res.success) {
                            // push data tp products_list
                            ({products_list, products_meta} = storeObject.add_new_product(res.data));
                            
                            // show products list
                            viewObject.show_selected_products(products_list, products_meta);

                            // update form hidden field,
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
            $('#selected_product_table').on('click', '.remove_selected_item', function (e) {
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
                viewObject.update_product_hidden_fields(products_meta);
            })
            .on('change keyup', '.selected_product_quantity', function () {
                let target_id   = $(this).data('target');
                let price       = products_meta[target_id].price;
                let quantity    = products_meta[target_id].quantity = $(this).val();

                // update product row numbers
                // viewObject.update_product_row(target_id, quantity, price);
                
                // update storage products meta
                storeObject.update_products_meta(products_meta);
                
                // update form products_quantity hidden field,
                viewObject.update_product_hidden_fields(products_meta);
            })


        };

        const init = () => {
            products_events ();
        }

        init ();

        return {};
    })(StoreObject, ViewObject);


});
</script>
@endpush