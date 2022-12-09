<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_codes')->insert([
            'code' => '001',
            'product_id' =>  1,
        ]);
        DB::table('product_codes')->insert([
            'code' => '002',
            'product_id' =>  2,
        ]);
    }
}
