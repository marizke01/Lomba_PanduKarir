<?php

use Illuminate\Database\Migrations\Migration;

    use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('project_submissions', function (Blueprint $table) {
            $table->string('project_slug')
                  ->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('project_submissions', function (Blueprint $table) {
            $table->dropColumn('project_slug');
        });
    }
};

