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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('monthly_price');
            $table->foreignId('box_id')->constrained('boxes');
            $table->foreignId('tenant_id')->constrained('tenants');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('contract_model_id')->constrained('contract_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
