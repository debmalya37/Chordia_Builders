<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\Contant;

class AboutController extends Controller
{
function aboutus($id=null){
$misvis = Cms::whereIn('id', [2, 3])->get();
$info = Cms::where('slug_url', $id)->first();
$owner = Contant::where('title', 13)->first(); 
if(is_null($info)){ abort(404); } else {
return view('cms',compact('info','owner','misvis'));	
} 
}
}
