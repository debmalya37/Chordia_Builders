<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>Terraza Green</title>

	<!-- Mobile Web-app fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<!-- Meta tags -->
	<!--CSS styles-->
<link rel="stylesheet" media="all" href="css/bundle.min.css" />
<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500&amp;subset=latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&amp;subset=latin-ext" rel="stylesheet">
<link rel='stylesheet' href='https://unpkg.com/swiper/swiper-bundle.min.css'>

<link rel="stylesheet" media="all" href="css/style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> 	-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
<script>
window.onclick = function(event) {
   if (event.target.id != "image_in_modal_div") {
  $("#modal1").hide();
   }
}
	</script>
</head>
<body>

<a href="https://wa.me/7014503967" target="_blank"><img class="callus" alt="image of whatsapp icon" src="images/whatsapp.png"></a>
<div class="page-loader"></div>
<div class="wrapper">	

<!--header-->
<?php include("master/header.php"); ?>

<!--slider		-->
<?php include("master/slider.php"); ?>
		
<section class="page">
<div class="image-blocks image-blocks-category">
<div class="container">
<div class="about">
<!--text-block-->
<div class="text-block padnotop">
<div class="row">
<div class="col-md-12">
<div class="col-md-12">		
<div class="text">
<h2>Terrazagreens</h2>
<center><p><strong>2/3/4 BHK ULTRA LUXURY RESIDENCES & 5 BHK DUPLEXES</strong></p></center>
<!-- ===  Gallery === -->
<p>Chordia Group offers a charming blend of "Elite Living" with the best of contemporary amenities that ensures a warm and luxurious lifestyle in the finest address. The unique combination of vibrant surroundings, extremely high quality construction standards and a professional approach sets apart Terrazagreens homes for high-end living.</p> 
<p>Experience tranquillity in the midst of stunning scenic greens, your very own private garden or expansive terraces. With wide open spaces as far as the eye can see with no high rise buildings to block your view, Terrazagreens has created living environments that feel secluded, yet welcoming. </p>
<p>Poised to become Jaipur's premier residential address, Terrazagreens is unbeatable in terms of accessibility and picture perfect lifestyle. </p>
</div>
</div>
							
</div>
</div> <!--/container-->
</div>
</div>
</section>
		
<!--amenities-->
<?php include("master/amenities.php"); ?>

<!--vision-->
<?php include("master/vision.php"); ?>
		
<!--specification-->
<?php include("master/specification.php"); ?>
	
<!--floor-plan-->
<?php include("master/floor-plan.php"); ?>
	
<!--form-->
<?php include("master/form.php"); ?>

<!--footer-->
<?php include("master/footer.php"); ?>
	
</div> <!--/wrapper-->
<!--JS files-->
<script src="js/bundle.min.js"></script>
	<script src='https://unpkg.com/swiper/swiper-bundle.min.js'></script>
	<script>
	var swiper = new Swiper(".swiper-container", {  
  autoplay: {
delay: 5000,
  },
  navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev"
  }
});
	</script>
</body>
</html>