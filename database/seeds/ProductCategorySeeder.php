<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
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
                'ar_title' => $fakerEn->unique()->realText(50),
                'en_title' => $fakerAr->unique()->realText(50),
                'ar_description' => $fakerEn->realText(500),
                'en_description' => $fakerAr->realText(500),
                'rule' => rand(0, 1),
                'is_main' => rand(0, 1),
                'category_id' => ProductCategory::all()->random()->id,
            );
            ProductCategory::insert($category);
            $category = null;
        }
    }
}
