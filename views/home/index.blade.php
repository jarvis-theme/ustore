		<!--Middle Part Start-->
		<section id="content">
			{{ Theme::partial('slider') }}

			<!--Featured Product Start-->
			<section class="box">
				<div class="box-heading">Produk Kami</div>
				<div class="box-content">
					<div class="box-product">
					@foreach(home_product() as $item1)
						<div>
							<div class="image imagepro">
								{{is_terlaris($item1)}}
								{{is_produkbaru($item1)}}
								{{is_outstok($item1)}}
								<a href="{{product_url($item1)}}">
									{{HTML::image(product_image_url($item1->gambar1,'medium'), $item1->nama,array('width'=>165,'height'=>165))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item1)}}">{{short_description($item1->nama,20)}}</a></div>
							<div class="price">{{price($item1->hargaJual)}}</div>
							<div class="abs">
								<div class="cart">
									<a class="btn-detail ml10" title="Detail" href="{{product_url($item1)}}">
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
						{{HTML::image(banner_image_url($item2->gambar), 'Info Promo', array('width'=>'962px'))}}
					</a>
				</div>
				@endforeach
			</section>
			<!-- Advertisement Banner End-->
			@if(count(new_product()) > 0)
			<!--Latest Product Start-->
			<section class="box">
				<div class="box-heading">Produk Terbaru</div>
				<div class="box-content">
					<div class="box-product">
						@foreach(new_product() as $item3)
						<div>
							<div class="image imagepro">
								{{is_terlaris($item3)}}
								{{is_outstok($item3)}}
								<a href="{{product_url($item3)}}">
									{{HTML::image(product_image_url($item3->gambar1,'medium'), $item3->nama,array('width'=>165,'height'=>165))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item3)}}">{{short_description($item3->nama,20)}}</a></div>
							<div class="price"> {{price($item3->hargaJual)}} </div>
							<div class="abs">
								<div class="cart">
									<a class="btn-detail ml10" title="Detail" href="{{product_url($item3)}}">
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