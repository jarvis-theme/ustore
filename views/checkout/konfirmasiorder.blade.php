		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Konfirmasi Order</div>
			<!--Breadcrumb Part End-->
			<h1>Konfirmasi Order {{prefixOrder().$order->kodeOrder}}</h1> 
			<div class="cart-info">
				<table>
					<thead>
						<tr>
							<td>Tanggal Order</td>
							<td>Order</td>
							<td>Total</td>
							<td>No Resi</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								{{waktu($order->tanggalOrder)}} 
							</td>
							<td class="name">
								<ul>
									@foreach ($order->detailorder as $detail)
									<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
									<br>
									@endforeach 
								</ul>
							</td>
							<td>{{price($order->total)}}</td>
							<td>{{$order->noResi}}</td>
							<td>
								@if($order->status==0)
								<span class="label label-warning">Pending</span>
								@elseif($order->status==1)
								<span class="label label-danger">Konfirmasi diterima <br><i><small>(menunggu konfirmasi)</small></i></span>
								@elseif($order->status==2)
								<span class="label label-info">Pembayaran diterima</span>
								@elseif($order->status==3)
								<span class="label label-success">Terkirim</span>
								@elseif($order->status==4)
								<span class="label label-default">Batal</span>
								@endif
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			@if($paymentinfo!=null)
			<h3><center>Paypal Payment Details</center></h3>
			<div class="content">
				<div class="checkout-product">
					<table>
						<tr>
							<td width="20%">Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td>
						</tr>
						<tr>
							<td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td>
						</tr>
						<tr>
							<td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td>
						</tr>
						<tr>
							<td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td>
						</tr>
						<tr>
							<td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td>
						</tr>
						<tr>
							<td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td>
						</tr>
						<tr>
							<td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
						</tr>
					</table>
					<center><p>Thanks you for your order.</p></center>
				</div>
			</div>
			@endif

			@if($order->status==0) 
				@if($order->jenisPembayaran==1 && $order->status == 0)
				<div class="checkout-heading">{{trans('content.step5.confirm_btn')." ".trans('content.step3.transfer')}}</div>
				{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}}  
					<div class="checkout-product confirm-pay">
						<table class="form">
							<tbody>
								<tr>
									<td><span class="required">*</span> Nama Pengirim:</td>
									<td><input class="large-field" type="text" name="nama" value="{{Input::old('nama')}}" required></td>
								</tr>
								<tr>
									<td><span class="required">*</span> No Rekening:</td>
									<td><input type="text" class="large-field" name="noRekPengirim" value="{{Input::old('noRekPengirim')}}" required></td>
								</tr>
								<tr>
									<td><span class="required">*</span>Rekening Tujuan:</td>
									<td>
										<select name="bank" required>
											<option value="">-- Pilih Bank Tujuan --</option>
											@foreach ($banktrans as $bank)
											<option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<tr>
									<td><span class="required">*</span> Jumlah:</td>
									<td><input class="large-field" type="text" name="jumlah" value="{{$order->total}}" required></td>
								</tr>
								<tr>
									<td></td>
									<td><button type="submit" class="button"><i class="icon-check"></i> {{trans('content.step5.confirm_btn')}}</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				{{Form::close()}}
				@endif

				@if($order->jenisPembayaran==2)
				<div class="confirm-pay">
					<center>
						<h2><b>{{trans('content.step5.confirm_btn')}} Paypal</b></h2><hr>
						<p>{{trans('content.step5.paypal')}}</p>
					</center><br>
					<center id="paypal">{{$paypalbutton}}</center>
					<br>
				</div>
				@elseif($order->jenisPembayaran==4) 
					@if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
					<div class="confirm-pay">
						<center>
							<h2><b>{{trans('content.step5.confirm_btn')}} iPaymu</b></h2><hr>
							<p>{{trans('content.step5.ipaymu')}}</p><br>
							<a class="btn-pay" href="{{url('ipaymu/'.$order->id)}}" target="_blank">{{trans('content.step5.ipaymu_btn')}}</a>
						</center>
						<br>
					</div>
					@endif
				@elseif($order->jenisPembayaran==5 && $order->status == 0)
				<div class="confirm-pay">
					<center>
						<h2><b>{{trans('content.step5.confirm_btn')}} DOKU MyShortCart</b></h2><hr>
						<p>{{trans('content.step5.doku')}}</p><br>
						{{ $doku_button }}
					</center>
					<br>
				</div>
				@elseif($order->jenisPembayaran == 6 && $order->status == 0)
				<div class="confirm-pay">
					<center>
						<h2><b>{{trans('content.step5.confirm_btn')}} Bitcoin</b></h2><hr>
						<p>{{trans('content.step5.bitcoin')}}</p><br>
						{{$bitcoinbutton}}
					</center>
					<br>
				</div>
				@elseif($order->jenisPembayaran == 8 && $order->status == 0)
				<div class="confirm-pay">
					<center>
						<h2><b>{{trans('content.step5.confirm_btn')}} Veritrans</b></h2><hr>
						<p>{{trans('content.step5.veritrans')}}</p><br>
						<button class="btn-pay" onclick="location.href='{{ $veritrans_payment_url }}'">{{trans('content.step5.veritrans_btn')}}</button>
					</center>
					<br>
				</div>
				@endif
			@endif 
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>