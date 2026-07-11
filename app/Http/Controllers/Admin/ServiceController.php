<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\GeneralHelper;

class ServiceController extends Controller{
	public $directory="service_images";  
  	public function create(){
    return view('admin.pages.addservice', ['head' => 'Add CSR']);
    }
    public function store(Request $request){
		$validator = Validator::make($request->all(),[
            'title'         => 'required',
			'slug_url' 		=> 'required|min:5|max:255|unique:services',
			'image'         => 'mimes:jpeg,jpg,png,gif,webp'
        ]); 
		if(!$validator->passes()){
			return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
			}else{
		 
        $data   = $request->all();
		$data["slug_url"] = Str::slug($request->slug_url);
       if ($request->get('front_service'))
 		$data['front_service']=1;
 		else
 		$data['front_service']=0;	
		if(!empty($request->file('image'))){    
		$photo = GeneralHelper::uploadimage($request->file('image'),$this->directory);
		$data['image'] = $photo;
		}
        $user = Service::create($data);
		Service::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
		Service::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
		if($user){
		return response()->json(['status'=>1, 'msg'=>'Record updated successfully']);
		}
	}
	}
		public function service(){
        $datas = Service::orderBy('sort_order', 'ASC')->get();
        return view('admin.pages.service',compact('datas'),['head' => 'CSR']);
    }
	
	
		public function edit($id){
		$get_record= Service::find($id);
		if(!empty($get_record)){
		return view('admin.pages.addservice',compact('get_record'),['head' => 'Edit CSR']);
		}else{
		return redirect()->action('admin\ServiceController@service');
		}
		}
		
		public function update(Request $request){
		$validator = Validator::make($request->all(),[
		'title'         => 'required',
		'slug_url' 		=> 'required|unique:services,slug_url,' . $request->id,
		'image'         => 'mimes:jpeg,jpg,png,gif,webp'
		]); 
		if(!$validator->passes()){
		return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
		}else{
	 
	    $data   = $request->all();
		$data["slug_url"] = Str::slug($request->slug_url);
        if ($request->get('front_service'))
 		$data['front_service']=1;
 		else
 		$data['front_service']=0;	
        $update_record = Service::find($data['id']);
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
	$get_record = Service::find($id);
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
	 
	public function getimages($id)
	{
	$service = Service::find($id);
	$serviceimgs = $service->serviceimages()->get();
	return view('admin.pages.model_service_images',['data' => $service,'serviceimgs' => $serviceimgs]);
	}
  	
	}
 ?>