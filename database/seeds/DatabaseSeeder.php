<?php

use Illuminate\Database\Seeder;

// use ProductCategorySeeder;

use App\User;
use App\Customer;
use App\OrderStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     'status_code' => 0,
        //     'status_name' => 'waiting for payment'
        // ];
        // OrderStatus::create($data);
        
        // create the admin account with its' dummy customer user
        $data = [
            "name"      => "أ.مصطفي",
            "email"     => "admin@goo.com",
            "phone"     => "01063200201",
            "password"  => bcrypt('123456'),
        ];
        
        // $new_user = User::create($data);
        
        $data = [
            // "first_name" => "Mostafa",
            // "second_name" => "Hazem",
            "name"      => "أ.مصطفي",
            "email"     => "admin@goo.com",
            "phone"     => "01063200201",
            "address"   => "PCD",
            "city"      => "city 1",
            "plain_password" => '123456',
        ];

        
        // 'name', 'email',
        // 'phone', 'address', 'city', 'plain_password',
        // 'user_id', 'meta', 'gove_id', 'country_id', 'phone_code'

        // $new_user->customer()->create($data);

        $this->call([
            // ProductCategorySeeder::class, 
            // ProductSeeder::class,
            // ProductRelationCategorySeeder::class,
            PermissionsSeeder::class
        ]);
    }
}
