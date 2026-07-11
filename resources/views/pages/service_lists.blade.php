@if(!$services->isEmpty())

 

@php($key=1)    

@foreach($services as $evts)

<div class="grey_patch_section">

<div class="grey_patch_inner{{$key%2==0?'01':''}}">

<div class="row {{$key%2==0?'':'flex-row-reverse'}}">   

<div class="col-md-6">

<div class="patch_section_txt_wrap">

<div>

<div class="patch_section_tittle">

<h3>{{$evts->title}}</h3>

</div>

<p>{!!$evts->description!!}</p>

</div>

</div>

</div>

<div class="col-md-6">

<div class="patch_section_img_wrap">

<img class="philo_img" src="{{ asset('service_images/'.$evts->image) }}" alt="{{$evts->alt_tag}}">

</div>

</div>

</div>

</div>

</div>

@php($key++)

@endforeach

 

@endif