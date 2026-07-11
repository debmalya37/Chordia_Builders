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
<div class="table-responsive">
<table class="table table-striped table-bordered dataTable" id="editable-datatable" style="cursor: pointer;" role="grid" aria-describedby="editable-datatable_info">
@if(!empty($datas))
<tr>
<th scope="row">Name</th>
<td>{{ $datas->name }}</td>
</tr>

<tr>
<th scope="row">Email/Phone</th>
<td><strong>Email:</strong> {{ $datas->email }}<br />
<strong>Phone:</strong> {{ $datas->phone}}<br /></td>
</tr>

<tr>
<th scope="row">Arrival Date</th>
<td>{{ $datas->arrival_date }}</td>
</tr>

 
<tr>
<th scope="row">No of Travelers</th>
<td>{{ $datas->notravelers }}</td>
</tr>

<tr>
<th scope="row">Car Required</th>
<td>{{ $datas->car_required	 }}</td>
</tr>


<tr>
<th scope="row">Hotel</th>
<td>{{ $datas->hotel_required }}</td>
</tr>


<tr>
<th scope="row">Tour Budget</th>
<td>{{ $datas->tour_budget	 }}</td>
</tr>


<tr>
<th scope="row">Message</th>
<td>{{ $datas->messages }}</td>
</tr>

<tr>
<th scope="row">Page Url</th>
<td>{{ $datas->page_url }}</td>
</tr>

<tr>
<th scope="row">Post Date</th>
<td>{{ $datas->created_at }}</td>
</tr>
@endif
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>