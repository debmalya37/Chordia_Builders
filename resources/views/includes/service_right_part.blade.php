<div class="blog-right"> 
<div class="lsocial">
<h3>Social</h3>
<ul>
@foreach(json_decode(GeneralHelper::Generals()->social_data) as $instdt)  
<li><a href="{{$instdt->social_url}}"><i class="{{$instdt->social_icon}}"></i></a> </li>
@endforeach  
</ul>
</div>

  
<div class="prolink">
<h3 class="widget-title">Residential Projects</h3>
<ul>
@foreach(GeneralHelper::BlogProjects() as $projs)  
<li><a href="{{ url('project/'.$projs->slug_url) }}">{{$projs->title}}</a></li>
@endforeach
</ul>
</div>

@if(!$services->isEmpty())
<div class="widgetlink">
<h3 class="widget-title ">All CSR</h3>
<ul>
@foreach($services as $evts)
<li><a href="{{ url('csr/'.$evts->slug_url) }}">{{ $evts->title }} </a></li>
@endforeach

</ul>
</div>
@endif

</div>