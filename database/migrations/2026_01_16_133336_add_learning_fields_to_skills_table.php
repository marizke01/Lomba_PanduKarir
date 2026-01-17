<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::table('skills', function (Blueprint $table) {

        if (!Schema::hasColumn('skills', 'thumbnail')) {
            $table->string('thumbnail')->nullable();
        }

        if (!Schema::hasColumn('skills', 'intro_youtube_id')) {
            $table->string('intro_youtube_id')->nullable();
        }

        if (!Schema::hasColumn('skills', 'modules')) {
            $table->json('modules')->nullable();
        }

        if (!Schema::hasColumn('skills', 'duration')) {
            $table->string('duration')->nullable();
        }
    });
}


    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn([
                'thumbnail',
                'intro_youtube_id',
                'modules',
                'duration'
            ]);
        });
    }
};

