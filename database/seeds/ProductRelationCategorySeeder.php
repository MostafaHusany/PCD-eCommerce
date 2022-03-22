<?php

use App\Product;
use App\ProductCategory;
use App\RCategoryProduct;
use Illuminate\Database\Seeder;

class ProductRelationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no_of_rows = 50;
        for ($i = 0; $i < $no_of_rows; $i++) {
            $categoryProducts = array(
                'category_id' => ProductCategory::all()->random()->id,
                'product_id'  => Product::all()->random()->id,
            );
            RCategoryProduct::insert($categoryProducts);
            $category = null;
        }
    }
}
