@if(Route::is('index'))
<title>{{ GeneralHelper::Generals()->title_tag?GeneralHelper::Generals()->title_tag:'' }}</title>
<meta name="keywords" content="{{ GeneralHelper::Generals()->meta_keyword?GeneralHelper::Generals()->meta_keyword:'' }}" />
<meta name="description" content="{{ GeneralHelper::Generals()->meta_description?GeneralHelper::Generals()->meta_description:'' }}">
@endif 
@if(!empty($contant))
<title>{{ $contant->title_tag?$contant->title_tag:'' }}</title>
<meta name="keywords" content="{{ $contant->meta_keyword?$contant->meta_keyword:'' }}" />
<meta name="description" content="{{ $contant->meta_description?$contant->meta_description:'' }}">
@endif
@if(!empty($info))
<title>{{ $info->title_tag?$info->title_tag:'' }}</title>
<meta name="keywords" content="{{ $info->meta_keyword?$info->meta_keyword:'' }}" />
<meta name="description" content="{{ $info->meta_description?$info->meta_description:'' }}">
<link rel="canonical" href="{{ $info->canonical_tag?$info->canonical_tag:'' }}"/>
@endif
<link rel="canonical" href="{{url()->current()}}" />
<meta name="robots" content="all,follow">
<meta name="google-site-verification" content="_RabCQOUOl8r5XL75sFoRjWMsrz2bC-UvXEX9tNycs0" />
<!-- Geo Meta Tags -->
<meta name="geo.region" content="IN-RJ">
<meta name="geo.placename" content="Jaipur, Rajasthan, India">
<meta name="geo.position" content="26.8851;75.7895">
<meta name="ICBM" content="26.8851, 75.7895">

<meta name="location" content="Jaipur, Rajasthan, India">
<meta name="distribution" content="Global">
<meta name="coverage" content="Jaipur, Rajasthan, India">
<meta name="target" content="Luxury Home Buyers, Property Investors, NRIs">
