@extends('admin.layouts.app')
@section('content')
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="card-header">
<h3 class="card-title">{{$head}}</h3>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<table class="table table-striped table-bordered dataTable" id="editable-datatable" style="cursor: pointer;" role="grid" aria-describedby="editable-datatable_info">
<thead>
<tr>
<th>SN</th>
<th>name</th>
<th>Email/Phone</th>
<th>City</th>
<th>Page Url</th>
<th>Messages</th>
<th>Post Date</th>
<th>Action</th>
</tr>
</thead>
@if(!$datas->isEmpty())
@foreach($datas as $record)
<tr id="dels{{ $record->id }}">
<th scope="row">{{$loop->iteration}}</th>
<td><a class="text-red" data-toggle="modal" data-id="{{ $record->id }}" id="serviceinfos" data-url="{{ route('admin.common.detail', $record->id) }}" title="Customize Detail">{{ $record->name }}</a></td>
<td><strong>Email:</strong> {{ $record->email }}<br /><strong>Phone:</strong> {{ $record->phone}}<br /></td>
<td>{{ $record->city }}</td>
<td>{{ $record->page_url }}</td>
<td>{{ $record->messages }}</td>
<td>{{ $record->created_at }}</td>
<td>
<a class="btn btn-danger btn-sm" title="Delete" id="delete_single"  data-url="common/delete" data-id="{{ $record->id }}" data-token="{{ csrf_token() }}"> <i class="typcn typcn-delete"></i></a></td>
</tr>
@endforeach
@else
<tr>
<td  colspan="8">No record found</td>
</tr>
@endif
</tbody>
</table>
</div>
</div>
</div>
<div class="modal fade" id="empModal" role="dialog">
<div class="modal-dialog modal-xl">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-body">
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->

@endsection
