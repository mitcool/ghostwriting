<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextEnsTable extends Migration
{

    public function up()
    {
        Schema::create('texts_en', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->string('page');
            $table->tinyInteger('ckeditor');
        });
    }

    public function down()
    {
        Schema::dropIfExists('texts_en');
    }
}
