<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'category-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'category-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'category-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'category-delete',
            'guard_name'   => 'admin',
        ]);

        ///
        DB::table('permissions')->insert([
            'name' => 'product-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'product-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'product-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'product-delete',
            'guard_name'   => 'admin',
        ]);
        ///
        DB::table('permissions')->insert([
            'name' => 'bill-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'bill-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'bill-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'bill-delete',
            'guard_name'   => 'admin',
        ]);
        ///
        DB::table('permissions')->insert([
            'name' => 'giftcode-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'giftcode-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'giftcode-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'giftcode-delete',
            'guard_name'   => 'admin',
        ]);
        ///
        DB::table('permissions')->insert([
            'name' => 'news-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'news-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'news-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'news-delete',
            'guard_name'   => 'admin',
        ]);

        ///
        DB::table('permissions')->insert([
            'name' => 'slide-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'slide-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'slide-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'slide-delete',
            'guard_name'   => 'admin',
        ]);

        ///
        DB::table('permissions')->insert([
            'name' => 'contact-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'contact-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'contact-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'contact-delete',
            'guard_name'   => 'admin',
        ]);
        ///
        DB::table('permissions')->insert([
            'name' => 'user-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user-delete',
            'guard_name'   => 'admin',
        ]);

        ///
        DB::table('permissions')->insert([
            'name' => 'report-list',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'report-create',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'report-edit',
            'guard_name'   => 'admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'report-delete',
            'guard_name'   => 'admin',
        ]);
    }
}
