<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'surname',
        'confirmation_code',
        'password',
        'role',
        'ip',
        'pin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function freelancer(){

        return $this->hasOne('App\Models\Freelancer','user_id','id');
    }

    public function freelancer_jobs(){
        return $this->hasMany('App\Models\FreelancerJob','user_id','id');
    }

     public function freelancer_subjects(){
        return $this->hasMany('App\Models\FreelancerSubject','user_id','id');
    }

     public function freelancer_languages(){
        return $this->hasMany('App\Models\FreelancerLanguage','user_id','id');
    }

    public function details(){

         return $this->hasOne('App\Models\UserDetail','user_id','id');
    }
}
