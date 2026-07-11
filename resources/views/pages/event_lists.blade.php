@if(!$events->isEmpty())
<div class="row">  
@foreach($events as $evts)
<div class="col-md-4">
<div class="nevent">
<div class="n-head overlay">
<img src="{{ asset('event_images/'.$evts->image) }}" alt="{{$evts->alt_tag}}">
<a href="{{ url('event/'.$evts->slug_url) }}" class="btn"><i class="fa fa-arrow-right"></i></a>
</div>
<div class="n-content">
<h4><a href="{{ url('event/'.$evts->slug_url) }}">{{$evts->title}}</a></h4>
<a href="{{ url('event/'.$evts->slug_url) }}" class="readmore">Read More</a>
</div>
</div>
</div>
@endforeach
</div>
@endif