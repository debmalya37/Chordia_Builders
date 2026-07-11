@if(!$categories->isEmpty())

<section class="chordia-features">

 

<div class="row">

@foreach($categories as $cates)

<div class="col-md-4">

<div class="feachers-overlay project-img-zoom feachers-first">

<img src="<?= (isset($cates->image))?asset("category_images/$cates->image"):asset('') ?>" class="img-responsive" alt="world family image">

<div class="feachers-overlay-text feachers-btn">

<a href="{{ url('projects/'.$cates->slug_url) }}">

<p>{{$cates->title}}</p>
 

</a>

<br> 

</div> 

</div>

</div>

@endforeach



</div>

 

</section> 

@endif