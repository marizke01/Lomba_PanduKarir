<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('course_progresses', function (Blueprint $table) {
            if (Schema::hasColumn('course_progresses', 'skill_id')) {
                $table->dropColumn('skill_id');
            }
        });

        Schema::table('module_progresses', function (Blueprint $table) {
            if (Schema::hasColumn('module_progresses', 'skill_id')) {
                $table->dropColumn('skill_id');
            }
        });
    }

    public function down(): void {}
};
