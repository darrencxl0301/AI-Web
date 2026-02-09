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
            $table->string('scheduled_duration')->nullable()->after('started_at');
        });
    }

    public function down(): void
    {
        Schema::table('training_jobs', function (Blueprint $table) {
            $table->dropColumn('scheduled_duration');
        });
    }
};
