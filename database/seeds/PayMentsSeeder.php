<?php

use Illuminate\Database\Seeder;

class PayMentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'pay_ment' => 'Thanh toán trực tiếp'
        ]);

        DB::table('payments')->insert([
            'pay_ment' => 'Thanh toán VNPay'
        ]);
    }
}
