<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'iphone 14',
            'price' =>  100000,
            'category_id' =>  2,
            'image' =>  'images/iphone-14.png',
        ]);
        DB::table('products')->insert([
            'name' => 'laptop dell',
            'price' =>  150000,
            'category_id' =>  1,
            'image' =>  'images/laptop-dell.png',
        ]);

    }
}
