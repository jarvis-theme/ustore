<section class="wrapper">
	<div id="container">
		<!--Right Part-->
		<div id="column-right">
			@if(count(best_seller()) > 0)      
			<section class="box">
				<div class="box-heading"><span>Bestsellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller(9) as $item)
						<div>
							<div class="image">
								<a href="{{slugProduk($item)}}">
									{{ HTML::image(product_image_url($item->gambar1,'thumb'),'',array('width'=>50,'height'=>50)) }}
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
								<a href="{{slugProduk($item)}}">
									{{ HTML::image(product_image_url($item->gambar1,'thumb'),'',array('width'=>50,'height'=>50)) }}
								</a>
							</div>
							<div class="name"><a href="{{slugProduk($item)}}">{{$item->nama}}</a></div>
							<div class="price">
								<span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ?jadiRupiah($item->hargaCoret ): ''}}</span>
								<span class="price-new">{{jadiRupiah($item->hargaJual)}}</span>
							</div>
						</div>
						@endforeach                                                  
					</div>
				</div>
			</section>
			@endif
			<section class="box">
				<div class="box-heading"><span>Latest</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(latestProduk(6) as $item)
						<div>
							<div class="image">
								<a href="{{slugProduk($item)}}">
									{{ HTML::image(product_image_url($item->gambar1,'thumb'),'',array('width'=>50,'height'=>50)) }}
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
					<div class="image" style="min-height:170px; min-width: 165px;">
						<a href="{{slugProduk($item)}}">
							{{HTML::image(product_image_url($item->gambar1,'medium'),'', array('width'=>165,'height'=>165))}}
						</a>
					</div>
					<div class="name"><a href="{{slugProduk($item)}}">{{short_description($item->nama,20)}}</a></div>
					<div class="price">{{jadiRupiah($item->hargaJual)}}</div>
					<div class="abs">
						<div class="cart"><a class="btn-detail ml10" title="Detail" href="{{slugProduk($item)}}"><span>Detail</span></a></div>
					</div>
				</div>
				@endforeach							
			</div>
			<!--Product Grid End-->
			<!--Pagination Part Start-->
			<div class="pagination">
				<div class="links">
				@for($i=1;$i<=ceil($hasilpro->getTotal()/$hasilpro->getPerPage());$i++)
					@if($hasilpro->getCurrentPage()==$i)
					<b>{{$i}}</b>
					@else
					<a href="{{$hasilpro->getUrl($i)}}">{{$i}}</a>
					@endif              
				@endfor
				</div>
				<div class="results">Showing {{$hasilpro->getFrom()}} to {{ceil($hasilpro->getTotal()/$hasilpro->getPerPage())}} page(s)</div>
			</div>
			<!--Pagination Part End-->
			@else
			<center><p>Pencarian anda tidak ditemukan.</p></center>
			@endif

		</div>
		<!--Middle Part End-->
		<div class="clear"></div>
	</div>
</section>
<div class="clear"></div>