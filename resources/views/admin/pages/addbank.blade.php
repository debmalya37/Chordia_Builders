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
echo Form::model($get_record,array('id'=>'update','class' => 'bank','url' => 'admin/bank/update','autocomplete'=>false,'files'=>true,'method'=>'patch'));
echo Form::hidden('id');
} else {
echo Form::open(array('id'=>'create','class' => 'bank','url' => 'admin/bank/store','autocomplete'=>false,'files'=>true));
}
?>
<div class="card-body">
<div class="form-group">
<label>Title</label>
<?php echo Form::text('title', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text title_error"> </span>
</div>

<div class="form-group">
<label>Weburl</label>
<?php echo Form::text('weburl', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text weburl_error"> </span>
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
<img width="100" src="<?php echo asset("bank_images/".$get_record->image."")?>">
<?php }} ?>
<span class="text-danger small error-text image_error"> </span>
</div>
 
<div class="form-group">
<label>Sort Order</label>
<select name="sort_order" id="sort_order" class="form-control">
<?php echo GeneralHelper::sortOrder(@$get_record->id,"banks","id","title");  ?>
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