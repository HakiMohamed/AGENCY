<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $property_type = [
        'Appartement',
        'Studio',
        'Bureau',
        'Chambre',
        'Local Ecommerce',
        'Maison',
        'Riad',
        '',
        'Terrain Immobilier',
                 ];

                 foreach($property_type as $type){
                    DB::table('property_types')->insertOrIgnore([
                        'name' => $type,
                    ]);
                 }
    }
}
