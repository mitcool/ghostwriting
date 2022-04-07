<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerSubject extends Model
{
    use HasFactory;

    protected $table = 'freelancer_subjects';
    public $timestamps = false;

    public function subject_name(){
    	return $this->hasOne('App\Models\Subject','id','subject_id');
    }
}
