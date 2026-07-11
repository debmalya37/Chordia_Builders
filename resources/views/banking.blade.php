@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('banking')}}">Banking</a></li>

</ul>

</div> 

</section>        

   

<section class="section inner">

<div class="container">

<div class="section-title">

<h2> Banking</h2>

<p>

@if(!empty($contant->description))     

{!! $contant->description !!} 

@endif

 </p>

</div> 



@if(!$bankings->isEmpty())

<div class="row">

@foreach($bankings as $evts)

<div class="col-md-3">

<div class="banking-box">

<div class="gray">

<div class="icon">

<img src="{{ asset('bank_images/'.$evts->image) }}" alt="{{$evts->alt_tag}}" />

</div>

<h3>{{$evts->title}}</h3>

</div>

<a href="{{$evts->weburl}}" target="_blank" class="btn know-more">KNOW MORE</a>

</div>



</div>

@endforeach

</div>

@endif

</div>

</section>









@endsection  