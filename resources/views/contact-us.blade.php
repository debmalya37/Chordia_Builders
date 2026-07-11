@extends('layouts.header')

@section('content')

<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li class="active"> Contact Us </li>

</ul>

</div> 

</section>        





<!-- About-chordia -->

<section class="section inner">

<div class="container">

<div class="section-title">

<h2>Contact Us</h2>

<p>Do you have any questions regarding our projects? Call us or Let us call you. </p>

</div> 



<div class="contact-section">  

<div class="row">

<div class="col-md-6">

<div class="contact-form-area">

<h2>Send us your message</h2>

<form method="POST" class="form" data-toggle="validator" autocomplete="off" id="quickid" action="{{route('contact.send')}}">

<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

<div class="row">

<div class="col-sm-12">

<div class="form-group"> 

<input name="name" id="name" type="text" placeholder="Full Name">

<span class="text-danger error-text name_error"> </span>

</div>

</div> 

</div>

<div class="row"> 

<div class="col-sm-12">

<div class="form-group"> 

<input name="email" id="email" type="email" placeholder="Email Address">

<span class="text-danger error-text email_error"> </span>

</div>

</div>

</div>

<div class="row">

<div class="col-sm-12">

<div class="form-group"> 

<input name="phone" id="phone" type="text" placeholder="Phone No.">

<span class="text-danger error-text phone_error"> </span>

</div>

</div>



</div>

<div class="row">

<div class="col-sm-12">

<div class="form-group"> 

<textarea name="messages" id="messages" placeholder="Message"></textarea>

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

    

<button type="submit" id="contactid" class="btn">Send Message</button>

</div>

</div>

</div>

</div>



</form>

</div>

</div>

<div class="col-md-6">

<div class="feelfree">

<h2>Corporate Office</h2>

<div class="conbox">

<h3>Address</h3>

<p>{!! $general->address !!}</p>

</div>

<div class="conbox">

<h3>Contact Number</h3>

<p>{{ $general->phone }} </p>

</div>

<div class="conbox">

<h3>Email</h3>

<p>{{ $general->email }}<br />{{ $general->emailto }}<Br>
    
    bhishmkhatri@chordiabuilders.com
</p>

</div>

<div class="conbox">

<h3>Get Online</h3>

<p>{{ $general->weburl }}</p>

<ul class="social"> 

@foreach(json_decode(GeneralHelper::Generals()->social_data) as $instdt)  

<li><a href="{{$instdt->social_url}}"><i class="{{$instdt->social_icon}}"></i></a> </li>

@endforeach  

</ul>



</div>

</div>

</div>



</div> 

</div>



@if(!empty($general->gmap))

<div class="section-title mt-3">

<h2>Locate us</h2>
 

</div>

<iframe class="gmap_iframe" width="100%" height="450" src="{{ $general->gmap }}"></iframe>

@endif

</div>



</section>

<!-- About -->



@endsection  