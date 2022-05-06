<?php

namespace App\Http\Controllers\ShopApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Cart;
use App\Product;

class CartController extends Controller
{
    public function get_cart () {
        return response()->json(['data' => $this->cart_content(), 'success' => true]);
    }

    public function add_product ($id) {
        /**
         * before adding a product to the cart 
         * we need to make sure that there is a valied quantity for sale 
         * of this product, if some how the quantity is not valied 
         * show error message. notice that we need to make the same vaalidation 
         * in check out stage.
         *  add product to cart, and apply categories rules !
         */

        $target_product = Product::find($id);

        if (!isset($target_product)) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'product_not_found']);
        }

        if (!$target_product->quantity) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'not_valied_quantity']);
        }

        if ($this->is_not_valied_qty($target_product)) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'max_quantity_per_order']);
        }

        $cart = Cart::instance('products')->add($target_product->id, $target_product->en_name, 1, $target_product->get_price())->associate('App\Product');
        
        return response()->json(['data' => $this->cart_content(), 'success' => true]);
    }

    public function remove_product ($id) {
        $row_id = $this->is_cart_has_product($id);
        isset($row_id) ? Cart::instance('products')->remove($row_id) : null;

        return response()->json(['data' => $this->cart_content(), 'success' => true]);
    }

    public function clear_cart () {
        Cart::instance('products')->destroy();
        
        return response()->json(['data' => $this->cart_content(), 'success' => true]);
    }

    // START HELPER METHODS
    private function cart_content () {
        
        $data = [
            'cart_content' => Cart::instance('products')->content(),
            'items_count'  => Cart::instance('products')->content()->count(),
            'total_price'  => Cart::instance('products')->subtotal(),
        ];

        return $data;
    }

    private function is_not_valied_qty (Product $target_product) {
        /**
         * # Here we check if there is a limit rule 
         * on any of product's categories.
         * 
         * # First check if the product in cart, 
         * if not we don't need to check the limit rule
         * else get the products categories that has qty
         * limit rule and apply the rule on the min qty 
         */
        $is_has_item = Cart::instance('products')->search(function ($cartItem, $rowId) use ($target_product) {
            return $cartItem->id == $target_product->id;
        })->first();
        
        if (isset($is_has_item)) {
            $quantityt_rules = $target_product->categories()->where('rule', '>', 0)->pluck('rule')->toArray();
            return $is_has_item->qty >= min($quantityt_rules);
        }

        return false;
    }

    private function is_cart_has_product ($id_or_item_id) {
        $is_has_item = Cart::instance('products')->search(function ($cartItem, $rowId) use ($id_or_item_id) {
            return $cartItem->id == $id_or_item_id || $rowId == $id_or_item_id;
        })->first();

        return isset($is_has_item) ? $is_has_item->rowId : null;
    }
}
