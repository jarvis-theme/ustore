<section class="wrapper">
  <div id="container">
    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » <a href="{{URL::to('checkout')}}">Shopping Cart</a> » Finish</div>
      <!--Breadcrumb Part End-->
      <h1>Pesanan Berhasil</h1>      
    </div>
    <div class="checkout">
      <div class="content">
        <p>Terima Kasih {{$datapengirim['nama']}} telah berbelanja dengan kami.</p>
        <h3>ID ORDER: {{$pengaturan->invoice}}{{$order->kodeOrder}}</h3>Total Harga Belanjaan: {{jadiRupiah($order->total)}}<hr>
        <p>Data pesanan Anda telah berhasil dikirimkan. Sebuah email, yang berisikan informasi pesanan ini dan tahap selanjutnya yang harus dilakukan, telah dikirimkan ke alamat email Anda.</p>
        @if($datapembayaran=='1')
                Silahkan anda melakukan pembayaran kesalah satu rekening berikut
                <br>

                <table class="table">
                  @foreach($banktrans as $key =>$banktran)
                  <tr>
                    <td >
                      @if($banktran->bankDefaultId=='1')
                        <img src="{{URL::to('img/bank/bri.png')}}" style="width:75px; height 75px;">
                      @elseif($banktran->bankDefaultId=='2')
                        <img src="{{URL::to('img/bank/bca.png')}}" width="80">
                      @elseif($banktran->bankDefaultId=='3')
                        <img src="{{URL::to('img/bank/mandiri.png')}}" width="80">
                      @endif
                    </td>
                    <td width='90%'><h4>{{ $banktran->bankdefault->nama}} : {{$banktran->noRekening}}</h4> A/n {{$banktran->atasNama}}</td>
                  </tr>
                  @endforeach                 
                </table>
                <hr>
                <p>Setelah melakukan pembayaran anda bisa mengkonfirmasi pembayaran anda disini: <a href="{{URL::to('konfirmasiorder/'.$order->id)}}" class="btn theme">Konfirmasi Pembayaran</a></p>                
          @endif
          
          @if($datapembayaran=='2')
                <!-- pembayaran via paypal -->
                <p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum 02 Jul 2013 pukul 17:26 WIB (2x24 jam). Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
                {{$paypalbutton}}
          @endif
          @if($datapembayaran=='3')
            Via Credit Card
          @endif  
      </div>
      
    </div>        
  </div>
  <!--Middle Part End-->
  <div class="clear"></div>
</div>
</section>