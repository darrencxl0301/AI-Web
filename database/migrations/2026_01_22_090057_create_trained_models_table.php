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
        Schema::create('trained_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Inventory Assistant v1
            $table->unsignedBigInteger('base_model_id');
            $table->string('status');            // deployed / disabled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trained_models');
    }
};
