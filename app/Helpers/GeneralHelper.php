<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GeneralHelper{

public static function Generals(){
return DB::table('generals')->where('id', 1)->first();
}

public static function Contants($id=''){
return DB::table('contants')->where('title', $id)->first();
}

public static function catTitle($table,$field,$id,$returnvalue)
{
$res=DB::table($table)->where($field, $id)->first(); 
return $res->$returnvalue;
}

public static function Cms(){
return DB::table('cms')->where('status', 1)->orderBy('sort_order','ASC')->limit(1)->get();
}

public static function CmsLists(){
return DB::table('cms')->where('status', 1)->orderBy('sort_order','ASC')->get();
}

public static function Categories(){
return DB::table('project_categories')->where('status', 1)->orderBy('sort_order','ASC')->limit(5)->get();
}
 
public static function BlogProjects(){
return DB::table('projects')->where('status', 1)->orderBy('sort_order','ASC')->limit(10)->get();
}

public static function getcontant($title=''){
$array= array(1 => 'Project',2 => 'Events',3 => 'Faq',4 => 'Photo Gallery',5 => 'Video Gallery',6 => 'Testimonial',7 => 'Blog',8 => 'Services',9 => 'Owner',10 => 'Contact',11 => 'CSR',12 => 'Banking',13 => 'NRI',14 => 'Life @ Chordia');
if($title!="")
return $array[$title];
else
return $array;
}

public static function getsections($id=''){
$array=array(1 => 'Video Gallery',2 => 'Guest Reviews');
if($id!="")
return $array[$id];
else
return $array;
}


public static function countries($id=''){
$array=array(1 => 'India',2 => 'International');
if($id!="")
return $array[$id];
else
return $array;
}
	
public static function getsize($title=''){
$array= array(1 => 'Project',2 => 'Project Category',3 => 'Faq',4 => 'Photo Gallery',5 => 'Video Gallery',6 => 'Testimonial',7 => 'Blog',8 => 'Services',9 => 'Banner',10 => 'Contact',11 => 'Event');
if($title!="")
return $array[$title];
else
return $array;
}

public static function sortOrder($id,$table,$field,$title,$orderpos='')
{ 
$positions=DB::table($table)->orderBy('sort_order', 'ASC')->get();
$order_list=array(array(0,"First"));
$selected_pos=-1;
$default_position=$orderpos?$orderpos:"first"; 
foreach($positions as $position)	
{  
if($id==$position->$field)
$selected_pos=count($order_list);
else	
$order_list[]=array($position->sort_order,'After '.$position->$title.'');
}
$selected_pos=($selected_pos==-1 && $default_position=='Last')?count($order_list):$selected_pos;
$lstcounter=1;
foreach($order_list as $ck => $cv)
{
echo "<option value='$cv[0]' ".(($selected_pos==$lstcounter)?" selected='selected' ":"").">$cv[1]</option>";
$lstcounter++;
}
}
	
	public static function sortOrderwhrids($id,$table,$field,$wid,$title,$orderpos='')
	{
	$positions=DB::table($table)->where($field,$wid)->orderBy('sort_order', 'ASC')->get();
	$order_list=array(array(0,"First"));
	$selected_pos=-1;
	$default_position=$orderpos?$orderpos:"first"; 
	foreach($positions as $position)
	{
	if($id==$position->id)
	$selected_pos=count($order_list);
	else	
	$order_list[]=array($position->sort_order,'After '.$position->$title.'');
	}
	$selected_pos=($selected_pos==-1 && $default_position=='Last')?count($order_list):$selected_pos;
	$lstcounter=1;
	foreach($order_list as $ck => $cv)
	{
	echo "<option value='$cv[0]' ".(($selected_pos==$lstcounter)?" selected='selected' ":"").">$cv[1]</option>";
	$lstcounter++;
	}
	} 
	public static function getimagesize($secid=null){
	return DB::table('resize_images')->where('sec_id', $secid)->first();	
	}
	public static function uploadimage($file=null,$dir=null,$sizid=null){
		if(!empty($file)){
		$size = self::getimagesize($sizid);
		$file_arr       = explode(".", $file->getClientOriginalName());
		$ext            = array_pop($file_arr);
		$image          = Str::slug(implode(".",$file_arr),'-').'-'.time().'.'.$ext;
		$image_resize = Image::make($file->getRealPath());
		$file->move(public_path('/').$dir.'/',$image);
		if(!empty($size)){
		$image_resize->resize($size->sec_width,$size->sec_height);
		$image_resize->save(public_path($dir.'/'.$image));
		}
		 return $image;
		} else {
		return null;
		}
		}

	public static function uploadpdf($file=null,$dir=null){
	if(!empty($file)){
	$file_arr       = explode(".", $file->getClientOriginalName());
	$ext            = array_pop($file_arr);
	$image          = Str::slug(implode(".",$file_arr),'-').'-'.time().'.'.$ext;
	$file->move(public_path('/').$dir.'/',$image);
	return $image;
	} else {
	return null;
	}
	} 
   
	public static function status($id,$status,$table)  {
	$get_query = DB::table($table)->where('id', $id)->update(['status' => $status]);
	if($get_query) {
	return true;
	} else {
	return false;
	}
	}
	public static function match($first='',$second='')
	{
	if($first==$second)
	return "selected";
	}
 	}