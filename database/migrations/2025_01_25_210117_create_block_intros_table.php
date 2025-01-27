<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('block_intros', function (Blueprint $table) {
            $table->id();
            $table->text('title'); // Titre du bloc
            $table->text('description'); // Description du bloc
            $table->string('image1'); // Chemin de la première image
            $table->string('video1'); // Chemin de la première vidéo
            $table->string('image2'); // Chemin de la deuxième image
            $table->string('video2'); // Chemin de la deuxième vidéo
            $table->string('image3'); // Chemin de la troisième image
            $table->string('video3'); // Chemin de la troisième vidéo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('block_intros');
    }
};