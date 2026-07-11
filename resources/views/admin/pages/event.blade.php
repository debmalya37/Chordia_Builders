@extends('admin.layouts.app')
@section('content')
<div class="card">
<div class="card-body">
<div class="row">
 <div class="col-sm-12">
 <button type="button" onclick="window.location='{{ route('admin.event.create')}}'" class="btn btn-success float-right mb-2"><i class="typcn typcn-plus"></i> Add item</button>
</div>
</div>
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
     <td><input data-id="{{$record->id}}" data-url="event/changeStatus" data-table="events" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"   <?php echo $record->status ? 'checked' : '';?> ></td>
    <td> @if(!empty($record->image))
    <img width="50" src="<?php echo asset("event_images/$record->image")?>">
    @else
    <img width="80" src="<?php echo asset("images/no-image-available.jpg")?>"> 
    @endif</td>
    <td>
    <a href="{{ route('admin.event.edit', ['id' => $record->id]) }}"> <i class="btn btn-info typcn typcn-edit"></i></a> 
    <a id="delete_single"  data-url="event/delete" data-id="{{ $record->id }}" data-token="{{ csrf_token() }}"> <i class="btn btn-danger typcn typcn-delete"></i></a></td>
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
    </div>
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
@endsection
 