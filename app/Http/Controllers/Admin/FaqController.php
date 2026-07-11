<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\GeneralHelper;

class FaqController extends Controller{
  	public function create(){
    return view('admin.pages.addfaq', ['head' => 'Add Faq']);
    }

    public function store(Request $request){
		$validator = Validator::make($request->all(),[
            'title'         => 'required',
        ]); 
		if(!$validator->passes()){
		return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
		}else{
	    $data   = $request->all();
	
        $user = Faq::create($data);
		Faq::where('sort_order', '>', $request->sort_order)->update(['sort_order' => DB::raw('sort_order + 1')]);
		Faq::where('id', '=', $user->id)->update(['sort_order' => $request->sort_order+1]); 
		if($user){
		return response()->json(['status'=>1, 'msg'=>'Record updated successfully']);
		}
	}
	}

		public function faq(){
        $datas = Faq::orderBy('sort_order', 'ASC')->get();	
        return view('admin.pages.faq',compact('datas'),['head' => 'Faq']);
    	}
	
	
		public function edit($id){
		$get_record= Faq::find($id);
		if(!empty($get_record)){
		return view('admin.pages.addfaq',compact('get_record'),['head' => 'Edit Faq']);
		}else{
		return redirect()->action('admin\FaqController@faq');
		}
		}
		
        public function update(Request $request){
        $validator = Validator::make($request->all(),[
        'title'         => 'required',
        ]); 
        if(!$validator->passes()){
        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
        $data   = $request->all();
        $update_record = Faq::find($data['id']);
        if(!empty($update_record)){
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
	$del_result = Faq::find($id);
	if(!empty($del_result)){
	$del_result->delete();
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