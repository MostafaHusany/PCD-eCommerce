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
        $permissions = [
            [
                'display_name' => 'add user',
                'name' => 'user_add',
            ],
            
            [
                'display_name' => 'edit user',
                'name' => 'user_edit',
            ],
            
            [
                'display_name' => 'show user',
                'name' => 'user_show',
            ],

            [
                'display_name' => 'delete user',
                'name' => 'user_delete',
            ],

            
        ];

        Permission::insert($permissions);
    }
}
