<!DOCTYPE html>

<html class="no-js" lang="zxx">

<head>

<!-- Meta -->

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">


@include('includes/metanames') 

<meta property="og:title" content="top builders in jaipur">
<meta property="og:description" content="Buy flats in Jaipur from Chordia Builders. Choose from luxury 2 & 3 BHK apartments in top locations with modern amenities at the best price.">
<meta property="og:keywords" content="2 bhk flat in mansarovar, 3 bhk flats in mansarovar, apartments in mansarovar jaipur, flat purchase in jaipur, buy flats in jaipur, studio apartment in jaipur for sale, luxury flats in jaipur, top builders in jaipur, commercial properties in jaipur">
<meta property="og:type" content="website">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Title -->

 

<!-- Favicon -->

<link rel="icon" type="image/png" href="images/logo.png"> 

<!-- 1. CORE CSS (Loads immediately so the site doesn't look broken) -->
<!-- 1. PRELOAD CORE CSS (Forces the browser to fetch these instantly without blocking) -->
<link rel="preload" href="{{asset('styles/bootstrap.min.css')}}" as="style">
<link rel="preload" href="{{asset('styles/style.css')}}" as="style">
<link rel="preload" href="{{asset('styles/responsive.css')}}" as="style">
<!-- Forces the browser to fetch the LCP banner instantly -->
<link rel="preload" as="image" href="{{ asset('banner_images/webp/chordia-banner-1725869556.webp') }}" type="image/webp">
<!-- Prevent Layout Shift for Deferred Font Awesome Icons -->
<style>
    .header-menu .nav.menu > li > a > i.fa-angle-down {
        display: inline-block;
        width: 12px; 
        margin-left: 5px;
    }
</style>

<!-- 2. CRITICAL STRUCTURAL CSS (Loaded natively to guarantee zero layout glitches) -->
<link rel="stylesheet" href="{{asset('styles/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('styles/font-awesome.min.css')}}"><!-- Moved here to fix CLS -->
<link rel="stylesheet" href="{{asset('styles/slicknav.min.css')}}">
<link rel="stylesheet" href="{{asset('styles/normalize.css')}}">
<link rel="stylesheet" href="{{asset('styles/style.css')}}">
<link rel="stylesheet" href="{{asset('styles/responsive.css')}}">

<!-- 3. DEFERRED PLUGIN CSS (Safe to load in background to boost PageSpeed) -->

<link rel="stylesheet" href="{{asset('styles/jquery.fancybox.min.css')}}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{asset('styles/owl.carousel.min.css')}}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{asset('styles/owl.theme.default.min.css')}}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{asset('styles/animate.min.css')}}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{asset('styles/magnific-popup.css')}}" media="print" onload="this.media='all'">
<link rel="stylesheet" href="{{asset('styles/toastr.css')}}" media="print" onload="this.media='all'">

<!-- 4. FALLBACK (In case a user has JavaScript disabled) -->
<noscript>
    <link rel="stylesheet" href="{{asset('styles/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('styles/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('styles/toastr.css')}}">
</noscript>
<!-- Delayed Google tag (gtag.js) & Events to improve Initial Page Load -->
<script type="text/javascript">
    window.addEventListener('load', function() {
        setTimeout(function() {
            var script = document.createElement('script');
            script.src = 'https://www.googletagmanager.com/gtag/js?id=AW-17559730445';
            script.async = true;
            document.head.appendChild(script);

            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'AW-17559730445');
            gtag('event', 'conversion', {'send_to': 'AW-17559730445/z5lHCMvWj8IbEI3ykLVB'});
        }, 3500); // Delays execution by 3.5 seconds so visuals load instantly
    });
</script>



</head>


<body>

<!-- Header -->

 

@if(request()->is('/'))

@php($class = "")

@else

@php($class = "position-relative")

@endif

<header class="header {{$class}}"> 

<!-- Header Inner -->

<div class="header-inner">

<div class="container">

    <div class="row">

    <div class="col-lg-1 col-12"> 

            <div class="logo">

                <a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" width="186" height="197" alt="Chordia Builders"></a>

            </div>

            <div class="mobile-menu"></div>

        </div>

    <div class="col-lg-11 col-12">

            <div class="header-menu"> 

            <nav class="navbar navbar-default">

                <div class="navbar-collapse">

                    <!-- Main Menu -->

                    <ul id="nav" class="nav menu navbar-nav">

                    <li class="active"><a href="{{route('index')}}">Home</a></li>

                    <li><a href="">About Us <i class="fa fa-angle-down"></i></a>

                       @if(!GeneralHelper::CmsLists()->isEmpty())

                            <ul class="dropdown">

                            @foreach(GeneralHelper::CmsLists() as $topcms)  

                            @if($topcms->slug_url!= 'about-us')

                            <li><a href="{{ url('page/'.$topcms->slug_url) }}" class="dropdown-item"><span>{{$topcms->title}}</span></a></li>
                           

                            @endif

                            @endforeach     
                              <li><a href="{{ url('https://arcnest.chordiabuilders.com/') }}" target="blank">Arcnest</a></li> 

                            </ul>

                            @endif

                    </li>

                        <li><a href="{{route('projects')}}">Projects<i class="fa fa-angle-down"></i></a>

                        @if(!GeneralHelper::Categories()->isEmpty())

                            <ul class="dropdown">

                            @foreach(GeneralHelper::Categories() as $topcates)   

                            <li><a href="{{ url('projects/'.$topcates->slug_url) }}" class="dropdown-item"><span>{{$topcates->title}}</span></a></li> 

                            @endforeach     

                            </ul>

                            @endif

                        </li>   

                          <li><a href="{{route('csr')}}">CSR</a></li>

                           <li><a href="{{route('blog')}}">Buyer's Guide <i class="fa fa-angle-down"></i></a>

                            <ul class="dropdown">

                        <li><a href="{{route('faq')}}">Faq's</a></li>

                           <li><a href="{{route('banking')}}">Banking</a></li>

                              <li><a href="{{route('nri')}}">NRI</a></li>

                                 <li><a href="{{route('customer-corner')}}">Customer Corner</a></li>

                                </ul>

                           

                           </li>

                        <li><a href="{{route('events')}}">Media <i class="fa fa-angle-down"></i></a>

                    <ul class="dropdown"> 
                    <li><a href="{{route('photos')}}">Photo Gallery</a></li>
                    <li><a href="{{route('videos')}}">Video Gallery</a></li>
                    <li><a href="{{route('blog')}}">Blogs</a></li>
                    <li><a href="{{route('events')}}">Events</a></li>

                    </ul>

                    

                    </li>

                      <li><a href="{{route('life-chordia')}}">Life @ Chordia</a></li>

                     <li><a href="{{route('career')}}">Work With Us</a></li> 



                    </ul>

                    <!-- End Main Menu --> 

                    <!-- button -->

                    <div class="button">

                        <a href="{{route('contact-us')}}" class="btn">Get in Touch</a>

                    </div>

                    <!--/ End Button -->

                </div> 

            </nav> 

</div>

        </div>

    </div>

</div>

</div>

<!--/ End Header Inner -->



</header>

<!-- End Header -->


<main>
    @yield('content')
</main>


<!-- Footer -->

<footer class="footer section">

<!-- Footer Top -->

<div class="container">

<div class="ftop">

<ul>

<li><a href="{{route('index')}}">Home</a></li>

<li><a href="{{ url('page/vision-mission') }}">About Us</a></li>

<li><a href="{{route('projects')}}">Projects</a></li>

<li><a href="{{route('blog')}}">Blogs</a></li>
<li><a href="{{route('events')}}">Events</a></li>

<li><a href="{{route('photos')}}">Photos</a></li>
<li><a href="{{route('videos')}}">Videos</a></li>

<li><a href="{{route('contact-us')}}">Contact Us</a></li>

</ul>

</div>

</div>

<div class="footer-top">

<div class="container">



<div class="row">    

    <div class="col-lg-4 col-12">

        <!-- Useful Links -->

        <div class="single-widget useful-links">

            <h2>Chordia Builders</h2>

            <ul class="list">

                <li><i class="fa fa-map-marker"></i> {{ strip_tags(GeneralHelper::Generals()->address) }}</li>

                <li><i class="fa fa-phone"></i>  {{ GeneralHelper::Generals()->phone }} </li>

                <li><i class="fa fa-envelope"></i> <a href="mailto:{{ GeneralHelper::Generals()->email }}">{{ GeneralHelper::Generals()->email }}</a></li>

                <li><i class="fa fa-globe"></i>  <a href="{{ GeneralHelper::Generals()->weburl }}">{{ GeneralHelper::Generals()->weburl }}</a></li>                                

            </ul> 

        </div>

        <!--/ End Useful Links -->

    </div>

    

    <div class="col-lg-4 col-12">

        <!-- Useful Links -->

        <div class="single-widget useful-links">

            <h2>Location Map</h2>

            @if(GeneralHelper::Generals()->gmap)

            <iframe class="gmap_iframe" src="{{ GeneralHelper::Generals()->gmap }}" width="100%"></iframe>

            @else

            <a href="https://www.google.com/maps/place/Chordia+Group/@26.890943,75.757501,10946m/data=!3m1!1e3!4m6!3m5!1s0x396db45f0c5ebecb:0x67bfd40e77774546!8m2!3d26.8909428!4d75.7575011!16s%2Fg%2F11b7jthg6b?hl=en&entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoASAFQAw%3D%3D" target="_blank"> <img src="{{asset('images/map.jpg')}}" width="397" height="154" alt="Google Map" /> </a>

            @endif 

        </div>

        <!--/ End Useful Links -->

    </div>

    

                    

    <div class="col-lg-4 col-12">

        <!-- About -->

        <div class="single-widget">

        <h2>Follow Us On</h2>

        <ul class="social">

        @foreach(json_decode(GeneralHelper::Generals()->social_data) as $instdt)  

        <li><a href="{{$instdt->social_url}}"><i class="{{$instdt->social_icon}}"></i></a> </li>

        @endforeach  

          </ul>



           <?php /*?> <ul class="list">

                <li><i class="fa fa-map-marker"></i> Chordia PRIVILEGE</li>

                <li><i class="fa fa-hand-o-up"></i> MEET THE CITY </li>

                <li><i class="fa fa-building"></i> REAL ESTATE CONSULTANT</li>                              

            </ul> <?php */?>

        </div>

        <!--/ End About -->

    </div>

        

        

    

    

    

</div>

</div>

</div>

<!--/ End Footer Top -->





<!-- Footer Bottom -->

<div class="footer-bottom">

<div class="container-fluid"> 

<div class="bottom-head">

<div class="row">

<div class="col-12">

<!-- Copyright -->

<div class="copyright">

<p>{{ GeneralHelper::Generals()->copyright_text }} <a href="#"> © Copyright  {{ GeneralHelper::Generals()->title }} </a>. All Rights Reserved.</p>

</div>

<!--/ End Copyright -->

</div>

</div>

</div> 

</div>

</div>

<!--/ End Footer Bottom -->


</footer>

<div class="right-panel">
<ul>
<li>
<a   data-toggle="modal" data-target=".pop-up-1">
<b>Enquire&nbsp;Now</b>
<span>
<img src="{{asset('images/header-nav-email-2.png')}}" style="max-width: 28px;" width="28" height="28" alt="Enquire Now">
</span>
</a>
</li>
<li>
<a href="https://api.whatsapp.com/send?phone={{ GeneralHelper::Generals()->phone }}&text=Hi!" target="blank">
<b>Whatsapp</b>
<span>
<img src="{{asset('images/whats-01.svg')}}" style="max-width: 21px;" width="40" height="40" alt="Whatsapp">
</span>
</a>
</li>
</ul>
</div>

@include('includes.model_enq')

<!--<a href="https://api.whatsapp.com/send?phone={{ GeneralHelper::Generals()->phone }}&text=Hi!" target="_blank" class="whatsapp-btn">-->
<!--<i class="fa fa-whatsapp"></i> </a>-->
<!--/ End Footer -->

{!! GeneralHelper::Generals()->chat_widget !!}


<!-- Replace the global recaptcha script with this conditional block -->
@if(request()->is('/') || request()->is('contact-us'))
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
@endif
<!-- JS Dependencies (Deferred for Performance) -->
<!-- JS Dependencies (Moved to footer for performance, executing normally) -->
<!-- JS Dependencies (Deferred for Performance) -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script src="{{asset('jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('jquery/bootstrap.min.js')}}"></script> 
<script src="{{asset('jquery/owl.carousel.min.js')}}"></script>
<script src="{{asset('jquery/main.js')}}"></script>
<script src="{{asset('jquery/toastr.min.js')}}" defer></script>
<script src="{{asset('jquery/quick_enquiry.js')}}" defer></script>
<script src="{{asset('jquery/popper.min.js')}}" defer></script>
<script src="{{asset('jquery/jquery.stellar.min.js')}}" defer></script>
<script src="{{asset('jquery/particles.min.js')}}" defer></script>
<script src="{{asset('jquery/facnybox.min.js')}}" defer></script>
<script src="{{asset('jquery/jquery.magnific-popup.min.js')}}" defer></script>
<script src="{{asset('jquery/masonry.pkgd.min.js')}}" defer></script>
<script src="{{asset('jquery/circle-progress.min.js')}}" defer></script>
<script src="{{asset('jquery/waypoints.min.js')}}" defer></script>
<script src="{{asset('jquery/slicknav.min.js')}}" defer></script>
<script src="{{asset('jquery/jquery.counterup.min.js')}}" defer></script>
<script src="{{asset('jquery/easing.min.js')}}" defer></script>
<script src="{{asset('jquery/wow.min.js')}}" defer></script>
<script src="{{asset('jquery/jquery.scrollUp.min.js')}}" defer></script>

<script>
    var searchForm = document.getElementById('search-form');
    // Ensure form exists before attaching event listener to prevent console errors
    if (searchForm) {
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            var formData = new FormData(searchForm);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var results = JSON.parse(this.responseText);
                }
            };
            xhr.open('GET', '/search?' + new URLSearchParams(formData).toString());
            xhr.send();
        });
    }
</script>
<script>
function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    // Added safety check to ensure elements exist on the page
    if (dots && moreText && btnText) {
        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "[+]";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "[-]";
            moreText.style.display = "inline";
        }
    }
} 
</script>
</body>

</html>