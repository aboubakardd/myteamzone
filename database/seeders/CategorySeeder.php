<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Maillots', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ballons', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accessoires', 'created_at' => now(), 'updated_at' => now()],
            // Ajoutez d'autres catégories si nécessaire
        ]);
    }
}

