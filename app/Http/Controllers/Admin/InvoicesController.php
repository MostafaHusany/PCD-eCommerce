<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Invoice;

class InvoicesController extends Controller
{
    public function update (Request $request, $id) {
        $target_invoice = Invoice::find($id);
        
        if ($request->accept_invoice) {
            $target_invoice->status = 'paid';
        } else {
            $target_invoice->status = 'refused';
        }

        $target_invoice->save();
        return response()->json(array('data' => $target_invoice, 'success' => isset($target_invoice)));
    }

    public function show (Request $request, $id) {
        // get the invoice with id, or with order_id
        if (isset($request->fast_acc_by_order)) {
            $target_invoice = Invoice::where('order_id', $id)->first();
            $target_invoice->order;
            return response()->json(array('data' => $target_invoice, 'success' => isset($target_invoice)));
        }
    }
}
