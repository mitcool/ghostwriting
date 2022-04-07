<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorPrice extends Model
{
    use HasFactory;

    protected $table = 'calculator_prices';
    public $timestamps = false;
}
