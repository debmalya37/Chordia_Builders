<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;
use App\Models\ContactEnquiry;
use App\Models\GeneralEnquiry;
use App\Models\CareerEnquiry;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helpers\GeneralHelper;


class GeneralController extends Controller{
public function create(){
return view('admin.pages.addgeneral', ['head' => 'Add General']);
}

public function store(Request $request){
$validator = Validator::make($request->all(),[
'title'         => 'required',
'image'         => 'required|mimes:jpeg,jpg,png,gif,webp'
]); 
if(!$validator->passes()){
return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
}else{


$data   = $request->all();
if(!empty($request->input('social'))) {	
foreach ($request->input('social') as $key=> $adsocial) {
$array[]=array(
'social_key' 	=>  $key,
'social_title' 	=> 	$adsocial['sotitle'],
'social_url' 	=>  $adsocial['sourl'],
'social_icon' 	=>  $adsocial['soicon'],
'sort_order' 	=>  $adsocial['sort'],
);
}
$data['social_data'] = json_encode($array);
} else {
$data['social_data'] = ""; 
}
$file = $request->file('image');
unset($data['image']);
if(!empty($file)){
$file_arr       = explode(".", $file->getClientOriginalName());
$ext            = array_pop($file_arr);
$image          = Str::slug(implode(".",$file_arr),'_').'_'.time().'.'.$ext;
$file->move(public_path('/').'general_images/',$image);
$data['image'] = $image;
}

$user = General::create($data);
if($user){
return response()->json(['status'=>1, 'msg'=>'Record created successfully']);
}
}
}

public function general(){
$GeneralObj = new General();
$generals = $GeneralObj->get();
return view('admin.pages.general',compact('generals'),['head' => 'General Information']);
}


public function edit($id){
$get_record= General::find($id);
if(!empty($get_record)){
return view('admin.pages.addgeneral',compact('get_record'),['head' => 'Edit General']);
}else{
return redirect()->action('admin\GeneralController@general');
}
}

public function update(Request $request){
$this->validate($request, [
'title'         => 'required',
'image'         => 'mimes:jpeg,jpg,png,gif,webp'

]); 
$data   = $request->all();
$get_record = General::find($data['id']);

if(!empty($request->input('social'))) {	
foreach ($request->input('social') as $key=> $adsocial) {
$array[]=array(
'social_key' 	=>  $key,
'social_title' 	=> 	$adsocial['sotitle'],
'social_url' 	=>  $adsocial['sourl'],
'social_icon' 	=>  $adsocial['soicon'],
'sort_order' 	=>  $adsocial['sort'],
);
}
$data['social_data'] = json_encode($array);
}
else {
$data['social_data'] = "";   
}
$file   = $request->file('image');
unset($data['image']);
if(!empty($file)){
$file_arr       = explode(".", $file->getClientOriginalName());
$ext            = array_pop($file_arr);
$image          = Str::slug(implode(".",$file_arr),'_').'_'.time().'.'.$ext;
$file->move(public_path('/').'general_images/',$image);
$data['image'] = $image;

if(!empty($get_record->image) && file_exists(public_path('/').'general_images/'.$get_record->image)){
unlink(public_path('/').'general_images/'.$get_record->image);
}
}
$get_record->update($data);
if($get_record){
return response()->json(['status'=>1, 'msg'=>'Record updated successfully']);
}
}

public function delete($id){
$get_general = General::find($id);
if(!empty($get_general)){
$get_general->delete();
if(!empty($get_general->image)){
unlink(public_path('/').'general_images/'.$get_general->image);
}
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'Record deleted failed.']);
}
}

public function changeStatus(Request $request)  {
$result=GeneralHelper::status($request->input('id'),$request->input('status'),$request->input('table'));
if($result){
return response()->json(['success'=>'Status change successfully.']);
} else {
return response()->json(['failed'=>'Status failed.']);
}
}

public function quickenquiry(){
$datas = GeneralEnquiry::orderBy('created_at','DESC')->get();
return view('admin.pages.quickenquiry',compact('datas'),['head' => 'Home Enquiries']);
}

public function quickdelete($id){
$get_record = GeneralEnquiry::find($id);
if(!empty($get_record)){
$get_record->delete();
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'Record deleted failed.']);
}
}

public function contactenquiry(){
$datas = ContactEnquiry::orderBy('created_at','DESC')->get();
return view('admin.pages.contact',compact('datas'),['head' => 'Contact Us Enquiry']);
}

public function contactdelete($id){
$get_record = ContactEnquiry::find($id);
if(!empty($get_record)){
$get_record->delete();
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'Record deleted failed.']);
}
}

public function carrerenquiry(){
$datas = CareerEnquiry::orderBy('created_at','DESC')->get();
return view('admin.pages.carrerenquiry',compact('datas'),['head' => 'Carrer Enquiries']);
}

public function carrerdelete($id){
$get_carrer = CareerEnquiry::find($id);
if(!empty($get_carrer)){
$get_carrer->delete();
if(!empty($get_carrer->image)){
unlink(public_path('/').'resume_file/'.$get_carrer->image);
}
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'Record deleted failed.']);
}
}

public function commonenquiry(){
$datas = GeneralEnquiry::get();
return view('admin.pages.commonenquiry',compact('datas'),['head' => 'Enquiries']);
}

public function commondelete($id){
$get_record = GeneralEnquiry::find($id);
if(!empty($get_record)){
$get_record->delete();
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'Record deleted failed.']);
}
}

public function getcommon($id)
{
$datas = GeneralEnquiry::find($id);
return view('admin.pages.common-detail',compact('datas'),['head' => 'General Enquiry']);
}
}
?>