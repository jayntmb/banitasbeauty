<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('block_intros', function (Blueprint $table) {
            $table->string('phrase4')->after('phrase3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('block_intros', function (Blueprint $table) {
            $table->dropColumn('phrase4');
        });
    }
};
