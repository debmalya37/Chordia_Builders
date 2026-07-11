@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('photos')}}">Photo Gallery /</a></li>

@if(isset($info->id))

<li class="active"> {{$info->title}} </li>

@endif

</ul>

</div> 

</section>        



<!-- Photo-->

<section class="section inner">

<div class="container">

<div class="row"> 

@if(!isset($info))  

@include('pages/gallery_cates')

@else

@include('pages/gallery_by_cates')

@endif

</div>

</div>

</section>

<!-- Photo -->



@endsection  