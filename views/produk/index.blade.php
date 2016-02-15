		<!--Breadcrumb Part Start-->
		<div class="breadcrumb">
			{{breadcrumbProduk(null,'; <span>»</span>',';', true, @$category, @$colection)}}
		</div>
		<!--Breadcrumb Part End-->
		<!--Right Part-->
		<div id="column-right">
			@if(list_category()->count() > 0)
			<!--Categories Part Start-->
			<div class="box">
				<div class="box-heading">Kategori</div>
				<div class="box-content box-category">
					<ul>
					@foreach(list_category() as $item1)
						@if($item1->parent==0)
						<li><a href="{{category_url($item1)}}">{{$item1->nama}}</a>
						@endif
					@endforeach 
					</ul>
				</div>
			</div>
			<!--Categories Part End-->
			@endif
			@if(count(best_seller()) > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item2)
						<div>
							<div class="image">
								<a href="{{product_url($item2)}}">
									{{HTML::image(product_image_url($item2->gambar1,'thumb'), short_description($item2->nama,10), array('width'=>50,'height'=>50))}}
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
						@foreach(featured_product() as $item3)
						<div>
							<div class="image">
								<a href="{{product_url($item3)}}">
									{{HTML::image(product_image_url($item3->gambar1,'thumb'), short_description($item3->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item3)}}">{{$item3->nama}}</a></div>
							<div class="price">
								@if($item->hargaCoret > 0)
								<span class="price-old">{{price($item->hargaCoret)}}</span>
								@endif
								<span class="price-new">{{price($item3->hargaJual)}}</span>
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
						@foreach(latest_product() as $item4)
						<div>
							<div class="image">
								<a href="{{product_url($item4)}}">
									{{HTML::image(product_image_url($item4->gambar1,'thumb'), short_description($item4->nama,10), array('width'=>50,'height'=>50))}}
								</a>
							</div>
						</div>
						@endforeach 
					</div>
				</div>
			</section>
			@endif
			<section class="box powerup">
				{{pluginSidePowerup()}}
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
				@foreach(list_product(Input::get('show'), @$category, @$colection) as $item5)
				<div class="img-grid">
					<div class="image">
						<a href="{{product_url($item5)}}">
							{{HTML::image(product_image_url($item5->gambar1,'medium'),$item5->nama,array('width'=>165,'height'=>165))}}
						</a>
					</div>
					<div class="name"><a href="{{product_url($item5)}}">{{short_description($item5->nama,20)}}</a></div>
					<div class="price">{{price($item5->hargaJual)}}</div>
					<div class="abs">
						<a href="{{product_url($item5)}}">
							<div class="cart">
								<a class="btn-detail ml10" title="Detail" href="{{product_url($item5)}}">
									<span>Detail</span>
								</a>
							</div>
						</a>
					</div>
				</div>
				@endforeach
			</div>
			<!--Product Grid End-->
			@endif
			@if($view=='list')
			<!--Product List Start-->
			<div class="product-list">
				@foreach(list_product(Input::get('show'), @$category, @$collection) as $item)
				<a href="{{product_url($item)}}">
					<div>
						<div class="right">
							<div class="cart">
								<a href="{{product_url($item)}}"><input type="button" value="Detail" class="button" /></a>
							</div>
						</div>
						<div class="left">
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'medium'), $item->nama,array('width'=>165,'height'=>165))}}
								</a>
							</div>
							<div class="price">{{price($item->hargaJual)}}</div>
							<div class="name"><a href="{{product_url($item)}}">{{short_description($item->nama,20)}}</a></div>
							<div class="rating"></div>
							<div class="description">{{shortDescription($item->deskripsi,200)}}</div>
						</div>
					</div>
				</a>
				@endforeach
			</div>
			<!--Product List End-->
			@endif
			{{list_product(Input::get('show'), @$category, @$collection)->appends(array('show' => Input::get('show'), 'view' => $view))->links()}}
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>