<?php

use Illuminate\Database\Seeder;

class RolesPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name'   => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'mod',
            'guard_name'   => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'user',
            'guard_name'   => 'admin',
        ]);
    }
}
