<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('module_progresses', function (Blueprint $table) {
            $table->string('submission_url')->nullable()->after('module_index');
            $table->string('submission_file_path')->nullable()->after('submission_url');
            $table->string('submission_image_path')->nullable()->after('submission_file_path');
            $table->text('notes')->nullable()->after('submission_image_path');
        });
    }

    public function down(): void
    {
        Schema::table('module_progresses', function (Blueprint $table) {
            $table->dropColumn([
                'submission_url',
                'submission_file_path',
                'submission_image_path',
                'notes',
            ]);
        });
    }
};
