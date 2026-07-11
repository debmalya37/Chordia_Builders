<ul class="nav">
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#banner" aria-expanded="false" aria-controls="banner">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Banner Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/banner/create')) ? 'show' : '' }} {{ (request()->is('admin/banner')) ? 'show' : '' }}" id="banner">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.banner.create') }}">Add Banner</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.banner') }}">All Banner</a></li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#contant" aria-expanded="false" aria-controls="contant">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Contant Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/contant/create')) ? 'show' : '' }} {{ (request()->is('admin/contant')) ? 'show' : '' }}" id="contant">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.contant.create') }}">Add Contant</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.contant') }}">All Contant</a></li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#cms" aria-expanded="false" aria-controls="cms">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Cms Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/cms/create')) ? 'show' : '' }} {{ (request()->is('admin/cms')) ? 'show' : '' }}" id="cms">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.cms.create') }}">Add Cms</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.cms') }}">All Cms</a></li>
</ul>
</div>
</li>
 
 
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Project Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/category/create')) ? 'show' : '' }} {{ (request()->is('admin/category')) ? 'show' : '' }} {{ (request()->is('admin/project/create')) ? 'show' : '' }} {{ (request()->is('admin/project')) ? 'show' : '' }} " id="category">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.category') }}">All Categories</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.project.create') }}">Add Project</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.project') }}">All Projects</a></li>
</ul>
</div>
</li>
  

<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="faq">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Faq Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/faq/create')) ? 'show' : '' }} {{ (request()->is('admin/faq')) ? 'show' : '' }}" id="faq">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.faq.create') }}">Add Fair</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.faq') }}">All Fair</a></li>
</ul>
</div>
</li>


<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#bank" aria-expanded="false" aria-controls="faq">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Bank Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/bank/create')) ? 'show' : '' }} {{ (request()->is('admin/bank')) ? 'show' : '' }}" id="bank">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.bank.create') }}">Add Bank</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.bank') }}">All Bank</a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Gallery Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/gcat/create')) ? 'show' : '' }} {{ (request()->is('admin/gcat')) ? 'show' : '' }} {{ (request()->is('admin/gallery/create')) ? 'show' : '' }} {{ (request()->is('admin/gallery')) ? 'show' : '' }} " id="gallery">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.gcat.create') }}">Add Category</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.gcat') }}">All Category</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.gallery.create') }}">Add Gallery</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.gallery') }}">All Gallery</a></li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#video" aria-expanded="false" aria-controls="video">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Video Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/video/create')) ? 'show' : '' }} {{ (request()->is('admin/video')) ? 'show' : '' }}" id="video">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.video.create') }}">Add Video</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.video') }}">All Video</a></li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#testimonial" aria-expanded="false" aria-controls="testimonial">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Testimonial Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/testimonial/create')) ? 'show' : '' }} {{ (request()->is('admin/testimonial')) ? 'show' : '' }}" id="testimonial">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.testimonial.create') }}">Add Testimonial</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.testimonial') }}">All Testimonial</a></li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Blog Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/blogcat/create')) ? 'show' : '' }} {{ (request()->is('admin/blogcat')) ? 'show' : '' }} {{ (request()->is('admin/blog/create')) ? 'show' : '' }} {{ (request()->is('admin/blog')) ? 'show' : '' }} " id="blog">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.blogcat.create') }}">Add Category</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.blogcat') }}">All Category</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.blog.create') }}">Add Blog</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.blog') }}">All Blog</a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#event" aria-expanded="false" aria-controls="event">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Event Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/event/create')) ? 'show' : '' }} {{ (request()->is('admin/event')) ? 'show' : '' }}" id="event">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.event.create') }}">Add Event</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.event') }}">All Event</a></li>
</ul>
</div>
</li>
 
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false" aria-controls="service">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">CSR Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/service/create')) ? 'show' : '' }} {{ (request()->is('admin/service')) ? 'show' : '' }}" id="service">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.service.create') }}">Add CSR</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.service') }}">All CSR</a></li>
</ul>
</div>
</li>
 
 
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#general" aria-expanded="false" aria-controls="general">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">General Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/general/create')) ? 'show' : '' }} {{ (request()->is('admin/resize')) ? 'show' : '' }}" id="general">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.general.create') }}">Add General</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.general') }}">All General</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.resize.createsize') }}">All Sizes</a></li>

</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#enquiry" aria-expanded="false" aria-controls="enquiry">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">Enquiry Master</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/enquiry/quick')) ? 'show' : '' }} {{ (request()->is('admin/enquiry/contact')) ? 'show' : '' }} {{ (request()->is('admin/enquiry/project')) ? 'show' : '' }} {{ (request()->is('admin/enquiry/customize')) ? 'show' : '' }} {{ (request()->is('admin/enquiry/common')) ? 'show' : '' }}" id="enquiry">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.enquiry.quick') }}">General Enquiry</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.enquiry.contact') }}">Contact Enquiry</a></li>
<!--<li class="nav-item"> <a class="nav-link" href="{{ route('admin.enquiry.project') }}">Project Enquiry</a></li>-->
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.enquiry.carrer') }}">Carrer Enquiry</a></li>
</ul>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="collapse" href="#change" aria-expanded="false" aria-controls="change">
<i class="typcn typcn-th-small-outline menu-icon"></i>
<span class="menu-title">User Settings</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse {{ (request()->is('admin/changepassword/create')) ? 'show' : '' }}" id="change">
<ul class="nav flex-column sub-menu">
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.changepassword.create') }}">Change Password</a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">Logout User</a></li>
</ul>
</div>
</li>
 </ul>