<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PanierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paniers')->insert([
            [
                'user_id' => 1,
                'produit_id' => 1,
                'quantite' => 1,
                'state' => 1,
            ],
            [
                'user_id' => 1,
                'produit_id' => 2,
                'quantite' => 1,
                'state' => 1,
            ],
            [
                'user_id'=> 1,
                'produit_id'=> 3,
                'quantite'=> 1,
                'state'=> 1,
            ],
            [
                'user_id' => 1,
                'produit_id' => 4,
                'quantite' => 5,
                'state' => 1,
            ]
        ]);
    }
}