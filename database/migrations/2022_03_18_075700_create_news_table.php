<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_de');
            $table->text('description_en');
            $table->text('description_de');
            $table->string('picture');
            $table->string('slug_en');
            $table->string('slug_de');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
