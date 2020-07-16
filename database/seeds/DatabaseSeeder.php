<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(ContactsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PayMentsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(BillsSeeder::class);
        $this->call(BillsDetailSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(SlidesSeeder::class);
        $this->call(GiftCodesSeeder::class);
    }
}
