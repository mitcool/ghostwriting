<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('company_phone');
            $table->string('contact_phone');
            $table->string('zip');
            $table->string('city');
            $table->string('country');
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_details');
    }
}
