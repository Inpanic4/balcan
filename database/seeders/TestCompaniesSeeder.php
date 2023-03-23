<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TestCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Make the desired db credentials
        \DB::table('test_companies')->insert([
            'name' => 'LIONCODE',
            'address' => 'BALKAN',
            'phone' =>  2311111251,
        ]);


        // Generate 4 more
        for ($i = 0; $i < 4; $i++) {

            \DB::table('test_companies')->insert([
                'name' => Str::random(10),
                'address' => Str::random(10),
                'phone' =>  mt_rand(1000000000, 9999999999),
            ]);
        }
    }
}
