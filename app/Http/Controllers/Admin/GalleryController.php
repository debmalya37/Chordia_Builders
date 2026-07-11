<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Gcat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\GeneralHelper;
class GalleryController extends Controller{
	public $directory="gallery_images";  
	public function create(){
		$categories = Gcat::all();
        return view('admin.pages.addgallery',compact('categories'),['head' => 'Add Gallery']);
    }
    public function store(Request $request){
		$validator = Validator::make($request->all(),[
            'cat_id'        => 'required',
		    'title'         => 'required',
			'image'         => 'required|mimes:jpeg,jpg,png,gif,webp'
        ]); 
		if(!$validator->passes()){
			return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
			}else{
	    $data   = $request->all();
        if ($request->get('life_chordia'))
        $data['life_chordia']=1;
        else
        $data['life_chordia']=0;	
		if(!empty($request->file('image'))){    
		$photo = GeneralHelper::uploadimage($request->file('image'),$this->directory);
		$data['image'] = $photo;
		}
	 	$user = Gallery::create($data);
		Gallery::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
		Gallery::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
		if($user){
		return response()->json(['status'=>1, 'msg'=>'Record created successfully']);
		}
	}
	}
		public function gallery(){
		$gcats = Gcat::all();
        $datas = Gallery::with('categories')->orderBy('sort_order', 'ASC')->get();
        return view('admin.pages.gallery',compact('datas','gcats'),['head' => 'Gallery']);
    }
	
	
		public function edit($id){
		$categories = Gcat::all();	
		$get_record= Gallery::find($id);
		if(!empty($get_record)){
		return view('admin.pages.addgallery',compact('categories','get_record'),['head'=>"Edit Gallery"]);
		}else{
		return redirect()->action('admin\GalleryController@gallery');
		}
		}
		
		public function update(Request $request){
			$validator = Validator::make($request->all(),[
		  	'cat_id'        => 'required',
			'title'         => 'required',
			'image'         => 'mimes:jpeg,jpg,png,gif,webp'
		]); 
		if(!$validator->passes()){
			return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
			}else{
			 
	    $data   = $request->all();
        $update_record = Gallery::find($data['id']);
        
        if ($request->get('life_chordia'))
        $data['life_chordia']=1;
        else
        $data['life_chordia']=0;
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
		$get_record = Gallery::find($id);
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
		
		public function findgall(Request $request){
	 	$find_record= Gallery::find($request);
	 	if(!empty($find_record)){
		return view('admin.pages.findgall',['find_record'=>$find_record]);
		}else{
		return redirect()->action('admin\GalleryController@gallery');
		}
		}
		
 }
 ?>