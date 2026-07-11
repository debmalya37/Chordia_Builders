<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
use HasFactory;
protected $guarded = [];
function projectimages(){
return $this->hasMany(ProjectImage::class,'project_id','id');
}
function poroject_itinerary(){
return $this->hasMany(ProjectItinerary::class,'project_id','id')->orderBy('sort_order','ASC');
}

function project_near_location(){
return $this->hasMany(ProjectNearLocation::class,'project_id','id')->orderBy('sort_order','ASC');
}

function getamenitiesitems(){
return $this->hasMany(ProjectAmenities::class,'project_id','id');
}

}
