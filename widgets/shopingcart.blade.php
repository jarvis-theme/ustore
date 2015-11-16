<section id="cart">
	<div class="heading"> <a><span id="cart_total">{{ count(Shpcart::cart()->contents() )}} item(s) - {{ price(Shpcart::cart()->total() )}}</span></a></div>
	<div class="content">
		<div class="mini-cart-info">
			<table class="cart">
				<tbody>
					@if(Shpcart::cart()->total()==0)
					<tr>
						<td class="name">Keranjang Belanja anda masih kosong.</td>
					</tr>
					@endif
					@foreach (Shpcart::cart()->contents() as $key => $cart)
					<tr>
						<td class="image">
							<img title="{{$cart['name']}}" alt="{{$cart['name']}}" src="{{product_image_url($cart['image'],'thumb')}}" width="40" heigth="40">
						</td>
						<td class="name">{{$cart['name']}}</td>
						<td class="quantity">x&nbsp;{{$cart['qty']}}</td>
						<td class="total">{{price($cart['qty']*$cart['price'])}}</td>
					</tr>
					@endforeach                
				</tbody>
			</table>
		</div>
		<div class="mini-cart-total">
			<table class="total">
				<tbody>                
					<tr>
						<td align="right"><b>Total</b></td>
						<td align="right">{{ price(Shpcart::cart()->total() )}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="checkout"><a class="button ml10" href="{{url('checkout')}}"><span>Checkout</span></a></div>
	</div>
</section>