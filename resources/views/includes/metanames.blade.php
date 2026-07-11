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

