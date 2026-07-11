@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('banking')}}">Life @ Chordia</a></li>

</ul>

</div> 

</section>        

   

<section class="section inner">

<div class="container">

 

<div class="row">

<div class="col-md-6">

<div class="section-title">

<h2> Our Transformation Begins With You</h2>

<p>@if(!empty($contant->description))     

{!! $contant->description !!} 

@endif</p>

</div>

</div>

<div class="col-md-6">

<img src="{{asset('images/career-new.jpg')}}" class="img-fullwidth" />

</div>

</div>







</div>

</section>



<div class="comanpad-career">

<div class="container">

<div class="section-title">

<h2>Experiences that creates a  future</h2>

<p>At Chordia, we believe in bringing a talented team together by assessing every individual on his/her personality type. We assign roles and responsibility after understanding the individual rather than forcing a role which does not create an aura of happiness. Understand in detail why working with us makes us called an equal opportunity employer.</p>

</div>



<div class="row">

<div class="col-sm-4">

<div class="careerBox">

<img src="{{asset('images/grow.png')}}">

<h3>People </h3>

<p>We work hard, undoubtedly and in the company of  extremely talented individuals makes it a worthy experience. But embracing the differences at the same time along with a fair pay out and opportunity driven environment is what makes us the best place to work.</p>

</div>

</div>

<div class="col-sm-4">

<div class="careerBox">

<img src="{{asset('images/best.png')}}">

<h3>Pride</h3>

<p>Our existing team and everyone associated with our name actually feels pride in it. Believe it or not, our success story is completely dedicated to these hard-working and smart-thinking brains who have made Chordia Builders a proud name in the real estate industry.</p>

</div>

</div>

<div class="col-sm-4">

<div class="careerBox">

<img src="{{asset('images/teamwork.png')}}">

<h3>Fuels Creativity</h3>

<p>Our aim of developing further is inspired from the creative ideas. Leaving the conventional behind, we motivate a "Think Young '' philosophy. Leadership always remains open for new and zealous ideas because that is what keeps us ahead from everyone when it comes to implementing new yet lasting solutions.
</p>

</div>

</div>

<div class="col-sm-4">

<div class="careerBox">

<img src="{{asset('images/outings.png')}}">

<h3>Purpose </h3>

<p>At Chordia, a challenging work atmosphere is prompted towards greater customer engagement, learning new dimensions of work and adding experience to the skill set. We listen to the ideas of every idea of employees and always 
</p>

</div>

</div>

<div class="col-sm-4">

<div class="careerBox">

<img src="{{asset('images/culture.png')}}">

<h3>Non-Stop Learning</h3>

<p>The best thing a person can enjoy at the workplace is new ideas and dealing with problems. This process has to be continuous, is what we believe at Chordia. Our approach is inclined towards bringing out the best in you.</p>

</div>

</div>

<div class="col-sm-4">

<div class="careerBox">

<img src="{{asset('images/life-balance.png')}}">

<h3>Work Life Balance</h3>

<p>Holidays, vacations, short trips, family & friends get together and all such activities that are necessary for keeping work life and personal life in balance is what we believe is utterly necessary. Because parallel to working hard it is equally necessary to enjoy life at its fullest.</p>

</div>

</div>

</div>



</div>

</div>



<section class="section inner">

<div class="container">

<div class="section-title">

<h2>A time dedicated to team building & rejuvenation activities</h2>

<p>We work hard but we also believe in living life to its fullest. Have a look at the fun-filled memories that we cherish endlessly with creating new ones. Be it about exploring famous tour destinations within or outside India along with organizing events to completely forget about work and living those priceless moments at its fullest.
</p>

</div>

<div class="row"> 

 

@if(!$galleries->isEmpty() )

@foreach($galleries as $gallery)    

<div class="col-md-4">

<div class="gallerycat">

<a href="{{ asset('gallery_images/'.$gallery->image) }}" data-fancybox="photo">            

 <div class="overflow">

 <div class="overlays"></div>

 <img class="card-img-top" src="{{ asset('gallery_images/'.$gallery->image) }}" alt="{{$gallery->alt_tag}}">

 </div>     

<div class="caption_mans"> 

<p>{{$gallery->title}} </p>

</div>

</a>             

</div>

</div>

@endforeach

@endif



</div>

</div>

</section>





@endsection  