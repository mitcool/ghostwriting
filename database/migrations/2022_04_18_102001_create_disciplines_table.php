<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinesTable extends Migration
{
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();
            $table->string('name');     
            $table->string('name_de');   
            $table->text('description_de');   
            $table->text('description');  
            $table->string('slug');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplines');
    }
}
