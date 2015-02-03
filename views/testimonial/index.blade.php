@if(Session::has('msg'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, testimonial anda sudah terkirim.</p>
</div>
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
Terjadi kesalahan dalam menyimpan data.<br>
	<ul>
		@foreach($errors->all() as $message)
		<li>{{ $message }}</li>
		@endforeach
	</ul>
</div>
@endif
<section class="wrapper">
	<div id="container">
		<!--Right Part-->
		<div id="column-right">
			<!--Categories Part End-->
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
			<div class="breadcrumb"><a href="{{URL::to('')}}">Home</a> » Testimonial</div>
			<!--Breadcrumb Part End-->
			<h1>Testimonial</h1>
			@foreach($testimonial as $key=>$value)
			<article>
				<h3>{{$value->nama}}</h3>
				<small class="date"><i class="icon-calendar"></i> {{waktu($value->created_at)}}</small> <br>
				{{($value->isi)}}
			</article>
			@endforeach
			<br>        
			<!--Pagination Part Start-->
			<div class="pagination">
				<div class="links">
				@for($i=1;$i<=ceil($testimonial->getTotal()/$testimonial->getPerPage());$i++)
					@if($testimonial->getCurrentPage()==$i)
					<b>{{$i}}</b>
					@else
					<a href="{{$testimonial->getUrl($i)}}">{{$i}}</a>
					@endif              
				@endfor
				</div>
				<div class="results">Showing {{$testimonial->getFrom()}} to {{ceil($testimonial->getTotal()/$testimonial->getPerPage())}} page(s)</div>
			</div>
			<!--Pagination Part End-->
			<h1>Testimonial Form</h1>
			<form action="{{URL::to('testimoni')}}" class="wrap contactform" method="post">
			<div class="content"> <b>Your Name:</b><br>
				<input class="large-field" type="text" placeholder="nama" name='nama'>
				<br><br>
				<b>Message:</b><br>
				<textarea class="w96" rows="10" cols="40" name="testimonial"></textarea>
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