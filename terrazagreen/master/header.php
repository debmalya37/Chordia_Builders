
 <header>
<div class="fmmo" style="background: #cdf1c8;">
<!-- ==================  Navigation (main menu) ================== -->
<!--
<script type="text/javascript">
$(function () {
// Toggle menu
// ------------------------------------
$('.toggle-menu').on('click', function () {
$(this).toggleClass('open');
$(this).parent().find('.navigation-block').toggleClass('open');
});
var $box = $('.options-content .options .box');
$box.click(function () {
var $this = $(this),
$boxWrapper = $this.closest('.box-wrapper');
if ($this.hasClass('active')) {
$boxWrapper.removeClass('box-wrapper-selected');
$this.removeClass('active');
}
else {
$boxWrapper.addClass('box-wrapper-selected');
$this.closest('.options-content').find('.box').removeClass('active');
$this.addClass('active');
}
});
// Mobile - Dropdown menu
// ------------------------------------
$('.open-dropdown').on('click', function (e) {
e.preventDefault();
if ($(document).width() >= 992) {
return false;
}
var $this = $(this),
$li = $this.closest('li'),
$drop = $li.find('ul');
$li.toggleClass('expanded');
if ($li.hasClass('expanded')) {
$drop.slideDown();
}
else {
$drop.slideUp();
}
});
// Desktop - Dropdown menu
//---------------------------
$('.navigation-block > ul > li').bind({
mouseenter: function () {
if ($(document).width() < 992) {
return false;
}
$(this).addClass('hovered');
},
mouseleave: function () {
if ($(document).width() < 992) {
return false;
}
$(this).removeClass('hovered').removeAttr('class');
},
});
});
</script>
-->
	
<div class="container">
<!-- === navigation-top === -->
 <!-- === navigation-top === -->
<nav class="navigation-top clearfix">
<!-- navigation-top-left -->
<div class="navigation-top-left">
RERA Registration Number <br>
<strong>RAJ/P /2017 /046</strong>

</div>
<!-- navigation-top-right -->
<div class="navigation-top-right">
<a class="box" href="">
<i class="fa fa-phone"></i> 
+91 7014503967
</a>
	<a class="box" href="https://www.facebook.com/" target="_blank">
<i class="fa fa-facebook"></i>
</a>
<a class="box" href="https://www.instagram.com/">
<i class="fa fa-instagram"></i>
</a>
<a class="box" href="https://youtube.com">
<i class="fa fa-youtube"></i>
</a>	
</div>
</nav>
<!-- === navigation-main === -->
<nav class="navigation-main clearfix" style="margin-top: 50px;">
<!-- logo -->
<div class="logo animated fadeIn">
<a href="">
<img class="logo-desktop" src="images/logo.png" alt="Alternate Text">
<img class="logo-mobile" src="images/logo.png" width="150" alt="Alternate Text" style="margin-top: -20px;">
</a>
</div>
<!-- toggle-menu -->
<!-- navigation-block -->
</nav>
</div>
	
 <!--/container--></div>
</header>
