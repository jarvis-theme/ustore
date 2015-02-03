@if(Session::has('message'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, kode order anda tidak ditemukan.</p>					
</div>		
@endif
<section class="wrapper">
  <div id="container">
    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » Konfirmasi Order</div>
      <!--Breadcrumb Part End-->
      <h1>Konfirmasi Order</h1>

	<center>
		<p>Silakan masukkan kode order yang mau anda cari!</p>
		{{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline'))}}
		<input type="text" class="input-large" placeholder="Kode Order" name='kodeorder'>
	  	<button type="submit" class="button"><i class="icon-check"></i> Cari</button>
		{{Form::close()}}
	</center>
	</div>
  </div>
<!--Middle Part End-->
<div class="clear"></div>
</section>