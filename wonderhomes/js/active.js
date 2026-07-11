(function($) {
	'use strict';
	jQuery(document).on('ready', function(){

		// Mean Menu
        jQuery('.mean-menu').meanmenu({
            meanScreenWidth: "991"
        }); 

		// Preloader
		jQuery(window).on('load', function() {
			$('.preloader').fadeOut();
		});

		// Header Sticky
        $(window).on('scroll', function() {
            if ($(this).scrollTop() >150){  
                $('.navbar-area').addClass("is-sticky");
            }
            else{
                $('.navbar-area').removeClass("is-sticky");
            }
        });
		
		//hero slider
		$('.hero-slider').owlCarousel({
			loop:true,
			margin:0,
			nav:false,
			items:1,
			dots: true,
			autoplay: true,
			smartSpeed:1500,
			autoplayHoverPause: true,
		});

		//hero slider four
		$('.hero-slider-four').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			items:1,
			dots: true,
			autoplay: true,
			smartSpeed:1500,
			autoplayHoverPause: true,
			navText: [
				"<i class='flaticon-left-arrow'></i>",
				"<i class='flaticon-right-arrow'></i>",
			]
		});

		// Popup Video JS
        $('.popup-youtube, .popup-vimeo').magnificPopup({
            disableOn: 300,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });
		
		//partner
		$('.partner-wrapper').owlCarousel({
			loop:true,
			margin:10,
			nav:false,
			items:1,
			dots: false,
			autoplay: true,
			smartSpeed:1500,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1
				},
				400: {
					items: 2
				},
				575: {
					items: 3
				},
				758: {
					items: 4
				},
				1200: {
					items: 5
				}
			}
		});
		
		//tabs
		$(document).ready(function() {
			$('#tabs li a').click(function(e) {
				$('#tabs li, #content .current').removeClass('current').removeClass('fadeInUp');
				$(this).parent().addClass('current');
				var currentTab = $(this).attr('href');
				$(currentTab).addClass('current fadeInUp');
				e.preventDefault();
			});
		});
	
		//Counter
		$('.counter').counterUp({
			delay: 10,
			time: 1000
		});
	
		// Counter up Carousel JS
		$('#Container').mixItUp();
		
		//testimonial
		$('.testimoinal-wrapper').owlCarousel({
			loop:true,
			nav:false,
			autoplay:true,
			autoplayHoverPause: true,
			mouseDrag: true,
			margin: 30,
			center: true,
			dots: false,
			smartSpeed:1500,
			responsive:{
				0:{
					items:1
				},
				768:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});

		//back to top
		$('body').append('<div id="toTop" class="back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>');
		$(window).on('scroll', function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		}); 
		$('#toTop').on('click', function(){
			$("html, body").animate({ scrollTop: 0 }, 600);
			return false;
		});

		//Text Type
		var TxtType = function(el, toRotate, period) {
			this.toRotate = toRotate;
			this.el = el;
			this.loopNum = 0;
			this.period = parseInt(period, 10) || 2000;
			this.txt = '';
			this.tick();
			this.isDeleting = false;
		};
		TxtType.prototype.tick = function() {
			var i = this.loopNum % this.toRotate.length;
			var fullTxt = this.toRotate[i];
			if (this.isDeleting) {
				this.txt = fullTxt.substring(0, this.txt.length - 1);
			} else {
				this.txt = fullTxt.substring(0, this.txt.length + 1);
			}
			this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';
			var that = this;
			var delta = 200 - Math.random() * 100;
			if (this.isDeleting) { delta /= 2; }
			if (!this.isDeleting && this.txt === fullTxt) {
			delta = this.period;
			this.isDeleting = true;
			} else if (this.isDeleting && this.txt === '') {
				this.isDeleting = false;
				this.loopNum++;
				delta = 500;
			}
			setTimeout(function() {
				that.tick();
			}, delta);
		};
		window.onload = function() {
			var elements = document.getElementsByClassName('typewrite');
			for (var i=0; i<elements.length; i++) {
				var toRotate = elements[i].getAttribute('data-type');
				var period = elements[i].getAttribute('data-period');
				if (toRotate) {
				new TxtType(elements[i], JSON.parse(toRotate), period);
				}
			}
			// INJECT CSS
			var css = document.createElement("style");
			css.type = "text/css";
			css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
			document.body.appendChild(css);
		};

		//skill
		jQuery('.skill-bar').each(function() {
			jQuery(this).find('.progress-content').animate({
			width:jQuery(this).attr('data-percentage')
			},2000);
			
			jQuery(this).find('.progress-number-mark').animate(
			{left:jQuery(this).attr('data-percentage')},
			{
				duration: 2000,
				step: function(now, fx) {
				var data = Math.round(now);
				jQuery(this).find('.percent').html(data + '%');
				}
			});  
		});
		
		//team
		$('.team-wrapper-four').owlCarousel({
			loop:true,
			nav:true,
			autoplay:true,
			autoplayHoverPause: true,
			mouseDrag: true,
			margin: 30,
			center: true,
			dots: false,
			smartSpeed:1500,
			navText: [
				"<i class='flaticon-left-arrow'></i>",
				"<i class='flaticon-right-arrow'></i>",
			],
			responsive:{
				0:{
					items:1
				},
				768:{
					items:2
				},
				1200:{
					items:3
				}
			}
		});

		//testimonial
		$('.testimoinal-wrapper-four').owlCarousel({
			items:1,
			loop:true,
			nav:false,
			autoplay:true,
			autoplayHoverPause: true,
			mouseDrag: true,
			margin: 30,
			center: true,
			dots: false,
			smartSpeed:1500,
		});

		//Project Slider Wrapper
		$('.project-slider-wrapper').owlCarousel({
			items:1,
			loop:true,
			margin:10,
			nav:false,
			items:1,
			dots: true,
			autoplay: true,
			smartSpeed:1500,
			autoplayHoverPause: true,
		});

		//Project Slider Wrapper Two
		$('.project-slider-wrapper-two').owlCarousel({
			items:1,
			loop:true,
			margin:10,
			nav:false,
			items:1,
			dots: true,
			autoplay: true,
			smartSpeed:1500,
			autoplayHoverPause: true,
		});

		//Slider One
		$(".slider-section").on("translate.owl.carousel", function(){
            $(".slider-text h3, .slider-text h1, .slider-text .typewrite").removeClass("animated fadeInUp").css("opacity", "0");
            $(".slider-text .slide-button").removeClass("animated fadeInDown").css("opacity", "0");
        });
        
        $(".slider-section").on("translated.owl.carousel", function(){
            $(".slider-text h3, .slider-text h1, .slider-text .typewrite").addClass("animated fadeInUp").css("opacity", "1");
            $(".slider-text .slide-button").addClass("animated fadeInDown").css("opacity", "1");
		});

		//Slider Four
		$(".slider-section-four").on("translate.owl.carousel", function(){
            $(".slider-text h3, .slider-text h1, .slider-text .typewrite").removeClass("animated fadeInUp").css("opacity", "0");
            $(".slider-text .slide-button").removeClass("animated fadeInDown").css("opacity", "0");
        });
        
        $(".slider-section-four").on("translated.owl.carousel", function(){
            $(".slider-text h3, .slider-text h1, .slider-text .typewrite").addClass("animated fadeInUp").css("opacity", "1");
            $(".slider-text .slide-button").addClass("animated fadeInDown").css("opacity", "1");
		});
		
		// Subscribe form JS
		$(".newsletter-form").validator().on("submit", function (event) {
			if (event.isDefaultPrevented()) {
			// handle the invalid form...
				formErrorSub();
				submitMSGSub(false, "Please enter your email correctly.");
			} else {
				// everything looks good!
				event.preventDefault();
			}
		});
		function callbackFunction (resp) {
			if (resp.result === "success") {
				formSuccessSub();
			}
			else {
				formErrorSub();
			}
		}
		function formSuccessSub(){
			$(".newsletter-form")[0].reset();
			submitMSGSub(true, "Thank you for subscribing!");
			setTimeout(function() {
				$("#validator-newsletter").addClass('hide');
			}, 4000)
		}
		function formErrorSub(){
			$(".newsletter-form").addClass("animated shake");
			setTimeout(function() {
				$(".newsletter-form").removeClass("animated shake");
			}, 1000)
		}
		function submitMSGSub(valid, msg){
			if(valid){
				var msgClasses = "validation-success";
			} else {
				var msgClasses = "validation-danger";
			}
			$("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
		}
		
		// AJAX MailChimp JS
		$(".newsletter-form").ajaxChimp({
			url: "https://Envy Theme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9", // Your url MailChimp
			callback: callbackFunction
		});
	});
})(jQuery);