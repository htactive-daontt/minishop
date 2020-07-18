<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  => 'Admin',
            'email' => 'admin@gmail.com',
            'address'   => 'Hải Châu',
            'phone' => 12312,
            'password'  => Hash::make('123'),
        ]);
    }
}
