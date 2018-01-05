<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $table = 'measures';
    
    protected $fillable = ['meas_name'];
    
    public $timestamps = false;
}
