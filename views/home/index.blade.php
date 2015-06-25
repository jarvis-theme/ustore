	  	<!--Middle Part Start-->
	  	<section id="content">
			{{ Theme::partial('slider') }}  

			<!--Featured Product Start-->
			<section class="box">
			  	<div class="box-heading">Featured</div>
			  	<div class="box-content">
					<div class="box-product">
			  		@foreach($produk as $item1)
					   	<div>
							<div class="image" style="position:relative;">
								{{is_terlaris($item1)}}
								{{is_produkbaru($item1)}}
								{{is_outstok($item1)}}
								<a href="{{slugProduk($item1)}}">
									{{imageProduk($item1,array('width'=>165,'height'=>165),'main')}}
								</a>
							</div>
							<div class="name"><a href="{{slugProduk($item1)}}">{{$item1->nama}}</a></div>
							<div class="price">{{jadiRupiah($item1->hargaJual)}}</div>
							<div class="abs">
							  	<div class="cart">
							  		<a class="btn-detail ml10" title="Detail" href="{{slugProduk($item1)}}">
							  			<span>Detail</span>
						  			</a>
					  			</div>
							</div>
						</div>
			  		@endforeach              
					</div>
			  	</div>
			</section>
			<!--Featured Product End-->

			<!-- Advertisement Banner Start -->
			<section id="banner" class="banner">
			@foreach(horizontal_banner() as $item2)
			  	<div>
			  		<a target="_blank" href="{{URL::to($item2->url)}}">
			  			{{HTML::image(banner_image_url($item2->gambar), '', array('width'=>'962px'))}}
		  			</a>
	  			</div>
		  	@endforeach
			</section>
			<!-- Advertisement Banner End-->
			@if(count($newproduk) > 0)
			<!--Latest Product Start-->
			<section class="box">
				<div class="box-heading">Latest</div>
				<div class="box-content">
					<div class="box-product">
						@foreach($newproduk as $item3)
					  	<div>
							<div class="image" style="position:relative;">
								{{is_terlaris($item3)}}
								{{is_outstok($item3)}}
								<a href="{{slugProduk($item3)}}">
									{{imageProduk($item3,array('width'=>165,'height'=>165),'main')}}
								</a>
							</div>
							<div class="name"><a href="{{slugProduk($item3)}}">{{$item3->nama}}</a></div>
							<div class="price"> {{jadiRupiah($item3->hargaJual)}} </div>
							<div class="abs">
						  		<div class="cart">
						  			<a class="btn-detail ml10" title="Detail" href="{{slugProduk($item3)}}">
						  				<span>Detail</span>
					  				</a>
				  				</div>
							</div>
					  	</div>
					  	@endforeach              
					</div>
			  	</div>
			</section>
			@endif
	  	</section>
	  	<!-- Middle Part End -->
	  	<div class="clear"></div>
<div class="clear"></div>