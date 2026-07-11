<?php
namespace App\Http\Controllers;
use App\Models\Contant;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Models\General;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;
use App\Mail\ProjectMail;
use App\Models\ProjectEnquiry;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Validator;
class HomeProjectController extends Controller
{
public function projectcategories(){
$contant = Contant::where('title', 1)->first();     
$categories = ProjectCategory::where('status',1)->orderBy('sort_order','ASC')->get();
return view('projects',compact('categories','contant'));
}

public function projectbycategories($id){
$info = ProjectCategory::where('slug_url', $id)->first();   
if(is_null($info)){ abort(404); } else { 
$projcats = Project::whereRaw("find_in_set('$info->id',cat_id)")->where('status',1)->orderBy('sort_order','ASC')->get();
return view('projects',compact('info','projcats'));
}
}

public function projectdetails($id = null){
$info = Project::where('slug_url', $id)->firstOrFail();  
$projects = Project::where('status',1)->orderBy('sort_order','ASC')->get();
if(is_null($info)){ abort(404); } else { 
return view('project-detail',compact('info','projects'));
}	
} 
 
public function customizetours(){
$contants = Contant::where('title', 9)->first();   
return view('customize-tour',compact('contants'));   
}
 
public function sendprojects(Request $request){
    $validator = Validator::make($request->all(),[
       'name'       => 'required',
       'email'      => 'required|email',
       'phone'      => 'required|min:10|numeric',
       'city'       => 'required',
       'g-recaptcha-response' => ['required', new ReCaptcha]
       ]);
       if(!$validator->passes()){
           return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
           } else {
       
           $data   = $request->all();    
           $general = General::where('id',1)->first();
           $array= array(
           'name'           => $request->name,
           'email'          => $request->email,
           'phone'          => $request->phone,
           'city'           => $request->city,
           'page_url'       => $request->page_url,
           'messages'       => $request->messages, 
           'title'          => $general->title, 
           'aemail'         => $general->email, 
           'aphone'         => $general->phone,
           'emailto'        => $general->emailto,
           'weburl'         => $general->weburl, 
           'subject'        => "New Project Enquiry"
            );
           ProjectEnquiry::create($data);
           Mail::to($array['aemail'])->cc($array['emailto'])->send(new ProjectMail($array));
           Mail::to($array['email'])->send(new ConfirmMail($array));
           if(Mail::flushMacros()) {
           return response()->json(['status'=> 1, 'msg'=>'Message could not be sent']);   
           } else {
           return response()->json(['status'=>1, 'msg'=>'Email has been sent']);   
           }
          } 	
   } 

 
}
