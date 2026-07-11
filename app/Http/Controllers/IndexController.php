<?php
namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Cms;
use App\Models\Contant;
use App\Mail\ConfirmMail;
use App\Mail\GeneralMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CareerMail;
use App\Models\GeneralEnquiry;
use App\Models\CareerEnquiry;
use App\Models\General;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Bank;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Rules\ReCaptcha;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Validator;
class IndexController extends Controller
{
public $directory="career_document";   
public function index(){
$general = General::where('id',1)->first();
$aboutus = Cms::where('status',1)->where('front_cms',1)->first();
$banners = Banner::where('status', 1)->orderBy('sort_order','ASC')->limit(10)->get();
$testimonials = Testimonial::where('status', 1)->orderBy('sort_order','ASC')->get();
$categories = ProjectCategory::where('status',1)->where('front_cats',1)->orderBy('sort_order','ASC')->limit(3)->get();
$projects = Project::where('status',1)->where('front_project',1)->orderBy('sort_order','ASC')->limit(8)->get();
$recommended = Project::where('status',1)->where('recommended_project',1)->orderBy('sort_order','ASC')->limit(3)->get();
$blogs = Blog::where('status',1)->orderBy('sort_order','ASC')->limit(4)->get();
$events = Event::where('status',1)->orderBy('sort_order','ASC')->limit(3)->get();
return view('home',compact('general','banners','categories','aboutus','projects','blogs','events','recommended','testimonials'));
}

public function customercorner(){
$contant = Contant::where('title', 6)->first();  
$testimonials  = Testimonial::where('status', 1)->orderBy('sort_order','ASC')->get();
return view('customer-corner',compact('testimonials','contant'));
}

public function faqs(){
$contant = Contant::where('title', 3)->first();  
$faqs  = Faq::where('status', 1)->orderBy('sort_order','ASC')->get();
return view('faq',compact('faqs','contant'));
}

public function nri(){
$contant = Contant::where('title', 13)->first();  
return view('nri',compact('contant'));
}

public function career(){
$contant = Contant::where('title', 11)->first();  
return view('career',compact('contant'));
}

public function csr(){
$contant = Contant::where('title', 11)->first();  
$services = Service::where('status', 1)->orderBy('sort_order','ASC')->get();
return view('csr',compact('services','contant'));
}

public function banking(){
$contant = Contant::where('title', 12)->first();  
$bankings = Bank::where('status',1)->get();
return view('banking',compact('bankings','contant'));
}

public function lifechordia(){
$contant = Contant::where('title', 14)->first(); 
$galleries = Gallery::where('status',1)->where('cat_id',3)->orderBy('sort_order','ASC')->get();
return view('life-chordia',compact('contant','galleries'));
}


public function search(Request $request)
{
$query = $request->input('search');
$room_type = $request->input('room_type');

$results = Project::where('title', 'LIKE', '%'.$query.'%')
->when($room_type, function($query, $room_type) {
return $query->whereIn('title', $room_type);
})
->get();

return response()->json($results);
}

public function csrdetail($id=null){
$info = Service::where('slug_url', $id)->first();    
$services = Service::where('status',1)->orderBy('sort_order','ASC')->get();
if(is_null($info)){ 
return view('errors.404'); 
} else {   
return view('csr',compact('info','services'));
}
}

public function sendcommon(Request $request){
    $validator = Validator::make($request->all(),[
        'name'          => 'required',
        'email'         => 'required|email',
        'phone'         => 'required|min:10|numeric',
        'city'          => 'required',
        'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
            if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
            } else {
            $data   = $request->all();    
            $general = General::where('id',1)->first();
            $array= array(
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'city'         => $request->city,
            'page_url'     => $request->page_url,
            'messages'     => $request->messages, 
            'title'        => $general->title, 
            'aemail'       => $general->email, 
            'aphone'       => $general->phone, 
            'emailto'      => $general->emailto, 
            'weburl'       => $general->weburl, 
            'subject'      => "New Enquiry Received",
             );
            GeneralEnquiry::create($data);
            Mail::to($array['aemail'])->cc($array['emailto'])->send(new GeneralMail($array));
            Mail::to($array['email'])->send(new ConfirmMail($array));
            if(Mail::failures()) {
            return response()->json(['status'=>1, 'msg'=>'Message could not be sent']);   
            } else {
            return response()->json(['status'=>1, 'msg'=>'Email has been sent']);   
            }
           } 	
 
    }



public function careersend(Request $request){
    $validator = Validator::make($request->all(),[
        'name'          => 'required',
        'email'         => 'required|email',
        'phone'         => 'required|min:10|numeric',
        'city'          => 'required',
        'department'    => 'required',
        'resume_file'   => 'mimes:pdf|max:30480',
        'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
            } else {
            $data   = $request->all();    
            if(!empty($request->file('resume_file'))){  
            $resume = GeneralHelper::uploadpdf($request->file('resume_file'),$this->directory);
            $data['resume_file'] = $resume;
            }    
            $general = General::where('id',1)->first();
            $array= array(
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'city'         => $request->city,
            'department'   => $request->department,
            'page_url'     => $request->page_url,
            'messages'     => $request->messages, 
            'title'        => $general->title, 
            'aemail'       => $general->email, 
            'aphone'       => $general->phone, 
            'weburl'       => $general->weburl, 
            'subject'      => "New Career Received",
             );
            CareerEnquiry::create($data);
            Mail::to($array['aemail'])->send(new CareerMail($array));
            Mail::to($array['email'])->send(new ConfirmMail($array));
            if(Mail::failures()) {
            return response()->json(['status'=>1, 'msg'=>'Message could not be sent']);   
            } else {
            return response()->json(['status'=>1, 'msg'=>'Email has been sent']);   
            }
           } 	


}
 
}
