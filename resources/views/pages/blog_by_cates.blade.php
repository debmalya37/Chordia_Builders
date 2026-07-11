@if(!$blogscates->isEmpty())
@foreach($blogscates as $blog)
<div class="bbox">
<div class="bbimg">
 @if($blog->image)   
<img src="<?= (isset($blog->image))?asset("blog_images/$blog->image"):asset('images/noblog.jpg') ?>" class="img-fullwidth">  
@endif
<div class="perspective"></div>
</div>
<div class="information"> 
<div class="meta-top">
<span class="date-time"> {{ date_format(date_create($blog->blog_date),'d M Y') }}</span>
<p class="name-category">Chordia's </p>
</div>
<h3><a href="{{ url('blog/'.$blog->slug_url) }}">{{ $blog->title }}</a></h3>
<p>{!! Str::words($blog->description, 150) !!}</p>
<div class="meta-bottom">
<a class="continue-reading" href="{{ url('blog/'.$blog->slug_url) }}">Continue Reading...</a>
</div>

<div class="lsocial"> 
<ul>
<li><a href=""><i class="fa fa-facebook"></i></a></li>
<li><a href=""><i class="fa fa-twitter"></i></a></li>
<li><a href=""><i class="fa fa-linkedin"></i></a></li>
<li><a href=""><i class="fa fa-play"></i></a></li>
<li><a href=""><i class="fa fa-instagram"></i></a></li>
</ul>
</div>
</div> 
 
</div>
@endforeach
@endif
