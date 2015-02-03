<section class="wrapper">
	<div id="container">
		<!--Right Part-->
		<div id="column-right">      
			<!--Account Links End-->
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
				<div class="box-heading"><span>Featureds</span></div>
				<div class="box-content">
					<div class="box-product1">
						@foreach(featured(3) as $item)
						<div>
							<div class="image"><a href="{{slugProduk($item)}}">{{imageProduk($item,array('width'=>50,'height'=>50))}}</a></div>
							<div class="name"><a href="{{slugProduk($item)}}">{{$item->nama}}</a></div>
							<div class="price"> <span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ?jadiRupiah($item->hargaCoret ): ''}}</span> <span class="price-new">{{jadiRupiah($item->hargaJual)}}</span> </div>
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
			<div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » History Order </div>
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
						@foreach($order as $item)
					 	<tr>
							<td>
								{{prefixOrder()}}{{waktu($item->kodeOrder)}}<br>
								@if($item->status==0 || $item->status==1)
									<a href="{{URL::to('konfirmasiorder/'.$item->id)}}" class="button">Konfirmasi</a>
								@endif
							</td>
							<td>
								{{$item->tanggalOrder}}<br>
								@foreach ($item->detailorder as $detail)
									-{{@$detail->produk->nama}} {{@$detail->opsiSkuId !=0 ? '('.@$detail->opsisku->opsi1.(@$detail->opsisku->opsi2 != '' ? ' / '.@$detail->opsisku->opsi2:'').(@$detail->opsisku->opsi3 !='' ? ' / '.@$detail->opsisku->opsi3:'').')':''}} - {{@$detail->qty}}<br>
								@endforeach                           
							</td>
							<td>
								{{ jadiRupiah($item->total)}}<br>
								No resi : {{ $item->noResi}}
							</td>
							<td>
								@if($item->status==0)
								<span class="label label-warning">Pending</span>
								@elseif($item->status==1)
								<span class="label label-important">Konfirmasi diterima</span>
								@elseif($item->status==2)
								<span class="label label-info">Pembayaran diterima</span>
								@elseif($item->status==3)
								<span class="label label-info">Terkirim</span>
								@elseif($item->status==4)
								<span class="label label-info">Batal</span>
								@endif
							</td>
						</tr>
						@endforeach    
					</tbody>
				</table>
				<!--Pagination Part Start-->
				<div class="pagination">
					<div class="links">
						@for($i=1;$i<=ceil($order->getTotal()/$order->getPerPage());$i++)
							@if($order->getCurrentPage()==$i)	
							<b>{{$i}}</b>
							@else 	
							<a href="{{$order->getUrl($i)}}">{{$i}}</a>
							@endif              
						@endfor 	
					</div>
					<div class="results">Showing {{$order->getFrom()}} to {{ceil($order->getTotal()/$order->getPerPage())}} page(s)</div>
				</div>
				<!--Pagination Part End-->
			</div>
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>
	</div>
</section>