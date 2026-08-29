@extends('layouts.header')

@section('content')

<!-- 1. Eager loaded banner for fast LCP -->
@if(!$banners->isEmpty())
<section class="home-slider">
<div class="slider-active">
@foreach($banners as $banner)
<div class="single-slider"> 
    @if(isset($banner->image))
        @php
            // Extracts the base filename (e.g., 'slide1' from 'slide1.jpg')
            $filename = pathinfo($banner->image, PATHINFO_FILENAME);
        @endphp
        <picture>
            <!-- Modern Browsers: WebP -->
            <source srcset="{{ asset("banner_images/webp/{$filename}.webp") }}" type="image/webp">
            <!-- Fallback: JPG/PNG -->
            <img src="{{ asset("banner_images/{$banner->image}") }}" alt="{{$banner->alt_tag}}" width="1500" height="725" class="img-fullwidth">
        </picture>
    @endif
</div> 
@endforeach
</div>
</section>
@endif


@if(!empty($aboutus)) 
<section class="section about-chordia">
<div class="container">
<div class="row flex-row-reverse"> 
<div class="col-md-10 mx-md-auto">
    <!-- 2. Changed to H1 for SEO (Page must have one H1), kept h2 styling -->
    <h1 class="h2">{{$general->main_heading}}</h1>
    <p>For over 35 years, Chordia Builders has proudly transformed the cityscape by delivering quality homes that blend luxury and affordability. We specialize in offering premium apartments
    in Mansarovar Jaipur, designed to provide modern living with comfort and style. Our commitment is to create luxury flats in Jaipur that not only meet but 
    exceed expectations, focusing on community well-being and sustainable development. At Vivek Chordia Builders, we understand the importance of 
    building more than just houses — we build dream homes where families thrive. Our dedication to craftsmanship and resident satisfaction has
    earned us the trust of countless homeowners. As the city evolves, we remain passionate about shaping spaces that bring joy, security, 
    and elegance within reach. Choosing Chordia Builders means investing in a legacy of excellence, innovation, and heartfelt 
    responsibility toward our residents. </p>
    <div class="button"> <a href="{{ url('page/vision-mission') }}" class="btn" aria-label="Read more about our vision and mission">About More &nbsp; <span> <i class="fa fa-caret-right"></i> </span></a> </div>
</div>
</div>
</div>
</section>
@endif

<div class="homest">
    <div class="container">
        <div class="row">
            <!-- 3. Added loading="lazy" to below-the-fold images and converted to picture -->
            <div class="col-md-3 col-6">
                <div class="stbox">
                    <div class="icon"> 
                        <picture>
                            <source srcset="{{asset('images/webp/static01.webp')}}" type="image/webp">
                            <img src="{{asset('images/static01.png')}}" width="55" height="55" alt="Projects Delivered" loading="lazy" /> 
                        </picture>
                    </div>
                    <div class="num"> 9 </div>
                    <div class="heading"> Projects Delivered </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stbox">
                    <div class="icon"> 
                        <picture>
                            <source srcset="{{asset('images/webp/static02.webp')}}" type="image/webp">
                            <img src="{{asset('images/static02.png')}}" width="55" height="55" alt="Happy Families" loading="lazy" /> 
                        </picture>
                    </div>
                    <div class="num"> 2500+ </div>
                    <div class="heading"> Happy Families </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stbox">
                    <div class="icon"> 
                        <picture>
                            <source srcset="{{asset('images/webp/static03.webp')}}" type="image/webp">
                            <img src="{{asset('images/static03.png')}}" width="55" height="55" alt="Area Delivered" loading="lazy" /> 
                        </picture>
                    </div>
                    <div class="num"> 35 </div>
                    <div class="heading"> lac (approx.) sq. ft. of area already delivered </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stbox active">
                    <div class="icon"> 
                        <picture>
                            <source srcset="{{asset('images/webp/static04.webp')}}" type="image/webp">
                            <img src="{{asset('images/static04.png')}}" width="55" height="55" alt="Area to be Delivered" loading="lazy" /> 
                        </picture>
                    </div>
                    <div class="num"> 10 </div>
                    <div class="heading heading-white"> lac (approx.) sq. mt. more of area to be delivered by 2025 </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@if(!$recommended->isEmpty())
<section class="section ourproject">
    <div class="container">
        <h2>Ongoing Project</h2>
        @php $i = 1; @endphp
        @foreach($recommended as $nproject)
            <div class="homeproject">
                <div class="row {{$i % 2 == 0 ? 'flex-row-reverse' : ''}}">
                    <div class="col-md-7"> 
                        @if(isset($nproject->image))
                            @php
                                $proj_filename = pathinfo($nproject->image, PATHINFO_FILENAME);
                            @endphp
                            <picture>
                                <source srcset="{{ asset("project_images/webp/{$proj_filename}.webp") }}" type="image/webp">
                                <img src="{{ asset("project_images/{$nproject->image}") }}" width="855" height="582" alt="{{$nproject->alttag}}" class="img-fullwidth" loading="lazy" />
                            </picture>
                        @else
                            <img src="{{ asset('') }}" width="855" height="582" alt="{{$nproject->alttag}}" class="img-fullwidth" loading="lazy" />
                        @endif
                    </div>
                    <div class="col-md-5">
                        <div class="prtext">
                            <div class="dabba">
                                <h3>{{$nproject->title}}<br><small></small></h3>
                                <h4>{{$nproject->sub_title}}</h4> 
                                
                                <h5>RERA No: {{$nproject->rera_no}}</h5>
                                <p><i class="fa fa-map-marker"></i>  {{$nproject->address}}</p>
                                <div class="button "> <a class="btn" href="{{ url('project/'.$nproject->slug_url) }}" aria-label="Know more about {{$nproject->title}}">Know More</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            @php $i++; @endphp
        @endforeach
    </div>
</section> 
@endif

<section class="section dpradvantage">
<div class="container">
<h2>Chordia’s Difference</h2>
<div class="row">
<div class="col-md-4">
<div class="adbox">
<div class="row">
<div class="col-3">
<!-- 4. Replaced incorrect <h1> tags with styling divs to fix accessibility hierarchy -->
<div class="h1 adcolor01">1</div>
</div>
<div class="col-9">
<h3>Luxury Flats in Jaipur</h3>
<p>Experience premium design, top-tier materials, and flawless finishes in every luxury flat.</p>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="adbox">
<div class="row">
<div class="col-3">
<div class="h1 adcolor02">2</div>
</div>
<div class="col-9">
<h3>Choice</h3>
<p>Stylish interiors with wonderful finish in every corner complying with superior quality craftsmanship work.</p>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="adbox">
<div class="row">
<div class="col-3">
<div class="h1 adcolor03">3</div>
</div>
<div class="col-9">
<h3>Excellence</h3>
<p>Natural lights, complete ventilation, vastu compliant and premium fixtures quality with every unit irrespective of its size.</p>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="adbox">
<div class="row">
<div class="col-3">
<div class="h1 adcolor04">4</div>
</div>
<div class="col-9">
<h3>Accessibility</h3>
<p>The wonderful experience of owning property do not stops with it rather it keeps on going with our consistent endeavors to keep you smiling always.</p>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="adbox">
<div class="row">
<div class="col-3">
<div class="h1 adcolor05">5</div>
</div>
<div class="col-9">
<h3>Responsiveness</h3>
<p>Equipped with expert team and seasoned professionals we always promote nurturing relationships with our patrons.</p>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="adbox">
<div class="row">
<div class="col-3">
<div class="h1 adcolor06">6</div>
</div>
<div class="col-9">
<h3>Attention to Detail</h3>
<p>Construction, fittings, architecture including the view, we take care of every minute detail before offering best of us.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="section home-career">
<div class="container"> 
<h2>Why Chordia Builders?</h2>  
<div class="expactivities">
<div class="row">
<div class="col-md-7">
<picture>
    <source srcset="{{asset('images/webp/why-us.webp')}}" type="image/webp">
    <img src="{{asset('images/why-us.jpg')}}" alt="Residential projects in Jaipur by Chordia Builders" width="855" height="582" class="img-fullwidth" loading="lazy" />
</picture>
</div>
<div class="col-md-5">
<div class="eatext">
<div class="dabba">
<p>At Chordia Builders, we believe in building more than just homes — we build trust, value, and a better lifestyle. With over 35 years of experience in the real estate industry, we are known for delivering high-quality construction, timely possession, and customer satisfaction across all our projects.

If you’re searching for flats in Mansarovar Jaipur, look no further. Our projects are located in well-connected areas, offering seamless access to schools, hospitals, shopping centers, and major transport routes. We prioritize both location and lifestyle, ensuring your new home meets every modern need.

Our reputation for delivering a luxury apartment in Jaipur at affordable prices sets us apart. From elegant designs and premium finishes to thoughtful layouts and community spaces, every Chordia project reflects our commitment to excellence.

We also provide full legal transparency, RERA compliance, and dedicated customer support to make your home-buying experience smooth and stress-free.

Join hundreds of happy families who have made Chordia Builders their trusted choice. Whether you're a first-time homebuyer or looking to upgrade your lifestyle, we’re here to help you find the perfect place to call home.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="section media">
<div class="container"> 
<h2>Get in touch with us</h2> 
<div class="job-openings"> 
<div class="contact-form-area"> 
<form method="POST" class="form" autocomplete="off" id="quickid" action="{{route('common.send')}}">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="row">
<div class="col-sm-4">
<div class="form-group"> 
<!-- 5. Added aria-labels to form inputs for screen readers -->
<input name="name" id="name" type="text" placeholder="Full Name" aria-label="Full Name">
<span class="text-danger error-text name_error"> </span>
</div>
</div> 
<div class="col-sm-4">
<div class="form-group"> 
<input name="email" id="email" type="email" placeholder="Email Address" aria-label="Email Address">
<span class="text-danger error-text email_error"> </span>
</div>
</div>
<div class="col-sm-4">
<div class="form-group"> 
<input name="phone" id="phone" type="text" placeholder="Phone No." aria-label="Phone Number">
<span class="text-danger error-text phone_error"> </span>
</div>
</div>
</div> 
<div class="row">
<div class="col-sm-4">
<div class="form-group"> 
<input name="city" id="city" type="text" placeholder="City" aria-label="City">
<span class="text-danger error-text city_error"> </span>
</div>
</div> 
<div class="col-sm-8">
<div class="form-group"> 
<input name="messages" id="messages" type="text" placeholder="Message" aria-label="Message">
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
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<div class="button text-center">
<input type="hidden" class="form-control" name="page_url" id="page_url" value="{{url()->current()}}">
<button type="submit" id="quickid" class="btn">Submit</button>
</div>
</div>
</div>
</div>
</form>
</div>   
</div>  
</div>
</section>

@if(!$testimonials->isEmpty())
<section class="testimonial section">
<div class="container">
<h2>Customers Speak</h2> 
<div class="testimonial-slider"> 
@foreach($testimonials as $testimonial)
<div class="single-testimonial">
<div class="main-content"> 
<p>{!! $testimonial->description !!}</p>    
</div>
<div class="main-footer">
<!-- 6. Fixed missing alt text on testimonial images and converted to picture -->
<div class="testiimg">
    <picture>
        <source srcset="{{asset('images/webp/testimonial1.webp')}}" type="image/webp">
        <img src="{{asset('images/testimonial1.jpg')}}" width="200" height="200" alt="Testimonial from {{$testimonial->title}}" loading="lazy">
    </picture>
</div>    
<div class="testicite">
<div class="testimonial__name">{{$testimonial->title}} </div>
<div class="testimonial__title">{{$testimonial->designation}} </div>
</div>
</div> 
</div>
@endforeach                  
</div>
</div>
</section>
@endif

@endsection