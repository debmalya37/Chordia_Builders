@extends('admin.layouts.app')
@section('content')
<div class="card">
<div class="card-body">
<form action="{{ route('admin.project') }}" method="GET">
<div class="row">
<div class="col-md-3 pull-left">    
<select type="text" name="cat_id" class="form-control p-2">
<option value="0">None</option>
@if($cates)
@foreach($cates as $category) 
<?php $dash=''; ?>
<option {{GeneralHelper::match($category->id,@Request::get('cat_id'))}} value="{{$category->id}}">{{$category->title}}</option>
@endforeach
@endif
</select>
</div>
<div class="col-md-2 pull-left">
<input type="submit" class="btn btn-danger" value="Filter">
</div>
<div class="col-sm-7">
 <button type="button" onclick="window.location='{{ route('admin.project.create')}}'" class="btn btn-success float-right mb-2"><i class="typcn typcn-plus"></i> </button>
</div>
<div class="col-sm-12">
<div class="card-header">
<h3 class="card-title">{{$head}}</h3>
</div>
</div>
</div>
</form>
  <div class="row">
   <div class="col-sm-12">
    <table class="table table-striped table-bordered dataTable" id="editable-datatable" style="cursor: pointer;" role="grid" aria-describedby="editable-datatable_info">
    <thead>
    <tr>
        <th>SN</th>
        <th>Title</th>
        <th>Status</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </thead>
    @if(!$datas->isEmpty())
    @foreach($datas as $record)
    <tr id="dels{{ $record->id }}">
    <th scope="row">{{$loop->iteration}}</th>
    <td>{{ $record->title }}</td>
     <td><input data-id="{{$record->id}}" data-url="project/changeStatus" data-table="projects" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"   <?php echo $record->status ? 'checked' : '';?> ></td>
    <td> @if(!empty($record->image))
    <img width="50" src="<?php echo asset("project_images/$record->image")?>">
    @else
    <img width="80" src="<?php echo asset("images/no-image-available.jpg")?>"> 
    @endif</td>
    <td>
  <a class="btn btn-info btn-sm" title="Edit project" href="{{ route('admin.project.edit', ['id' => $record->id]) }}"> <i class="typcn typcn-edit"></i></a>  
  <a class="btn btn-danger btn-sm" data-toggle="modal" data-id="{{ $record->id }}" id="ameninfos" data-url="{{ route('admin.project.getamenities', $record->id) }}" title="Add Amenities"> <i class="typcn typcn-plus"></i></a> 
  <a class="btn btn-info btn-sm" data-toggle="modal" title="Add Image" data-id="{{ $record->id }}" id="serviceinfos" data-url="{{ route('admin.project.getimages', $record->id) }}" > <i class="typcn typcn-image"></i></a> 

 <a class="btn btn-danger btn-sm" title="Add Floor" href="{{ route('admin.project.getitinerary', $record->id) }}"> <i class="typcn typcn-plus"></i></a> 

  <a class="btn btn-info btn-sm" title="Add Near Location" href="{{ route('admin.project.getnearlocation', $record->id) }}"> <i class="typcn typcn-plus"></i></a> 

  <a class="btn btn-danger btn-sm" title="Delete" id="delete_single"  data-url="project/delete" data-id="{{ $record->id }}" data-token="{{ csrf_token() }}"> <i class="typcn typcn-delete"></i></a></td>
  </tr>
    @endforeach
    @else
   <tr>
   <td  colspan="5">No record found</td>
   </tr>
   @endif
    </tbody>
    </table>
    </div>
    </div>
 {{$datas->links('pagination::bootstrap-4')}}
    </div>
    </div>
    <!-- Modal -->
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
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
           </div>
          </div>
         </div>


         <div class="modal fade" id="AmeModal" role="dialog">
          <div class="modal-dialog">
          <!-- Modal content-->
           <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Amenities</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modals-body">
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
           </div>
          </div>
         </div>
    @endsection
 