<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Promotion;

class PromotionsController extends Controller
{
    /**
     * Customer Promotion , 
     * We can select group of products and put a discount on them, 
     * this discount can be with group of rules like start, end date
     * quantity, rules on how many orders for each customer on same cart !! 
     * 
     * Notice that when a product has a p
     * 
     * Also we want to create discount codes for the customers, discount code
     * can be used on the cart and gice a fixed value of discount, and this discount
     * has rules like start, end data and type of products that will work on , or even 
     * linked to specific user
     * 
     * # How promotions works ?! 
     * => Get products, 
     * => Check if product has an promotion
     * => Get promotion info
     * => Get product_pricce, a method that we will get the price 
     * it checks if the produc has a promotion get the new price
     * if there is no promotions, get original price.
     * $product->has_promotion() 
     * $product->get_promotion()
     * before_price, after_price, quantity, title, start_date, end_date
     * ->with('promotions')
     * 
     * # How to manage promotion adminstration ?! 
     * We have and adminstartion table ... 
     * 1- give the promotion title 
     * select more than a product in the promotion option 
     * each option we see it's origin price and show how much
     * we want to drop the price 
     * 
     * Show the price that we need to show ,and the price as a discount, and the 
     * quantity valied for sell and the quantity valid for the promotion
     * the start and the end date for 
     * 
     * 
    */

    public function index (Request $request) {
        if ($request->ajax()) {
            $model = Promotion::query();
            
            // if (isset($request->title)) {
            //     $model->where('title', $request->title);
            // }

            $datatable_model = Datatables::of($model);

            return $datatable_model->make(true);
        }
        
        return view('admin.promotions.index');
    }// end :: index


    public function store (Request $request) {
        /**
         * Create Promotion .... 
         * products_id 
         * products_meta  
         */

        $validator = Validator::make($request->all(), [
            'title'         => 'required|unique:shippings,title|max:255',
            'description'   => 'required|max:500',
            // 'cost_type'     => 'required',
            'cost'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $data       = $request->all();
        $new_object = Shipping::create($data);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

}
