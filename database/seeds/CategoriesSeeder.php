<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 1',
            'slug'  => 'my-pham-so-1',
            'parent_id' => 0,
            'status'    => true
        ]);

        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 2',
            'slug'  => 'my-pham-so-2',
            'parent_id' => 0,
            'status'    => true
        ]);

        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 3',
            'slug'  => 'my-pham-so-3',
            'parent_id' => 0,
            'status'    => true
        ]);

        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 3',
            'slug'  => 'my-pham-so-3',
            'parent_id' => 0,
            'status'    => true
        ]);

        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 3',
            'slug'  => 'my-pham-so-3',
            'parent_id' => 0,
            'status'    => true
        ]);

        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 4',
            'slug'  => 'my-pham-so-4',
            'parent_id' => 0,
            'status'    => true
        ]);

        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 5',
            'slug'  => 'my-pham-so-5',
            'parent_id' => 0,
            'status'    => true
        ]);

        DB::table('categories')->insert([
            'name' => 'Mỹ phẩm số 6',
            'slug'  => 'my-pham-so-6',
            'parent_id' => 0,
            'status'    => true
        ]);
    }
}
