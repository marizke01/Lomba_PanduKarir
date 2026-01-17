<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {

            if (!Schema::hasColumn('skills', 'title')) {
                $table->string('title')->after('id');
            }

            if (!Schema::hasColumn('skills', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }

            if (!Schema::hasColumn('skills', 'description')) {
                $table->text('description')->nullable()->after('slug');
            }

            if (!Schema::hasColumn('skills', 'category')) {
                $table->string('category')->after('description');
            }

            if (!Schema::hasColumn('skills', 'level')) {
                $table->string('level')->after('category');
            }

            if (!Schema::hasColumn('skills', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('level');
            }
        });
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {

            if (Schema::hasColumn('skills', 'is_active')) {
                $table->dropColumn('is_active');
            }

            if (Schema::hasColumn('skills', 'level')) {
                $table->dropColumn('level');
            }

            if (Schema::hasColumn('skills', 'category')) {
                $table->dropColumn('category');
            }

            if (Schema::hasColumn('skills', 'description')) {
                $table->dropColumn('description');
            }

            if (Schema::hasColumn('skills', 'slug')) {
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('skills', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
};
