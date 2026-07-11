<?php

namespace App\Http\Controllers;
use App\Models\Contant;
use App\Models\Gcat;
use App\Models\Video;

class PhotoController extends Controller
{
public function photos(){
$contant = Contant::where('title', 4)->first();   
$photocats = Gcat::where('status',1)->get();   
return view('photos',compact('photocats','contant'));
}

public function photobycates($id){
$contant = Contant::where('title', 2)->first();   
$info = Gcat::where('slug_url',$id)->first();    
return view('photos',compact('info'));
}

public function videos(){
$contant = Contant::where('title', 5)->first();    
$videos = Video::where('status',1)->get();  
return view('videos',compact('videos','contant'));
}
}
