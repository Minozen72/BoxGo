
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
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('rented')->default(false); // Ajouter la colonne 'rented'
            $table->unsignedBigInteger('locataire_id')->nullable(); // Ajouter la colonne 'locataire_id'
            $table->foreign('locataire_id')->references('id')->on('locataires')->onDelete('set null'); // Définir la clé étrangère
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};
