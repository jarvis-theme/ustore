
<!--Right Part-->
<div id="column-right">
	<!--Account Links End-->
	@if(count(best_seller()) > 0)
	<section class="box">
		<div class="box-heading"><span>Best sellers</span></div>
		<div class="box-content">
			<div class="box-product">
				@foreach(best_seller(9) as $item)
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
	@if(count(featured_product()) > 0)
	<section class="box">
		<div class="box-heading"><span>Featureds</span></div>
		<div class="box-content">
			<div class="box-product1">
			@foreach(featured_product(3) as $item)
				<div>
					<div class="image">
						<a href="{{product_url($item)}}">
							{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>50,'height'=>50))}}
						</a>
					</div>
					<div class="name"><a href="{{product_url($item)}}">{{$item->nama}}</a></div>
					<div class="price">
						<span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ? price($item->hargaCoret ): ''}}</span>
						<span class="price-new">{{price($item->hargaJual)}}</span>
					</div>
				</div>
			@endforeach   
			</div>
		</div>
	</section>
	@endif
	<section class="box">
		<div class="box-heading"><span>Latest Product</span></div>
		<div class="box-content">
			<div class="box-product">
			@foreach(latest_product(6) as $item)
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
</div>
<!--Right End-->
<!--Middle Part Start-->
<div id="content">
	<!--Breadcrumb Part Start-->
	<div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Account </div>
	<!--Breadcrumb Part End-->
	<h1>Detail Account</h1>
	{{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
		<h2>Data Personal</h2>
		<div class="content">
			<table class="form">
				<tbody>
					<tr>
						<td><span class="required">*</span> Nama:</td>
						<td><input class="large-field" type="text" name='nama' value='{{$user->nama}}' required></td>
					</tr>
					<tr>
						<td><span class="required">*</span> E-Mail:</td>
						<td><input class="large-field" type="text" name='email' value='{{$user->email}}' required></td>
					</tr>
					<tr>
						<td><span class="required">*</span> Telephone:</td>
							<td>{{Form::input('text', 'telp', $user->telp, array('class'=>'large-field'))}}</td>
						</tr>
				</tbody>
			</table>
		</div>
		<h2>Your Address</h2>
			<div class="content">
			<table class="form">
					<tbody>
					<tr>
  						<td>Company:</td>
  						<td><input class="large-field" type="text" value="" name="company" value="{{$user->perusahaan}}"></td>
					</tr>
					<tr>
  						<td><span class="required">*</span> Address :</td>
  						<td><textarea class="span6" name='alamat'>{{$user->alamat}}</textarea></td>
					</tr>
					<tr>
  						<td><span class="required">*</span> Negara:</td>
  						<td>
							{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara'))}}
  						</td>
					</tr>
					<tr>
  						<td><span class="required">*</span> Provinsi:</td>
  						<td>
							{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi'))}}
  						</td>
					</tr>                
					<tr>
  						<td><span class="required">*</span> City / Kota:</td>
  						<td>
							{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota'))}}
  						</td>
					</tr>                
					<tr>
  						<td><span class="required" id="postcode-required">*</span> Post Code:</td>
  						<td><input class="large-field" type="text" name='kodepos' value='{{$user->kodepos}}'></td>
					</tr>
					</tbody>
			</table>
			</div>
			<h2>Ubah Password</h2>
			<div class="content">
			<table class="form">
					<tbody>
					<tr>
  						<td><span class="required">*</span> Password Lama:</td>
  						<td><input class="large-field" type="password" value="" name="oldpassword"></td>
					</tr>
					<tr>
  						<td><span class="required">*</span> Password Baru:</td>
  						<td><input class="large-field" type="password" value="" name="password"></td>
					</tr>
					<tr>
  						<td><span class="required">*</span> Password Confirm:</td>
  						<td><input class="large-field" type="password" value="" name="password_confirmation"></td>
					</tr>
					</tbody>
			</table>
			</div>
			<div class="buttons">
			<div class="right">
					<input type="submit" class="button" value="Update">
			</div>
			</div>
	</form>
</div>
<!--Middle Part End-->
<div class="clear"></div>