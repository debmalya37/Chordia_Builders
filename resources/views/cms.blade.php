@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li class="active"> {{$info->title}} </li>

</ul>

</div> 

</section>  

@if($info->slug_url == 'about-us')

<!-- About-chordia -->

<section class="section inner">

<div class="container">

<div class="section-title">

<h2> {{$info->title}}</h2>

<p>{!! $info->description !!}</p>

</div> 

</div>

</section>

@if(!$misvis->isEmpty())

<section class="section inner">

<div class="container">

<div class="row">

@foreach($misvis as $mvrecord)

<div class="col-md-6">

<div class="section-title">

<h2> {{$mvrecord->title}}</h2>

<p>{!! $info->description !!}</p>

</div>

</div>

@endforeach

</div>



</div>

</section>

@endif



<section class="section inner">

<div class="container">

<div class="section-title">

<h2>Values that make us {{ GeneralHelper::Generals()->title }}</h2>

<img src="<?= (isset($info->image))?asset("cms_images/$info->image"):asset('') ?>" class="img-fullwidth" />

</div> 

</div>

</section>





<section class="section inner">

<div class="container">

<div class="row">

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Dedication.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Dedication</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Transperancy.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Transperancy</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Punctuality.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Punctuality</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Quality.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Quality</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Reliability.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Reliability</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Integrity.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Integrity</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Accountability.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Accountability</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="mediapoint">

<div class="img-ab- base" data-tilt="" data-tilt-max="20" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); width: 12%;"><img src="{{asset('images/Partnership.svg')}}" alt="icon" class="layer"></div>

<div class="media-body">

<h4>Partnership</h4> 

<p>We believe in being dedicated to the task at hand, which helps us do more with less effort and at a better pace.</p>

</div>

</div>

</div>



</div> 

</div>

</section>



@else

{!! $info->description !!}

@endif



<!-- About -->



@endsection  