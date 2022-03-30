<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function details(){
    	return $this->hasMany('App\Models\OrderDetail','order_id','id');
    }

    public function invoices(){
    	return $this->hasMany('App\Models\Invoice','order_id','id');
    }
}
