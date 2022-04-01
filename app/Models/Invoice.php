<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    public function order(){

    	return $this->hasOne('App\Models\Order','id','order_id');
    }
}