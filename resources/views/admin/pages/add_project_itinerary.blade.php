@extends('admin.layouts.app')
@section('content')
<div class="card-body card card-primary">
<div class="card-header">
<h3 class="card-title">{{$head}}</h3>
</div>
<form method="POST" enctype="multipart/form-data" id="upload_image_forms" action="javascript:void(0)" >
<div class="card-body">
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
<span class="text-danger small error-text image_error"> </span>
</div>

<div class="form-group">
<label>Image Alt [SEO]</label>
<?php echo Form::text('alt_tag', null,['class'=>'form-control','rows' => 0, 'cols' => 0]); ?>
<span class="text-danger"> </span>
</div>


<div class="form-group">
<label>Sort Order</label>
<select name="sort_order" id="sort_order" class="form-control">
<?php echo GeneralHelper::sortOrderwhrids($data['sort_order'],"project_itineraries","project_id",@$data->id,"title"); ?>

</select>
</div>

<div class="modal-footer">
<input type="hidden" data-service="{{$data->id}}" value="{{$data->id}}" name="project_id">    
<button type="submit" class="btn btn-success" id="formSubmit">Submit</button>
<a href="{{route('admin.project')}}" class="btn btn-danger" data-dismiss="modal">Projects</a>
</div>
</div>
</form>


<div class="col-md-12">
<table class="table table-striped">
<thead>
<tr>
<th scope="col">Sr no</th>
<th scope="col">Title</th>
<th scope="col">Photo</th>
<th scope="col">Action</th>      
</tr>
</thead>
<tbody id="ids">
@if(!$projectitinerary->isEmpty())
@foreach($projectitinerary as $records)
<tr id="dels{{ $records->id }}">
<th scope="row">{{$loop->iteration}}</th>
<td>{{ $records->title }}</td>
<td>
@if(!empty($records->image))
<img width="50" src="<?php echo asset("project_floor_images/$records->image")?>">
@else
<img width="80" src="<?php echo asset("images/no-image-available.jpg")?>"> 
@endif
</td>
<td>
<a title="Edit" href="{{ route('admin.itinerary.edit', ['id' => $records->id]) }}"> <i class="btn btn-info typcn typcn-edit"></i></a> 
<a id="delete_single" data-url="project/itinerarydelete" data-id="{{ $records->id }}" data-token="{{ csrf_token() }}"> <i class="btn btn-danger typcn typcn-delete"></i></a></td>
</tr>
@endforeach
@else
<tr id="trhide">
<td colspan="4">No record found</td>
</tr>
@endif
</tbody>
</table>
</div>
<div class="modal fade" id="empModal" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Images</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

</div>
@endsection