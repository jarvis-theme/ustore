@if(Session::has('msg2'))
<div class="success" id='message' style='display:none'>
	Terima kasih, pesan anda sudah terkirim.
</div>
@endif
@if(Session::has('msg3'))
<div class="success" id='message' style='display:none'>
	Maaf, pesan anda belum terkirim.
</div>
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
	Terjadi kesalahan dalam menyimpan data.<br><br>
	@foreach($errors->all() as $message)
	-{{ $message }}<br>
	@endforeach
</ul>
</div>
@endif
<section class="wrapper">
  	<div id="container">
		<!--Right Part-->
		<div id="column-right">
	  		<section class="box">
				<div class="box-heading"><span>Bestsellers</span></div>
				<div class="box-content">
		  			<div class="box-product">
		   			@foreach(bestSeller(9) as $item)
		   				<div>
							<div class="image"><a href="{{slugProduk($item)}}">{{imageProduk($item,array('width'=>50,'height'=>50))}}</a></div>
		  				</div>
		  			@endforeach
					</div>
			  	</div>
			</section>
			<section class="box">
			  	<div class="box-heading"><span>Featured</span></div>
			  	<div class="box-content">
					<div class="box-product1">
						@foreach(featured(3) as $item)
						<div>
							<div class="image"><a href="{{slugProduk($item)}}">{{imageProduk($item,array('width'=>50,'height'=>50))}}</a></div>
							<div class="name"><a href="{{slugProduk($item)}}">{{$item->nama}}</a></div>
							<div class="price"> <span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ?jadiRupiah($item->hargaCoret ): ''}}</span> <span class="price-new">{{jadiRupiah($item->hargaJual)}}</span> </div>
						</div>
						@endforeach 
				   	</div>
			   	</div>
			</section>
			<section class="box">
			  	<div class="box-heading"><span>Latest</span></div>
			  	<div class="box-content">
					<div class="box-product">
				  	@foreach(latestProduk(6) as $item)
				  		<div>
						<div class="image"><a href="{{slugProduk($item)}}">{{imageProduk($item,array('width'=>50,'height'=>50))}}</a></div>
				  		</div>
				 	@endforeach  
					</div>
			  	</div>
			</section>
		</div>
		<!--Right End-->
  		<!--Middle Part Start-->
  		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"><a href="{{URL::to('/')}}">Home</a> » Contact Us</div>
			<!--Breadcrumb Part End-->
			<h1>Contact Us</h1>
			<h2>Our Location</h2>
			<div class="contact-info">
	  			<div class="content">
					<!-- Replace data-center with your address -->
					<iframe width="100%" height="300" style="float:right;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;q=Gap&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn=0.000437,0.001032&amp;ie=UTF8&amp;t=m&amp;st=115968771510351694523&amp;rq=1&amp;ev=p&amp;split=1&amp;radius=0.03&amp;hq=Gap&amp;hnear=&amp;ll={{ $kontak->lat.','.$kontak->lng }}&amp;spn=0.000425,0.001032&amp;layer=c&amp;cbll={{ $kontak->lat.','.$kontak->lng }}&amp;output=svembed"></iframe>
					<div class="left">
		  				<h4><b>Address:</b></h4>
		  				<p>{{$kontak->alamat}}</p>
		  			</div>
		  			<div class="right">
						<h4><b>Email:</b></h4>
						{{$kontak->email}}
						<h4><b>Telephone:</b></h4>
						{{$kontak->telepon}}<br>
						{{$kontak->hp}}
						@if($kontak->bb != '')	
						<h4><b>BBM:</b></h4>
						{{$kontak->bb}}
						@endif	
				  	</div>
				</div>
	  		</div>
	  		<h2>Contact Form</h2>
	  		<form action="{{URL::to('kontak')}}" class="wrap contactform" method="post">
	  			<div class="content"> <b>Your Name:</b><br>
					<input class="large-field" type="text" placeholder="nama" name='namaKontak' required>
					<br><br>
					<b>E-Mail Address:</b><br>
					<input class="large-field" type="text" placeholder="test@test.com" name="emailKontak" required>
					<br><br>
					<b>Message:</b><br>
					<textarea class="w96" rows="10" cols="40" name="messageKontak" required></textarea>
	  			</div>
	  			<div class="buttons">
					<div class="right">
		  				<input type="submit" class="button" value="Send">
					</div>
	  			</div>
	  		</form>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>
  	</div>
</section>