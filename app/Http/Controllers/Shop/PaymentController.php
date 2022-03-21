<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\shop\InvoicesRequest;
use App\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function uploadInvoices(InvoicesRequest $request)
    {
        $invoice = Invoice::where('order_id', $request->order_id)->first();
        $invoice->status = 'check_payment_transaction';
        if ($request->hasFile('payment_file')) {
            $invoice->trasnaction_imge = upload_image($request->file('payment_file'), 'payment_file');
        }
        $invoice->save();
        return redirect()->route('profile');
    }
}
