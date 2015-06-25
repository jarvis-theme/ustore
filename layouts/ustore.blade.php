<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		{{ Theme::partial('seostuff') }}	
		<!-- CSS Part Start-->
		{{ Theme::partial('defaultcss') }}	
		{{ Theme::asset()->styles() }}	
	</head>
	<body>
		<div class="main-wrapper">
			<!-- Header Start-->
			{{ Theme::partial('header') }}	  
			<!-- Header End-->
			<section class="wrapper">
				<div id="container">
		  			{{ Theme::place('content') }}	
	  			</div>
  			</section>
		</div>
		<!--Footer Part Start-->
		{{ Theme::partial('footer') }}	
		<!--Footer Part End-->
		<!-- JS Part Start-->
		{{ Theme::partial('defaultjs') }}	
		{{-- Theme::asset()->scripts() --}}	
		<!-- JS Part End-->
	</body>
</html>