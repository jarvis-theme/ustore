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

		<!--Right Part-->
		<div id="column-right">
			<!--Account Links Start-->
			<div class="box">
				<div class="box-heading">Account</div>
				<div class="box-content box-category">
					<ul>
						@if (Sentry::check())
							<li><a href="{{url('member')}}">My Account</a></li>
							<li><a href="{{url('order-history')}}">Order History</a></li>
						@else
							<li><a href="{{url('member/login')}}">Login</a></li>
							<li><a href="{{url('register')}}">Register</a></li>
							<li><a href="{{url('member/forget-password')}}">Forgotten Password</a></li>                
						@endif	
					</ul>
				</div>
			</div>
			<!--Account Links End-->
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Forget Password </div>
			<!--Breadcrumb Part End-->
			<h1>Forget Password</h1>
			<div class="login-content">
				<div class="left">
					<h2>New Customer</h2>
					<div class="content">
						<p><b>Register Account</b></p>
						<p>Dengan membuat akun anda akan dapat berbelanja dengan cepat, dan mendapat keuntungan lainya seperti info diskon maupun informasi terbaru lainya.</p>
						<a class="button" href="{{url('register')}}">Register</a>
					</div>
				</div>
				<div class="right">
					<h2>Forget Password</h2>
					 <form class="form-horizontal" action="{{url('member/forgetpassword')}}" method="post">
						<div class="content">
							<p>Silakan masukkan alamat email untuk mereset password anda.</p>
							<b>E-Mail Address:</b><br>
							<input type="text" value="" name="recoveryEmail" required>
							<br><br>
							<input type="submit" class="button" value="Reset Password">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>