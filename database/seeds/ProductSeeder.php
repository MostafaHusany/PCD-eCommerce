<?php

use App\Brand;
use App\Product;
use App\ProductCategory;
use App\RCategoryProduct;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ProductCategory::get();
        foreach ($categories as $category) {

            for ($i = 0; $i < 50; $i++) {
                $products = array(
                    'ar_name' => $category->ar_title . ' ' . $i,
                    'en_name' => $category->en_title . ' ' . $i,
                    'ar_small_description' => $category->ar_title . ' ' . $i,
                    'en_small_description' => $category->en_title . ' ' . $i,
                    'ar_description' => $category->ar_title . ' ' . $i,
                    'en_description' => $category->en_title . ' ' . $i,
                    'sku' => rand(100, 10000000000),
                    'slug' => $category->en_title . ' ' . $i,
                    'main_image' => 'https://image.shutterstock.com/image-photo/electronic-circuit-board-close-up-260nw-1568488030.jpg',
                    'quantity' => rand(0, 100),
                    'price' => rand(100, 500),
                    'price_after_sale' => rand(50, 400),
                    // 'is_active' => rand(0, 1),
                    // 'is_composite' => rand(0, 1),
                    'is_active' => 1,
                    'is_composite' => 0,
                    'reserved_quantity' => rand(0, 1),
                    'brand_id' => Brand::all()->random()->id,
                );
                $product =  Product::create($products);
                $categoryProducts = array(
                    'category_id' => $category->id,
                    'product_id'  => $product->id,
                );
                $RCategoryProduct = RCategoryProduct::create($categoryProducts);
            }
        }
    }
}
