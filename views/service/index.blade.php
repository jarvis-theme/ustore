@if(Session::has('msg'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, testimonial anda sudah terkirim.</p>
</div>
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
	<h4>Terjadi kesalahan dalam menyimpan data.</h4><br>
	<ul>
		@foreach($errors->all() as $message)
		<li>{{ $message }}</li>
		@endforeach
	</ul>
</div>
@endif

		<!--Right Part-->
		<div id="column-right">
			<!--Categories Part End-->
			@if(count(best_seller()) > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller(9) as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
						</div>
						@endforeach                            
					</div>
				</div>
			</section>
			@endif
			@if(count(featured_product()) > 0)
			<section class="box">
				<div class="box-heading"><span>Featured</span></div>
				<div class="box-content">
					<div class="box-product1">
						@foreach(featured_product(3) as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item)}}">{{$item->nama}}</a></div>
							<div class="price">
								<span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ? price($item->hargaCoret ): ''}}</span>
								<span class="price-new">{{price($item->hargaJual)}}</span>
							</div>
						</div>
						@endforeach                                                  
					</div>
				</div>
			</section>
			@endif
			<section class="box">
				<div class="box-heading"><span>Latest Product</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(latest_product(6) as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
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
			<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Term and Service</div>
			<!--Breadcrumb Part End-->
			<h1>Term and Service</h1>
			<div class="accordion">
				<div class="accordion-heading">Term of Service</div>
				<div class="accordion-content">{{$service->tos}}</div>
			</div>
			<div class="accordion">
				<div class="accordion-heading">Refund Policy</div>
				<div class="accordion-content"> {{$service->refund}}</div>
			</div>
			<div class="accordion">
				<div class="accordion-heading">Privacy Policy</div>
				<div class="accordion-content">{{$service->privacy}}</div>
			</div>
			<br>               
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>