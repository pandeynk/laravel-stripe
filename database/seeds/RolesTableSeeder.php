<?php

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
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Admin Role',
        ]);
        DB::table('roles')->insert([
            'name' => 'guest',
            'display_name' => 'Guest',
            'description' => 'Guest Role',
        ]);
        DB::table('roles')->insert([
            'name' => 'vendor',
            'display_name' => 'Vendor',
            'description' => 'Vendor Role',
        ]);
        DB::table('roles')->insert([
            'name' => 'credit',
            'display_name' => 'Credit',
            'description' => 'Credit Role',
        ]);
    }
}
