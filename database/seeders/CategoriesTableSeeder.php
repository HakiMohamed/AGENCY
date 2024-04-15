<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Hypothécaire',
            'A VENDRE',
            'A LOUER',
                     ];
    
                     foreach($categories as $categorie){
                        DB::table('categories')->insertOrIgnore([
                            'name' => $categorie,
                        ]);

                     } 
                    
                    }    
}
