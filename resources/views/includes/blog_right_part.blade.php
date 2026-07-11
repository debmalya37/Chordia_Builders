<div class="blog-right"> 
<div class="lsocial">
<h3>Social</h3>
<ul>
@foreach(json_decode(GeneralHelper::Generals()->social_data) as $instdt)  
<li><a href="{{$instdt->social_url}}"><i class="{{$instdt->social_icon}}"></i></a> </li>
@endforeach  
</ul>
</div>

@if(!$myblogs->isEmpty())
<div class="lpost">
<h3>Latest Posts</h3> 
<ul>
@foreach($myblogs as $latest)
<li>
<div class="thumb">
<a href="{{ url('blog/'.$latest->slug_url)}}"><img src="<?= (isset($latest->image))?asset("blog_images/$latest->image"):asset('images/noblog.jpg') ?>" /></a>
</div>
<div class="information">
<h4><a href="{{ url('blog/'.$latest->slug_url)}}">{{$latest->title}}</a></h4>
<p class="date-time"><span>{{ date_format(date_create($latest->blog_date),'M') }}</span>{{ date_format(date_create($latest->blog_date),'d Y') }}</p>
</div>
</li>
@endforeach
</ul> 
</div>
@endif
<div class="prolink">
<h3 class="widget-title">Residential Projects</h3>
<ul>
@foreach(GeneralHelper::BlogProjects() as $projs)  
<li><a href="{{ url('project/'.$projs->slug_url) }}">{{$projs->title}}</a></li>
@endforeach
</ul>
</div>

@if(!$blogcats->isEmpty())
<div class="widgetlink">
<h3 class="widget-title ">categories</h3>
<ul>
@foreach($blogcats as $blgcats)
<li><a href="{{ url('blogs/'.$blgcats->slug_url) }}">{{ $blgcats->title }} </a></li>
@endforeach

</ul>
</div>
@endif

</div>