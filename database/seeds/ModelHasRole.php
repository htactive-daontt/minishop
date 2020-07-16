<?php

use Illuminate\Database\Seeder;

class ModelHasRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 36; $i++) {
            DB::table('model_has_permissions')->insert([
                'permission_id' => $i,
                'model_type'    => 'App\Entities\Users\Users',
                'model_id'  => 1
            ]);
        }
    }
}
