@extends('layouts.header')

@section('content')

@if($info->cat_id=='2')
@if(sizeof($info->projectimages))
<section class="home-slider">
<div class="slider-active">
<!-- Single Slider -->
@foreach($info->projectimages as $mimgs)
<div class="single-slider"> <img src="<?= (isset($mimgs->image))?asset("project_more_images/$mimgs->image"):''; ?>" alt="{{$mimgs->alt_tag}}" class="img-fullwidth"> </div> 
@endforeach
<!--/ End Single Slider -->
</div>
</section>
@endif
@elseif($info->banner)
<section class="innerbanner">
<img src="<?= (isset($info->banner))?asset("project_images/$info->banner"):asset('') ?>" class="img-fullwidth" >
</section>
@endif


<section class="breadcrumbs">

<div class="container"> 

<ul class="bread-list">

<li><a href="{{route('index')}}"><i class="fa fa-home"></i> /</a></li>

<li class="active"><a href="{{route('projects')}}"> Projects /</a> </li>

@if(isset($info)) <li>{{$info->title}}</li>  @endif

</ul>

</div> 

</section>        





@if($info->cat_id!='2')

<!-- About-chordia -->

<section class="section inner">

<div class="container">

<div class="row"> 

<div class="col-md-8">

<div class="section-title">

<h2>{{$info->title}}</h2>

<p>{!! $info->description !!} </p>

</div>



</div>

<div class="col-md-4">

<div class="ch">
@if(!empty($info->brochure_file))
<a   target="__blank" href="<?php echo asset("project_images/$info->brochure_file")?>"><img src="{{asset('images/Download-Brochure.png.jpg')}}" alt="Download Brochure"></a>
@endif
</div>



<div class="ch">

<h3><i class="fa fa-map-marker"></i> Address</h3>

<p>{{$info->address}}</p>

</div>



<div class="ch">

<h3>RERA No:</h3>

<p>{{$info->rera_no}}</p>

</div>



</div>







</div>





<div class="fun-facts" > 

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

</section> 

<!-- About -->



<?php /*?><section class="section explore-feature">

<div class="container">



<div class="expactivities">

<div class="row">

<div class="col-md-6">

    <img src="{{asset('images/Project1.png')}}" class="img-fullwidth">

</div>

<div class="col-md-6">

<div class="eatext">

<div>

<h2>For a new high in the new-age living</h2>



<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>



</div>

    </div>

</div>

</div>

</div>

<div class="expactivities">

<div class="row flex-row-reverse">

<div class="col-md-6">

    <img src="{{asset('images/Project2.png')}}" class="img-fullwidth">

</div> 

<div class="col-md-6">

    <div class="eatext">

        <div>

        <h2>Value home with luxury and comfort</h2>

            

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            

        </div>

    </div>

</div>                        

</div>

</div>





</div>

</section><?php */?>

<?php /*?>@if($info->clubhouse_text)

<section class="section inner">

<div class="container">

<div class="section-title">

<h2>Clubhouse</h2>

<p>{!! $info->clubhouse_text !!}</p>

<img src="<?= (isset($info->clubhouse_image))?asset("project_images/$info->clubhouse_image"):asset('') ?>" class="img-fullwidth">

</div> 

</div>

</section>

@endif<?php */?>
@if(sizeof($info->getamenitiesitems))

<section class="section inner">

<div class="container">
<div class="section-title">
<div class="row flex-row-reverse"> 

<div class="col-md-4 d-none d-sm-block">

<div class="img-exp">

<div class="about-img">

        <img src="{{asset('images/about.jpg')}}" alt=""> 

</div>

    

</div>

</div>


<div class="col-md-8">

@if($info->amenities)
<h2>Amenities</h2>

<p>{!!$info->amenities!!}  </p>
@endif

@if(!empty($info->amenities_file))
<div class="button ">
<a class="btn" target="__blank" href="<?php echo asset("project_images/$info->amenities_file")?>">Download Amenities</a>
</div>
@endif

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

</div>
</div>
</div>
</div>

</section>
 @endif

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
@if(sizeof($info->projectimages))

<section class="section inner">

<div class="container">

<div class="section-title">

<h2>Gallery</h2> 

<section class="home-slider"> 

<div class="slider-active">

<!-- Single Slider -->

@foreach($info->projectimages as $mimgs)

<div class="single-slider">

<img src="<?= (asset("project_more_images/".$mimgs->image.""))?>" class="img-fullwidth" />

</div>

@endforeach

<!--/ End Single Slider -->

</div> 

</section>

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

 
@if(!empty($info->location_map))
<section class="section inner">
<div class="container">
<div class="section-title">
<h2>Location Map</h2>
 <iframe class="gmap_iframe" width="100%" height="450" src="{!! $info->location_map !!}"></iframe>
</div> 
</div>
</section>
@endif


@else

@include('pages.new-project')

@endif

@endsection