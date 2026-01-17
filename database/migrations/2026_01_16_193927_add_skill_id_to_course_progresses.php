<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('course_progresses', function (Blueprint $table) {
            // tambah kolom saja, TANPA foreign key
            if (!Schema::hasColumn('course_progresses', 'skill_id')) {
                $table->unsignedBigInteger('skill_id')
                      ->nullable()
                      ->after('user_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('course_progresses', function (Blueprint $table) {
            // jangan drop foreign, karena memang tidak pernah dibuat
            if (Schema::hasColumn('course_progresses', 'skill_id')) {
                $table->dropColumn('skill_id');
            }
        });
    }
};
