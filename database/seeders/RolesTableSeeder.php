<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Roles = [
            'USER',
            'ADMIN',
            'AGENT IMMOBILIER',
                     ];
    
                     foreach($Roles as $Role){
                        DB::table('roles')->insertOrIgnore([
                            'name' => $Role,
                        ]);

                     } 
                    
                    }
}
