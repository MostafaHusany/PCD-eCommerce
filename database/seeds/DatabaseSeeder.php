<?php

use Illuminate\Database\Seeder;

// use ProductCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ProductCategorySeeder::class, 
            ProductSeeder::class,
            ProductRelationCategorySeeder::class,
        ]);
    }
}
