<!DOCTYPE html>
<html>
	<head>
		{{ Theme::partial('seostuff') }}	
		{{ Theme::partial('defaultcss') }}	
		{{ Theme::asset()->styles() }}	
	</head>
	<body class="top">
		<div class="main-body-wrapper">
			{{ Theme::partial('header') }}	
			<section class="wrapper">
				<div id="container">
					{{ Theme::place('content') }}	
				</div>
			</section>
			{{ Theme::partial('footer') }}	
			{{ Theme::asset()->container('footer')->scripts() }}	
		</div>
		<!-- JavaScripts -->
		{{ Theme::partial('defaultjs') }}	
	</body>
</html>