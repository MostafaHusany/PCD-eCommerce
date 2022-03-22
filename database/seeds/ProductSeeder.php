<?php

use App\Brand;
use App\Product;
use App\ProductCategory;
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
        $fakerEn = Faker\Factory::create('en_GB');
        $fakerAr = Faker\Factory::create('ar_SA');
        $no_of_rows = 20;
        for ($i = 0; $i < $no_of_rows; $i++) {
            $category = array(
                'ar_name' => $fakerAr->unique()->realText(50),
                'en_name' => $fakerEn->unique()->realText(50),
                'ar_small_description' => $fakerAr->realText(200),
                'en_small_description' => $fakerEn->realText(200),
                'ar_description' => $fakerAr->realText(500),
                'en_description' => $fakerEn->realText(500),
                'sku' => $fakerEn->unique()->realText(20),
                'slug' => $fakerEn->unique()->realText(20),
                'main_image' => 'https://image.shutterstock.com/image-photo/electronic-circuit-board-close-up-260nw-1568488030.jpg',
                'quantity' => rand(0, 100),
                'price' => rand(100, 500),
                'price_after_sale' => rand(50, 400),
                'is_active' =>rand(0, 1),
                'is_composite' =>rand(0, 1),
                'reserved_quantity' =>rand(0, 1),
                'brand_id' => Brand::all()->random()->id,
            );
            Product::insert($category);
            $category = null;
        }
    }
}
