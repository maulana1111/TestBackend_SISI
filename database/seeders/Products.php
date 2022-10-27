<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('products')->insert(
            [
                'code' => "123-222-ads",
                'name' => 'Laptop'
            ],
            [
                'code' => "123-111-ads",
                'name' => 'HP'
            ]
        );
    }
}
