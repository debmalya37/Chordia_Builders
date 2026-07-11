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
echo Form::model($get_record,array('id'=>'update','class' => 'gallery','url' => 'admin/gallery/update','autocomplete'=>false,'files'=>true,'method'=>'patch'));
echo Form::hidden('id');
} else {
echo Form::open(array('id'=>'create','class' => 'gallery','url' => 'admin/gallery/store','autocomplete'=>false,'files'=>true));
}
?>
<div class="card-body">
<div class="form-group">
<label>Category</label>
<select name="cat_id" class="form-control">
<option value="">Select One</option>
@foreach($categories as $record)
<option  value="{{ $record->id }}" <?php  if(isset($get_record)){ ?> {{ ( $record->id == $get_record->cat_id) ? 'selected' : '' }} <?php } ?> >{{ $record->title }}</option>
@endforeach
</select>
<span class="text-danger small error-text cat_id_error">  </span>
</div> 
<div class="form-group">
<label>Title</label>
<?php echo Form::text('title', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text title_error"> <?php echo $errors->has('title')?$errors->first('title'):''; ?></span>
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
<img width="100" src="<?php echo asset("gallery_images/".$get_record->image."")?>">
<?php }} ?>
<span class="text-danger small error-text image_error"> <?php echo $errors->has('image')?$errors->first('image'):''; ?></span>
</div>
<div class="form-group">
<label>Image Alt [SEO]</label>
<?php echo Form::textarea('alt_tag', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"> <?php echo $errors->has('alt_tag')?$errors->first('alt_tag'):''; ?></span>
</div>


<div class="form-group">
<div class="form-check form-check-flat form-check-primary">
<label class="form-check-label">
<?php echo Form::checkbox('life_chordia[]', '1'); ?>
Life@ Chordia's 
<i class="input-helper"></i></label>
</div>
</div>
 
<div class="form-group">
<label>Sort Order</label>
<select name="sort_order" id="sort_order" class="form-control">
<?php echo GeneralHelper::sortOrder(@$get_record->id,"galleries","id","title");  ?>
</select>
</div>
 <div class="form-group">
<label class="ltitle">Status</label>
<?php echo Form::select('status', array(1 => 'Yes', 0 => 'No'), null, array('class' => 'form-control')); ?>
</div>
<div class="form-group">
<?php echo Form::submit('Submit',['class' => 'btn btn-large btn-primary openbutton']); ?>
</div>
<?php echo Form::close(); ?>
</div>
</div>
@endsection