<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('catalogs')->insert([[
            'name' => 'Solar Panel',
            'description' => '300 Watt panel',
            'price' => '1000.00'
            ],
            [
            'name' => 'Solar Panel Inverter',
            'description' => '1800 VA',
            'price' => '3000.00'
            ]]);

            // Add a default administrator
            DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('12345678'),
                'role' => 'SPDSSAdmin'
            ] 
            ]);
    }
}
