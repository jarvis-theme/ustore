<section class="wrapper">
	<div id="container">
		<!--Right Part-->
		<div id="column-right">
			<!--Categories Part Start-->
			<div class="box">
				<div class="box-heading">Categories</div>
				<div class="box-content box-category">
					<ul>   
					@foreach($kategori as $item)
						@if($item->parent==0)
						<li><a href="{{URL::to('category/'.generateSlug($item))}}">{{$item->nama}}</a>
						@endif
					@endforeach 
					</ul>
				</div>
			</div>
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
							<div class="price"> <span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ?jadiRupiah($item->hargaCoret) : ''}}</span> <span class="price-new">{{jadiRupiah($item->hargaJual)}}</span> </div>
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
			<div class="breadcrumb">
				{{breadcrumbProduk($produk,'; »',';', true, $produk->kategori)}}
			</div>
			<!--Breadcrumb Part End-->
			<div class="product-info">
				<div class="left">
					<div class="image">      		 
						<a title="{{$produk->nama}}" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}" class="colorbox">
							{{imageProduk($produk,array('width'=>250,'height'=>250,'id'=>"image"),'main')}}
						</a>
					</div>
					<div class="image-additional">
					@if($produk->gambar2!='')			  	
						<a title="{{$produk->nama}}" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar2)}}" class="colorbox">{{imageProduk($produk,array('width'=>62),2)}}</a>         
					@endif
					@if($produk->gambar3!='')			  	
						<a title="{{$produk->nama}}" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar3)}}" class="colorbox">{{imageProduk($produk,array('width'=>62),3)}}</a>         
					@endif
					@if($produk->gambar4!='')			  	
						<a title="{{$produk->nama}}" href="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar4)}}" class="colorbox">{{imageProduk($produk,array('width'=>62),4)}}</a>         
					@endif                               
					</div>
				</div>
				<div class="right">
					<!-- <div class="htabs" id="tabs">
						<a href="#tab-information" class="info selected" >Information</a>
						<a href="#tab-description" >Description</a>
					</div> -->
					<div class="tab-content" id="tab-information">
						<div class="description" style="min-height: 35px;">
							<span>{{$produk->nama}}</span>
						</div>
						<div class="price">
							<span class="price-old">{{$produk->hargaCoret!='' || $produk->hargaCoret!=0 ? jadiRupiah($produk->hargaCoret):''}}</span> <span class="price-new">{{jadiRupiah($produk->hargaJual)}}</span>
						</div>
						<form action="#" id='addorder'>
						@if($opsiproduk->count()>0)		
							<div class="options">
								<h2>Available Options</h2>
								<br>			
								<div class="option" id="option-256">
									<select name="option[256]">
										<option value=""> --- Please Select --- </option>
										@foreach ($opsiproduk as $key => $opsi)
										<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
										{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}
										</option>
										@endforeach
									</select>
								</div><br>
							</div>
						@endif	
							<div class="cart">
								<div>
									Qty: &nbsp;
									<input type="text" value="1" size="2" class="w30" name='qty'>
									<input type="hidden" value="36" size="2" name="product_id"> &nbsp;
									<input type='submit' class="button" id="button-cart" value='Tambah ke keranjang'>  		
								</div>
							</div>
						</form>
						<div class="sosmed">
							<iframe src="//www.facebook.com/plugins/share_button.php?href={{URL::to(slugProduk($produk))}}&amp;layout=button" scrolling="no" frameborder="0" style="border:none; overflow:hidden;height:20px;width:80px;" allowTransparency="true"></iframe>
							<a class="twitter-share-button" href="https://twitter.com/share" data-count="none">Tweet </a>
						</div>
						{{pluginTrustklik()}}
					</div>
					<div class="tab-content" id="tab-description">
						<div>
							{{$produk->deskripsi}}
						</div>
					</div>
				</div>
			</div>
			@if(count($produklain) > 0)
			<!-- Related Products Start -->
			<div class="box">
				<div class="box-heading">Related Products</div>
				<div class="box-content">
					<div class="box-product related">
					@foreach($produklain as $item)
						<div>
							<div class="image">
								<a href="{{slugProduk($item)}}">
									{{imageProduk($item,array('width'=>165,'height'=>165),'main')}}
								</a>
							</div>
							<div class="name"><a href="{{slugProduk($item)}}">{{$item->nama}}</a></div>
							<div class="price">{{jadiRupiah($item->hargaJual)}}</div>
							<div class="abs">
								<div class="cart"><a class="btn-detail ml10" title="Detail" href="{{slugProduk($item)}}"><span>Detail</span></a></div>
							</div>
						</div>
					@endforeach	
					</div>
				</div>
			</div>
			<!-- Related Products End -->
			@endif
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>
	</div>
</section>
<div class="clear"></div>