@if($tema->isiCss=='')	
	{{HTML::style(dirTemaToko().'ustore/assets/css/stylesheet.css')}}
@else 	
	{{HTML::style(dirTemaToko().'ustore/assets/css/editstylesheet.css')}}
@endif	
	{{HTML::style(dirTemaToko().'ustore/assets/css/slideshow.css')}}
	{{HTML::style(dirTemaToko().'ustore/assets/css/carousel.css')}}
	{{HTML::style(dirTemaToko().'ustore/assets/js/colorbox/colorbox.css')}}
	{{HTML::style('http://fonts.googleapis.com/css?family=Ropa+Sans')}}
	<!-- CSS Part End-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="shortcut icon" href="{{URL::to(getPrefixDomain().'/galeri/'.$toko->logo)}}">