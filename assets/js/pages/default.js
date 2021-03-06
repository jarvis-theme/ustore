define(['jquery'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			linkFooter();
			subMenu();
			megaMenu();

			/******** Mini Cart ********/
			$('body').on('click','#cart > .heading a',function() {
				$('#cart').addClass('active');	
				$('#cart').mouseleave(function() {
					$(this).removeClass('active');
				});
			});

			/******** Tabs **********/
			// $('#tabs a').tabs();

			/******** Accordion **********/
			$('.accordion-heading, .checkout-heading2').click(function() {
				$('.accordion-content, .checkout-content').slideUp('fast');
				$(this).parent().find('.accordion-content, .checkout-content').slideDown('medium');
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

			$('.backtotop').click(function(){
				$('html, body').animate({scrollTop:0}, 'slow');	
			});

			 /******** Wrap Span in Title Heading **********/
			$('.box-heading, h1').wrapInner('<span></span>')			

			/******** Navigation Menu **********/
			$('.menu-main > h3').click(function () {
			  $('.menu-main').parent().find("#menu").slideToggle('medium');
			});
		};

		var tabs = function() {
			var selector = this;

			this.each(function() {
				var obj = $(this); 
				$(obj.attr('href')).hide();	
				$(obj).click(function() {
					$(selector).removeClass('selected');
					$(selector).each(function(i, element) {
						$($(element).attr('href')).hide();
					});
					$(this).addClass('selected');
					$($(this).attr('href')).fadeIn();
					return false;
				});
			});
			
			$(this).show();
			$(this).first().click();
		};

		var linkFooter = function(){
			/******** Footer Link **********/
			$(".column h3").click(function () {
				$screensize = $(window).width();
				if ($screensize < 801) {
					$(this).toggleClass("active");  
					$(this).parent().find("ul").slideToggle('medium');
				}
			});
		};

		var subMenu = function(){
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
		};

		var megaMenu = function(){
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
		};
	};
});