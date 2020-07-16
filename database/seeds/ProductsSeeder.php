<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 1',
            'slug'  => 'kem-duong-da-so-1',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 2',
            'slug'  => 'kem-duong-da-so-2',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 2
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 3',
            'slug'  => 'kem-duong-da-so-3',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 4',
            'slug'  => 'kem-duong-da-so-5',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 6',
            'slug'  => 'kem-duong-da-so-6',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 7',
            'slug'  => 'kem-duong-da-so-7',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 8',
            'slug'  => 'kem-duong-da-so-8',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 4
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 9',
            'slug'  => 'kem-duong-da-so-9',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 4
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 10',
            'slug'  => 'kem-duong-da-so-10',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 4
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 11',
            'slug'  => 'kem-duong-da-so-11',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 4
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 12',
            'slug'  => 'kem-duong-da-so-12',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 5
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 13',
            'slug'  => 'kem-duong-da-so-13',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 5
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 14',
            'slug'  => 'kem-duong-da-so-14',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 6
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 16',
            'slug'  => 'kem-duong-da-so-16',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 2
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 18',
            'slug'  => 'kem-duong-da-so-18',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 19',
            'slug'  => 'kem-duong-da-so-19',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name'  => 'Kem dưỡng da số 20',
            'slug'  => 'kem-duong-da-so-20',
            'qty'   => 10,
            'sale'  => 10,
            'price' => 500000,
            'preview'   => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'detail' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'thumbnail' => 'my-pham.jpg',
            'images'    => 'ád',
            'category_id' => 3
        ]);
    }
}
