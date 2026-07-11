<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gcat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\GeneralHelper;
class GcatController extends Controller{
public $directory="gallery_images";  
public function create(){
return view('admin.pages.addgcat', ['head' => 'Add Gallery Category']);
}
public function store(Request $request){
$validator = Validator::make($request->all(),[
'title'         => 'required',
'image'         => 'mimes:jpeg,jpg,png,gif,webp'
]); 
if(!$validator->passes()){
return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
}else{
$data   = $request->all();
$data["slug_url"] = Str::slug($request->slug_url);    
if(!empty($request->file('image'))){    
$photo = GeneralHelper::uploadimage($request->file('image'),$this->directory);
$data['image'] = $photo;
}
$user = Gcat::create($data);
Gcat::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
Gcat::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
if($user){
return response()->json(['status'=>1, 'msg'=>'Record created successfully']);
}
}
}
public function gcat(){
$gcats = Gcat::orderBy('sort_order', 'ASC')->get();
return view('admin.pages.gcat',compact('gcats'),['head' => 'Gallery Category']);
}
 
public function edit($id){
$get_record= Gcat::find($id);
if(!empty($get_record)){
return view('admin.pages.addgcat',compact('get_record'),['head' => 'Edit Gallery Category']);
}else{
return redirect()->action('admin\GcatController@gcat');
}
}

public function update(Request $request){
$validator = Validator::make($request->all(),[
'title'         => 'required',
'image'         => 'mimes:jpeg,jpg,png,gif,webp'
]); 
if(!$validator->passes()){
return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
}else{
$values = [
'title'=>$request->title,
];
$data   = $request->all();
$data["slug_url"] = Str::slug($request->slug_url); 
$update_record = Gcat::find($data['id']);
if(!empty($update_record)){
if(!empty($request->file('image'))){    
$photo = GeneralHelper::uploadimage($request->file('image'),$this->directory);
$data['image'] = $photo;
if(!empty($update_record->image) && file_exists(public_path('/').$this->directory.'/'.$update_record->image)){
unlink(public_path('/').$this->directory.'/'.$update_record->image);
}
}
$update_record->update($data);
$update_record->where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
$update_record->where('id', '=', $update_record->id)->update(['sort_order' => $request->sort_order+1]); 
}
if($update_record){
return response()->json(['status'=>1, 'msg'=>'Record updated successfully']);
}
}
}
public function delete($id){
$get_record = Gcat::find($id);
if(!empty($get_record)){
$get_record->delete();
if(!empty($get_record->image)){
unlink(public_path('/').$this->directory.'/'.$get_record->image);
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

}
?>