<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Liste des images sources
        $images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg'];

        $sourcePath = public_path('assets/images/produits/');
        $destinationPath = 'images/produits/';

        // Stocker les fichiers et récupérer leurs noms
        $storedImages = [];
        foreach ($images as $image) {
            $sourceFile = $sourcePath . $image;
            if (File::exists($sourceFile)) {
                $filename = time() . "_$image"; // Ajout d'un timestamp pour éviter les doublons
                Storage::disk('public')->putFileAs($destinationPath, $sourceFile, $filename);
                $storedImages[] = $filename;
            }
        }

        // Insérer des produits avec les images stockées
        DB::table('produits')->insert([
            [
                'nom' => 'Produit 1',
                'description' => 'Description du produit 1',
                'prix' => '10.00',
                'first_image' => $storedImages[0] ?? null,
                'second_image' => $storedImages[1] ?? null,
                'third_image' => $storedImages[2] ?? null,
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 2',
                'description' => 'Description du produit 2',
                'prix' => '250.00',
                'first_image' => $storedImages[3] ?? null,
                'second_image' => $storedImages[4] ?? null,
                'third_image' => $storedImages[5] ?? null,
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 3',
                'description' => 'Description du produit 3',
                'prix' => '350.00',
                'first_image' => $storedImages[6] ?? null,
                'second_image' => $storedImages[7] ?? null,
                'third_image' => $storedImages[8] ?? null,
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
