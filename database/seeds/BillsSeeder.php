<?php

use Illuminate\Database\Seeder;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            'total' => 100,
            'tax'   => 10,
            'discount'  => 5,
            'payment_id'   => 1,
            'user_id'   => 3,
            'status'    => 1
        ]);

        DB::table('bills')->insert([
            'total' => 300,
            'tax'   => 10,
            'discount'  => 15,
            'payment_id'   => 1,
            'user_id'   => 3,
            'status'    => 1
        ]);

        DB::table('bills')->insert([
            'total' => 200,
            'tax'   => 10,
            'discount'  => 5,
            'payment_id'   => 2,
            'user_id'   => 2,
            'status'    => 1
        ]);

        DB::table('bills')->insert([
            'total' => 500,
            'tax'   => 10,
            'discount'  => 5,
            'payment_id'   => 2,
            'user_id'   => 4,
            'status'    => 1
        ]);
    }
}
