var dirTema = document.getElementsByTagName('link')[1].getAttribute('href');

require.config({
	baseUrl: '/',
	shim: {
		"bootstrap"	: {
			deps : ['jquery'],
		},		
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
	},
    "waitSeconds" : 20,
    urlArgs: "v=002",

	paths: {
		// LIBRARY
		bootstrap 		: 'js/bootstrap.min',
		cart			: 'js/cart',
		jcarousel		: dirTema+'assets/js/lib/jquery.jcarousel.min',
		jq_colorbox		: dirTema+'assets/js/colorbox/jquery.colorbox-min',
		jq_ui			: 'js/jquery-ui',
		jquery 			: dirTema+'assets/js/lib/jquery',
		jquery_easing	: dirTema+'assets/js/lib/jquery.easing-1.3.min',
		jquery_nivo		: dirTema+'assets/js/lib/jquery.nivo.slider.pack',
		noty			: 'js/jquery.noty',
		tabs			: dirTema+'assets/js/lib/tabs',

		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		home            : dirTema+'assets/js/pages/home',
		member          : dirTema+'assets/js/pages/member',
		main            : dirTema+'assets/js/pages/default',
		produk          : dirTema+'assets/js/pages/produk',
	}
});
require([
	'router',
	'bootstrap',
	'main',
], function(router,b,main)
{
	// HOME
	router.define('/','home@run');
	router.define('home', 'home@run');

	// MEMBER
	router.define('member/*', 'member@run');
	router.define('register', 'member@run');

	// PRODUK
	router.define('produk/*', 'produk@run');
	
	main.run();
	router.run();
});