<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Invoice;

use App\Traits\MakeOrder;

class InvoicesController extends Controller
{
    use MakeOrder;

    public function update (Request $request, $id) {
        $target_invoice = Invoice::find($id);
        
        if ($request->accept_invoice) {
            $target_invoice->status = 'paid';
        } else {
            $target_invoice->status = 'refused';
            $target_invoice->payment_refuse_count += 1;
            
            if ($target_invoice->payment_refuse_count >= 3) {
                /**  
                 * Restore order product ...
                 * this the senario where the order is refused and need to restore
                 * the order products to the storage. 
                 * 
                 * 1- get invoice order, and from the order get all requested 
                 * products, with those products start looping and restore items
                 * to the storage.
                 */ 
                $this->restore_order ($target_invoice->order);
            }
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

    private function restore_order ($target_order) {
        // dd($target_order);

        if ($target_order->status !== -1) {
            // restore orders' products
            $this->restore_order_all_products($target_order);
        }

        // update order meta data
        $this->restore_order_meta($target_order);

        // update orders' products status
        $orderproducts = $target_order->order_products()->where('status', '!=', 0)->update(['status' => '0']);
        
        // update orders' status
        $target_order->status = -1;
        $target_order->shipping_cost = 0;
        $target_order->sub_total = 0;
        $target_order->taxe      = 0;
        $target_order->fee       = 0;
        $target_order->total     = 0;
        $target_order->save();
    } 

}
