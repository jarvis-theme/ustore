@if($tema->isiCss=='')	
	{{generate_theme_css('ustore/assets/css/stylesheet.css')}}
@else 	
	{{generate_theme_css('ustore/assets/css/editstylesheet.css')}}
@endif	
	{{generate_theme_css('ustore/assets/css/slideshow.css')}}
	{{generate_theme_css('ustore/assets/css/carousel.css')}}
	{{generate_theme_css('ustore/assets/js/colorbox/colorbox.css')}}
	{{HTML::style('http://fonts.googleapis.com/css?family=Ropa+Sans')}}
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	{{favicon()}}