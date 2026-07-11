$(document).ready(function(){
	
		
	$(".color1" ).click(function(){
		$("#colors" ).attr("href", "css/color1.css" );
		return false;
	});
	
		
	$(".color2" ).click(function(){
		$("#colors" ).attr("href", "css/color2.css" );
		return false;
	});
	
	$(".color3" ).click(function(){
		$("#colors" ).attr("href", "css/color3.css" );
		return false;
	});
	
	$(".color4" ).click(function(){
		$("#colors" ).attr("href", "css/color4.css" );
		return false;
	});
		
	$(".color5" ).click(function(){
		$("#colors" ).attr("href", "css/color5.css" );
		return false;
	});
	
	$(".color6" ).click(function(){
		$("#colors" ).attr("href", "css/color6.css" );
		return false;
	});
	
	$(".color7" ).click(function(){
		$("#colors" ).attr("href", "css/color7.css" );
		return false;
	});
	
	$(".color8" ).click(function(){
		$("#colors" ).attr("href", "css/color8.css" );
		return false;
	});
	
	$('.icon').click (function(event){
		event.preventDefault();
		if( $ (this).hasClass('inOut')  ){
			$('.mp-color').stop().animate({right:'0px'},500 );
		} else{
			$('.mp-color').stop().animate({right:'-200px'},500 );
		} 
		$(this).toggleClass('inOut');
		return false;

	}  );

	
	
	
	
} );
