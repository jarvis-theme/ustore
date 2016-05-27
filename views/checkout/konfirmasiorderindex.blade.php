	<!--Middle Part Start-->
	<div id="content">
		<!--Breadcrumb Part Start-->
		<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Konfirmasi Order</div>
		<!--Breadcrumb Part End-->
		<h1>Konfirmasi Order</h1>

		<center>
			<p>Silakan masukkan kode order yang mau anda cari!</p>
			{{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline'))}}
				<input type="text" class="input-large" placeholder="Kode Order" name="kodeorder" required>
				<button type="submit" class="button"><i class="icon-check"></i> Cari</button>
			{{Form::close()}}
		</center>
	</div>
	<!--Middle Part End-->
	<div class="clear"></div>