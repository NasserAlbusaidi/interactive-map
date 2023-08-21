<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenity::insert([
            ['name' => 'Toilet'],
            ['name' => 'Sink'],
            ['name' => 'Soap'],
            ['name' => 'Paper-towels'],
            ['name' => 'Baby-changing-station'],
            ['name' => 'Handicap-accessible'],
            ['name' => 'Feminine-products'],
            ['name' => 'Urinal'],
            ['name' => 'Bidet'],
            ['name' => 'Shower'],
            ['name' => 'Mirror'],
            ['name' => 'Trash-can'],
            ['name' => 'Hand-dryer'],
            ['name' => 'Wifi'],
            ['name' => 'Outlet'],
            ['name' => 'Water'],
            ['name' => 'Changing-table'],
            ['name' => 'Sanitary-products'],
            ['name' => 'Sanitary-products-disposal'],
        ]);





    }
}
