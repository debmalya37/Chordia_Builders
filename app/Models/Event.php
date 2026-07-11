<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
use HasFactory;
protected $guarded = [];
function experienceimages(){
return $this->hasMany(Event_Image::class,'experience_id','id');
}
   
}
