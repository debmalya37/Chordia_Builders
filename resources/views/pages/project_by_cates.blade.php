@if(!$projcats->isEmpty())
<div class="row">
@foreach($projcats as $projs)
<div class="col-md-6">
<div class="projectbox">
<div class="pimg">
<a href="{{ url('project/'.$projs->slug_url) }}">
<img src="<?= (isset($projs->image))?asset("project_images/$projs->image"):asset('') ?>" class="img-fullwidth" >
</a>
</div>
<div class="ptxt">
<h4><a href="{{ url('project/'.$projs->slug_url) }}">{{$projs->title}}</a></h4>
<p>{{$projs->address}}</p>
</div>
</div>
</div>
@endforeach

</div>
@endif