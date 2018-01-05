<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';
    
    protected $fillable = ['manfac_name'];
    
    public $timestamps = false;
}
