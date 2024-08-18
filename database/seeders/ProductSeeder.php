<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $category = \App\Models\Category::first();

        if ($category) {
            $categoryId = $category->id;
        } else {
            // Gérer le cas où il n'y a pas de catégorie
            $categoryId = null;
        }

        DB::table('products')->insert([
            [
                'name' => 'Maillot de football',
                'description' => 'Maillot de football de haut niveau',
                'price' => 19.99,
                'stock' => 10,
                'image' => 'image1.png',
                'category_id' => $categoryId, // Utilisez la valeur de $categoryId
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ballon de foot',
                'description' => 'Ballon de foot de haut niveau',
                'price' => 29.99,
                'stock' => 5,
                'image' => 'ballon.jpg',
                'category_id' => $categoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres produits si nécessaire
        ]);
    }
}
