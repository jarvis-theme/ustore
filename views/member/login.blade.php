@if(Session::has('errorlogin'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, email atau password anda salah.</p>
</div>
@endif
@if(Session::has('error'))
<div class="error" id='message' style='display:none'>
	{{Session::get('error')}}
</div>
@endif
@if(Session::has('success'))
<div class="success" id='message' style='display:none'>
	<p>Selamat, anda sudah berhasil register. Silakan check email untuk mengetahui informasi akun anda.</p>
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
@if(Session::has('recovery'))
<div class="success" id='message' style='display:none'>
	<p>Selamat password anda berhasil di reset, Silakan login kembali</p>
</div>  
@endif

		<!--Right Part-->
		<div id="column-right">
			<!--Account Links Start-->
			<div class="box">
				<div class="box-heading">Account</div>
				<div class="box-content box-category">
					<ul>
						<li><a href="{{url('member/login')}}">Login</a></li>
						<li><a href="{{url('register')}}">Register</a></li>
						<li><a href="{{url('member/forget-password')}}">Forgotten Password</a></li>  
					</ul>
				</div>
			</div>
			<!--Account Links End-->
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Login </div>
			<!--Breadcrumb Part End-->
			<h1>Account Login</h1>
			<div class="login-content">
				<div class="left">
					<h2>New Customer</h2>
					<div class="content">
						<p><b>Register Account</b></p>
						<p>Dengan membuat akun anda akan dapat berbelanja dengan cepat, dan mendapat keuntungan lainnya seperti info diskon maupun informasi terbaru lainya.</p>
						<a class="button" href="{{url('member/create')}}">Register</a>
					</div>
				</div>
				<div class="right">
					<h2>Returning Customer</h2>
					<form enctype="multipart/form-data" method="post" action="{{url('member/login')}}">
						<div class="content">
							<p>I am a returning customer</p>
							<b>E-Mail Address:</b><br>
							<input type="text" name="email" required>
							<br><br>
							<b>Password:</b><br>
							<input type="password" name="password" required>
							<br><br>
							<a href="{{url('member/forget-password')}}">Forgotten Password</a><br>
							<br>
							<input type="submit" class="button" value="Login">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>