<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gcat extends Model
{
    use HasFactory;
    protected $guarded = [];

   
    function photosbycates(){
    return $this->hasMany(Gallery::class,'cat_id','id');
    }
}
