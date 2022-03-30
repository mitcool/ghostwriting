<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMilestonesToOrderTable extends Migration
{
   
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->tinyInteger('milestones')->default(1);
            $table->double('price',10,2)->unsigned()->default(0);
        });
    }

   
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
