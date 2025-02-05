<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $imagePath = 'images/banners/b1.jpg';

        // Generate a unique filename with a timestamp
        $filename = time() . '_' . basename($imagePath);

        // Store the image in the public/storage/images/produits directory
        Storage::disk('public')->putFileAs('images/banners', public_path($imagePath), $filename);

        // Store only the filename in the database
        DB::table('banners')->insert([
            'title' => 'Glow Everyday',
            'description' => 'Découvrez notre nouvelle gamme de produits, spécialement formulée pour révéler votre beauté naturelle et vous faire rayonner jour après jour.',
            'image' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
