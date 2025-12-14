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
    Schema::table('project_assignments', function (Blueprint $table) {
        if (!Schema::hasColumn('project_assignments', 'submission_url')) {
            $table->string('submission_url')->nullable()->after('project_slug');
        }
        if (!Schema::hasColumn('project_assignments', 'submission_file_path')) {
            $table->string('submission_file_path')->nullable()->after('submission_url');
        }
        if (!Schema::hasColumn('project_assignments', 'submission_image_path')) {
            $table->string('submission_image_path')->nullable()->after('submission_file_path');
        }
        if (!Schema::hasColumn('project_assignments', 'notes')) {
            $table->text('notes')->nullable()->after('submission_image_path');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('project_assignments', function (Blueprint $table) {
        $table->dropColumn(['submission_url','submission_file_path','submission_image_path','notes']);
    });
}

};
