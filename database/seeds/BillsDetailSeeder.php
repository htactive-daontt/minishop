<?php

use Illuminate\Database\Seeder;

class BillsDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills_detail')->insert([
            'bill_id' => 1,
            'product_id'   => 1,
            'qty'  => 2,
            'total'   => 100,
        ]);

        DB::table('bills_detail')->insert([
            'bill_id' => 1,
            'product_id'   => 2,
            'qty'  => 1,
            'total'   => 200,
        ]);

        DB::table('bills_detail')->insert([
            'bill_id' => 2,
            'product_id'   => 4,
            'qty'  => 2,
            'total'   => 400,
        ]);

        DB::table('bills_detail')->insert([
            'bill_id' => 2,
            'product_id'   => 2,
            'qty'  => 2,
            'total'   => 450,
        ]);
    }
}
