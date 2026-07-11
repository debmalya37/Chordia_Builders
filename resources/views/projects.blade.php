@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li class="active"><a href="{{route('projects')}}"> Projects /</a> </li>

@if(isset($info)) <li>{{$info->title}}</li>  @endif



</ul>

</div> 

</section>      

 

<section class="section inner">

<div class="container">

<div class="row"> 

<div class="col-md-8">

<div class="section-title">

@if(!isset($info))

<h2>Our Projects</h2>

@if(!empty($contant->description))     

{!! $contant->description !!} 

@endif

@else

@if(!empty($info->description))     

<h2>{{$info->title}}</h2>

{!! $info->description !!}

@endif

@endif 

</div>



</div>

<div class="col-md-4">

<div class="ch">

<h3>13+</h3>

<p>Communities</p>

</div>



<div class="ch">

<h3>10K+</h3>

<p>Happy Customers</p>

</div>

</div>







</div>



@if(!isset($info)) 

@include('pages/project_cates')

@else

@include('pages/project_by_cates')

@endif

</div>

</section>

@endsection