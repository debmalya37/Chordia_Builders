<?php
namespace App\Http\Controllers;
use App\Models\Contant;
use App\Models\Service;
class ServicesController extends Controller
{
public function services(){
$contant = Contant::where('title', 7)->first();  
$services = Service::where('status',1)->orderBy('sort_order', 'ASC')->get();
return view('pages.services',compact('services','contant'));
}

function servicedetails($id=null){
$info = Service::where('slug_url', $id)->first();
if(is_null($info)){ abort(404); } else {
return view('pages.services',['info' => $info,]);	
} 
}
}
