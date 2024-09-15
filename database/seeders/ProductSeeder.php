<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Récupération des catégories
        $maillotsCategory = Category::where('name', 'Maillots')->first();
        $ballonsCategory = Category::where('name', 'Ballons')->first();

        // Vérifier que les catégories existent
        if (!$maillotsCategory || !$ballonsCategory) {
            $this->command->error('Certaines catégories sont manquantes.');
            return;
        }

        // Insertion des produits
        DB::table('products')->insert([
            [
                'name' => 'Maillot de football',
                'description' => 'Maillot de football de haut niveau',
                'price' => 19.99,
                'stock' => 10,
                'image' => 'image1.png',
                'category_id' => $maillotsCategory->id, // Associe à la catégorie "Maillots"
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ballon de foot',
                'description' => 'Ballon de foot de haut niveau',
                'price' => 29.99,
                'stock' => 5,
                'image' => 'ballon.jpg',
                'category_id' => $ballonsCategory->id, // Associe à la catégorie "Ballons"
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ballon de foot Real Madrid',
                'description' => 'Ballon de foot de haut niveau',
                'price' => 19.99,
                'stock' => 5,
                'image' => 'image1.png',
                'category_id' => $ballonsCategory->id, // Associe à la catégorie "Ballons"
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maillot de foot Real Madrid',
                'description' => 'Maillot de foot de haut niveau',
                'price' => 50.99,
                'stock' => 5,
                'image' => 'image1.png',
                'category_id' => $maillotsCategory->id, // Associe à la catégorie "Maillots"
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Écharpe',
                'description' => 'Écharpe de supporter',
                'price' => 9.99,
                'stock' => 5,
                'image' => 'echarpe.jpg',
                'category_id' => $maillotsCategory->id, // Associe à la catégorie "Maillots"
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
