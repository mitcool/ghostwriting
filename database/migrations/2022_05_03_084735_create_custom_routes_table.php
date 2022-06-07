<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_routes', function (Blueprint $table) {
            $table->id();
            $table->string('url_en');
            $table->string('url_de');
            $table->string('name_en');
            $table->string('name_de');
            $table->string('action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_routes');
    }
}
