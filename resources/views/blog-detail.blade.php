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

<div class="iBox02">

<h3><a href="#">{{$info->title}}</a></h3>

<div class="blog-info">  

<a href="#"><i class="fa fa-clock-o"></i>{{ date_format(date_create($info->blog_date),'d M Y') }} </a> 

</div>

@if($info->image)   

<a href="#"><img src="<?= (isset($info->image))?asset("blog_images/$info->image"):asset('images/noblog.svg') ?>" alt="{{$info->alt_tag}}" class="img-fullwidth">   </a> 

@endif

<p>{!! $info->description !!}<br><br></p>

</div>

</div>

</div>

<div class="col-md-4">

@include('includes.blog_right_part')

</div>

</div>

</div>

</section>

@endsection  