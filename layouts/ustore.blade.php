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
		  {{ Theme::place('content') }}	
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