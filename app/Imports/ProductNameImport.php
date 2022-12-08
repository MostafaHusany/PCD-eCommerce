<?php

namespace App\Imports;

use App\Product;
use App\ProductName;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductNameImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // [1] => sku, [2] => name, [3] => category_id, [4] => bradn_id
        // dd($row[1], $row[2], $row[3], $row[4]);
        !isset($row[2]) ? dd( $row[0]): null;
        $new_product = Product::create([
            'ar_name' => $row[2], 
            'ar_small_description' => $row[2], 
            'ar_description' => $row[2],
            'en_name' => $row[2], 
            'en_small_description' => $row[2], 
            'en_description' => $row[2],

            'sku'  => $row[1],
            'slug' => join("-", explode(' ', $row[2])),
            
            'quantity' => 0,
            'price' => 0,
            'price_after_sale' => 0,
            
            'main_image' => 'default.png',

            'brand_id' => isset($row[4]) ? (int) $row[4] : null,

            'meta' => '{"child_products_id":[],"products_quantity":[]}'
        ]);

        isset($row[3]) && $new_product->categories()->sync([(int) $row[3]]);

        return new ProductName([
            'sku'     => $row[1],
            'name'    => $row[2], 
        ]);
    }
}
