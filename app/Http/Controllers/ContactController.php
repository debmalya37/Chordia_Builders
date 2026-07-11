<?php
namespace App\Http\Controllers;
use App\Models\Contant;
use App\Mail\ConfirmMail;
use App\Mail\ContactMail;
use App\Models\General;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactEnquiry;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function contactus(){
	$general = General::where('id',1)->first();
	$contant = Contant::where('title', 14)->first();    
	return view('contact-us',compact('contant','general'));
	}
	
	public function testimonials(){
	$testimonials = Testimonial::where('status',9)->get();  
	$contant = Contant::where('title', 5)->first();    
	return view('pages.reviews',compact('contant','testimonials'));
	}


public function sendcontact(Request $request){
$validator = Validator::make($request->all(),[
'name'      => 'required',
'email'     => 'required|email',
'phone' 	=> 'required|min:10|numeric',
'g-recaptcha-response' => ['required', new ReCaptcha]
]);
    if(!$validator->passes()){
    return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
    } else {
	$data   = $request->all();    
	$general = General::where('id',1)->first();
	$array= array(
	'name'         => $request->name,
	'email'        => $request->email,
	'phone' 	   => $request->phone,
	'messages'     => $request->messages, 
	'title'        => $general->title, 
	'aemail'       => $general->email, 
	'aphone'       => $general->phone, 
	'emailto'      => $general->emailto, 
	'weburl'       => $general->weburl, 
	'subject'      => "New Contact Enquiry"
	 );
	ContactEnquiry::create($data);
	Mail::to($array['aemail'])->cc($array['emailto'])->send(new ContactMail($array));
	Mail::to($array['email'])->send(new ConfirmMail($array));
 	if(Mail::failures()) {
	return response()->json(['status'=>1, 'msg'=>'Message could not be sent']);   
	} else {
	return response()->json(['status'=>1, 'msg'=>'Email has been sent']);   
	}
   } 	


}

	}
