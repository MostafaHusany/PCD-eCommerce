
<div style="display: none" id="invoiceObjectsCard" class="card card-body">
    <div class="row">
        <div class="col-6">
            <h5>Order Invoice</h5>
        </div>
        <div class="col-6 text-right">
            <div class="toggle-btn btn btn-default btn-sm" data-current-card="#invoiceObjectsCard" data-target-card="#objectsCard">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div><!-- /.row -->

    <form action="/" id="objectForm">
        <div class="form-group">
            <table class="table">
                <tr>
                    <td><b>Order Code</b></td>
                    <td id="show-invoice-code"></td>
                </tr>
                <tr>
                    <td><b>Sub Total</b></td>
                    <td id="show-invoice-sub-total"></td>
                </tr>
                <tr>
                    <td><b>Shipping</b></td>
                    <td id="show-invoice-shipping"></td>
                </tr>
                
                <tr>                
                    <td><b>Tax</b></td>
                    <td id="show-invoice-tax"></td>
                </tr>
                
                <tr>
                    <td><b>Fee</b></td>
                    <td id="show-invoice-fee"></td>
                </tr>
                
                <tr>
                    <td><b>Total</b></td>
                    <td id="show-invoice-total"></td>
                </tr>
                
                <tr>
                    <td><b>Status</b></td>
                    <td id="show-invoice-status"></td>
                </tr>
            </table>
        </div><!-- /.form-group -->

        <div id="transaction-image-container" class="img-status form-group">
            <img id="transaction-image" src="..." class="img-fluid img-thumbnail" alt="...">
        </div><!-- /.form-group -->

        <div id="transaction-image-not-found" class="img-status form-group text-center text-warning my-3">
            <h1>
                <i class="fas fa-exclamation-triangle"></i>
            </h1>
            <h1>No File Uploaded !!</h1>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-6 text-left">
                    <button class="btn btn-success">Accept Payment</button>
                </div>
                <div class="col-6 text-right">
                    <button class="btn btn-danger">Refuse Payment</button>
                </div>
            </div>
        </div><!-- /.form-group -->
    </form>
</div>



@push('page_scripts')
<script>
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
            // console.log(res);
            if (res.data.success) {
                console.log(res.data.data);
                let data = res.data.data;

                $('#show-invoice-code').text(data.order.code);
                $('#show-invoice-sub-total').text(data.sub_total);
                $('#show-invoice-shipping').text(data.shipping);
                $('#show-invoice-fee').text(data.fee);
                $('#show-invoice-tax').text(data.tax);
                $('#show-invoice-total').text(data.total);
                $('#show-invoice-status').text(data.status);

                if (data.trasnaction_imge == null) {
                    $('#transaction-image-not-found').slideDown();
                    $('#transaction-image').attr('src', '');
                }
            }
        })

        $('#invoiceObjectsCard').slideDown(500);
        $('#objectsCard').slideUp(500);
    });
</script>
@endpush