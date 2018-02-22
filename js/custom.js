		/*services */

		$(function(){
			  new WOW().init();
		});

		/*Work */
		$(function() {
		  $("#work").magnificPopup({
		  	 delegate: 'a', // child items selector, by clicking on it popup will open
		  type: 'image',
		   gallery:{
	    enabled:true
	  }

		  });
		});
		/*team */
		$(function(){
			$("#team-members").owlCarousel({
				items: 3,
				autoplay: true,
				smartSpeed: 700,
				loop: true,
				autoplayHoverPause:true,
			});
		});
		/*Testimonials*/
		$(function(){
			$("#customers-testimonials").owlCarousel({
				items: 1,
				autoplay: true,
				smartSpeed: 700,
				loop: true,
				autoplayHoverPause:true,
			});
		});

			/*Navigation*/
			//show and hide navbar
			$(function(){
				$(window).scroll(function(){
					if ($(this).scrollTop()<50) {
						//hide navbar
						$("nav").removeClass("top-nav"); 
						$("#back-to-top").fadeOut();
					}
					else{
						//show navbar
						$("nav").addClass("top-nav");
						$("#back-to-top").fadeIn(); 
					}

				});
			});

				/*Smooth scrolling*/

				$(function () {
					$(".smooth-scroll").click(function(){
						event.preventDefault();
						//get/retrun id like #about,#work etc
						var section = $(this).attr("href");

						$('html,body').animate({
							scrollTop: $(section).offset().top-30
						},1250,"easeInOutExpo");
					});
				});