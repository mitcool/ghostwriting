<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    protected $fillable = ['user_id','phone','phone_code','country_id','city','avatar','zip','company','vat','skype'];
  	public $timestamps = false;
  	
}
