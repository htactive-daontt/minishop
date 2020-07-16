<?php

use Illuminate\Database\Seeder;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'title' => 'Slide 1',
            'preview'   => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout',
            'thumbnail' => 'slide1.jpeg'
        ]);

        DB::table('slides')->insert([
            'title' => 'Slide 2',
            'preview'   => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout',
            'thumbnail' => 'slide2.jpeg'
        ]);

        DB::table('slides')->insert([
            'title' => 'Slide 2',
            'preview'   => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout',
            'thumbnail' => 'slide3.jpeg'
        ]);
    }
}
