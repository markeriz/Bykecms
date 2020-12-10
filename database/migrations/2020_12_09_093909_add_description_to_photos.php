<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToPhotos extends Migration
{
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
