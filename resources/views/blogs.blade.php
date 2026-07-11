@extends('layouts.header')

@section('content')

		 

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> </a></li> /

<li><a href="{{route('blog')}}">Our Blog </a></li> 

@if(isset($info)) 

 <li class="active"> / {{isset($info->title)?$info->title:''}}</li>

@endif

</ul>

</div> 

</section>        



<section class="inner">

<div class="container">

<div class="row">

<div class="col-md-8">

<div class="blog-left">

@if(!isset($info))  

@include('pages/all_blogs')

@else

@include('pages/blog_by_cates')

@endif

</div>

</div>

<div class="col-md-4">

@include('includes.blog_right_part')

</div>

</div>

</div>

</section>



@endsection  