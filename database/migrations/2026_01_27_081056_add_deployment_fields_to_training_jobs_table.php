<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('training_jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('training_jobs', 'is_published')) {
                $table->boolean('is_published')->default(false)->after('status');
            }

            if (!Schema::hasColumn('training_jobs', 'admin_api_key')) {
                $table->string('admin_api_key')->nullable()->after('is_published');
            }

            if (!Schema::hasColumn('training_jobs', 'system_prompt')) {
                $table->text('system_prompt')->nullable()->after('admin_api_key');
            }

            if (!Schema::hasColumn('training_jobs', 'user_prompt')) {
                $table->text('user_prompt')->nullable()->after('system_prompt');
            }
        });
    }

    public function down(): void
    {
        Schema::table('training_jobs', function (Blueprint $table) {
            $table->dropColumn(['is_published', 'admin_api_key', 'system_prompt', 'user_prompt']);
        });
    }
};