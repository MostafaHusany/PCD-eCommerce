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
    /**
     * # We will create queries to get needed data for the chart,
     * than we will stor it the database for future call for keeping up performance  
     * 
     * report table :
     * record attr (year required, month, type require, meta required) 
     * 
     */
    public function index (Request $request) {

        if (isset($request->is_ajax)) {
            $data = [];
            
            if (isset($request->salies_over_year) || isset($request->all_data)) {        
                $data['salies_over_year'] = $this->querySaliesOverYear($request->date);
                $data['totals']           = $this->queryTotals($request->date);
            }

            if (isset($request->year_orders_status) || isset($request->all_data)) {        
                $data['year_orders_status'] = $this->queryOrderStatus($request->date);
            }

            if (isset($request->month_orders_status) || isset($request->all_data)) {
                $data['month_orders_status'] = $this->queryOrderStatus($request->date, true);
            }

            if (isset($request->sold_products) || isset($request->all_data)) {
                $data['sold_products'] = $this->querySoldProducts($request->date);
            }

            if (isset($request->sold_products_month) || isset($request->all_data)) {
                $data['sold_products_month'] = $this->querySoldProducts($request->date, true);
            }

            if (isset($request->restored_products) || isset($request->all_data)) {
                $data['restored_products'] = $this->queryRestoredProducts($request->date);
            }

            if (isset($request->restored_products_month) || isset($request->all_data)) {
                $data['restored_products_month'] = $this->queryRestoredProducts($request->date, true);
            }

            return response()->json(['data' => $data, 'success' => isset($data) && sizeof($data)]);   
        } 
        
        
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
        
        return view ('admin.dashboard.index', compact('restoredProducts', 'restoredProductsMonth'));
    }

    /**
     * query the salies over year.
     *
     * @param  $date (yeas <date>)
     * @return collection 
     */
    private function querySaliesOverYear ($date = null) {
        $date = isset($date) ? $date : Date('Y-');

        $saliesOverYear = OrderProduct::select(
            DB::raw('SUM(price_when_order) as `data`'),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as new_date")
        )
        ->where('status', 1)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', $date . '%')
        ->groupBy('new_date')->orderBy('new_date', 'asc')->get();

        return $saliesOverYear;
    }

    private function queryOrderStatus ($date = null, $with_month = false) {
        $date = isset($date) ? $date : ( $with_month ? Date('Y-m') : Date('Y-'));

        $orderStatus = OrderStatus::withCount(['orders' => function ($q) use ($date) {
            $q->whereDate('created_at', 'Like', $date .'%');
        }])->get();

        return $orderStatus;
    }

    private function queryTotals ($date = null) {
        $data = [];
        $date = isset($date) ? $date : Date('Y-');

        $data['newOrdersCount']   = Order::where('status', 0)->whereDate('created_at', 'Like', $date.'%')->count();
        $data['ordersSales']      = Order::where('status', '!=', -1)->whereDate('created_at', 'Like', $date.'%')->sum('total');
        $data['soldProducts']     = OrderProduct::where('status', 1)->where('is_child', 0)->whereDate('created_at', 'like', $date . '%')->count();
        $data['restoredProductsCount'] = OrderProduct::where('status', 0)->where('is_child', 0)->whereDate('created_at', 'like', $date . '%')->count();
    
        return $data;
    }

    private function querySoldProducts ($date = null, $with_month = false) {
        $date = isset($date) ? $date : ( $with_month ? Date('Y-m') : Date('Y-'));

        $soldProducts = OrderProduct::with('product')
        ->select('product_id', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->where('status', 1)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', $date . '%')
        ->groupBy('product_id')
        ->limit(8)->get();

        return $soldProducts;
    }

    private function queryRestoredProducts ($date = null, $with_month = false) {
        $date = isset($date) ? $date : ( $with_month ? Date('Y-m') : Date('Y-'));

        $restoredProducts = OrderProduct::with('product')
        ->select('product_id', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->where('status', 0)
        ->where('is_child', 0)
        ->whereDate('created_at', 'like', $date . '%')
        ->groupBy('product_id')
        ->limit(8)->get();

        return $restoredProducts;
    }
}
