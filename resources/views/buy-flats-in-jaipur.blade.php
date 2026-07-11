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

<h2>Enquire Now to Buy Your Dream Apartment in Jaipur</h2>

<p>Ready to buy apartment in Jaipur? Fill out the form below and get personalized assistance, site visits, and the best deals from Chordia Builders.</p>

</div> 



<div class="contact-section">  

<div class="row">

<div class="col-md-6">

<div class="contact-form-area">

<h2>Send us your message or</h2>
<h3 style="color: #fff; margin-bottom: 15px;">Call us at: <a href="tel:+918239411411" style="color: #fff;">+91-8239411411</a></h3>

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

<h2>Luxury Living</h2>

<div class="conbox">

<p>Looking to own a spacious, well-designed home in Jaipur? Chordia Builders brings you premium 2 BHK and 3 BHK luxury flats in Jaipur located across the city’s most 
sought-after residential areas — including Vaishali Nagar, Mansarovar, and Ajmer Road.</p>
<p>Whether you’re searching for 3 BHK flats in Vaishali Nagar Jaipur or a modern home near Ajmer Road or Mansarovar, our projects are strategically located with excellent connectivity to schools, hospitals, markets, and major transport routes.</p>
<h3>Each of our luxury flats features:</h3>
<ul>
    <li>High-class amenities such as a clubhouse, gym, and landscaped gardens</li>
    <li>24x7 security with CCTV surveillance</li>
    <li>Modular kitchens, branded fittings, and premium finishes</li>
    <li>Basement parking, elevators, and full power backup</li>
    
</ul>
<p>Our homes are crafted to offer natural light, ventilation, and intelligent space utilization — perfect for growing families or investors seeking long-term value.</p>
<h3>Fill out the inquiry form to receive:</h3>
<ul>
    <li>Detailed brochures and floor plans</li>
    <li>Pricing and payment plans</li>
    <li>Project availability in your preferred location</li>
    <li>Assistance from our property experts</li>
</ul>
<p>Whether you're looking to invest in 3 BHK flats in Vaishali Nagar Jaipur or want a peaceful home in Mansarovar or Ajmer Road, Chordia Builders is your trusted real estate partner.</p>
<p>Don’t miss out on your dream home — send your inquiry today and take the first step toward luxury living in Jaipur’s finest neighborhoods.</p>
</div>

</div>

</div>

</div> 

</div>
@if(!$recommended->isEmpty())
<section class="section ourproject">
	<div class="container">
		<h2>Ongoing Project</h2>
		@php($i=1)
		 @foreach($recommended as $nproject)
			<div class="homeproject">
				<div class="row {{$i%2==0?'flex-row-reverse':''}}">
					<div class="col-md-7"> <img src="<?= (isset($nproject->image))?asset("project_images/$nproject->image"):asset('') ?>" width="855" height="582" alt="{{$nproject->alttag}}" class="img-fullwidth" /> </div>
					<div class="col-md-5">
						<div class="prtext">
							<div class="dabba">
								<h3>{{$nproject->title}}<br><small></small></h3>
                                <h4>{{$nproject->sub_title}}</h4> 
								<?php /*?><p>{!! Str::words($nproject->description, 65) !!}</p><?php */?>
<h5>RERA No: {{$nproject->rera_no}}</h5>
<p><i class="fa fa-map-marker"></i>  {{$nproject->address}}</p>
								<div class="button "> <a class="btn" href="{{ url('project/'.$nproject->slug_url) }}">Know More</a> </div>
							</div>
						</div>
					</div>
				</div>
			</div> 
			@php($i++)
			@endforeach
	</div>
</section> @endif


<section class="section home-career">
<div class="container"> 
<h2>Why Chordia Builders?</h2>  
<div class="expactivities">
<div class="row">
<div class="col-md-6">
<img src="{{asset('images/why-us-2.jpg')}}" alt="2 bhk flat for sale in jaipur" width="855" height="582" class="img-fullwidth" />
</div>
<div class="col-md-6">
<div class="eatext">
<div class="dabba mrg-lft-0">
<p>If you're planning to buy apartment in Jaipur or invest in commercial properties in Jaipur, Chordia Builders offers unmatched value and trust. With a legacy of excellence in real estate, we bring you thoughtfully designed spaces across Jaipur’s most prime locations — including Mansarovar, Vaishali Nagar, and Ajmer Road.</p>
<p>Our residential projects feature modern 2 & 3 BHK luxury apartments equipped with elegant interiors, smart layouts, and top-quality construction. Each home is built to offer comfort, style, and functionality — perfect for families looking for a peaceful yet connected lifestyle.</p>
<p>For businesses and investors, our commercial properties provide high visibility, accessibility, and ROI potential. Whether you're opening a retail store, office, or showroom, we offer flexible spaces in high-footfall areas.</p>
<p>All our projects include high-class amenities such as a clubhouse, gym, landscaped gardens, kids’ play zones, ample parking, and 24/7 security.</p>
<p>At Chordia Builders, we don’t just sell properties — we deliver lasting value and community-focused developments. Whether you’re looking for your dream home or a smart investment, we’re here to guide you every step of the way.</p>
<p>Now is the perfect time to buy apartment in Jaipur or invest in commercial property with a builder you can trust.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


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