<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\GeneralHelper;
use App\Models\Event;
use App\Models\EventImage;

class EventController extends Controller
{
    public $directory="event_images"; 
    public $mdirectory="event_more_images";    
    public function create(){
    return view('admin.pages.addevent', ['head' => 'Add event']);
    }
    public function store(Request $request){
    $validator = Validator::make($request->all(),[
    'title'         => 'required',
    'slug_url' 		=> 'required|min:5|max:255|unique:events',
    'image'         => 'mimes:jpeg,jpg,png,gif,webp'
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    $data["slug_url"] = Str::slug($request->slug_url);
    if ($request->get('front'))
    $data['front']=1;
    else
    $data['front']=0;	
    if(!empty($request->file('image'))){    
    $photo = GeneralHelper::uploadimage($request->file('image'),$this->directory);
    $data['image'] = $photo;
    }
    if(!empty($request->file('banner'))){    
    $banner = GeneralHelper::uploadimage($request->file('banner'),$this->directory);
    $data['banner'] = $banner;
    }
    $user = Event::create($data);
    Event::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
    Event::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
    if($user){
    return response()->json(['status'=>1, 'msg'=>'Record created successfully']);
    }
    }
    }
    public function event(){
    $datas = Event::get();
    return view('admin.pages.event',['datas'=>$datas], ['head' => 'events']);
    }
    public function edit($id){
    $get_record= Event::find($id);
    if(!empty($get_record)){
    return view('admin.pages.addevent',['get_record'=>$get_record], ['head' => 'Edit event']);
    }else{
    return redirect()->action('Admin\eventController@event');
    }
    }
    public function update(Request $request){
    $validator = Validator::make($request->all(),[
    'title'         => 'required',
    'slug_url' 		=> 'required|unique:events,slug_url,' . $request->id,
    'image'         => 'mimes:jpeg,jpg,png,gif,webp'
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    $data["slug_url"] = Str::slug($request->slug_url);
    if ($request->get('front'))
    $data['front']=1;
    else
    $data['front']=0;	
    $update_record = Event::find($data['id']);
    if(!empty($update_record)){
    if(!empty($request->file('image'))){    
    $photo = GeneralHelper::uploadimage($request->file('image'),$this->directory);
    $data['image'] = $photo;
    if(!empty($update_record->image) && file_exists(public_path('/').$this->directory.'/'.$update_record->image)){
    unlink(public_path('/').$this->directory.'/'.$update_record->image);
    }
    }
    if(!empty($request->file('banner'))){   
    $banner = GeneralHelper::uploadimage($request->file('banner'),$this->directory);
    $data['banner'] = $banner;
    if(!empty($update_record->banner) && file_exists(public_path('/').$this->directory.'/'.$update_record->banner)){
    unlink(public_path('/').$this->directory.'/'.$update_record->banner);
    }
    }
    $update_record->update($data);
    $update_record->where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
    $update_record->where('id', '=', $update_record->id)->update(['sort_order' => $request->sort_order+1]); 
    return response()->json(['status'=>1, 'msg'=>'Record updated successfully']);
    }
    }
    }
    public function addimages(Request $request){
    $validator = Validator::make($request->all(),[
    'event_id'=> 'required',
    'title'        => 'required',
    'image'        => 'required|mimes:jpeg,jpg,png,gif,webp'
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    if(!empty($request->file('image'))){    
    $photo = GeneralHelper::uploadimage($request->file('image'),$this->mdirectory);
    $data['image'] = $photo;
    }
    $user = EventImage::create($data);
    $data['id'] = $user->id;
    return response()->json(['success'=>1, 'msg'=>'Record updated successfully','datas'=> $data]);
    }
    }
    public function imgdelete($id=null){
    $del_imgs = EventImage::find($id);	
    if(!empty($del_imgs)){
    $del_imgs->delete();
    if(!empty($del_imgs->image)){
    unlink(public_path('/').$this->mdirectory.'/'.$del_imgs->image);
    }
    return response()->json(['status'=>'Record deleted successfully.']);
    } else {
    return response()->json(['status'=>'deleted failed.']);
    }
    }
    public function getimages($id=null)
    {
    $events = Event::find($id);
    $eventimages = $events->eventimages()->get();
    return view('admin.pages.model_event_images',['data' => $events,'eventimages' => $eventimages]);
    }
    public function delete($id=null){
    $del_record = Event::find($id);
    $get_imgs = EventImage::where('event_id', $id)->get();
    if(!empty($del_record)){
    $del_record->delete();
    EventImage::where('event_id',$id)->delete();
    if(!empty($del_record->image)){
    unlink(public_path('/').$this->directory.'/'.$del_record->image);
    }
    if(!empty($del_record->banner)){
    unlink(public_path('/').$this->directory.'/'.$del_record->banner);
    }
    foreach($get_imgs as $imgs){
    unlink(public_path('/').$this->mdirectory.'/'.$imgs->image);
    }
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
