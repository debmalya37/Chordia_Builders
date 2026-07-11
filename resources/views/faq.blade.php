@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li class="active"> Faq's </li>

</ul>

</div> 

</section>        

 

<!-- Faq -->

@if(!$faqs->isEmpty())

<section class="section inner">

<div class="container">
<h2>FAQ's</h2>        
<div class="section-title">
@if(!isset($info))
<p>
@if(!empty($contant->description))     
{!! $contant->description !!} 
@endif
 </p>
@endif
</div>
<div class="row">  

<div class="col-md-12">

<div class="faq"> 

<div class="faq-content">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

@php($fq=1)    

@foreach($faqs as $faq)

<div class="panel panel-default {{$fq==1?'active':''}}">

<!-- Single Faq -->

<div class="faq-heading" id="FaqTitle{{$fq}}">

<h4 class="faq-title">

<a class="" data-toggle="collapse" data-parent="#accordion" href="#faq{{$fq}}" aria-expanded="true">

{{$faq->title}}</a>

</h4>

</div>

<div id="faq{{$fq}}" class="panel-collapse collapse {{$fq==1?'show':''}}" role="tabpanel" aria-labelledby="FaqTitle{{$fq}}">

<div class="faq-body"><p> {!! $faq->description !!}</p></div>

</div>

<!--/ End Single Faq -->

</div>

@php($fq++)

@endforeach



</div>

</div> 



</div>

</div>

 

</div>

</div>

</section>

@endif

<!-- Faq -->

@endsection  