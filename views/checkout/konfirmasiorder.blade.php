@if($errors->all())
<div class="error" id='message' style='display:none'>
  We encountered the following errors:
  <br>
    @foreach($errors->all() as $message)
    {{ $message }}<br>
    @endforeach
</div>
@endif
@if(Session::has('success'))
<div class="success" id='message' style='display:none'>
  Terima kasih, konfirmasi anda sudah terkirim.
</div>
@endif
<section class="wrapper">
  <div id="container">
    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » Konfirmasi Order</div>
      <!--Breadcrumb Part End-->
      <h1>Konfirmasi Order {{prefixOrder().$order->kodeOrder}}</h1> 
      <div class="cart-info">
        <table>
          <thead>
            <tr>
              <td>Tanggal Order</td>
              <td>Order</td>
              <td>Total</td>
              <td>bayar</td>
              <td>No Resi</td>
              <td>Status</td>
            </tr>
          </thead>              
          <tbody>
            <tr >
              <td>
                {{waktu($order->tanggalOrder)}}
              </td>
              <td class="name">
                @foreach ($order->detailorder as $detail)
                -{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}<br>
                @endforeach                           
              </td>
              <td>
                {{jadiRupiah($order->total)}}
              </td>
              <td>
                - {{($order->status==2 || $order->status==3) ? jadiRupiah(0) : jadiRupiah($order->total)}}
              </td>
              <td>
                {{$order->noResi}}
              </td>
              <td>
                @if($order->status==0)
                <span class="label label-warning">Pending</span>
                @elseif($order->status==1)
                <span class="label label-important">Konfirmasi diterima <br><i><small>(menunggu konfirmasi)</small></i></span>
                @elseif($order->status==2)
                <span class="label label-info">Pembayaran diterima</span>
                @elseif($order->status==3)
                <span class="label label-info">Terkirim</span>
                @elseif($order->status==4)
                <span class="label label-info">Batal</span>
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
        <table class=''>
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
    @if($order->status==1 || $order->status==0)           
      @if($order->jenisPembayaran==1)
      
      <div class="checkout-heading">Konfirmasi Form</div>
      {{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'form-horizontal'))}}  
       <div class="checkout-product">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> Nama Pengirim:</td>
                  <td><input class="large-field" type="text" name='nama' value='{{Input::old("nama")}}' required></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> No Rekening:</td>
                  <td><input type="text" class="large-field" name='noRekPengirim' value='{{Input::old("noRekPengirim")}}' required></td>
                </tr>
                <tr>
                  <td><span class="required">*</span>Rekening Tujuan:</td>
                  <td>
                    <select name='bank' required>
                    <option value=''>-- Pilih Bank Tujuan --</option>
                    @foreach ($banktrans as $bank)
                    <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                    @endforeach
                  </select>
                  </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Jumlah:</td>
                  <td><input class="large-field" type="text" name='jumlah' value='{{$order->total}}' required></td>
                </tr>                
                <tr>
                  <td></td>
                  <td><button type="submit" class="button"><i class="icon-check"></i> Konfirmasi Order</button></td>
                </tr>
              </tbody>
            </table>
      </div>
      {{Form::close()}}
      @endif
      @if($order->jenisPembayaran==2)
      <h3><center>Konfirmasi Pemabayaran Via Paypal</center></h3>
      <p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum {{$expired}}. Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
      {{$paypalbutton}}
      @endif
    </div>
    @endif    
  </div>

</div>
<!--Middle Part End-->
<div class="clear"></div>
</div>
</section>