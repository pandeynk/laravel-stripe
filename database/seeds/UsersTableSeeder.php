<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => env('ADMIN_USERNAME', 'admin@cars.com'),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'Cars1'))
        ]);
    }
}
