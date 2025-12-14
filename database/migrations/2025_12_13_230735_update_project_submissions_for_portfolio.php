<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('project_submissions', function (Blueprint $table) {
            if (!Schema::hasColumn('project_submissions', 'user_id')) {
                $table->foreignId('user_id')
                      ->after('id')
                      ->constrained()
                      ->cascadeOnDelete();
            }

            if (!Schema::hasColumn('project_submissions', 'project_slug')) {
                $table->string('project_slug')->after('user_id');
            }

            if (!Schema::hasColumn('project_submissions', 'title')) {
                $table->string('title')->after('project_slug');
            }

            if (!Schema::hasColumn('project_submissions', 'description')) {
                $table->text('description')->nullable()->after('title');
            }

            if (!Schema::hasColumn('project_submissions', 'result_url')) {
                $table->string('result_url')->after('description');
            }

            if (!Schema::hasColumn('project_submissions', 'status')) {
                $table->string('status')->default('submitted')->after('result_url');
            }
        });
    }

    public function down(): void
    {
        // optional, boleh dikosongin
    }
};
