
<div style="!display: none" id="createCompositeObjectCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Upgrade Option Product</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#createCompositeObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->
    <hr/>

    <div>
        <input type="hidden" id="targetCompositeProduct" /> 

        <div class="row form-group">
            <div class="col-3">
                <label for="">Category</label>
            </div>
            <div class="col-8">
                <select name="" id="" class="form-control"></select>
            </div>
        </div><!-- /.row --> 

        <div class="form-group">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    The current link item
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    /**
     * Here we can controle the composite creation cycle
     * We want to link a composite product with a group of other products
     * 
     * Cycle : 
     * 1- select category
     * 2- show this category list of products 
     * 3- user can select from those products a main product, and an upgrade option 
     */
    let selected_categories = [];

    /**
        function define_select_2 () {
            $('.composite-product-select').select2({
                width: '100%',
                placeholder: 'Select products',
                ajax: {
                    url: `{{ url("admin/products-search") }}/q=${console.log($(this))}`,
                    dataType: 'json',
                    delay: 150,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: `${item['en_name']} / ${item['ar_name']} , quantity (${item['quantity']})`,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }
    */

    $('#targetCategoryGroup').select2({
        width: '100%',
        placeholder: 'Select categories',
        ajax: {
            url: '{{ url("admin/products-categories-search") }}',
            dataType: 'json',
            delay: 150,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: `${item['en_title']} / ${item['ar_title']}`,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    }).change(function () {
        // get latest version of the select values
        let tmp = $(this).val();

        // find the new addes categories from the "tmp" list
        let new_categories = tmp.filter(category_id => {
            return !selected_categories.includes(category_id) && category_id;
        });

        // get ride of removed categories from the "selected_categories" list
        selected_categories = selected_categories.filter(category_id => {
                        
            if (!tmp.includes(category_id)) {
                $(`#category_product_group_${category_id}`).remove();
            }

            return tmp.includes(category_id) && category_id;
        });

        // update selected_categories 
        selected_categories = selected_categories.concat(new_categories); 

        /*
            new_categories.forEach(category_id => {
                axios.get(`{{ url('admin/products-categories') }}/${category_id}?fast_acc=true`)
                .then(res => {
                    let tmp = `
                    <div class="form-group mb-3">
                        <legend>${res.data.data['en_title'] || res.data.data['ar_title']}</legend>
                        <div class="form-group row">
                            <label for="" class="col-md-2">Main Item</label>
                            <div class="col-md-10">
                                <select name="" id="" data-target="${res.data.data.id}" class="form-control composite-product-select"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2">Upgrade Option</label>
                            <div class="col-md-10">
                                <select name="" id="" data-target="${res.data.data.id}" class="form-control composite-product-select" multiple="multiple"></select>
                            </div>
                        </div>
                    </div>
                    `;
                    
                    $('.categoy-product-category').prepend(tmp);
                    define_select_2();
                })
            });
        */
        
        // create products table
        new_categories.forEach(category_id => {
            axios.get(`{{ url('admin/products-categories') }}/${category_id}?my_products=true`)
            .then(res => {
                let products = res.data.data.map(product => {
                    let tmp = `
                        <tr>
                            <td>${product.en_name} / ${product.ar_name}</td>
                            <td>${product.sku}</td>
                            <td><img style="width: 80px" class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                            <td>${product.price}</td>
                            <td>${product.quantity}</td>
                            <td>
                                <input class="composite-main-child" data-name="${product.en_name} / ${product.ar_name}" data-price="${product.price}" data-category="${res.data.category.id}"  type="radio" name="main_product[${res.data.category.id}]" value="${product.id}"/>
                            </td>
                            <td>
                                <input type="checkbox" id="product-${res.data.category.id}-${product.id}" name="product[${res.data.category.id}]" value="${product.id}"/>
                            </td>
                        </tr>
                    `;
                    return tmp;
                })

                let category_container = `
                    <div id="category_product_group_${res.data.category.id}" class="category_product_group form-group mb-3">
                        <div style="display: none" id="alert-${res.data.category.id}" class="composite-item-alert alert alert-danger m-3">
                            Please select main item of this section     
                        </div>

                        <div class="list-group-item list-group-item-action"> 
                            <div class="row">
                                <div class="col-sm-6">
                                    ${res.data.category['en_title']} / ${res.data.category['ar_title']}
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="close-composite-category-section btn btn-sm btn-default" data-target="${res.data.category.id}">
                                        <i class="fas fa-times-circle"></i>
                                    </button>

                                    <button class="btn btn-sm btn-default show-category-table-btn" data-target="#categoryTable${res.data.category.id}" data-status="closed">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="categoryTable${res.data.category.id}" style="display: none;font-size: 12px; height: 300px; overflow-y: scroll">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>SKU</td>
                                    <td>Image</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Is Main</td>
                                    <td>Action</td>
                                </tr>
                                ${products.join('')}
                            </table>
                        </div>
                        <hr/>
                    </div><!-- /.form-group -->
                `;

                $('.categoy-product-category').prepend(category_container);
            });
        });
        


    });// end :: categories

    $('.categoy-product-category').on('click', '.show-category-table-btn', function () {
        let target = $(this).data('target');
        let status = $(this).data('status');
        
        if (status === "closed") {
            $(this).data('status', 'open');
            $(target).slideDown(500);
        } else {
            $(this).data('status', 'closed');
            $(target).slideUp(500);
        }

    }).on('click', '.composite-main-child', function () {
        let value    = $(this).val();
        let category = $(this).data('category');

        $(`#product-${category}-${value}`).prop('checked', true);

        // console.log(selected_categories);
        $('.composite-item-price').remove();
        let total = 0;
        selected_categories.forEach(category => {
            // console.log(category);
            let main_selected = $(`[name="main_product[${category}]"]:checked`);
            console.log(main_selected.length)
            if (main_selected.length) {
                let name = $(main_selected).data('name');
                let price = $(main_selected).data('price');

                total+=price;

                let tmp = `
                    <tr class="composite-item-price">
                        <td>${name}</td>
                        <td>${price}</td>
                    </tr>
                `;

                $('#compositeProductCost').append(tmp);
            }
        });

        $('#compositeProductsTotal').text(total);
    }).on('click', '.close-composite-category-section', function () {
        /** 
         * Here we can remove composite category section.
         * */
        let target_container_id = $(this).data('target');
        
        // remove the composite category section
        $(`#category_product_group_${target_container_id}`).remove();
        
        // remove the composite category from the category list
        selected_categories = selected_categories.filter(category_id => {
            return parseInt(category_id) != parseInt(target_container_id)
        });

        $('#targetCategoryGroup').val(selected_categories).change();
    });

    $('#createCompositeProductBtn').click(function(e) {
        e.preventDefault();

        /* 
            # Here we start collecting the data from the composite product form
            # We need to establish validation for the data collected
            => We need to validate there is a main value for each product
            => we need to make sure there is price for the customer  
        */

        let data = {
            selected_products        : [],
            target_composite_product : $('#targetCompositeProduct').val(),
            price : 0
        };

        // price validation
        if ($('#composite_product_price').val() == 0 || $('#composite_product_price').val() == '') {
            // show alert on the price box
            $('#composite_product_price').css('border', '1px solid red');
            // show price alert box 
            $('#composite_product_priceErr').slideDown(500);
        } else {
            // hide olde sesssion if exists alert on the price box
            $('#composite_product_price').css('border', '');
            // hide olde sesssion if exists price alert box 
            $('#composite_product_priceErr').slideUp(500);
            // get price
            data.price = $('#composite_product_price').val();
        }

        // clear category old validation session
        $('.composite-item-alert').slideUp(500);
        $('.category_product_group').css('border', '');
        // start looping through all selected categories
        selected_categories.forEach(category_id => {
            let tmp = {
                main : null,
                all_options : [],
                category_id : null,
            } 

            tmp.main = $(`[name="main_product[${category_id}]"]:checked`).val();
            if (tmp.main == null) {                
                // Make category section alert 
                $(`#category_product_group_${category_id}`).css('border', '1px solid red');

                // Show category section alert message
                $(`#alert-${category_id}`).slideDown(500);
            } else {

            }
            
            let selected_product = document.querySelectorAll(`[name="product[${category_id}]:checked"]`);
            let checked_products = Array.from($(`[name="product[${category_id}]"]:checked`));
            
            checked_products.forEach(option => {
                tmp.all_options.push($(option).val());
            });
            
            tmp.category_id = category_id;
            data.selected_products.push(tmp);
        });

    });
});
</script>