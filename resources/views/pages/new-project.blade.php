<section class="kosmos-points">
<div class="container">
<div class="row">
<div class="col-md-3 col-6">
<div class="kpbox"><a href="#quickid">
<i class="fa fa-file"></i> Enquiry
</a>
</div>
</div>
<div class="col-md-3 col-6">
<div class="kpbox"><a href="tel:{{ GeneralHelper::Generals()->phone }}">
<i class="fa fa-phone"></i> Call
</a>
</div>
</div>
<div class="col-md-3 col-6">
<div class="kpbox">
<a href="https://api.whatsapp.com/send?phone={{ GeneralHelper::Generals()->phone }}&text=Hi!" target="_blank">
<i class="fa fa-whatsapp"></i> Whatsapp
</a>
</div>
</div>
<div class="col-md-3 col-6">
<div class="kpbox"><a href="{{route('contact-us')}}" target="_blank">
<i class="fa fa-envelope-o"></i> Contact Us
</a>
</div>
</div>
</div>
</div>
</section>

<section class="about-kosmos">
<div class="container">
@if($info->project_logo)    
<img src="<?php echo asset("project_images/$info->project_logo")?>" class="mb-3" />
@endif
<h2>{!!$info->tagline!!}</h2>
<p>{!!$info->project_overview!!} </p>

@if(!empty($info->brochure_file))
<a target="__blank" href="<?php echo asset("project_images/$info->brochure_file")?>"><img src="{{asset('images/Download-Brochure.png.jpg')}}" width="20%" alt="Download Brochure"></a>
@endif

<!--<div class="button"> -->
<!--<a class="btn" href="<?php echo asset("project_images/$info->brochure_file")?>" target="_blank">Download Brochure</a> -->
<!--</div>-->

</div>
</section>


<div class="fun-facts" > 
<div class="container">
<div class="row">

<div class="col-lg-3 col-md-6 col-6">

<!-- Single Fact -->
@if(!empty($info->acres))
<div class="single-fact"> 

    <div class="number"><span class="counter">{{$info->acres}}</span> </div>

    <p>Bigha</p>

</div>
@endif
<!--/ End Single Fact -->

</div>

<div class="col-lg-3 col-md-6 col-6">

<!-- Single Fact -->
@if(!empty($info->no_units))
<div class="single-fact"> 

    <div class="number"><span class="counter">{{$info->no_units}}</span> </div>

    <p>No. of Units</p>

</div>
@endif

<!--/ End Single Fact -->

</div>

<div class="col-lg-3 col-md-6 col-6">

<!-- Single Fact -->
@if(!empty($info->no_floor))
<div class="single-fact"> 

    <div class="number">G+<span class="counter">{{$info->no_floor}}</span> </div>

    <p>No. of Floor</p>

</div>
@endif
<!--/ End Single Fact -->

</div>

<div class="col-lg-3 col-md-6 col-6">

<!-- Single Fact -->
@if(!empty($info->no_blocks))
<div class="single-fact"> 

    <div class="number"><span class="counter">{{$info->no_blocks}}</span> </div>

    <p>No. of Blocks</p>

</div>
@endif
<!--/ End Single Fact -->

</div>

</div> 
</div>
</div>

@if($info->highlights)
<section class="section useproject">  
<div class="container">  
<h2>Project Highlights</h2> 
<div class="row">
<div class="col-md-12">
{!!$info->highlights!!}
</div>

</div>   
 
</div>            
</section>
@endif

@if(sizeof($info->poroject_itinerary))
<section class="section kosmos-floorplan">  
<div class="container">  
<h2>Floor Plans</h2>
<div class="floor-slider">
@foreach($info->poroject_itinerary as $fimgs)
<div class="single-plan">
<div class="head overlay">
<img src="<?= (asset("project_floor_images/".$fimgs->image.""))?>" class="img-fullwidth">
<a href="<?= (asset("project_floor_images/".$fimgs->image.""))?>" data-fancybox="photo" data-caption="{{$fimgs->title}}" class="btn"><i class="fa fa-search"></i></a>
</div> 
<h3>{{$fimgs->title}}</h3> 
</div>
@endforeach
</div>
</div>            
</section>
@endif


@if(sizeof($info->projectimages))
<section class="section kosmos-gallery">  
<div class="container">
<div class="pageHed">
<h3>Project Gallery</h3>
</div> 
<div class="k-slider">
 @foreach($info->projectimages as $mimgs)
<div class="kgallBox">
<div class="head overlay">
<img src="<?= (asset("project_more_images/".$mimgs->image.""))?>" class="img-fullwidth">
<a href="<?= (asset("project_more_images/".$mimgs->image.""))?>" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
</div>  
<div class="kgallBox-logo">
@if($info->project_logo)    
<img src="<?php echo asset("project_images/$info->project_logo")?>" width="60" />
@endif    
</div>
<div class="kgallBox-decripation">{{$mimgs->title}}</div>
</div>
@endforeach
</div> 
</div>
</section>
@endif

<section class="section inner">
<div class="container">
<div class="section-title">
<div class="row flex-row-reverse"> 
@if(!empty($info->amenities_file))
<div class="col-md-4 d-none d-sm-block">
<div class="img-exp">
<div class="about-img">
<img src="{{asset('images/about.jpg')}}" alt=""> 
</div>
</div>
</div>
@endif
<div class="col-md-8">
@if(!empty($info->amenities_file))
<h2>Amenities</h2>
<p>{!!$info->amenities!!}  </p>
<div class="button ">
<a class="btn" target="__blank" href="<?php echo asset("project_images/$info->amenities_file")?>">Download Amenities</a>
</div>
@endif

@if(sizeof($info->getamenitiesitems))

<div class="row">
@foreach($info->getamenitiesitems as $amin)
<div class="col-sm-3 col-6">
@if(!empty($amin->image))    
<div class="statistics">
<img src="<?= (isset($amin->image))?asset("amenities_more_images/$amin->image"):asset('') ?>" />
<p>{{$amin->title}}</p>
</div>
@endif
</div>
@endforeach
</div>
 @endif
</div>
</div>
</div>
</div>
</section>


@if($info->specifications_text)
<section class="section inner">
<div class="container">
<div class="section-title">
<div class="row">
<div class="col-md-8">
<h2>Specifications</h2>
<p>{!! $info->specifications_text !!} </p>
<div class="button ">
<a class="btn" target="__blank" href="<?php echo asset("project_images/$info->specification_file")?>">Download Specifications</a>
</div>
</div>
<div class="col-md-4">
<img src="{{asset('images/Specifications-min.png')}}" class="img-fullwidth">
</div>
</div>
</div> 
</div>
</section>
@endif


@if($info->floor_plans_text)
<section class="section inner">
<div class="container">
<div class="section-title">
<div class="row">
<div class="col-md-8">
<h2>Floor Plans</h2>
<p>{!! $info->floor_plans_text !!}</p>
<div class="button ">
<a class="btn" target="__blank" href="<?php echo asset("project_images/$info->floor_plans_file")?>">Download Floor Plans</a>
</div>
</div>
<div class="col-md-4">
<img src="{{asset('images/Floorplans.png')}}" class="img-fullwidth">
</div>
</div>
</div> 
</div>
</section>
@endif

<section class="kosmos-location">
<div class="container"> 
<div class="row">
<div class="col-md-8">
<div class="kosmosmap">
<iframe class="gmap_iframe" width="100%" height="450" src="{!! $info->location_map !!}"></iframe>
</div>
</div>
<div class="col-md-4">
<div class="kosmosaddress">
@if($info->project_logo)    
<img src="<?php echo asset("project_images/$info->project_logo")?>" alt="{{$info->title}}"  />
@endif  
<h3>{{$info->rera_no}}</h3>
<p>{{$info->address}}</p>
<h4><a href="tel:+91-8239411411">+91-8239411411</a></h4>
<!--<div class="button"> -->
<!--<a class="btn" href="{{$info->location_map}}" target="_blank">Get Direction</a> -->
<!--</div>-->
</div>
</div>
</div>
</div>
</section>


<section class="signup">
<div class="container">
<div class="row">
<div class="col-md-3">
<div class="sbgred">
<p>Chordia's Builder</p>
<h2>Enquire Now To Know More About Project</h2>
</div>
</div>
<div class="col-md-9">
<div class="sbgwhite">
<form method="POST" class="form" autocomplete="off" id="quickid" action="{{route('common.send')}}">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">  
<div class="row">
<div class="col-md-6 col-12">
<div class="form-group">  
<label>Name<span>*</span></label>
<input name="name" id="name" class="form-control" type="text" placeholder="Your Name"> 
<span class="text-danger small error-text name_error"> </span>
</div>
</div>
<div class="col-md-6 col-12">
<div class="form-group">  
<label>Email Address<span>*</span></label>
<input name="email" id="email" class="form-control" type="text" placeholder="Email Id"> 
<span class="text-danger small error-text email_error"> </span>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-12">
<div class="form-group">  
<label>Contact No.<span>*</span></label>
<input name="phone" id="phone" class="form-control" type="text" placeholder="Phone No."> 
<span class="text-danger small error-text phone_error"> </span> 
</div>
</div>
<div class="col-md-6 col-12">
<div class="form-group">
<label>City<span>*</span></label>  
<input name="city" id="city" class="form-control" type="text" placeholder="Your City"> 
<span class="text-danger small error-text city_error"> </span> 
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="form-group"> 
<label>Message<span>*</span></label> 
<textarea name="messages" id="messages" placeholder="Message" rows="4"></textarea>
</div>
</div>
 
<div class="col-sm-12">
<div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
<span class="text-danger small error-text g-recaptcha-response_error"> </span>
</div>
 
</div>
<div class="row">
<div class="col-12 mt-2">
<div class="form-group"> 
<input type="hidden" class="form-control" name="page_url" id="page_url" value="{{url()->current()}}">
<input class="wpcf7-submit" id="contactid" type="submit" value="Submit"> 
</div>
</div>
</div> 
</form>	
</div>
</div>
</div>
</div>
</section>

@if(sizeof($info->project_near_location))
<div  class="cosmosfaq"> 
<div class="container"> 
<h3>The Finest Connectivity Supporting the Vital Growth of the Nation</h3> 
<div class="faq-content">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> 
<div class="row">
@php($key=1) @foreach($info->project_near_location as $faqlist)
<div class="col-md-6">    
<div class="panel panel-default {{$key==1?'active':''}}">
<!-- Single Faq -->
<div class="faq-heading" id="FaqTitle1">
<h4 class="faq-title">

<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#faq{{$key}}" aria-expanded="false">Q: {{$faqlist->title}}</a>

</h4> </div>
<div id="faq{{$key}}" class="panel-collapse" role="tabpanel" aria-labelledby="FaqTitle{{$key}}">
<div class="faq-body">
<p>{!! $faqlist->description !!}</p>
</div>
</div>
<!--/ End Single Faq -->
</div> 
</div>
@php($key++) 
@endforeach
</div>
</div>

</div>  

</div> 
</div>
@endif


@if(!$projects->isEmpty())
<section class="other-projects">
<div class="container">
<h2>Other Projects You May Be Interested In</h2>
<div class="op-slider">
@foreach($projects as $projs)
<div class="opbox">
<a href="{{url('project/'.$projs->slug_url)}}">
<img src="<?php echo asset("project_images/$projs->image")?>" alt="{{$projs->image}}" class="img-fullwidth" />
<h3>{{$projs->title}}</h3>
<p>{{$projs->address}}</p>
@if($projs->no_units)
<h4>{{$projs->no_units}} Units</h4>
@endif
</a>    
</div>
@endforeach
</div>
</div>
</section>
@endif

