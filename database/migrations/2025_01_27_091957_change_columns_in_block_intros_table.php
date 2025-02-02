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
            $table->renameColumn('title', 'phrase1');
            $table->string('phrase1')->nullable()->change();

            $table->renameColumn('description', 'phrase2');
            $table->string('phrase2')->nullable()->change();

            $table->string('phrase3')->after('phrase2')->nullable();

            $table->string('image1')->nullable()->change();
            $table->string('video1')->nullable()->change();
            $table->string('image2')->nullable()->change();
            $table->string('video2')->nullable()->change();
            $table->string('image3')->nullable()->change();
            $table->string('video3')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('block_intros', function (Blueprint $table) {
            $table->renameColumn('phrase1', 'title');
            $table->string('title')->nullable(false)->change();

            $table->renameColumn('phrase2', 'description');
            $table->string('description')->nullable(false)->change();

            $table->dropColumn('phrase3');
            $table->string('image1')->nullable(false)->change();
            $table->string('video1')->nullable(false)->change();
            $table->string('image2')->nullable(false)->change();
            $table->string('video2')->nullable(false)->change();
            $table->string('image3')->nullable(false)->change();
            $table->string('video3')->nullable(false)->change();
        });
    }
};