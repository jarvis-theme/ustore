		<!--Right Part-->
		<div id="column-right">
			@if(count(best_seller()) > 0)
			<!--Categories Part End-->
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1, 'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
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
									{{HTML::image(product_image_url($item->gambar1, 'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
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
									{{HTML::image(product_image_url($item->gambar1, 'thumb'), short_description($item->nama,10), array('width'=>50,'height'=>50))}}
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
			<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Testimonial</div>
			<!--Breadcrumb Part End-->
			<h1>Testimonial</h1>
			@foreach(list_testimonial() as $key=>$value)
			<article>
				<h3>{{$value->nama}}</h3>
				<small class="date"><i class="icon-calendar"></i> {{waktu($value->created_at)}}</small> <br>
				{{($value->isi)}}
			</article>
			@endforeach
			<br>
			{{list_testimonial()->links()}}
			
			<h1>Kirim Testimonial</h1>
			<form action="{{url('testimoni')}}" class="wrap contactform" method="post">
			<div class="content"> <b>Nama:</b><br>
				<input class="large-field" type="text" name="nama" required>
				<br><br>
				<b>Pesan:</b><br>
				<textarea class="w96" rows="10" cols="40" name="testimonial" required></textarea>
			</div>
			<div class="buttons">
				<div class="right">
					<input type="submit" class="button" value="Kirim">
				</div>
			</div>
			</form>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>