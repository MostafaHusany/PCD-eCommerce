<?php

namespace App\Http\Controllers\ShopApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Cart;
use App\Fee;
use App\Taxe;
use App\Product;
use App\Shipping;

class CartController extends Controller
{
    /**
     * # Change in plan we used to work with Cart package 
     * for handling the card data of the requested products
     * the Cart package depends on the session, but while we
     * were working with react/Next there was some a problem
     * in saving the ucer cart data in session !! 
     * 
     * To handle this problem we desided that we will store the 
     * cart content on the user localStorage, and the current method 
     * will mainly be used with validation
     */

    public function get_tax_and_fees () {
        $fees  = DB::table('fees')->where('is_active', 1)->get();
        $taxes = DB::table('texes')->where('is_active', 1)->get();

        return response()->json(['data' => ['fees' => $fees, 'taxes' => $taxes], 'success' => true]);
    }

    public function add_product (Request $request, $id) {
        /**
         * # Before adding a product to the cart in browsers' localStorage 
         * we need to make sure there is a valied quantity for sale 
         * of this product, if some how the quantity is not valied 
         * show error message. 
         * 
         * # validation rules 
         * 0- the user send the qty "quantity he need" from the target product.
         * 1- the product has valied quantity, in the storage.
         * 2- the product has np limtiation rule on the quantity that the user can order.
         *
         * # errors type :
         * 0- qty_number_is_required : the user didn't send qty attribute in the request.
         * 1- product_not_found : the product is not found in the storage.
         * 2- not_valied_quantity : the product is has not enogh quantity in the storage
         * 3- max_quantity_per_order : there is limitaion rule on this quantity
         *
         * # Notice that we need to make the same validation 
         * in check out stage.
         * 
        */

        $validator = Validator::make($request->all(), [
            'qty' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'qty_number_is_required']);
        }

        $target_product = Product::where('id', $id)->where('is_active', 1)->first();

        if (!isset($target_product)) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'product_not_found']);
        }

        // if (!$target_product->quantity || $target_product->quantity < $request->qty) {
        //     return response()->json(['data' => ['product_quantity' => $target_product->quantity], 'success' => false, 'msg' => 'not_valied_quantity']);
        // }

        if ($target_product->is_composite === 1) {
            // check if composite products is valied
            $is_not_valied_composite_qty = $this->is_not_valied_composite_qty($target_product, $request->qty);
            if ($is_not_valied_composite_qty) {
                return response()->json(['data' => ['is_not_valied_composite_qty' => $is_not_valied_composite_qty], 'success' => false, 'msg' => 'is_not_valied_composite_qty']);
            }
        }

        if ($target_product->is_composite === 2) {
            $is_not_valied_upgradable_qty = $this->is_not_valied_upgradable_qty($target_product, $request);
            
            if ($is_not_valied_upgradable_qty) {
                return response()->json(['data' => ['is_not_valied_upgradable_qty' => $is_not_valied_upgradable_qty], 'success' => false, 'msg' => 'is_not_valied_composite_qty']);
            }
        }

        $min_quantity = $this->is_not_valied_qty($target_product, $request->qty);
        if ($this->is_not_valied_qty($target_product, $request->qty)) {
            return response()->json(['data' => ['min_quantity' => $min_quantity], 'success' => false, 'msg' => 'max_quantity_per_order']);
        }

        return response()->json(['data' => null, 'success' => true]);
    }

    // START HELPER METHODS
    private function is_not_valied_qty (Product $target_product, $qty) {
        /**
         * # Here we check if there is a limit rule 
         * on any of product's categories.
         * 
         * # First get the products categories that has qty
         * limit rule and apply the rule on the min qty.
         */

        $quantityt_rules = $target_product->categories()->where('rule', '>', 0)->pluck('rule')->toArray();
        return sizeof($quantityt_rules) && $qty > min($quantityt_rules) ? min($quantityt_rules) : false;
    }

    private function is_not_valied_composite_qty (Product $target_product, $qty) {
        /**
         * # Notice that we don't need this validation method for the composite
         * products, the composite hase a reserved qty for the composite product
         * but we do this level for any un-expected senario.
         * 
         * # We storing a history for the products components quantity
         * so we need to get the "products_quantity" value from the meta
         */

        $meta                    = (array) json_decode($target_product->meta);
        $products_quantity       = (array) $meta['products_quantity'];
        $children_products       = $target_product->children;
        $not_valied_child_result = [];
        
        foreach ($children_products as $child) {
            if ($child->reserved_quantity < ($qty * $products_quantity[$child->id])) {
                $not_valied_child_result[] = [$child->reserved_quantity , $qty * $products_quantity[$child->id]];
            }
        }

        return sizeof($not_valied_child_result) ? $not_valied_child_result : false;
    }

    private function is_not_valied_upgradable_qty (Product $target_product, $request) {
        
        $not_valied_child_result = Product::whereIn('id', $request->upgrade_options_list)
                    ->where('quantity', '<', $request->qty)
                    ->orWhere('is_active', 0)
                    ->get();
        
        return sizeof($not_valied_child_result) ? $not_valied_child_result : false;
    }

}
