@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('videos')}}">Video Gallery </a></li>



</ul>

</div> 

</section>        



<!-- Photo-->

<section class="section inner">

<div class="container">

<div class="row"> 

@if(!$videos->isEmpty())

@foreach($videos as $evts)  

<div class="col-md-4">
<div class="videobox">
<div class="gallerycat">
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$evts->video_url}}"></iframe>
</div>


</a>             

</div>
<a href="https://www.youtube.com/embed/{{$evts->video_url}}" data-fancybox="photo">
 
{{$evts->title}}

  </a>
</div>
</div>

@endforeach

@endif

</div>

</div>

</section>

<!-- Photo -->



@endsection  