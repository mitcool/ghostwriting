<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatorPricesTable extends Migration
{
  
    public function up()
    {
        Schema::create('calculator_prices', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_de');
            $table->string('question');
            $table->string('price');
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('calculator_prices');
    }
}
