@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('customer-corner')}}">Testimonials</a></li>

 </ul>

</div> 

</section>        

 

<div class="inner">

<div class="container">

@if(!empty($contant->description))     

{!! $contant->description !!} 

@endif



<div class="section-title">

<h2>Customer Corner</h2> 

</div>

@if(!$testimonials->isEmpty())

<div class="testimonial-slider"> 

@foreach($testimonials as $reviews)



<div class="testimonial">
    <div class="author"> 
@if(!empty($reviews->image))    
<img src="{{asset('images/testimonial1.jpg')}}" alt="{{ $reviews->title }}" width="70" height="70"> 
@else 
<img src="{{asset('images/testimonial1.jpg')}}" width="70" height="70" /> 
@endif 
    <div class="author-meta">
    <h4>
    {{ $reviews->title }}<br> 
    @if($reviews->designation) 
    <small>({{ $reviews->designation }})</small> 
    @endif
    </h4>
    <div class="star">
    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>                             </div>
    </div>
    </div>
    <p>
       {!! $reviews->description !!}</p>      
    </div>

@endforeach

</div>

@endif

</div>

</div>



@endsection  