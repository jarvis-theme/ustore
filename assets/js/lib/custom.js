$(document).ready(function() {
	window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
	
	$(window).load(function() {

		/******** Mini Cart ********/
		$('body').on('click','#cart > .heading a',function() {
				$('#cart').addClass('active');	
				$('#cart').mouseleave(function() {
					$(this).removeClass('active');
				});
		});

		/* Nivo slider */  
		$('#slideshow').nivoSlider({
			animSpeed: 500, // Slide transition speed
			pauseTime: 6000, // How long each slide will show
			startSlide: 0, // Set starting Slide (0 index)
		}); 

		/******** Carousel **********/
		$('#carousel ul').jcarousel({
			vertical: false,
			visible: 5,
			scroll: 3
		});

		/******** Tabs **********/
		$('#tabs a').tabs();

		/******** Accordion **********/
		$('.accordion-heading, .checkout-heading2').click(function() {
			$('.accordion-content, .checkout-content').slideUp('fast');
			$(this).parent().find('.accordion-content, .checkout-content').slideDown('medium');
		});
	});

	$('#button-account').click(function() {
		$(".detail-content").slideDown('medium');
	 });

	/******** Back to top **********/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#back-top').fadeIn();
		} else {
			$('#back-top').fadeOut();
		}
	});

	jQuery('.backtotop').click(function(){
		jQuery('html, body').animate({scrollTop:0}, 'slow');	
	});

	 /******** Wrap Span in Title Heading **********/
	$('.box-heading, h1').wrapInner('<span></span>')

	/******** Color box **********/
	$('.colorbox').colorbox({
		overlayClose: true,
		opacity: 0.5,
		rel: "colorbox"
	});	

	/******** Navigation Menu **********/
	$('.menu-main > h3').click(function () {
	  $('.menu-main').parent().find("#menu").slideToggle('medium');
	});

	/******** Footer Link **********/
	$(".column h3").click(function () {
		$screensize = $(window).width();
		if ($screensize < 801) {
			$(this).toggleClass("active");  
			$(this).parent().find("ul").slideToggle('medium');
		}
	});

	/******** Menu Show Hide Sub Menu ********/
	$('#menu > ul > li').mouseover(function() {
		$screensize = $(window).width();
		if ($screensize > 801) {
			$(this).find('> div').css('display', 'block');
		}			
		$(this).bind('mouseleave', function() {
			$screensize = $(window).width();
			if ($screensize > 801) {
				$(this).find('> div').css('display', 'none');
			}
		});
	});

	/******** Mega Menu **********/
	$(window).load(function() {
		$('#menu ul > li > a + div').each(function(index, element) {
			var menu = $('#menu').offset();
			var dropdown = $(this).parent().offset();
			i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());
			if (i > 0) {
				$(this).css('margin-left', '-' + (i + 5) + 'px');
			}
		});
	});
});