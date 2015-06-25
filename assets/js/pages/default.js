define(['jquery','noty'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			showOption();
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

			// tampilkan error noty
			var msg = $('#message');
			if(msg.length){
				type = $(msg).attr('class');
				text = $(msg).html();
				noty({"text":text,"layout":"top","type":type});    
			}

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

		var showOption = function(){
			$('#show').change(function(){
				id=this.value;		
				link = $(this).attr('data-rel');
				arr = new Array();
				data = getQueryVariable();
				qry = '';
				if(data['page']!=undefined){
					qry = qry+'?page='+data['page'];
				}
				if(data['show']!=undefined){
					if(qry==''){
						qry = qry+'?show='+id;
					}				
					else{
						qry = qry+'&show='+id;
					}
						
				}else{
					if(qry==''){
						qry = qry+'?show='+id;
					}
					else{
						qry = qry+'&show='+id;
					}

				}
				if(data['view']!=undefined){
					if(qry==''){
						qry = qry+'?view='+data['view'];
					}
					else{
						qry = qry+'&view='+data['view'];
					}
				}
				window.location = link+qry;
			});
		};
		var getQueryVariable = function() {
		    var query = window.location.search.substring(1);
		    var vars = query.split('&');
		    var rs = new Array();
		    for (var i = 0; i < vars.length; i++) {
		        var pair = vars[i].split('=');
		        rs[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
		    }
		    return rs;
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