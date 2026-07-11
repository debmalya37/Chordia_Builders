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
    echo Form::model($get_record,array('id'=>'update','class' => 'gcat','url' => 'admin/gcat/update','autocomplete'=>false,'files'=>true,'method'=>'patch'));
    echo Form::hidden('id');
    } else {
    echo Form::open(array('id'=>'create','class' => 'gcat','url' => 'admin/gcat/store','autocomplete'=>false,'files'=>true));
    }
    ?>
    <div class="card-body">
    <div class="form-group">
    <label>Title</label>
    <?php echo Form::text('title', null,['class'=>'form-control']); ?>
    <span class="text-danger small error-text title_error"> <?php echo $errors->has('title')?$errors->first('title'):''; ?></span>
    </div>

    <div class="form-group">
    <label>Slug Url</label>
    <?php echo Form::text('slug_url', null,['class'=>'form-control']); ?>
    <span class="text-danger small error-text slug_url_error"></span>
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
    <span class="text-danger small error-text image_error"> </span>
    </div>
    <div class="form-group">
    <label>Sort Order</label>
    <select name="sort_order" id="sort_order" class="form-control">
    <?php echo GeneralHelper::sortOrder(@$get_record->id,"gcats","id","title");  ?>
    </select>
    </div>
    <div class="form-group">
    <label class="ltitle">Status</label>
    <?php echo Form::select('status', array(1 => 'Yes', 0 => 'No'), null, array('class' => 'form-control')); ?>
    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    <?php echo Form::submit('Submit',['class' => 'btn btn-primary']); ?>  
    </div>
    <?php echo Form::close(); ?>
    </div>
    @endsection