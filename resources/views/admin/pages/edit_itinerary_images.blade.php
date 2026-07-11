@extends('admin.layouts.app')
@section('content')
<div class="card-body card card-primary">
<div class="card-header">
<h3 class="card-title">{{$head}}</h3>
</div>
<?php  
if(isset($get_record)){
echo Form::model($get_record,array('id'=>'itiupdate','url' => 'admin/project/updateitinerary','autocomplete'=>false,'files'=>true,'method'=>'patch'));
echo Form::hidden('id');
} 
?>
<div class="form-group">
<label>Title</label>
<?php echo Form::text('title', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text title_error"> </span>
</div>  
 

<div class="form-group">
<label class="ltitle">Image Upload</label>
<div class="input-group">
<div class="custom-file">
<?php echo Form::file('image',array('class' => 'custom-file-input')); ?>
<label class="custom-file-label">Choose file</label>
</div>
</div>
<?php if(isset($get_record)){ 
if(!empty($get_record->image)){ ?>
<img width="100" src="<?php echo asset("project_floor_images/".$get_record->image."")?>">
<?php }} ?>
<span class="text-danger small error-text image_error"> </span>
</div>

<div class="form-group">
<label>Image Alt [SEO]</label>
<?php echo Form::text('alt_tag', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"> <?php echo $errors->has('alt_tag')?$errors->first('alt_tag'):''; ?></span>
</div>


<div class="form-group">
<label>Sort Order</label>
<select name="sort_order" id="sort_order" class="form-control">
<?php echo GeneralHelper::sortOrderwhrids($get_record->id,"project_itineraries","project_id",@$get_record->project_id,"title",$get_record->sort_order); ?>

</select>
</div>

<div class="modal-footer">
<input type="hidden" id="calback_url" value="{{ route('admin.project.getitinerary', $get_record->project_id) }}">
<input type="hidden" data-service="{{$get_record->project_id}}" value="{{$get_record->project_id}}" name="project_id">    
<button type="submit" class="btn btn-success" id="formSubmit">Submit</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>
@endsection