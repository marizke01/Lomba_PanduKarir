<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->after('level');
            $table->string('intro_youtube_id')->nullable()->after('thumbnail');
        });
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn(['thumbnail', 'intro_youtube_id']);
        });
    }
};
