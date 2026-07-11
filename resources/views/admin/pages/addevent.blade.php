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
echo Form::model($get_record,array('id'=>'update','class' => 'event','url' => 'admin/event/update','autocomplete'=>false,'files'=>true,'method'=>'patch'));
echo Form::hidden('id');
} else { 
echo Form::open(array('id'=>'create','class' => 'event','url' => 'admin/event/store','autocomplete'=>false,'files'=>true)); 
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
<a class="nav-item nav-link" data-toggle="tab" href="#tab2" role="tab">SEO</a>
</div>
</nav>
<div class="card-body">
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="tab1" role="tabpanel"> 
<div class="form-group">
<label>Title</label>
<?php echo Form::text('title', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text title_error"> </span>
</div>
<div class="form-group">
<label>Slug Url</label>
<?php echo Form::text('slug_url', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text slug_url_error"></span>
</div>
<div class="form-group">
<label>Description</label>
<?php echo Form::textarea('description', null,['class'=>'ckeditor']); ?>
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
<?php  if(!empty($get_record->image)){ ?>
<div id="dehide{{ $get_record->id }}">
<img width="100" src="<?php echo asset("event_images/".$get_record->image."")?>">
</div>
<?php } ?>
<span class="text-danger"> </span>
</div>
 
<div class="form-group">
<label>Event Date</label>
<?php echo Form::date('event_date', null,['class'=>'form-control']); ?>
<span class="text-danger small error-text event_date_error"> </span>
</div>

<div class="form-group">
<div class="form-check form-check-flat form-check-primary">
<label class="form-check-label">
<?php echo Form::checkbox('front[]', '1'); ?>
Home [Front]
<i class="input-helper"></i></label>
</div>
</div>

<div class="form-group">
<label>Sort Order</label>
<select name="sort_order" id="sort_order" class="form-control">
<?php echo GeneralHelper::sortOrder(@$get_record->id,"events","id","title");  ?>
</select>
</div>
<div class="form-group">
<label class="ltitle">Status</label>
<?php echo Form::select('status', array(1 => 'Yes', 0 => 'No'), null, array('class' => 'form-control')); ?>
</div>
</div>
<div class="tab-pane fade" id="tab2" role="tabpanel">  
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
 
</div>
</div>
<?php echo Form::close(); ?>
</div>
@endsection
