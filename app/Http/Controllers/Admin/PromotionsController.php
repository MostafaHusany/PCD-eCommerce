<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

use App\Promotion;
use App\ProductPromotion;

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
            
            if (isset($request->title)) {
                $model->where('title', 'like', "%$request->title%");
            }

            $datatable_model = Datatables::of($model)
            ->addColumn('active', function ($row_object) {
                return view('admin.promotions.incs._active', compact('row_object'));
            })
            ->addColumn('actions', function ($row_object) {
                return view('admin.promotions.incs._actions', compact('row_object'));
            });

            return $datatable_model->make(true);
        }
        
        return view('admin.promotions.index');
    }// end :: index

    public function show (Request $request, $id) {
        $target_object = Promotion::find($id);

        if (isset($target_object) && isset($request->fast_acc)) {
            $target_object->products;
            return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
        }

        return response()->json(['product' => null, 'success' > false]);
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|unique:promotions,title|max:255',
            'start_date'    => 'required|date|before:end_date',
            'end_date'      => 'required|date|after:start_date',
            'products'      => 'required', 
            'products_meta' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $products      = json_decode($request->products);
        $products_meta = (array) json_decode($request->products_meta);

        $products_relation = [];
        foreach ($products_meta as $key => $product_meta) {
            $products_relation[$key] = [
                'start_date' => $request->start_date,
                'end_date'   => $request->start_date,
                'quantity'   => $product_meta->quantity,
                'price'      => $product_meta->price,
                'old_price'  => $product_meta->old_price,
                'discount_ratio'  => round(100 - ($product_meta->price / $product_meta->old_price * 100))
            ];
        }

        $data = $request->all();
        $data['meta'] = json_encode([
            'products' => $products,
            'products_meta' => $products_meta,
        ]);

        $new_object = Promotion::create($data);
        $new_object->products()->sync($products_relation);

        return response()->json(['data' => $new_object, 'success' => isset($new_object)]);
    }// end :: store

    public function update (Request $request, $id) {
        if (isset($request->activate_promotion)) {
            return $this->updateActivation($id);
        }

        return $this->updatePromotion($request, $id);
    }

    protected function updatePromotion (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|max:255|unique:promotions,title,'. $id,
            'start_date'    => 'required|date|before:end_date',
            'end_date'      => 'required|date|after:start_date',
            'products'      => 'required', 
            'products_meta' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $products      = (array) json_decode($request->products);
        $products_meta = (array) json_decode($request->products_meta);

        $products_relation = [];
        foreach ($products_meta as $key => $product_meta) {
            $products_relation[$key] = [
                'start_date' => $request->start_date,
                'end_date'   => $request->start_date,
                'quantity'   => $product_meta->quantity,
                'price'      => $product_meta->price,
                'old_price'  => $product_meta->old_price,
                'discount_ratio'  => round(100 - ($product_meta->price / $product_meta->old_price * 100))
            ];
        }

        $target_object = Promotion::find($id);
        $data = $request->all();
        $data['meta'] = json_encode([
            'products' => $products,
            'products_meta' => $products_meta,
        ]);

        $target_object->update($data);
        $target_object->products()->detach($products);;
        $target_object->products()->sync($products_relation);

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }

    protected function updateActivation ($id) {
        $target_object = Promotion::find($id);
        
        if (isset($target_object)) {
            $target_object->is_active = !$target_object->is_active;
            $target_object->save();
            
            $result = ProductPromotion::where('promotion_id', $target_object->id)->update(['is_active' => $target_object->is_active]);
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);        
    }

    public function destroy ($id) {
        $target_object = Promotion::find($id);

        if (isset($target_object)) {
            $target_object->delete();
        }

        return response()->json(['data' => $target_object, 'success' => isset($target_object)]);
    }
}
