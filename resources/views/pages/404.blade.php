@extends('layouts.header')
@section('content')
<div class="bread">
<div class="container">
<ul>
<li><a href="{{route('index')}}"><i class="fa fa-home"></i> </a></li> /
<li>404 Error </li> 
</ul>
</div>
</div>
<section class="inner section">
<div align="center ">
<svg height="100" width="100">
<polygon points="50,25 17,80 82,80" stroke-linejoin="round" style="fill:none;stroke:#ff8a00;stroke-width:8"/>
<text x="42" y="74" fill="#ff8a00" font-family="sans-serif" font-weight="900" font-size="42px">!</text>
</svg>
<div align="center">
<h1>Page not found (404 error)</h1>
<p style="text-align:center;">The page you requested doesn't exists anymore <br><a href="" class="btn btn-info">Back Home</a></p>
</div>
</div>
</section>
<!--/ End Events -->
@endsection
