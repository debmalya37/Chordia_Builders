<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\GeneralHelper;
use App\Models\Project;
use App\Models\ProjectAmenities;
use App\Models\ProjectCategory;
use App\Models\ProjectEnquiry;
use App\Models\ProjectImage;
use App\Models\ProjectNearLocation;
use App\Models\ProjectItinerary;

class ProjectController extends Controller
{
public $directory="project_images";    
public $itidirectory="project_floor_images";
public $tmdirectory="project_more_images";
public $ameirectory="amenities_more_images";

public function create(){
$cates = ProjectCategory::all();  
$projects = Project::all();
return view('admin.pages.addproject',compact('projects','cates'),['head' => 'Add Project']);
}

public function store(Request $request){
$validator = Validator::make($request->all(),[
'title'         => 'required',
'slug_url' 		=> 'required|min:5|max:255|unique:projects',
'image'         => 'mimes:jpeg,jpg,png,gif,webp',
'banner'        => 'mimes:jpeg,jpg,png,gif,webp',
'clubhouse_image'=> 'mimes:jpeg,jpg,png,gif,webp',
'specification_file'=> 'mimes:pdf|max:20480',
'floor_plans_file'=> 'mimes:pdf|max:20480',
'amenities_file'=> 'mimes:pdf|max:20480',
'brochure_file'=> 'mimes:pdf|max:30480',
'project_logo'=> 'mimes:jpeg,jpg,png,gif,webp',
]); 

if(!$validator->passes()){
return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
}else{
$data   = $request->all();
if(!empty($request->get('cat_id'))){
$data['cat_id'] = implode(",", $request->get('cat_id'));  
} else {
$data['cat_id'] = '';  	
}
if(!empty($request->get('rel_projects'))){
$data['rel_projects'] = implode(",", $request->get('rel_projects'));  
} else { $data['rel_projects'] = '';  }
 
$data["slug_url"] = Str::slug($request->slug_url);

if ($request->get('front_project'))
$data['front_project']=1;
else
$data['front_project']=0;	

if ($request->get('recommended_project')) 
$data['recommended_project']=1; 
else 
$data['recommended_project']=0;

if(!empty($request->file('image'))){    
$photo = GeneralHelper::uploadimage($request->file('image'),$this->directory,1);
$data['image'] = $photo;
}
if(!empty($request->file('banner'))){    
$banner = GeneralHelper::uploadimage($request->file('banner'),$this->directory);
$data['banner'] = $banner;
}

if(!empty($request->file('clubhouse_image'))){   
$clubhouse = GeneralHelper::uploadimage($request->file('clubhouse_image'),$this->directory);
$data['clubhouse_image'] = $clubhouse;
}
if(!empty($request->file('specification_file'))){   
$specification = GeneralHelper::uploadpdf($request->file('specification_file'),$this->directory);
$data['specification_file'] = $specification;
}

if(!empty($request->file('floor_plans_file'))){   
$floorplans = GeneralHelper::uploadpdf($request->file('floor_plans_file'),$this->directory);
$data['floor_plans_file'] = $floorplans;
}

if(!empty($request->file('amenities_file'))){   
$amenitiesfile = GeneralHelper::uploadpdf($request->file('amenities_file'),$this->directory);
$data['amenities_file'] = $amenitiesfile;
}

if(!empty($request->file('brochure_file'))){   
$brochurefile = GeneralHelper::uploadpdf($request->file('brochure_file'),$this->directory);
$data['brochure_file'] = $brochurefile;
}

if(!empty($request->file('project_logo'))){   
$brochurefile = GeneralHelper::uploadimage($request->file('project_logo'),$this->directory);
$data['project_logo'] = $brochurefile;
}

$user = Project::create($data);
//dd($user->id);
Project::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
Project::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
if($user){
return response()->json(['status'=>1, 'msg'=>'Record created successfully']);
}
}
}

public function project(){
$ids = (!empty($_GET["cat_id"])) ? ($_GET["cat_id"]) : ('');
$cates = ProjectCategory::all();      
if(!empty($ids)) {
$datas = Project::whereRaw("find_in_set($ids,cat_id)")->paginate(100);	
} else {
$datas = Project::orderBy('sort_order', 'ASC')->paginate(100);	
}
return view('admin.pages.project',compact('datas','cates'),['head' => 'Project']);
}

public function edit($id){
$get_record= Project::find($id);
$cates = ProjectCategory::all(); 
$projects = Project::all();
if(!empty($get_record)){
return view('admin.pages.addproject',compact('get_record','projects','cates'),['head' => 'Edit Project']);
}else{
return redirect()->action('admin\ProjectController@project');
}
}
 

public function update(Request $request){
$validator = Validator::make($request->all(),[
'title'         => 'required',
'slug_url' 		=> 'required|unique:projects,slug_url,' . $request->id,
'banner'        => 'mimes:jpeg,jpg,png,gif,webp',
'clubhouse_image'=> 'mimes:jpeg,jpg,png,gif,webp',
'specification_file'=> 'mimes:pdf|max:20480',
'floor_plans_file'=> 'mimes:pdf|max:20480',
'amenities_file'=> 'mimes:pdf|max:20480',
'brochure_file'=> 'mimes:pdf|max:30480',
'project_logo'=> 'mimes:jpeg,jpg,png,gif,webp',
]); 
if(!$validator->passes()){
return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
} else {
$data   = $request->all();
if(!empty($request->get('cat_id'))){
$data['cat_id'] = implode(",", $request->get('cat_id'));  
} else {
$data['cat_id'] = '';  	
}
if(!empty($request->get('rel_projects'))){
$data['rel_projects'] = implode(",", $request->get('rel_projects'));  
} else {
$data['rel_projects'] = '';  	
}
$data["slug_url"] = Str::slug($request->slug_url);

if ($request->get('front_project'))
$data['front_project']=1;
else
$data['front_project']=0;	

if ($request->get('recommended_project')) 
$data['recommended_project']=1; 
else 
$data['recommended_project']=0;
 

$update_record = Project::find($data['id']);
if(!empty($update_record)){
if(!empty($request->file('image'))){    
$photo = GeneralHelper::uploadimage($request->file('image'),$this->directory,1);
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
if(!empty($request->file('clubhouse_image'))){   
$clubhouse = GeneralHelper::uploadimage($request->file('clubhouse_image'),$this->directory);
$data['clubhouse_image'] = $clubhouse;
if(!empty($update_record->clubhouse_image) && file_exists(public_path('/').$this->directory.'/'.$update_record->clubhouse_image)){
unlink(public_path('/').$this->directory.'/'.$update_record->clubhouse_image);
}
}

 

if(!empty($request->file('specification_file'))){   
$specification = GeneralHelper::uploadpdf($request->file('specification_file'),$this->directory);
$data['specification_file'] = $specification;
if(!empty($update_record->specification_file) && file_exists(public_path('/').$this->directory.'/'.$update_record->specification_file)){
unlink(public_path('/').$this->directory.'/'.$update_record->specification_file);
}
}


if(!empty($request->file('floor_plans_file'))){   
$floorplans = GeneralHelper::uploadpdf($request->file('floor_plans_file'),$this->directory);
$data['floor_plans_file'] = $floorplans;
if(!empty($update_record->floor_plans_file) && file_exists(public_path('/').$this->directory.'/'.$update_record->floor_plans_file)){
unlink(public_path('/').$this->directory.'/'.$update_record->floor_plans_file);
}
}

if(!empty($request->file('amenities_file'))){   
$amenitiesfile = GeneralHelper::uploadpdf($request->file('amenities_file'),$this->directory);
$data['amenities_file'] = $amenitiesfile;
if(!empty($update_record->amenities_file) && file_exists(public_path('/').$this->directory.'/'.$update_record->amenities_file)){
unlink(public_path('/').$this->directory.'/'.$update_record->amenities_file);
}
}

if(!empty($request->file('brochure_file'))){   
$brochurefile = GeneralHelper::uploadpdf($request->file('brochure_file'),$this->directory);
$data['brochure_file'] = $brochurefile;
if(!empty($update_record->brochure_file) && file_exists(public_path('/').$this->directory.'/'.$update_record->brochure_file)){
unlink(public_path('/').$this->directory.'/'.$update_record->brochure_file);
}
}


if(!empty($request->file('project_logo'))){   
$logo = GeneralHelper::uploadimage($request->file('project_logo'),$this->directory);
$data['project_logo'] = $logo;
if(!empty($update_record->project_logo) && file_exists(public_path('/').$this->directory.'/'.$update_record->project_logo)){
unlink(public_path('/').$this->directory.'/'.$update_record->project_logo);
}
}

$update_record->update($data);
$update_record->where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
$update_record->where('id', '=', $update_record->id)->update(['sort_order' => $request->sort_order+1]); 
return response()->json(['status'=>1, 'msg'=>'Record updated successfully']);
}
}
}

public function delete($id){
$del_record = Project::find($id);
$del_img= ProjectImage::where('project_id', '=', $id);
$get_imgs = ProjectImage::where('project_id', $id)->get();
$del_imgss = ProjectItinerary::where('project_id', '=', $id);
$del_near = ProjectNearLocation::where('project_id', '=', $id);
if(!empty($del_record)){
$del_record->delete();
$del_img->delete();
$del_imgss->delete();
$del_near->delete();
if(!empty($del_record->image)){
unlink(public_path('/').$this->directory.'/'.$del_record->image);
}
if(!empty($del_record->banner)){
unlink(public_path('/').$this->directory.'/'.$del_record->banner);
}
if(!empty($del_record->specification_file)){
unlink(public_path('/').$this->directory.'/'.$del_record->specification_file);
}
if(!empty($del_record->floor_plans_file)){
unlink(public_path('/').$this->directory.'/'.$del_record->floor_plans_file);
}
if(!empty($del_record->clubhouse_image)){
unlink(public_path('/').$this->directory.'/'.$del_record->clubhouse_image);
}
if(!empty($del_record->amenities_file)){
unlink(public_path('/').$this->directory.'/'.$del_record->amenities_file);
}
if(!empty($del_record->brochure_file)){
unlink(public_path('/').$this->directory.'/'.$del_record->brochure_file);
}
foreach($get_imgs as $imgs){
unlink(public_path('/').$this->tmdirectory.'/'.$imgs->image);
}
foreach($del_imgss as $imgss){
unlink(public_path('/').$this->itidirectory.'/'.$imgss->image);
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


public function addimages(Request $request){
    $validator = Validator::make($request->all(),[
    'project_id'     => 'required',
    'title'       => 'required',
    'image'       => 'required|mimes:jpeg,jpg,png,gif,webp'
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    $file = $request->file('image');
    unset($data['image']);
    if(!empty($file)){
    $file_arr       = explode(".", $file->getClientOriginalName());
    $ext            = array_pop($file_arr);
    $image          = Str::slug(implode(".",$file_arr),'_').'_'.time().'.'.$ext;
    $file->move(public_path('/').'project_more_images/',$image);
    $data['image'] = $image;
    }
    $user = ProjectImage::create($data);
    $data['id'] = $user->id;
    return response()->json(['success'=>1, 'msg'=>'Record updated successfully','datas'=>$data]);
    }
}

public function imgdelete($id){
$del_imgs = ProjectImage::find($id);	
if(!empty($del_imgs)){
$del_imgs->delete();
if(!empty($del_imgs->image)){
unlink(public_path('/').$this->tmdirectory.'/'.$del_imgs->image);
}
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'deleted failed.']);
}
}


public function additinerary(Request $request){
    $validator = Validator::make($request->all(),[
    'project_id'  => 'required',
    'title'    => 'required',
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    $file = $request->file('image');
    unset($data['image']);
    if(!empty($file)){
    $file_arr       = explode(".", $file->getClientOriginalName());
    $ext            = array_pop($file_arr);
    $image          = Str::slug(implode(".",$file_arr),'_').'_'.time().'.'.$ext;
    $file->move(public_path('/').$this->itidirectory.'/',$image);
    $data['image'] = $image;
    }
    $user = ProjectItinerary::create($data);
    $data['id'] = $user->id;
    ProjectItinerary::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
    ProjectItinerary::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
    return response()->json(['success'=>1, 'msg'=>'Record updated successfully','datas'=>$data]);
    }
}

    public function getitinerary($id)
    {
    $projectid = Project::find($id);
    $projectitinerary = $projectid->poroject_itinerary()->orderBy('sort_order','ASC')->get();
    return view('admin.pages.add_project_itinerary',['data' => $projectid,'projectitinerary' => $projectitinerary,'head' => 'Add Floor']);
    }

    public function edititinerary($id){
    $get_record= ProjectItinerary::find($id);
    if(!empty($get_record)){
    return view('admin.pages.edit_itinerary_images',['get_record'=>$get_record], ['head' => 'Edit Floor']);
    }else{
    return redirect()->action('admin\ProjectController@project');
    }
    }


    public function updateitinerary(Request $request){
    $validator = Validator::make($request->all(),[
    'project_id'  => 'required',
    'title'    => 'required',
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    $update_record = ProjectItinerary::find($data['id']);
    if(!empty($update_record)){
    if(!empty($request->file('image'))){   
    $image = GeneralHelper::uploadimage($request->file('image'),$this->itidirectory);
    $data['image'] = $image;
    if(!empty($update_record->image) && file_exists(public_path('/').$this->itidirectory.'/'.$update_record->image)){
    unlink(public_path('/').$this->itidirectory.'/'.$update_record->image);
    }
    }
    $update_record->update($data);
    $update_record->where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
    $update_record->where('id', '=', $update_record->id)->update(['sort_order' => $request->sort_order+1]); 
    return response()->json(['success'=>1, 'msg'=>'Record updated successfully','datas'=>$data]);
    }
}
}

public function getimages($id)
{
$projects = Project::find($id);
$projectsimages = $projects->projectimages()->get();
return view('admin.pages.model_project_images',['data' => $projects,'projectsimages' => $projectsimages]);
}

public function itinerarydelete($id){
$del_imgs = ProjectItinerary::find($id);	
if(!empty($del_imgs)){
$del_imgs->delete();
if(!empty($del_imgs->image)){
unlink(public_path('/').'project_itinerary_images/'.$del_imgs->image);
}
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'deleted failed.']);
}
}



public function addnearlocation(Request $request){
    $validator = Validator::make($request->all(),[
    'project_id'  => 'required',
    'title'    => 'required',
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    $user = ProjectNearLocation::create($data);
    $data['id'] = $user->id;
    ProjectNearLocation::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
    ProjectNearLocation::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
    return response()->json(['success'=>1, 'msg'=>'Record updated successfully','datas'=>$data]);
    }
}

    public function getnearlocation($id)
    {
    $projectid = Project::find($id);
    $projectnearlocs = $projectid->poroject_near_location()->orderBy('sort_order','ASC')->get();
    return view('admin.pages.add_near_location',['data' => $projectid,'projectnearlocation' => $projectnearlocs,'head' => 'Add Near Location']);
    }

    public function editnearlocation($id){
    $get_record= ProjectNearLocation::find($id);
    if(!empty($get_record)){
    return view('admin.pages.edit_near_location',['get_record'=>$get_record], ['head' => 'Edit Near Location']);
    }else{
    return redirect()->action('admin\ProjectController@project');
    }
    }


    public function updatenearlocation(Request $request){
    $validator = Validator::make($request->all(),[
    'project_id'  => 'required',
    'title'    => 'required',
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    $update_record = ProjectNearLocation::find($data['id']);
    if(!empty($update_record)){
    if(!empty($request->file('image'))){   
    $image = GeneralHelper::uploadimage($request->file('image'),$this->itidirectory);
    $data['image'] = $image;
    if(!empty($update_record->image) && file_exists(public_path('/').$this->itidirectory.'/'.$update_record->image)){
    unlink(public_path('/').$this->itidirectory.'/'.$update_record->image);
    }
    }
    $update_record->update($data);
    $update_record->where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
    $update_record->where('id', '=', $update_record->id)->update(['sort_order' => $request->sort_order+1]); 
    return response()->json(['success'=>1, 'msg'=>'Record updated successfully','datas'=>$data]);
    }
}
}

public function nearlocationdelete($id){
$del_record = ProjectNearLocation::find($id);	
if(!empty($del_record)){
$del_record->delete();
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'deleted failed.']);
}
}

public function projectenquiry(){
$datas = ProjectEnquiry::get();
return view('admin.pages.project-enquiry',compact('datas'),['head' => 'Project Enquiry']);
}

public function projectdelete($id){
$get_record = ProjectEnquiry::find($id);
if(!empty($get_record)){
$get_record->delete();
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'Record deleted failed.']);
}
}

public function getprojectenqiry($id)
{
$datas = ProjectEnquiry::find($id);
return view('admin.pages.project-enquiry-detail',compact('datas'),['head' => 'Project Enquiry']);
}
 

public function getamenities($id)
{
$projects = Project::find($id);
$projectamenities = $projects->getamenitiesitems()->get();
return view('admin.pages.model_getamenities_images',['data' => $projects,'projectamenities' => $projectamenities]);
}

public function addamenities(Request $request){
    $validator = Validator::make($request->all(),[
    'project_id'  => 'required',
    'title'       => 'required',
    'image'       => 'mimes:svg|max:2048'
    ]); 
    if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{
    $data   = $request->all();
    if(!empty($request->file('image'))){   
    $image = GeneralHelper::uploadpdf($request->file('image'),$this->ameirectory);
    $data['image'] = $image;
    }
    $user = ProjectAmenities::create($data);
    $data['id'] = $user->id;
    return response()->json(['success'=>1, 'msg'=>'Record updated successfully','datas'=>$data]);
    }
}

public function amenitiesdelete($id){
$del_imgs = ProjectAmenities::find($id);	
if(!empty($del_imgs)){
$del_imgs->delete();
if(!empty($del_imgs->image)){
unlink(public_path('/').$this->ameirectory.'/'.$del_imgs->image);
}
return response()->json(['status'=>'Record deleted successfully.']);
} else {
return response()->json(['status'=>'deleted failed.']);
}
}


}
