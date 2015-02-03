@if(Session::has('errorlogin'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, email atau password anda salah.</p>
</div>
@endif
@if(Session::has('error'))
<div class="error" id='message' style='display:none'>
	{{Session::get('error')}}!!!
</div>
@endif
@if(Session::has('errorrecovery'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, email anda tidak ditemukan.</p>
</div>
@endif
@if(Session::has('forget'))
<div class="success" id='message' style='display:none'>
	<p>Cek email untuk me-reset password anda!</p>
</div>  
@endif
@if(Session::has('error'))
<div class="error" id='message' style='display:none'>
	<p>{{Session::get('error')}}</p>
</div>  
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
	@foreach($errors->all() as $message)
		<p>{{ $message }}</p>
	@endforeach
</div>  
@endif
<section class="wrapper">
	<div id="container">
		<!--Right Part-->
		<div id="column-right">
			<!--Account Links Start-->
			<div class="box">
				<div class="box-heading">Account</div>
				<div class="box-content box-category">
					<ul>
						<li><a href="{{URL::to('member/login')}}">Login</a></li>
							<li><a href="{{URL::to('register')}}">Register</a></li>
							<li><a href="{{URL::to('member/forget-password')}}">Forgotten Password</a>
						</li>  
					</ul>
				</div>
			</div>
			<!--Account Links End-->
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"> <a href="index.html">Home</a> » Recovery Password </div>
			<!--Breadcrumb Part End-->
			<h1>Recovery Password</h1>
			<div class="login-content">
				<div class="left">
					<h2>New Customer</h2>
					<div class="content">
						<p><b>Register Account</b></p>
						<p>Dengan membuat akun anda akan dapat berbelanja dengan cepat, dan mendapat keuntungan lainnya seperti info diskon maupun informasi terbaru lainya.</p>
						<a class="button" href="{{URL::to('member/create')}}">Register</a>
					</div>
				</div>
				<div class="right">
					<h2>Recovery Password</h2>
					{{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
						<div class="content">
							<b>Password Baru:</b><br>
							<input type="password" value="" name="password" required>
							<br>
							<br>
							<b>Konfirmasi Password Baru:</b><br>
							<input type="password" value="" name="password_confirmation" required>
							<br>
							<br>
							<br>
							<input type="submit" class="button" value="Reset Password">
						</div>
					{{Form::close}}
				</div>
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>
	</div>
</section>