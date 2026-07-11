@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('events')}}">Events  </a></li>

@if(isset($info->id))

<li class="active"> / {{$info->title}} </li>

@endif

</ul>

</div> 

</section>      

 

<!-- Events -->

<section class="section inner">

<div class="container">

@if(!isset($info))

<div class="section-title">

<p>

@if(!empty($contant->description))     

{!! $contant->description !!} 

@endif

 </p>

</div>@endif

@if(!isset($info))  

@include('pages/event_lists')

@else

@include('pages/event_detail')

@endif

</div>

</section>

<!-- Events -->

@endsection  