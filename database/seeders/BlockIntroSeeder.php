<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlockIntroSeeder extends Seeder
{
    public function run(): void
    {
        $image1Path = 'images/avatars/a.jpg';
        $image2Path = 'images/avatars/a1.jpg';
        $image3Path = 'images/avatars/a2.jpg';

        $video1Path = 'videos/makeup1.mp4';
        $video2Path = 'videos/makeup2.mp4';
        $video3Path = 'videos/makeup3.mp4';

        // Generate a unique filename with a timestamp
        $image1_filename = time() . '_' . basename($image1Path);
        $image2_filename = time() . '_' . basename($image2Path);
        $image3_filename = time() . '_' . basename($image3Path);

        $video1_filename = time() . '_' . basename($video1Path);
        $video2_filename = time() . '_' . basename($video2Path);
        $video3_filename = time() . '_' . basename($video3Path);

        Storage::disk('public')->putFileAs('images/block-intro', public_path($image1Path), $image1_filename);
        Storage::disk('public')->putFileAs('images/block-intro', public_path($image2Path), $image2_filename);
        Storage::disk('public')->putFileAs('images/block-intro', public_path($image3Path), $image3_filename);

        Storage::disk('public')->putFileAs('images/block-intro/videos', public_path($video1Path), $video1_filename);
        Storage::disk('public')->putFileAs('images/block-intro/videos', public_path($video2Path), $video2_filename);
        Storage::disk('public')->putFileAs('images/block-intro/videos', public_path($video3Path), $video3_filename);

        // Store only the filename in the database
        DB::table('block_intros')->insert([
            'phrase1' => 'Des produits premium pour un maquillage professionnel Produits de maquillage premium Banitas',
            'phrase2' => 'Découvrez notre collection exclusive qui répond à toutes vos attentes beauté',
            'phrase3' => 'avec des résultats cliniquement prouvés',
            'phrase4' => 'pour une beauté qui vous ressemble',
            'image1' => $image1_filename,
            'image2' => $image2_filename,
            'image3' => $image3_filename,
            'video1' => $video1_filename,
            'video2' => $video2_filename,
            'video3' => $video3_filename,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
