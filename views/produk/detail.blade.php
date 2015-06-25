		<!--Right Part-->
		<div id="column-right">
			<!--Categories Part Start-->
			<div class="box">
				<div class="box-heading">Categories</div>
				<div class="box-content box-category">
					<ul>   
					@foreach(list_category() as $item)
						@if($item->parent==0)
						<li><a href="{{category_url($item)}}">{{$item->nama}}</a>
						@endif
					@endforeach 
					</ul>
				</div>
			</div>
			<!--Categories Part End-->
			@if(count(best_seller(9)) > 0)
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
			@if(count(featured_product(3)) > 0)
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
							<div class="price"> <span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ? price($item->hargaCoret) : ''}}</span> <span class="price-new">{{price($item->hargaJual)}}</span> </div>
						</div>
						@endforeach         
					</div>
				</div>
			</section>
			@endif
			@if(count(latest_product(6)) > 0)
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
			@endif
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
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
							{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>250,'height'=>250,'id'=>"image"))}}
						</a>
					</div>
					<div class="image-additional">
					@if($produk->gambar2!='')			  	
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
							{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>62))}}
						</a>         
					@endif
					@if($produk->gambar3!='')			  	
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
						{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>62))}}
						</a>         
					@endif
					@if($produk->gambar4!='')			  	
						<a title="{{$produk->nama}}" href="{{product_url($produk)}}" class="colorbox">
						{{HTML::image(product_image_url($produk->gambar1), $produk->nama, array('width'=>62))}}
						</a>         
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
							<h3>{{$produk->nama}}</h3>
						</div>
						<div class="price">
							<span class="price-old">{{$produk->hargaCoret!='' || $produk->hargaCoret!=0 ? price($produk->hargaCoret):''}}</span>
							<span class="price-new">{{price($produk->hargaJual)}}</span>
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
										{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
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
							<!-- <iframe src="//www.facebook.com/plugins/share_button.php?href={{url(product_url($produk))}}&amp;layout=button" scrolling="no" frameborder="0" style="border:none; overflow:hidden;height:20px;width:70px;" allowTransparency="true"></iframe>
							<a class="twitter-share-button" href="https://twitter.com/share" data-count="none">Tweet </a> -->
							<!--<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>-->
							{{sosialShare(product_url($produk))}}
						</div>
					</div>
					<div class="tab-content" id="tab-description">
						<div>
							{{$produk->deskripsi}}
						</div>
					</div>
				</div>
			</div>
			@if(count(other_product($produk)) > 0)
			<!-- Related Products Start -->
			<div class="box">
				<div class="box-heading">Related Products</div>
				<div class="box-content">
					<div class="box-product related">
						@foreach(other_product($produk) as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1), $item->nama, array('width'=>165,'height'=>165))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item)}}">{{$item->nama}}</a></div>
							<div class="price">{{price($item->hargaJual)}}</div>
							<div class="abs">
								<div class="cart">
									<a class="btn-detail ml10" title="Detail" href="{{product_url($item)}}">
										<span>Detail</span>
									</a>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
				</div>
			</div>
			<!-- Related Products End -->
			@endif
			<div class="box">
				<div class="box-heading">Reviews Product</div>
				<div class="box-content">
					{{pluginTrustklik()}}
				</div>
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>