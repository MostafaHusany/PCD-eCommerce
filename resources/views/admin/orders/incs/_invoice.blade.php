
<div style="display: none" id="invoiceObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>@lang('orders.Order_Invoice')</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#invoiceObjectsCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <div>
        <div class="form-group">
            <table class="table">
                <tr>
                    <td><b>@lang('orders.Order_Code')</b></td>
                    <td id="show-invoice-code"></td>
                </tr>
                <tr>
                    <td><b>@lang('orders.Sub_Total')</b></td>
                    <td id="show-invoice-sub-total"></td>
                </tr>
                <tr>
                    <td><b>@lang('orders.Shipping')</b></td>
                    <td id="show-invoice-shipping"></td>
                </tr>
                
                <tr>                
                    <td><b>@lang('orders.Tax')</b></td>
                    <td id="show-invoice-tax"></td>
                </tr>
                
                <tr>
                    <td><b>@lang('orders.Fee')</b></td>
                    <td id="show-invoice-fee"></td>
                </tr>
                
                <tr>
                    <td><b>@lang('orders.Total')</b></td>
                    <td id="show-invoice-total"></td>
                </tr>
                
                <tr>
                    <td><b>@lang('orders.Status')</b></td>
                    <td id="show-invoice-status"></td>
                </tr>

                <tr>
                    <td><b>@lang('orders.Transaction_Refuse_Count')</b></td>
                    <td id="show-payment-refuse-count"></td>
                </tr>
            </table>
        </div><!-- /.form-group -->

        <hr/>

        <div id="paymentSuccess" style="display: none;" class="alert alert-success">
            @lang('orders.Payment_was_accepted_successfully')
        </div>

        <div id="paymentRefused" style="display: none;" class="alert alert-danger">
            @lang('orders.Payment_was_refused')
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-6 text-left">
                    <button id="acceptPayment" class="btn btn-success">@lang('orders.Accept_Payment')</button>
                </div>
                <div class="col-6 text-right">
                    <button id="refusePayment" class="btn btn-danger">@lang('orders.Refuse_Payment')</button>
                </div>
            </div>
        </div><!-- /.form-group -->
        
        <div id="transaction-image-container" class="text-center img-status form-group">
            <img id="transaction-image" src="#" class="img-fluid img-thumbnail" alt="...">
        </div><!-- /.form-group -->

        <div id="transaction-image-not-found" class="img-status form-group text-center text-warning my-3">
            <h1>
                <i class="fas fa-exclamation-triangle"></i>
            </h1>
            <h1>No File Uploaded !!</h1>
        </div>
        
    </div>
</div>



@push('page_scripts')
<script>
    let invoice_id = null;
    
    $('#dataTable').on('click', '.show-invoice', function () {
        // get order invoice  
        // show invoice data and image for the transaction if exists,
        // show a buttin to accept or refuse the transaction...
        // the buttons only work if there is an image for transactions
        
        // clear old session
        $('#loddingSpinner').show(500);
        $('.img-status').slideUp();
        $('#transaction-image').attr('src', '');

        let order_id = $(this).data('object-id');
        axios.get(`{{ url('admin/invoices') }}/${order_id}`, { params : { fast_acc_by_order : true}})
        .then(res => {
            $('#loddingSpinner').hide(500);
            
            if (res.data.success) {
                console.log(res.data.data);
                let data = res.data.data;

                invoice_id = data.id;
                $('#show-invoice-code').text(data.order.code);
                $('#show-invoice-sub-total').text(data.sub_total);
                $('#show-invoice-shipping').text(data.shipping);
                $('#show-invoice-fee').text(data.fee);
                $('#show-invoice-tax').text(data.tax);
                $('#show-invoice-total').text(data.total);
                $('#show-invoice-status').text(data.status);
                $('#show-payment-refuse-count').text(data.payment_refuse_count);

                if (!Boolean(data.status) || data.status == 'waiting_payment') {
                    $('#acceptPayment').attr('disabled', 'disabled');
                    $('#refusePayment').attr('disabled', 'disabled');
                } else {
                    $('#acceptPayment').removeAttr('disabled', 'disabled');
                    $('#refusePayment').removeAttr('disabled', 'disabled');
                }

                if (data.trasnaction_imge == null) {
                    $('#transaction-image-not-found').slideDown();
                    $('#transaction-image').attr('src', '');
                } else {
                    $('#transaction-image-container').slideDown();
                    $('#transaction-image-not-found').slideUp();
                    $('#transaction-image').attr('src', `{{url('/')}}/${data.trasnaction_imge}`);
                }
            }// end :: if
        });

        $('#invoiceObjectsCard').slideDown(500);
        $('#objectsCard').slideUp(500);
    });

    $('#acceptPayment').click(function (e) {
        e.preventDefault();
        $('#loddingSpinner').show(500);

        axios.post(`{{ url('admin/invoices') }}/${invoice_id}`,  {
            accept_invoice : true,
            _method : 'PUT',
            _token  : '{{ csrf_token() }}'
        }).then(res => {
            $('#loddingSpinner').hide(500);
            let data = res.data;
            
            if (data.success) {
                $('#show-invoice-status').text(data.data.status);
                
                $('#paymentSuccess').slideDown(500);
                setTimeout(() => {
                    $('#paymentSuccess').slideUp(500);
                }, 3000);
            }

            // relode table
            objects_dynamic_table.table_object.draw();
        });
    });

    $('#refusePayment').click(function (e) {
        e.preventDefault();

        $('#loddingSpinner').show(500);

        axios.post(`{{ url('admin/invoices') }}/${invoice_id}`, {
            _method : 'PUT',
            _token  : '{{ csrf_token() }}'
        })
        .then(res => {
            $('#loddingSpinner').hide(500);
            let data = res.data;
            console.log(res)
            if (data.success) {
                $('#show-invoice-status').text(data.data.status);
                $('#show-payment-refuse-count').text(data.data.payment_refuse_count);
                
                $('#paymentRefused').slideDown(500);
                setTimeout(() => {
                    $('#paymentRefused').slideUp(500);
                }, 3000);

                // relode table
                objects_dynamic_table.table_object.draw();
            }
        });
    });
</script>
@endpush