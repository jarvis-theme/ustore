		<!--Right Part-->
		<div id="column-right">
			<!--Account Links Start-->
			<div class="box">
				<div class="box-heading">Account</div>
				<div class="box-content box-category">
					<ul>
						<li><a href="{{url('member/login')}}">Login</a></li>
						<li><a href="{{url('register')}}">Register</a></li>
						<li><a href="{{url('member/forget-password')}}">Lupa Password</a></li>
					</ul>
				</div>
			</div>
			<!--Account Links End-->
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Recovery Password </div>
			<!--Breadcrumb Part End-->
			<h1>Recovery Password</h1>
			<div class="login-content">
				<div class="left">
					<h2>Pelanggan Baru</h2>
					<div class="content">
						<p>Dengan membuat akun anda akan dapat berbelanja dengan cepat, dan mendapat keuntungan lainnya seperti info diskon maupun informasi terbaru lainya.</p>
						<a class="button" href="{{url('member/create')}}">Daftar</a>
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
							<b>Ulangi Password Baru:</b><br>
							<input type="password" value="" name="password_confirmation" required>
							<br>
							<br>
							<br>
							<input type="submit" class="button" value="Reset Password">
						</div>
					{{Form::close()}}
				</div>
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>