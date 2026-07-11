 

<div class="row">

<div class="col-md-8">

<div class="blog-left">

<div class="iBox02">

<h3><a href="#">{{$info->title}}</a></h3>

<div class="blog-info">  

<a href="#"><i class="fa fa-clock-o"></i>{{ date_format(date_create($info->blog_date),'d M Y') }} </a> 

</div>

@if($info->image)   

<a href="#"><img src="<?= (isset($info->image))?asset("event_images/$info->image"):asset('images/noblog.svg') ?>" alt="{{$info->alt_tag}}" class="img-fullwidth">   </a> 

@endif

<p>{!! $info->description !!}<br><br></p>

</div>

</div>

</div>

<div class="col-md-4">

@include('includes.event_right_part')

</div>

</div>

 