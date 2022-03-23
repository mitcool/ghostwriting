<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $table = 'freelancers';
    public $timestamps = false;

    public function jobs(){
    	return $this->hasMany('App\Models\FreelancerJob','user_id','id');
    }
    
    public function subjects(){
    	return $this->hasMany('App\Models\FreelancerSubject','user_id','id');
    }

    public function languages(){
    	return $this->hasMany('App\Models\FreelancerLanguage','user_id','id');
    }
}
