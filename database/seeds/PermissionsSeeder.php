<?php

use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [];
        // $permissions = [
        //     // 'users', 'customers', 
        //     // 'products-categories', 'brands', 'products', 
        //     // 'sold_products', 'orders',
        //     // 'promotions', 'promo',
        //     // 'shipping', 'fees', 'taxes', 'order_status',
        //     'sms'
        // ];

        // foreach($permissions as $permission) {
        //     $data = array_merge($data, [
        //         [
        //             'display_name' => 'add ' . $permission,
        //             'name' => $permission . '_add',
        //         ],
                
        //         [
        //             'display_name' => 'edit ' . $permission,
        //             'name' => $permission . '_edit',
        //         ],
                
        //         [
        //             'display_name' => 'show ' . $permission,
        //             'name' => $permission . '_show',
        //         ],
    
        //         [
        //             'display_name' => 'delete ' . $permission,
        //             'name' => $permission . '_delete',
        //         ]
                
        //     ]);
        // }

        // dashboard
        // $data = [
        //     'display_name' => 'dashboard',
        //     'name' => 'dashboard',
        // ];

        // theme settings
        // $data = [
        //     'display_name' => 'theme settings',
        //     'name' => 'theme_settings' 
        // ];

        Permission::insert($data);
    }
}
