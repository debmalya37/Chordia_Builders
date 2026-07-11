@if(!$photocats->isEmpty())
@foreach($photocats as $gallery) 
@if($gallery->slug_url != 'life-of-chordias')
<div class="col-md-6">
<div class="gallerycat">
<a href="{{ url('photo/'.$gallery->slug_url) }}">             
<div class="overflow">
<div class="overlays"></div>
<img class="card-img-top" src="{{ asset('gallery_images/'.$gallery->image) }}" alt="{{$gallery->title}}">
</div>     
<div class="caption_mans">
<h4>{{$gallery->title}}</h4>
<!-- <p>25<sup>th</sup> Dec 2022 </p> -->
</div>
</a>             
</div>
</div>
@endif
@endforeach
@endif