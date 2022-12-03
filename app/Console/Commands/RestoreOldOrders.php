<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Order;
use App\Traits\MakeOrder;

class RestoreOldOrders extends Command
{
    use MakeOrder;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:restore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'restore old orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
            
        $target_date   = date('Y-m-d', strtotime('-3 day', strtotime(date('Y-m-d'))));
        $target_orders = Order::where('status', 0)->whereDate('created_at', '<=', $target_date)->whereHas('invoice', function ($q) {
            $q->where('status', 'waiting_payment');
        })->get();
        // $target_orders = Order::whereIn('id', [6, 5, 4])->get();
        
        foreach ($target_orders as $target_order) {
            // $target_order = Order::find(45);
            if ($target_order->status !== -1) {
                $this->restore_order_all_products($target_order);
            }
            
            // if (isset($request->restore_product)) {
                // $this->restore_order_meta($target_order);
                
                // update orders' products status
                $orderproducts = $target_order->order_products()->where('status', '!=', 0)->update(['status' => '0']);
                
                // update orders' status
                // $target_order->status = -1;
                // $target_order->shipping_cost = 0;
                // $target_order->sub_total = 0;
                // $target_order->taxe      = 0;
                // $target_order->fee       = 0;
                // $target_order->total     = 0;
                // $target_order->save();
                
                $target_order->delete();
                
            // } else {
            //    $target_order->delete();
            // }
        }

    }
}
