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
        // Insertar en la tabla
        DB::table('products')->insert([
            'name' => "Iphone 13",
            'description' => "Mobile phone Apple",
            'amount' =>  980
        ]);

        DB::table('products')->insert([
            'name' => "Ipad Pro 11",
            'description' => "Tablet Apple",
            'amount' => 850
        ]);

        DB::table('products')->insert([
            'name' => "Playstatrion 5",
            'description' => "Mobile phone Apple",
            'amount' =>  540
        ]);

    }
}
