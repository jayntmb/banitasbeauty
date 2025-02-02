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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_line1'); // "Glow"
            $table->string('title_line2'); // "Everyday"
            $table->text('description');   // Description sous le titre
            $table->string('button_text'); // Texte du bouton
            $table->string('button_link'); // Lien du bouton
            $table->string('image');       // Chemin de l'image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};