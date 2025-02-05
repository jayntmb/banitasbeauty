<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $this->call([
                StatutSeeder::class,
                RoleSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                BannerSeeder::class,
                BlockIntroSeeder::class,
            ]);

            DB::table('move_bundles')->insert([
                'content' => 'Wonderful skin',
                'created_at' => now(),
                'updated_at'=> now(),
            ]);

            DB::table('block_blacks')->insert([
                'title' => 'Soin de beauté amour de soi',
                'description' => "Offrez-vous le luxe d'une peau radieuse avec nos cosmétiques. Chaque application est une promesse de bien-être et de confiance. Ne laissez pas passer cette chance, commandez maintenant et faites un pas vers l'amour de vous-même !",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }
}
