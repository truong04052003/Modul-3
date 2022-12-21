<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'image' => '8879017e44544c50d3bacac1228bc4ad.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'laptop dell',
            'price' =>  150000,
            'category_id' =>  1,
            'image' => '8879017e44544c50d3bacac1228bc4ad.jpg'
        ]);
    }
}
