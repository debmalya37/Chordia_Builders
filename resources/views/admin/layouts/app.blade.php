<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $pageTitle ?? config('app.name', 'Admin') }}</title>
<link rel="stylesheet" href="{{ asset('css/typicons.css') }}">
<link rel="stylesheet" href="{{ asset('css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="shortcut icon" href="images/favicon.png" />


</head>
<body>
<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
@include('admin.layouts.topnavbar')
<!-- partial -->

<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
@include('admin.layouts.left_panel')
</nav>
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
@yield('content')
</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
@include('admin.layouts.footer')
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('js/validation.js')}}"></script>
<script src="{{ asset('js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('js/off-canvas.js')}}"></script>
<script src="{{ asset('js/template.js')}}"></script>
<script type="text/javascript">
$('.custom-file input').change(function (e) {
if (e.target.files.length) {
$(this).next('.custom-file-label').html(e.target.files[0].name);
}
});
</script>
<script>
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#upload_image_forms').submit(function(e) { 
for (instance in CKEDITOR.instances) {
CKEDITOR.instances[instance].updateElement()
}  
var formData = new FormData(this); 
var url = "<?php echo asset("tour_itinerary_images")?>";
$.ajax({
type:'POST',
url: "{{ route('admin.project.additinerary')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => { 
this.reset(data);
if(data.status == 0){
$.each(data.error, function(prefix, val){
$('span.'+prefix+'_error').text(val[0]);
});
}else{
alert(data.msg);
location.reload();
}
},
});
});


$('#upload_near_location').submit(function(e) { 
for (instance in CKEDITOR.instances) {
CKEDITOR.instances[instance].updateElement()
}  
var formData = new FormData(this); 
$.ajax({
type:'POST',
url: "{{ route('admin.project.addnearlocation')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => { 
this.reset(data);
if(data.status == 0){
$.each(data.error, function(prefix, val){
$('span.'+prefix+'_error').text(val[0]);
});
}else{
alert(data.msg);
location.reload();
}
},
});
});
</script>
<script>
$('#itiupdate').on('submit', function (e) {
for (instance in CKEDITOR.instances) {
CKEDITOR.instances[instance].updateElement()
}      
e.preventDefault()
var callback = $("#calback_url").val();
$.ajax({
url: $(this).attr('action'),
method: $(this).attr('method'),
data: new FormData(this),
processData: false,
dataType: 'json',
contentType: false,
beforeSend: function () {
$(document).find('span.error-text').text('')
},
success: function (data) {
if (data.status == 0) {
$.each(data.error, function (prefix, val) {
$('span.' + prefix + '_error').text(val[0])
})
} else {
alert(data.msg)
location.reload();
location.href = callback
}
},
})
})
</script>

<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$("#search1,#search2,#search3,#search4,#search5,#search6").keyup(function() {
$value='';
var _url = $(this).data('url')
var _tid = $(this).data('tourid')
var _table = $(this).data('table')  
var _num = $(this).data('num')
var value = $(this).val();

$.ajax({
type: 'get',
url : _url,
data: { search: value,table: _table,tid: _tid},
success: function (data) {
$('#items'+_num).html(data)
},
})
});

</script>
</body>
</html>
