<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('phone')->nullable();
            $table->string('phone_code')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('city')->nullable();
            $table->string('avatar')->nullable();
            $table->string('zip')->nullable();
            $table->string('company')->nullable();
            $table->string('vat')->nullable();
            $table->string('skype')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
