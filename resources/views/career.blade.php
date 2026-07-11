@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li><a href="{{route('career')}}">Career</a></li>

</ul>

</div> 

</section>        

   

<!-- About-chordia -->

<section class="section inner">

<div class="container">

<div class="tab-wrapper">
        <div class="section-title">
         
         <h2 class="mt-3">Find Your Spark!</h2>
        <p>Putting the people in forefront right from the first meeting is something that Chordia Builders believe to its core. We are proud of our team and we credit all of our staff for our success. We would like to offer you the opportunity that your world has been looking for and we are willing to offer. Come join us on this journey where we will achieve success and growth together. 
</p>

<h2 class="mt-3">Explore Your Opportunities</h2>
        <p>We aim at hiring the most talented workforce to join us for making a great future together. Even the worthy candidate with speech or hearing impairment can reach us. Our non-discriminatory hiring and work policies makes us the best place to start off with for a great future or to join us to boost your success in every aspect utilizing your great experience. </p>
 
        </div>
        <ul class="nav-slider">
        <li class="nav-item"><a class="nav-link" href=""><span class="number">1</span><span>Job Opportunities and Application Submission</span></a></li>
        <li class="nav-item"><a class="nav-link" href=""><span class="number">2</span><span> Shortlisting</span></a></li>
        <li class="nav-item"><a class="nav-link" href=""><span class="number">3</span> <span>Business/Technical Interview </span></a></li>
        <li class="nav-item"><a class="nav-link" href=""><span class="number">4</span><span> HR Interview</span></a></li>
        <li class="nav-item"><a class="nav-link" href=""><span class="number">5</span> <span>Decision and Offer</span></a></li>
        </ul>
         
        
         
        </div>

<?php /*?><div class="row">

<div class="col-md-8 mx-md-auto">

<div class="cjob">

<h2>Current Job Openings</h2>

<img src="{{asset('images/job-post.jpg')}}" class="img-fullwidth" />

</div>

</div>

</div><?php */?>

</div>

</section>

<!-- About -->



<section class="job-openings">

<div class="container">   

<div class="contact-form-area"> 

<form method="POST" class="form" id="contactid" action="{{route('career.send')}}" enctype="multipart/form-data">

<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

<div class="row">

<div class="col-sm-4">

<div class="form-group"> 

<input name="name" id="name" type="text" placeholder="Full Name">

<span class="text-danger error-text name_error"> </span>

</div>

</div> 

<div class="col-sm-4">

<div class="form-group"> 

<input name="email" id="email" type="email" placeholder="Email Address">

<span class="text-danger error-text email_error"> </span>

</div>

</div>

<div class="col-sm-4">

<div class="form-group"> 

<input name="phone" id="phone" type="text" placeholder="Phone No.">

<span class="text-danger error-text phone_error"> </span>

</div>

</div>

</div>





<div class="row">

<div class="col-sm-4">

<div class="form-group"> 

<input name="city" id="city" type="text" placeholder="City">

<span class="text-danger error-text city_error"> </span>

</div>

</div> 

<div class="col-sm-4">

<div class="form-group"> 

<input name="department" id="department" type="text" placeholder="Department">

<span class="text-danger error-text department_error"> </span>

</div>

</div>

<div class="col-sm-4">

<div class="form-group"> 

<input type="file" name="resume_file" id="resume_file">

<span class="text-danger error-text resume_file_error"> </span>

</div>

</div> 

</div>



<div class="row">

<div class="col-sm-12">

<div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>

@if ($errors->has('g-recaptcha-response'))

<span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>

@endif

<span class="text-danger small error-text g-recaptcha-response_error"> </span>

</div>

</div>

<br>



<div class="row">

<div class="col-sm-12">

<div class="form-group">

<div class="button">

<input type="hidden" class="form-control" name="page_url" id="page_url" value="{{url()->current()}}">

<button type="submit" id="contactid" class="btn">Submit</button>

</div>

</div>

</div>

</div>



</form>

</div>  

</div>

</section>



@endsection  