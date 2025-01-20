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
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('objet')->nullable();
            $table->text('message')->nullable();
            $table->dropColumn('quartier');
            $table->dropColumn('commune');
            $table->dropColumn('pays');
            $table->dropColumn('province');
            $table->dropColumn('ville');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('nom');
            $table->dropColumn('prenom');
            $table->dropColumn('objet');
            $table->dropColumn('message');
            $table->string('quartier')->nullable();
            $table->string('commune')->nullable();
            $table->string('pays')->nullable();
            $table->string('province')->nullable();
            $table->string('ville')->nullable();
        });
    }
};