@extends('admin.layouts.app')
@section('content')
<div class="card-body card card-primary">
<div class="card-header">
<h3 class="card-title">{{$head}}</h3>
</div>
<form method="POST" enctype="multipart/form-data" id="upload_near_location" action="javascript:void(0)" >
<div class="card-body">
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
<?php echo GeneralHelper::sortOrderwhrids($data['sort_order'],"project_near_locations","project_id",@$data->id,"title"); ?>

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
<th scope="col">Description</th>
<th scope="col">Action</th>      
</tr>
</thead>
<tbody id="ids">
@if(!$projectnearlocation->isEmpty())
@foreach($projectnearlocation as $records)
<tr id="dels{{ $records->id }}">
<th scope="row">{{$loop->iteration}}</th>
<td>{{ $records->title }}</td>
<td>{!! $records->description !!}</td>
<td>
<a title="Edit" href="{{ route('admin.nearlocation.edit', ['id' => $records->id]) }}"> <i class="btn btn-info typcn typcn-edit"></i></a> 
<a id="delete_single" data-url="project/nearlocationdelete" data-id="{{ $records->id }}" data-token="{{ csrf_token() }}"> <i class="btn btn-danger typcn typcn-delete"></i></a></td>
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
 

</div>
@endsection