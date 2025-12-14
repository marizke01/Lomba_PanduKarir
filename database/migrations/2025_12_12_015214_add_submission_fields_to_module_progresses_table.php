<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('module_progresses', function (Blueprint $table) {
            if (! Schema::hasColumn('module_progresses', 'submission_url')) {
                $table->string('submission_url')->nullable()->after('is_completed');
            }

            if (! Schema::hasColumn('module_progresses', 'submission_file_path')) {
                $table->string('submission_file_path')->nullable()->after('submission_url');
            }

            if (! Schema::hasColumn('module_progresses', 'notes')) {
                $table->text('notes')->nullable()->after('submission_file_path');
            }

            if (! Schema::hasColumn('module_progresses', 'status')) {
                $table->string('status')->default('submitted')->after('notes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('module_progresses', function (Blueprint $table) {
            if (Schema::hasColumn('module_progresses', 'submission_url')) {
                $table->dropColumn('submission_url');
            }

            if (Schema::hasColumn('module_progresses', 'submission_file_path')) {
                $table->dropColumn('submission_file_path');
            }

            if (Schema::hasColumn('module_progresses', 'notes')) {
                $table->dropColumn('notes');
            }

            if (Schema::hasColumn('module_progresses', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
