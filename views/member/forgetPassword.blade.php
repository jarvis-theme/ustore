		<!--Right Part-->
		<div id="column-right">
			<!--Account Links Start-->
			<div class="box">
				<div class="box-heading">Account</div>
				<div class="box-content box-category">
					<ul>
						@if (Sentry::check())
							<li><a href="{{url('member')}}">My Account</a></li>
							<li><a href="{{url('order-history')}}">Daftar Pembelian</a></li>
						@else
							<li><a href="{{url('member/login')}}">Login</a></li>
							<li><a href="{{url('register')}}">Register</a></li>
							<li><a href="{{url('member/forget-password')}}">Lupa Password</a></li>
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
			<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Lupa Password </div>
			<!--Breadcrumb Part End-->
			<h1>Lupa Password</h1>
			<div class="login-content">
				<div class="left">
					<h2>Pelanggan Baru</h2>
					<div class="content">
						<p>Dengan membuat akun anda akan dapat berbelanja dengan cepat, dan mendapat keuntungan lainya seperti info diskon maupun informasi terbaru lainya.</p>
						<a class="button" href="{{url('register')}}">Daftar</a>
					</div>
				</div>
				<div class="right">
					<h2>Lupa Password</h2>
					 <form class="form-horizontal" action="{{url('member/forgetpassword')}}" method="post">
						<div class="content">
							<p>Silakan masukkan alamat email untuk mereset password anda.</p>
							<b>Email:</b><br>
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