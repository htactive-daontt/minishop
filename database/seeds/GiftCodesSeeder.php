<?php

use Illuminate\Database\Seeder;

class GiftCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gift_codes')->insert([
            'code'  => 'FREESHIP',
            'value' => 20,
            'qty'   => 1,
            'create_day'    => '2020-06-21 00:00:00.000000',
            'end_day'   => '2020-06-21 00:00:00.000000'
        ]);

        DB::table('gift_codes')->insert([
            'code'  => 'THAGA',
            'value' => 20,
            'qty'   => 1,
            'create_day'    => '2020-06-21 00:00:00.000000',
            'end_day'   => '2020-06-21 00:00:00.000000'
        ]);
    }
}
