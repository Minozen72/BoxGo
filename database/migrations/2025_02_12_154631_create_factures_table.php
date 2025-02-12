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
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->date('date_recu');
            $table->date('periode_debut');
            $table->date('periode_fin');
            $table->string('signature');
            $table->date('date_creation');
            $table->string('ville_creation');
            $table->unsignedBigInteger('box_id');
            $table->timestamps();

            // Ajout de la clé étrangère
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
