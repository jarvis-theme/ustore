<!DOCTYPE html>
<html>
	<head>
		{{ Theme::partial('seostuff') }}	
		<!-- Stylesheets -->
		{{ Theme::partial('defaultcss') }}	
        {{ Theme::asset()->styles() }}	
	</head>
	<body class="top">
		<!-- BEGIN .main-body-wrapper -->
		<div class="main-body-wrapper">
			<!-- BEGIN .main-header -->
			{{ Theme::partial('header') }}	
			<!-- BEGIN .main-content-wrapper -->
			{{ Theme::place('content') }}	
			<!-- BEGIN .main-footer-wrapper -->
			{{ Theme::partial('footer') }}	
			{{ Theme::asset()->container('footer')->scripts() }}	
		<!-- END .main-body-wrapper -->
		</div>
		<!-- JavaScripts -->
		{{ Theme::partial('defaultjs') }}	
    	{{ Theme::asset()->scripts() }}	
	</body>
</html>