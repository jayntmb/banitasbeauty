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
            $table->string('promo_type')->default('fixe');
            $table->decimal('promo_value', 10, 2)->nullable();
            $table->datetime('promo_start_date')->nullable();
            $table->datetime('promo_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropColumn('promo_type');
            $table->dropColumn('promo_value');
            $table->dropColumn('promo_start_date');
            $table->dropColumn('promo_end_date');
        });
    }
};