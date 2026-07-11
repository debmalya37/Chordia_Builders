<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\Validator;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\DB;

class BankController extends Controller{
public $directory="bank_images";
public function create(){
return view('admin.pages.addbank', ['head' => 'Add Bank']);
}
public function store(Request $request){
$validator = Validator::make($request->all(),[
'title'         => 'required',
'image'         => 'required|mimes:jpeg,jpg,png,gif,webp'
]); 
if(!$validator->passes()){
return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
}else{
$data   = $request->all();
if(!empty($request->file('image'))){    
$photo = GeneralHelper::uploadimage($request->file('image'),$this->directory);
$data['image'] = $photo;
}
$user = Bank::create($data);
Bank::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
Bank::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
if($user){
return response()->json(['status'=>1, 'msg'=>'Record created successfully']);
}
}
}
public function bank(){
$datas = Bank::orderBy('sort_order', 'ASC')->get();
return view('admin.pages.bank',compact('datas'),['head' => 'Certified']);
}
public function edit($id){
$get_record= Bank::find($id);
if(!empty($get_record)){
return view('admin.pages.addbank',compact('get_record'),['head' => 'Edit Bank']);
}else{
return redirect()->action('admin\BankController@bank');
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
$data   = $request->all();
$update_record = Bank::find($data['id']);
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

if($update_record){
return response()->json(['status'=>1, 'msg'=>'Record updated successfully']);
}
}
}
}
public function delete($id=null){
$get_record= Bank::find($id);
if(!empty($get_record)){
$get_record->delete();
unlink(public_path($this->directory.'/'.$get_record->image));
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'Delete record failed.']);
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