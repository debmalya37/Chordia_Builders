<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = [];
    function categories(){
    return $this->belongsTo(Gcat::class,'cat_id','id');
    }

    function photosbycates(){
    return $this->hasMany(Gcat::class,'cat_id','id');
    }
    }
