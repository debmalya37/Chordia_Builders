@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        
        <div class="row mb-3">
            <div class="col-sm-12 col-md-12">
                <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #eee; padding-bottom: 15px;">
                    <h3 class="card-title m-0">{{$head}}</h3>
                    
                    <!-- Frontend JavaScript Export Button -->
                    <button onclick="exportTableToCSV('chordia_contact_leads.csv')" class="btn btn-success btn-sm" style="background-color: #28a745; border-color: #28a745; color: #fff;">
                        <i class="typcn typcn-download"></i> Export Data
                    </button>
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
                            <th>email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$datas->isEmpty())
                            @foreach($datas as $record)
                            <tr id="dels{{ $record->id }}">
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a class="text-red" title="{{ $record->messages }}">{{ $record->name }}</a></td>
                                <td>{{ $record->email }}</td>
                                <td>{{ $record->phone }}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" title="Delete" id="delete_single" data-url="contact/delete" data-id="{{ $record->id }}" data-token="{{ csrf_token() }}"> 
                                        <i class="typcn typcn-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No record found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
<!-- Modal -->

<!-- Pure JavaScript Excel/CSV Exporter -->
<script>
    function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;

        // CSV file
        csvFile = new Blob([csv], {type: "text/csv"});

        // Download link
        downloadLink = document.createElement("a");
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
        downloadLink.click();
    }

    function exportTableToCSV(filename) {
        var csv = [];
        var rows = document.querySelectorAll("table#editable-datatable tr");
        
        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");
            
            // Loop through columns. Use (cols.length - 1) to ignore the last "Action" column
            for (var j = 0; j < cols.length - 1; j++) {
                // Get the text, remove line breaks, and trim spaces
                var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, "").trim();
                // Escape double quotes to prevent CSV breaking
                data = data.replace(/"/g, '""');
                // Push wrapped in quotes
                row.push('"' + data + '"');
            }
            
            // Do not push empty rows
            if(row.length > 0 && row[0] !== '""'){
                csv.push(row.join(","));
            }
        }

        // Download CSV file
        downloadCSV(csv.join("\n"), filename);
    }
</script>

@endsection