<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('slug')->unique()->after('title');
            $table->text('description')->nullable()->after('slug');
            $table->string('category')->after('description');
            $table->string('level')->after('category');
            $table->boolean('is_active')->default(true)->after('level');
        });
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'slug',
                'description',
                'category',
                'level',
                'is_active',
            ]);
        });
    }
};
