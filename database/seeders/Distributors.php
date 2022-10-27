<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Distributors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distributors')->insert(
            [
                'code' => "1234456",
                'name' => 'Sukakamu',
                'address' => 'Jl. Sukaaja jaya'
            ],
            [
                'code' => "1241241",
                'name' => 'Sukakamu',
                'address' => 'Jl. Sukaaja Aja'
            ]
        );
    }
}
