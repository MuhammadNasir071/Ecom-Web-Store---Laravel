<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Role for admin',
            'guard_name' => 'web',
            'permissions' =>json_encode([]),

        ]);
        \App\Models\Role::create([
            'name' => 'Vender',
            'slug' => 'vender',
            'description' => 'Role for vender',
            'guard_name' => 'web',
            'permissions' =>json_encode([]),

        ]);

        \App\Models\Role::create([
            'name' => 'Customer',
            'slug' => 'customer',
            'description' => 'Role for customer',
            'guard_name' => 'web',
            'permissions' =>json_encode([]),

        ]);


        $user = \App\Models\User::find('00678adf-4f47-473a-8ed2-514e621c71b1');
        $user->roles()->attach(1);
        
        $user = \App\Models\User::find('02f7d0b2-4014-4644-bd45-cf19de309c5e');
        $user->roles()->attach(2);
        $user = \App\Models\User::find('092a782d-17a9-4d0e-bbef-94c0826875e5');
        $user->roles()->attach(2);
       
    }
}
