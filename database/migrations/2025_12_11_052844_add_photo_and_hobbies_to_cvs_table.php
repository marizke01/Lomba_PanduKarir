<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('cvs', function (Blueprint $table) {
        $table->text('hobbies')->nullable();
        $table->string('photo_url')->nullable();
    });
}

public function down()
{
    Schema::table('cvs', function (Blueprint $table) {
        $table->dropColumn(['hobbies', 'photo_url']);
    });
}

};
