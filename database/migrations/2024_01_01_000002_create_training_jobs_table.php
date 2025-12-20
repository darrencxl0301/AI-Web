<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingJobsTable extends Migration
{
    public function up()
    {
        Schema::create('training_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model_type'); // qwen-4b, llama-3b, etc.
            $table->string('dataset_name');
            $table->string('status')->default('queued'); // queued, running, completed, failed
            $table->integer('progress')->default(0); // 0-100
            $table->decimal('loss', 8, 6)->nullable();
            $table->decimal('accuracy', 5, 2)->nullable();
            $table->integer('epochs')->default(3);
            $table->integer('batch_size')->default(8);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->text('error_message')->nullable();
            $table->json('metrics')->nullable(); // For storing training metrics
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_jobs');
    }
}