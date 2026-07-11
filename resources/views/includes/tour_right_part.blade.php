<div class="service-sidebar pe-xxl-5 md-mt-60">
<div class="service-category mb-40">
<h4 class="tx-dark mb-15">Services</h4>
<ul class="style-none">
<li class="current-page"><a href="#overview">Overview</a></li>
<li><a href="#itinerary">Itinerary</a></li>
<li><a href="#booknow">Book Now</a></li> 
</ul>
</div> <!-- /.service-category -->
<div class="sidebar-quote mb-50">
<img src="{{asset('images/icon/icon_150.svg')}}" alt="" class="m-auto">
<p class="fw-500">Evernote Web offers a complete lineup major linup browser</p>
<div class="name">- Rashed Kabir</div>
</div> <!-- /.sidebar-quote -->

<h4 class="tx-dark mb-15">Share it.</h4>
@if(!empty(GeneralHelper::Generals()->social_data)) 						 
<ul class="d-flex justify-content-between social-icon style-none pe-4">
@foreach(json_decode(GeneralHelper::Generals()->social_data) as $instdt)  
<li><a target="_blank" href="{{$instdt->social_url}}"><i class="{{$instdt->social_icon}}"></i></a></li>
@endforeach
</ul>
@endif    
</div> <!-- /.service-sidebar -->