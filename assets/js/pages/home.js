define(['jquery','jquery_nivo','jcarousel'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
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
		};
	};
});