
<div style="display: none" id="showObjectCard" class="card card-body">
    <div class="row mb-1">
        <div class="col-6">
            <h5>@lang('promotions.Show_Promotions')</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#showObjectCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <hr/>

    <form action="/" id="objectForm">
        <div class="form-group row">
            <label for="show-title" class="col-sm-2 col-form-label">@lang('promotions.Title')</label>
            <div class="col-sm-10">
                <input disabled="disabled" type="text" tabindex="1"  class="form-control" id="show-title">
            </div>
        </div><!-- /.form-group -->
        
        <div class="form-group row">
            <label for="show-start_date" class="col-sm-2 col-form-label">@lang('promotions.Start_Time')</label>
            <div class="col-sm-10">
                <input disabled="disabled" type="text" tabindex="2" id="show-start_date" class="form-control">
            </div>
        </div><!-- /.form-group -->

        <div class="form-group row">
            <label for="show-end_date" class="col-sm-2 col-form-label">@lang('promotions.End_Date')</label>
            <div class="col-sm-10">
                <input disabled="disabled" type="text" tabindex="3" id="show-end_date" class="form-control">
            </div>
        </div>

        <div class="d-flex justify-content-center mb-3">
            <div id="createOrderLoddingSpinner" style="display: none" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="form-group" style="height: 400px; overflow: scroll;">
            <table class="table" style="font-size: 12px; !width: max-content;">
                <thead>
                    <tr>
                        <td>@lang('promotions.Img')</td>
                        <td style="width:100px;">@lang('promotions.Name')</td>
                        <td>@lang('promotions.SKU')</td>
                        <td>@lang('promotions.Price')</td>
                        <td>@lang('promotions.Price_On_Sale')</td>
                        <td>@lang('promotions.Sale_Ratio')</td>
                        <td>@lang('promotions.Valied_Quantity')</td>
                        <td>@lang('promotions.Quantity_On_Sale')</td>
                    </tr>
                </thead>
                <tbody id="show-selected_product_table"></tbody>
            </table>
        </div>
    </form>
</div>



@push('page_scripts')
<script>
    $('#dataTable').on('click', '.show-object', function () {
        // send request, to the server get the data about the order
        // we need data about the customer, the products of the order
        // and the total 

        $('#loddingSpinner').show();
        $('.show-promotion-product-tr').remove();

        let promotion_id = $(this).data('object-id');
        axios.get(`{{ url('admin/promotions') }}/${promotion_id}?fast_acc=true`)
        .then(res => {
            const data = res.data.data;
            
            console.log(data);
            
            $('#show-title').val(data.title);
            $('#show-start_date').val(data.start_date);
            $('#show-end_date').val(data.end_date);

            let meta = JSON.parse(data.meta);
            let products_meta  = meta.products_meta
            console.log(meta, products_meta);

            let product_tr = '';
            data.products.forEach(product => {
                let { quantity, price } = products_meta[product.id];
                
                product_tr += `
                    <tr class="show-promotion-product-tr">
                        
                        <td><img width="80px"class="img-thumbnail" src="{{url('/')}}/${product.main_image}" /></td>
                        <td>${product.ar_name} / ${product.en_name}</td>
                        <td>${product.sku}</td>
                        <td>${product.price}</td>
                        <td>
                            ${price} SR
                        </td>
                        <td id="sale-ratio-${product.id}" data-original-price="${product.price}">${parseFloat(100 - (price / product.price * 100)).toFixed(2)} %</td>
                        <td id="selected_product_o_quantity_${product.id}" data-quantity="${product.quantity}">
                            ${product.quantity}
                        </td>
                        <td>
                            ${quantity}
                        </td>
                    </tr>
                `; 
            });
            $('#show-selected_product_table').append(product_tr);

            $('#objectsCard').slideUp(500);
            $('#showObjectCard').slideDown(500);
            $('#loddingSpinner').hide(500);
            
        }); 
    });
</script>
@endpush