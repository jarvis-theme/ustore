<section class="wrapper">
	<div id="container">
		<!--Breadcrumb Part Start-->
		<div class="breadcrumb"><a href="{{URL::to('/')}}">Home</a> » Produk</div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right">
			<!--Categories Part Start-->
			<div class="box">
				<div class="box-heading">Categories</div>
				<div class="box-content box-category">
					<ul>
					@foreach($kategori as $item1)
						@if($item1->parent==0)
						<li><a href="{{URL::to('category/'.generateSlug($item1))}}">{{$item1->nama}}</a>
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
					@foreach(best_seller(9) as $item2)
						<div>
							<div class="image">
								<a href="{{product_url($item2)}}">
									{{HTML::image(product_image_url($item2->gambar1,'thumb'),'',array('width'=>50,'height'=>50))}}
								</a>
							</div>
						</div>
					@endforeach                            
					</div>
				</div>
			</section>
			
			@if(count(featured_product(3)) > 0)
			<section class="box">
				<div class="box-heading"><span>Featured</span></div>
				<div class="box-content">
					<div class="box-product1">
					@foreach(featured_product(3) as $item3)
						<div>
							<div class="image">
								<a href="{{product_url($item3)}}">
									{{HTML::image(product_image_url($item3->gambar1,'thumb'),'',array('width'=>50,'height'=>50))}}
								</a>
							</div>
							<div class="name"><a href="{{slugProduk($item3)}}">{{$item3->nama}}</a></div>
							<div class="price">
								<span class="price-old">{{($item3->hargaCoret!='' || $item3->hargaCoret!=0) ?jadiRupiah($item3->hargaCoret) : ''}}</span>
								<span class="price-new">{{jadiRupiah($item3->hargaJual)}}</span>
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
						@foreach(latest_product(6) as $item4)
						<div>
							<div class="image">
								<a href="{{slugProduk($item4)}}">
									{{HTML::image(product_image_url($item4->gambar1,'thumb'),'',array('width'=>50,'height'=>50))}}
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
			<div class="breadcrumb"></div>
			<!--Breadcrumb Part End-->
			<h1>{{$name}}</h1>
			<div class="product-filter">
				<div class="display"><b>Display:</b> 
					@if($view=='' || $view=='grid')
					<span class="list1-icon" title="Grid View">Grid</span>
					<a href="{{buatLink(URL::current(),array('view'=>'list'))}}" class="grid-icon" title="List View">List</a>
					@else
					<a href="{{buatLink(URL::current(),array('view'=>'grid'))}}" class="list1-icon" title="Grid View">Grid</a>
					<span class="grid-icon" title="List View">List</span>
					@endif
				</div>
				<div class="limit"><b>Show:</b>
					<select id="show" data-rel="{{URL::current()}}">
						<option value="12" {{Input::get('show')==12?'selected="selected"':''}}>12</option>
						<option value="24" {{Input::get('show')==24?'selected="selected"':''}}>24</option>
						<option value="36" {{Input::get('show')==36?'selected="selected"':''}}>36</option>
						<option value="48" {{Input::get('show')==48?'selected="selected"':''}}>48</option>
					</select>
				</div>
			</div>
			@if($view=='' || $view=='grid')
			<!--Product Grid Start-->
			<div class="product-grid">
				@foreach($produk as $item5)	
				<div style="position:relative; width:175px; height:240px;">
					<div class="image" style="min-height:170px">
						{{--is_terlaris($produk)--}}
						{{--is_produkbaru($produk)--}}
						{{--is_outstok($produk)--}}
						<a href="{{slugProduk($item5)}}">
							{{HTML::image(product_image_url($item5->gambar1,'medium'),$item5->nama,array('width'=>165,'height'=>165))}}
						</a>
					</div>
					<div class="name"><a href="{{slugProduk($item5)}}">{{short_description($item5->nama,20)}}</a></div>
					<div class="price">{{jadiRupiah($item5->hargaJual)}}</div>
					<div class="abs"><a href="{{slugProduk($item5)}}">
						<div class="cart"><a class="btn-detail ml10" title="Detail" href="{{slugProduk($item5)}}"><span>Detail</span></a></div></a>
					</div>
				</div>
				@endforeach          
			</div>
			<!--Product Grid End-->
			@endif
			@if($view=='list')
			<!--Product List Start-->
			<div class="product-list">
				@foreach($produk as $item)
				<a href="{{product_url($item)}}">
					<div>
						<div class="right">
							<div class="cart">
								<a href="{{product_url($item)}}"><input type="button" value="Detail" class="button" /></a>
							</div>
						</div>
						<div class="left">
							<div class="image">
								<a href="{{slugProduk($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'medium'),'',array('width'=>165,'height'=>165))}}
								</a>
							</div>
							<div class="price">{{jadiRupiah($item->hargaJual)}}</div>
							<div class="name"><a href="{{slugProduk($item)}}">{{$item->nama}}</a></div>
							<div class="rating"></div>
							<div class="description">{{shortDescription($item->deskripsi,200)}}</div>
						</div>
					</div>
				</a>
				@endforeach
			</div>
			<!--Product List End-->
			@endif
			<!--Pagination Part Start-->
			<div class="pagination">
				<div class="links">
				@for($i=1;$i<=ceil($produk->getTotal()/$produk->getPerPage());$i++)
					@if($produk->getCurrentPage()==$i)
					<b>{{$i}}</b>
					@else
					<a href="{{$produk->getUrl($i)}}">{{$i}}</a>
					@endif              
				@endfor
				</div>
				<div class="results">Showing {{$produk->getFrom()}} to {{ceil($produk->getTotal()/$produk->getPerPage())}} page(s)</div>
			</div>
			<!--Pagination Part End-->
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>
	</div>
</section>
<div class="clear"></div>