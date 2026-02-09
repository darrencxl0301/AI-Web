<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->foreignId('base_model_id')->constrained('base_models');
            
            $table->foreignId('dataset_id')->constrained('datasets');
            
            $table->string('job_name');
            
            $table->string('status')->default('pending');
            
            $table->json('hyperparameters')->nullable();
            
            $table->integer('progress')->default(0);
            
            $table->string('fine_tuned_model_path')->nullable();
            
            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('training_jobs');
    }
};
