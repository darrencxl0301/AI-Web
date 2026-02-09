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
        Schema::table('training_jobs', function (Blueprint $table) {
            $table->text('system_prompt')->nullable(); 
            $table->text('user_prompt')->nullable();   
            $table->json('config_parameters')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_jobs', function (Blueprint $table) {
            //
        });
    }
};
