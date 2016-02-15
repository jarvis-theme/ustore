		<!--Right Part-->
		<div id="column-right">
			@if(count(best_seller()) > 0)
			<section class="box">
				<div class="box-heading"><span>Best Seller</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{ HTML::image(product_image_url($item->gambar1,'thumb'),$item->nama,array('width'=>50,'height'=>50)) }}
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
				<div class="box-heading"><span>Top Product</span></div>
				<div class="box-content">
					<div class="box-product1">
						@foreach(featured_product() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{ HTML::image(product_image_url($item->gambar1,'thumb'),$item->nama,array('width'=>50,'height'=>50)) }}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item)}}">{{$item->nama}}</a></div>
							<div class="price">
								@if($item->hargaCoret > 0)
								<span class="price-old">{{price($item->hargaCoret)}}</span>
								@endif
								<span class="price-new">{{price($item->hargaJual)}}</span>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>
			@endif
			@if(count(latest_product()) > 0)
			<section class="box">
				<div class="box-heading"><span>New Product</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(latest_product() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{ HTML::image(product_image_url($item->gambar1,'thumb'),$item->nama,array('width'=>50,'height'=>50)) }}
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</section>
			@endif
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"><a href="{{URL::to('')}}">Home</a> » Pencarian</div>
			<!--Breadcrumb Part End-->
			<h1>Hasil Pencarian</h1>

			@if($hasilpro->count()!=0)
			<div class="product-filter">
				<div class="display"><b>Pencarian Produk:</b></div>
			</div>
			<!--Product Grid Start-->
			<div class="product-grid">
				@foreach($hasilpro as $item)
				<div>
					<div class="image imageproduk">
						<a href="{{product_url($item)}}">
							{{HTML::image(product_image_url($item->gambar1,'medium'),$item->nama, array('width'=>165,'height'=>165))}}
						</a>
					</div>
					<div class="name"><a href="{{product_url($item)}}">{{short_description($item->nama,20)}}</a></div>
					<div class="price">{{price($item->hargaJual)}}</div>
					<div class="abs">
						<div class="cart"><a class="btn-detail ml10" title="Detail" href="{{product_url($item)}}"><span>Detail</span></a></div>
					</div>
				</div>
				@endforeach
			</div>
			<!--Product Grid End-->
			{{$hasilpro->links()}}
			@else
			<center><p>Pencarian anda tidak ditemukan.</p></center>
			@endif

		</div>
		<!--Middle Part End-->
		<div class="clear"></div>