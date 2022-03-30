<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToUserDetails extends Migration
{
   
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('address')->nullable();
        });
    }

    
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
        });
    }
}
