<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileAndInvoiceNumberToInvoicesTable extends Migration
{
   
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('invoice_number');
            $table->string('file')->nullable();
        });
    }


    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
}
