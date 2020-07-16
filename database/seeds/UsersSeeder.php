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

        DB::table('users')->insert([
            'name'  => 'employee',
            'email' => 'employee@gmail.com',
            'address'   => 'Hải Châu',
            'phone' => 12312,
            'password'  => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name'  => 'Nguyễn Văn A',
            'email' => 'a@gmail.com',
            'address'   => 'Hải Châu',
            'phone' => 12312,
            'password'  => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name'  => 'Nguyễn Văn B',
            'email' => 'B@gmail.com',
            'address'   => 'Hải Châu',
            'phone' => 12312,
            'password'  => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name'  => 'Nguyễn Văn c',
            'email' => 'c@gmail.com',
            'address'   => 'Hải Châu',
            'phone' => 12312,
            'password'  => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name'  => 'Nguyễn Văsn D',
            'email' => 'Csd@gmail.com',
            'address'   => 'Hải Châu',
            'phone' => 12312,
            'password'  => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name'  => 'Nguyễn Văn D',
            'email' => 'D@gmail.com',
            'address'   => 'Hải Châu',
            'phone' => 12312,
            'password'  => Hash::make('123'),
        ]);
    }
}
