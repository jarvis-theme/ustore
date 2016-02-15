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
			<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Login </div>
			<!--Breadcrumb Part End-->
			<h1>Account Login</h1>
			<div class="login-content">
				<div class="left">
					<h2>Pelanggan Baru</h2>
					<div class="content">
						<p>Dengan membuat akun anda akan dapat berbelanja dengan cepat, dan mendapat keuntungan lainnya seperti info diskon maupun informasi terbaru lainya.</p>
						<a class="button" href="{{url('member/create')}}">Daftar</a>
					</div>
				</div>
				<div class="right">
					<h2>Login</h2>
					<form enctype="multipart/form-data" method="post" action="{{url('member/login')}}">
						<div class="content">
							<b>Email:</b><br>
							<input type="text" name="email" value="{{Input::old('email')}}" required>
							<br><br>
							<b>Password:</b><br>
							<input type="password" name="password" required>
							<br><br>
							<a href="{{url('member/forget-password')}}">Lupa Password?</a><br>
							<br>
							<input type="submit" class="button" value="Login">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>