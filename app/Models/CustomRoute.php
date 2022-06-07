<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomRoute extends Model
{
    use HasFactory;

    protected $table = 'custom_routes';

    public $timestamps = false;
}
