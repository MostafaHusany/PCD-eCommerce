<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Carbon;

use App\Order;
use App\OrderStatus;
use App\OrderProduct;

class DashboardController extends Controller
{
    public function index () {
        $orderStatus      = OrderStatus::withCount('orders')->get();
        $newOrdersCount   = Order::where('status', 0)->whereDate('created_at', 'Like', Date('Y-').'%')->count();
        $ordersSales      = Order::where('status', '!=', -1)->whereDate('created_at', 'Like', Date('Y-').'%')->sum('total');
        $soldProducts     = OrderProduct::where('status', 1)->where('is_child', 0)->whereDate('created_at', 'like', Date('Y-') . '%')->count();
        $restoredProductsCount = OrderProduct::where('status', 0)->where('is_child', 0)->whereDate('created_at', 'like', Date('Y-') . '%')->count();
        
        $saliesOverYear = OrderProduct::select(
            DB::raw('SUM(price_when_order) as `data`'),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as new_date")
        )
        ->where('status', 1)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', Date('Y-') . '%')
        ->groupBy('new_date')->orderBy('new_date')->get();

        $saliesOverYearF = [];
        for ($i = 1; $i <= 12 ; $i++) {
            $saliesOverYearF[$i - 1] = 0;
            $tmp_date = $i >= 10 ? Date('Y-') . $i : Date('Y-') .  '0' . $i; 
            // dd($tmp_date);
            foreach($saliesOverYear as $sale) {
                if ($sale->new_date == $tmp_date) {
                    $saliesOverYearF[$i - 1] = $sale->data;
                }
            }
        }

        
        $soldeProducts = OrderProduct::with('product')
        ->select('product_id', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->where('status', 1)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', Date('Y-') . '%')
        ->groupBy('product_id')
        ->limit(8)->get();

        $soldeProductsMonth = OrderProduct::with('product')
        ->select('product_id', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->where('status', 1)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', Date('Y-m-') . '%')
        ->groupBy('product_id')
        ->limit(8)->get();
        
        $restoredProducts = OrderProduct::with('product')
        ->select('product_id', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->where('status', 0)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', Date('Y-') . '%')
        ->groupBy('product_id')
        ->limit(8)->get();

        $restoredProductsMonth = OrderProduct::with('product')
        ->select('product_id', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->where('status', 0)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', Date('Y-m-') . '%')
        ->groupBy('product_id')
        ->limit(8)->get();
        
        return view ('admin.dashboard.index', compact('newOrdersCount', 'ordersSales', 'soldProducts', 'restoredProductsCount', 'orderStatus', 'soldeProducts',
                     'soldeProductsMonth', 'restoredProducts', 'restoredProductsMonth', 'saliesOverYearF'));
    }
}
