<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('model_name');
            $table->text('user_message');
            $table->text('ai_response');
            $table->string('session_id')->nullable();
            $table->json('metadata')->nullable(); // For storing additional info like response time, tokens, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}