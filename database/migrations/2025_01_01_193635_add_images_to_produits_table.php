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
        Schema::table('produits', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('posologie');
            $table->string('first_image')->after('prix')->nullable();
            $table->string('second_image')->after('first_image')->nullable();
            $table->string('third_image')->after('second_image')->nullable();
            $table->string('video')->after('third_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->string('posologie')->after('prix')->nullable();
            $table->string('image')->after('posologie')->nullable();
            $table->dropColumn('first_image');
            $table->dropColumn('second_image');
            $table->dropColumn('third_image');
            $table->dropColumn('video');
        });
    }
};