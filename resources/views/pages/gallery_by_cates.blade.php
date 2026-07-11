@if($info->photosbycates)
@foreach($info->photosbycates as $gallery)    
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