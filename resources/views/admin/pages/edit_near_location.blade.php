@extends('admin.layouts.app')
@section('content')
<div class="card-body card card-primary">
<div class="card-header">
<h3 class="card-title">{{$head}}</h3>
</div>
<?php  
if(isset($get_record)){
echo Form::model($get_record,array('id'=>'itiupdate','url' => 'admin/project/updatenearlocation','autocomplete'=>false,'files'=>true,'method'=>'patch'));
echo Form::hidden('id');
} 
?>
<div class="form-group">
<label>Title</label>
<?php echo Form::text('title', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text title_error"> </span>
</div>  
 
<div class="form-group">
<label>Description</label>
<?php echo Form::textarea('description', null,['class'=>'ckeditor']); ?>
<span class="text-danger"> </span>
</div>  
 

<div class="form-group">
<label>Sort Order</label>
<select name="sort_order" id="sort_order" class="form-control">
<?php echo GeneralHelper::sortOrderwhrids($get_record->id,"project_near_locations","project_id",@$get_record->project_id,"title",$get_record->sort_order); ?>

</select>
</div>

<div class="modal-footer">
<input type="hidden" id="calback_url" value="{{ route('admin.project.getnearlocation', $get_record->project_id) }}">
<input type="hidden" data-service="{{$get_record->project_id}}" value="{{$get_record->project_id}}" name="project_id">    
<button type="submit" class="btn btn-success" id="formSubmit">Submit</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>
@endsection