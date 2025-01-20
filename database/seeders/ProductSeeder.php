<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produits')->insert([
            [
                'nom' => 'Produit 1',
                'description' => 'Description du produit 1',
                'prix' => '10.00',
                'first_image' => '1.jpg',
                'second_image' => '2.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 2',
                'description' => 'Description du produit 2',
                'prix' => '250.00',
                'first_image' => '2.jpg',
                'second_image' => '3.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 3',
                'description' => 'Description du produit 3',
                'prix' => '10.00',
                'first_image' => '3.jpg',
                'second_image' => '4.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 4',
                'description' => 'Description du produit 4',
                'prix' => '10.00',
                'first_image' => '4.jpg',
                'second_image' => '5.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 5',
                'description' => 'Description du produit 5',
                'prix' => '10.00',
                'first_image' => '5.jpg',
                'second_image' => '7.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 6',
                'description' => 'Description du produit 6',
                'prix' => '20.00',
                'first_image' => '6.jpg',
                'second_image' => '8.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 7',
                'description' => 'Description du produit 7',
                'prix' => '10.00',
                'first_image' => '2.jpg',
                'second_image' => '8.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 8',
                'description' => 'Description du produit 8',
                'prix' => '50.00',
                'first_image' => '4.jpg',
                'second_image' => '8.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 9',
                'description' => 'Description du produit 9',
                'prix' => '33.00',
                'first_image' => '5.jpg',
                'second_image' => '8.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Produit 10',
                'description' => 'Description du produit 10',
                'prix' => '40.00',
                'first_image' => '6.jpg',
                'second_image' => '8.jpg',
                'third_image' => '2.jpg',
                'categorie_id' => 1,
                'statut_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
