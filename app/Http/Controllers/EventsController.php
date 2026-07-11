<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Contant;
class EventsController extends Controller
{
public function events(){
$contant = Contant::where('title', 2)->first();       
$events = Event::where('status',1)->orderBy('sort_order','ASC')->get();
return view('events',compact('events','contant'));
}
public function eventdetail($id=null){
$info = Event::where('slug_url', $id)->first();    
$events = Event::where('status',1)->orderBy('sort_order','ASC')->get();
if(is_null($info)){ 
return view('errors.404'); 
} else {   
return view('events',compact('info','events'));
}
}
}
