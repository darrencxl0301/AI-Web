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
        Schema::table('datasets', function (Blueprint $table) {
            if (!Schema::hasColumn('datasets', 'status')) {
                $table->string('status')->default('pending')->after('file_path');
            }

            if (!Schema::hasColumn('datasets', 'admin_note')) {
                $table->text('admin_note')->nullable()->after('status');
            }

            if (!Schema::hasColumn('datasets', 'preprocessed_path')) {
                $table->string('preprocessed_path')->nullable()->after('admin_note');
            }
        });
    }

    public function down(): void
    {
        Schema::table('datasets', function (Blueprint $table) {
            $table->dropColumn(['status', 'admin_note', 'preprocessed_path']);
        });
    }
};
