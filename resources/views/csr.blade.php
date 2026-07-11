@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('csr')}}"> CSR  </a></li>

@if(isset($info->id))

<li class="active"> / {{$info->title}} </li>

@endif

</ul>

</div> 

</section>      





<!-- About-chordia -->

<section class="section inner">

<div class="container">

<div class="section-title">

@if(!isset($info))

<p>

@if(!empty($contant->description))     

{!! $contant->description !!} 

@endif

 </p>

@endif

</div>



</div>

</section>

<!-- About -->



<section class="fourpoint">

<div class="container">

<h2>We are dedicatedly responsible towards</h2>    

<div class="row">

<div class="col-md-3 col-6">

<div class="fpoint">

<img src="{{asset('images/point01.png')}}" >

<h3>Farmers</h3>

</div>

</div>

<div class="col-md-3 col-6">

<div class="fpoint">

<img src="{{asset('images/point02.png')}}" >

<h3>Environment</h3>

</div>

</div>

<div class="col-md-3 col-6">

<div class="fpoint">

<img src="{{asset('images/point04.png')}}" >

<h3>Community</h3>

</div>

</div>

<div class="col-md-3 col-6">

<div class="fpoint">

<img src="{{asset('images/point04.png')}}" >

<h3>Workforce</h3>

</div>

</div>

</div>

</div>

</section>





<section class="section inner">

<div class="container">

@if(!isset($info))  

@include('pages/service_lists')

@else

@include('pages/service_detail')

@endif

</div>

</section>



@endsection  