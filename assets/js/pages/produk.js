define(['jquery','jq_colorbox'], function($)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			/******** Color box **********/
			$('.colorbox').colorbox({
				overlayClose: true,
				opacity: 0.5,
				rel: "colorbox"
			});
		};
	};
});