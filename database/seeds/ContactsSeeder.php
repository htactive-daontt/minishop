<?php

use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'fullname' => 'Nguyen thanh bibg',
            'email' => 'Binsdh@gmail.com',
            'phone'    => '12312321',
            'title' => 'Tooi can ho tro',
            'content'   => 'Toi asdasdasdasd'
        ]);

        DB::table('contacts')->insert([
            'fullname' => 'Nguyen thanh bibgsd',
            'email' => 'Binh@sgmail.com',
            'phone'    => '12312321',
            'title' => 'Tooi can ho tro',
            'content'   => 'Toi asdasdasdasd'
        ]);

    }
}
