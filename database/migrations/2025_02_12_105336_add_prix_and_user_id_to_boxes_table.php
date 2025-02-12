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
        Schema::table('boxes', function (Blueprint $table) {
            $table->unsignedBigInteger('proprietaire_id')->default(1)->after('prix'); // Ajoutez une valeur par défaut appropriée

            // Ajout de la clé étrangère
            $table->foreign('proprietaire_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boxes', function (Blueprint $table) {
            $table->dropForeign(['proprietaire_id']);
            $table->dropColumn('proprietaire_id');
        });
    }
};
