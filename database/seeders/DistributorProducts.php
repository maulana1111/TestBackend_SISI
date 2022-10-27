<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distributor_products')->insert(
            [
                'product_id' => 1,
                'distributor_id' => 1,
                'price' => 120000
            ],
            [
                'product_id' => 1,
                'distributor_id' => 2,
                'price' => 120111
            ]
        );
    }
}
