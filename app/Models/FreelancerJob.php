<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerJob extends Model
{
    use HasFactory;

    protected $table = 'freelancer_jobs';
    public $timestamps = false;

    public function job_name(){
    	return $this->hasOne('App\Models\Job','id','job_id');
    }
}
