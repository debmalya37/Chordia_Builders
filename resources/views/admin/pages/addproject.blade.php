@extends('admin.layouts.app')
@section('content')
<div class="card-body card card-primary">
<div class="card-header">
<h3 class="card-title">{{$head}}</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<?php  
if(isset($get_record)){
echo Form::model($get_record,array('id'=>'update','class' => 'project','url' => 'admin/project/update','autocomplete'=>false,'files'=>true,'method'=>'patch'));
echo Form::hidden('id');
} else { 
echo Form::open(array('id'=>'create','class' => 'project','url' => 'admin/project/store','autocomplete'=>false,'files'=>true)); 
}
?>
<div class="row">
<div class="col-sm-12">
<?php echo Form::submit('Submit',['class' => 'btn btn-success float-right mt-2']); ?>
</div>
</div>

<nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-item nav-link active" data-toggle="tab" href="#tab1" role="tab">General</a>
<a class="nav-item nav-link" data-toggle="tab" href="#tab2" role="tab">Links</a>
<a class="nav-item nav-link" data-toggle="tab" href="#tab3" role="tab">SEO</a>
<a class="nav-item nav-link" data-toggle="tab" href="#tab4" role="tab">Featured</a>
</div>
</nav>
<div class="card-body">
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="tab1" role="tabpanel"> 
<div class="form-group">
<label>Title</label>
<?php echo Form::text('title', null,['class'=>'form-control']); ?>
<span class="text-danger text-small error-text title_error"> </span>
</div>
<div class="form-group">
<label>Slug Url</label>
<?php echo Form::text('slug_url', null,['class'=>'form-control']); ?>
<span class="text-danger text-small error-text slug_url_error"> </span>
</div>

<div class="form-group">
<label>Sub Title</label>
<?php echo Form::text('sub_title', null,['class'=>'form-control']); ?>
<span class="text-danger text-small error-text sub_title_error"> </span>
</div>

<div class="form-group">
<label>Tag Line</label>
<?php echo Form::text('tagline', null,['class'=>'form-control']); ?>
<span class="text-danger text-small error-text tagline_error"> </span>
</div>

<div class="form-group">
<label>Project Overview</label>
<?php echo Form::textarea('project_overview', null,['class'=>'ckeditor']); ?>
<span class="text-danger"> </span>
</div>

<div class="form-group">
<label>Description</label>
<?php echo Form::textarea('description', null,['class'=>'ckeditor']); ?>
<span class="text-danger"> </span>
</div> 

<div class="form-group">
<label>Highlights</label>
<?php echo Form::textarea('highlights', null,['class'=>'ckeditor']); ?>
<span class="text-danger"> </span>
</div> 

<div class="form-group">
<label class="ltitle">Image Upload</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('image',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->image)){ ?>
<img width="100" src="<?php echo asset("project_images/".$get_record->image."")?>">
<?php }} ?>
<span class="text-danger error-text image_error"> </span>
</div>
<div class="form-group">
<label class="ltitle">Banner Upload</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('banner',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->banner)){ ?>
<img width="100" src="<?php echo asset("project_images/".$get_record->banner."")?>">
<?php }} ?>
<span class="text-danger error-text image_error"> </span>
</div>


<div class="form-group">
<label class="ltitle">Logo Upload</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('project_logo',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->project_logo)){ ?>
<img width="100" src="<?php echo asset("project_images/".$get_record->project_logo."")?>">
<?php }} ?>
<span class="text-danger error-text project_logo_error"> </span>
</div>


<div class="form-group">
<label class="ltitle">Brochure Upload</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('brochure_file',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->brochure_file)){ ?>
<a target="__blank" href="<?php echo asset("project_images/$get_record->brochure_file")?>"><img src="{{asset('images/pdf-icon.png')}}" width="50px"></a>    
<?php }} ?>
<span class="text-danger error-text brochure_file_error"> </span>
</div>

<div class="form-group">
<label>Sort Order</label>
<select name="sort_order" id="sort_order" class="form-control">
<?php echo GeneralHelper::sortOrder(@$get_record->id,"projects","id","title");  ?>
</select>
</div>

<div class="form-group">
<div class="form-check form-check-flat form-check-primary">
<label class="form-check-label">
<?php echo Form::checkbox('front_project[]', '1'); ?>
Show Front Project 
<i class="input-helper"></i></label>
</div>
</div>

<div class="form-group">
<div class="form-check form-check-flat form-check-primary">
<label class="form-check-label">
<?php echo Form::checkbox('recommended_project[]', '1'); ?>
New Project Launch
<i class="input-helper"></i></label>
</div>
</div>


<div class="form-group">
<label class="ltitle">Status</label>
<?php echo Form::select('status', array(1 => 'Yes', 0 => 'No'), null, array('class' => 'form-control')); ?>
</div>
</div>
<div class="tab-pane fade" id="tab2" role="tabpanel">  
<label>Select Categories</label>
<div id="product-filter" class="scrollbox"> 
@if($cates)
<?php $cats=''; 
$cats = explode(',',@$get_record->cat_id);?>
@foreach($cates as $category) 
@if(in_array($category->id, $cats))
@php $chk = "checked=checked"; @endphp
@else
@php $chk = ""; @endphp
@endif
<p style='padding:0px; margin:0px;'>
<input type="checkbox" name="cat_id[]" <?php echo @$chk; ?> value="{{$category->id}}">
<strong>{{$category->title}}</strong>  
</p> 
@endforeach
@endif
</div>  

<br>
<label>Releated projects</label>
<div id="product-filter" class="scrollbox"> 
@if($projects)

<?php $cats=''; 
$cats = explode(',',@$get_record->rel_project);?>
@foreach($projects as $relprojects) 
@if(in_array($relprojects->id, $cats))
@php $chk = "checked=checked"; @endphp
@else
@php $chk = ""; @endphp
@endif
<p style='padding:0px; margin:0px;'>
<input type="checkbox" name="rel_project[]" <?php echo @$chk; ?> value="{{$relprojects->id}}">
<strong>{{$relprojects->title}}</strong>  
</p> 
@endforeach
@endif
</div>  

 
</div>
<div class="tab-pane fade" id="tab3" role="tabpanel">  
<div class="form-group">
<label>Title Tag</label>
<?php echo Form::textarea('title_tag', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"></span>
</div>
<div class="form-group">
<label>Canonical Tag</label>
<?php echo Form::textarea('canonical_tag', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"> </span>
</div>
<div class="form-group">
<label>Meta Keywords</label>
<?php echo Form::textarea('meta_keyword', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"> </span>
</div>
<div class="form-group">
<label>Meta Description</label>
<?php echo Form::textarea('meta_description', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"> </span>
</div>
<div class="form-group">
<label>Image Alt [SEO]</label>
<?php echo Form::textarea('alt_tag', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"> </span>
</div>
</div>
<div class="tab-pane fade" id="tab4" role="tabpanel">  
<div class="form-group">
<label>Room Type</label>
<?php echo Form::text('room_type', null,['class'=>'form-control']); ?>
<span class="text-danger error-text room_type_error"> </span>
</div>

<div class="form-group">
<label>Rera No </label>
<?php echo Form::text('rera_no', null,['class'=>'form-control']); ?>
<span class="text-danger error-text rera_no_error"> </span>
</div>

<div class="form-group">
<label>Bigha </label>
<?php echo Form::text('acres', null,['class'=>'form-control']); ?>
<span class="text-danger error-text acres_error"> </span>
</div>

<div class="form-group">
<label>No Of units </label>
<?php echo Form::text('no_units', null,['class'=>'form-control']); ?>
<span class="text-danger error-text no_units_error"> </span>
</div>

<div class="form-group">
<label>No Floor </label>
<?php echo Form::text('no_floor', null,['class'=>'form-control']); ?>
<span class="text-danger error-text no_floor_error"> </span>
</div>

<div class="form-group">
<label>No of Blocks </label>
<?php echo Form::text('no_blocks', null,['class'=>'form-control']); ?>
<span class="text-danger error-text no_blocks_error"> </span>
</div>

<div class="form-group">
<label>City </label>
<?php echo Form::text('location', null,['class'=>'form-control']); ?>
<span class="text-danger error-text location_error"> </span>
</div>

<div class="form-group">
<label>Address</label>
<?php echo Form::text('address', null,['class'=>'form-control']); ?>
<span class="text-danger error-text address_error"> </span>
</div>

<div class="form-group">
<label>Amenities Desc</label>
<?php echo Form::textarea('amenities', null,['class'=>'form-control','rows' => 5, 'cols' => 5]); ?>
<span class="text-danger error-text amenities_error"> </span>
</div>

<div class="form-group">
<label class="ltitle">Amenities Upload</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('amenities_file',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->amenities_file)){ ?>
<a target="__blank" href="<?php echo asset("project_images/$get_record->amenities_file")?>"><img src="{{asset('images/pdf-icon.png')}}" width="50px"></a>    
<?php }} ?>
<span class="text-danger error-text amenities_file_error"> </span>
</div>


<div class="form-group">
<label>Clubhouse Short Desc</label>
<?php echo Form::textarea('clubhouse_text', null,['class'=>'form-control','rows' => 5, 'cols' => 5]); ?>
<span class="text-danger error-text clubhouse_text_error"> </span>
</div>

<div class="form-group">
<label class="ltitle">Clubhouse Image Upload</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('clubhouse_image',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->clubhouse_image)){ ?>
<img width="100" src="<?php echo asset("project_images/".$get_record->clubhouse_image."")?>">
<?php }} ?>
<span class="text-danger error-text image_error"> </span>
</div>


<div class="form-group">
<label>Specifications Short Desc</label>
<?php echo Form::textarea('specifications_text', null,['class'=>'form-control','rows' => 5, 'cols' => 5]); ?>
<span class="text-danger error-text specifications_text_error"> </span>
</div>


<div class="form-group">
<label class="ltitle">Specifications File</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('specification_file',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->specification_file)){ ?>
<a target="__blank" href="<?php echo asset("project_images/$get_record->specification_file")?>"><img src="{{asset('images/pdf-icon.png')}}" width="50px"></a>    
<?php }} ?>
<span class="text-danger error-text small ep_full_pdf_error"> </span>
</div>
 

<div class="form-group">
<label>Floor Plan Short Desc</label>
<?php echo Form::textarea('floor_plans_text', null,['class'=>'form-control','rows' => 5, 'cols' => 5]); ?>
<span class="text-danger error-text floor_plans_text_error"> </span>
</div>
 
<div class="form-group">
<label class="ltitle">Floor Plan File</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('floor_plans_file',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php  if(isset($get_record)){ 
if(!empty($get_record->floor_plans_file)){ ?>
<a target="__blank" href="<?php echo asset("project_images/$get_record->floor_plans_file")?>"><img src="{{asset('images/pdf-icon.png')}}" width="50px"></a>    
<?php }} ?>
<span class="text-danger error-text small ep_full_pdf_error"> </span>
</div>

<div class="form-group">
<label>Location Map</label>
<?php echo Form::text('location_map', null,['class'=>'form-control']); ?>
<span class="text-danger error-text location_map_error"> </span>
</div>
</div>
  
</div>
</div>

<?php echo Form::close(); ?>
</div>
 

@endsection