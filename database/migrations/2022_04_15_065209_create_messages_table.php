<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('profession')->nullable();
            $table->string('societe')->nullable();
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('message');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('id_updated_at')->nullable();
            $table->integer('id_deleted_at')->nullable();
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('admin_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('statut_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
