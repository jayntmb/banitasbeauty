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
        Schema::table('commandes', function (Blueprint $table) {
            $table->string('phone_client')->nullable()->after('user_id');
            $table->string('email_client')->nullable()->after('phone_client');
            $table->string('prenom_client')->nullable()->after('user_id');
            $table->string('nom_client')->nullable()->after('prenom_client');
            $table->string('country_client')->nullable()->after('nom_client');
            $table->string('city_client')->nullable()->after('country_client');
            $table->string('delivery_address')->nullable()->after('city_client');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropColumn('phone_client');
            $table->dropColumn('email_client');
            $table->dropColumn('prenom_client');
            $table->dropColumn('nom_client');
            $table->dropColumn('country_client');
            $table->dropColumn('city_client');
            $table->dropColumn('delivery_address');
        });
    }
};
