<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerLanguage extends Model
{
    use HasFactory;

    protected $table = 'freelancer_languages';
    public $timestamps = false;

    public function language_name(){
    	return $this->hasOne('App\Models\Language','id','language_id');
    }
}
