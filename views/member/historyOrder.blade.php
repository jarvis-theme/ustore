		<!--Right Part-->
		<div id="column-right">
			<!--Account Links End-->
			@if(count(best_seller()) > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,15),array('width'=>50,'height'=>50))}}
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
									{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>50,'height'=>50))}}
								</a>
							</div>
							<div class="name"><a href="{{product_url($item)}}">{{short_description($item->nama,15)}}</a></div>
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
			@if(latest_product()->count() > 0)
			<section class="box">
				<div class="box-heading"><span>New Product</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(latest_product() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>50,'height'=>50))}}
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
			<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Daftar Pembelian </div>
			<!--Breadcrumb Part End-->
			<h1>History Order</h1>
			<div class="cart-info">
				<table>
					<thead>
						<tr>
							<td class="image">Kode Order</td>
							<td class="name">Detail</td>
							<td class="name">Total</td>
							<td class="name">Status</td>
						</tr>
					</thead>
					<tbody>
						@foreach(list_order() as $item)
						<tr>
							<td>
								{{prefixOrder()}}{{waktu($item->kodeOrder)}}<br>
								@if($item->status==0 || $item->status==1)
									<a href="{{url('konfirmasiorder/'.$item->id)}}" class="button">Konfirmasi</a>
								@endif
							</td>
							<td>
								{{$item->tanggalOrder}}<br>
								<ul>
									@foreach ($item->detailorder as $detail)
									<li>{{@$detail->produk->nama}} {{@$detail->opsiSkuId !=0 ? '('.@$detail->opsisku->opsi1.(@$detail->opsisku->opsi2 != '' ? ' / '.@$detail->opsisku->opsi2:'').(@$detail->opsisku->opsi3 !='' ? ' / '.@$detail->opsisku->opsi3:'').')':''}} - {{@$detail->qty}}</li>
									<br>
									@endforeach 
								</ul>
							</td>
							<td>
								{{ price($item->total)}}<br>
								{{ !empty($item->noResi) ? 'No resi : '.$item->noResi : ''}}
							</td>
							<td>
								@if($item->status==0)
								<span class="label label-warning">Pending</span>
								@elseif($item->status==1)
								<span class="label label-danger">Konfirmasi diterima</span>
								@elseif($item->status==2)
								<span class="label label-info">Pembayaran diterima</span>
								@elseif($item->status==3)
								<span class="label label-success">Terkirim</span>
								@elseif($item->status==4)
								<span class="label label-default">Batal</span>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{list_order()->links()}}
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>