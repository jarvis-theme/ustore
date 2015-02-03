<section class="wrapper">
    <div id="container">
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » <a href="{{URL::to('checkout')}}">Shopping Cart</a> » Pembayaran</div>
        <!--Breadcrumb Part End-->
        <h1>Detail Pembayaran</h1>
        <div class="checkout">
          <a href="{{URL::to('checkout')}}"><div class="checkout-heading">Step 1: Checkout Options</div></a>          
        </div>
        <div class="checkout">
          <a href="javascript:history.back()"><div class="checkout-heading">Step 2: Account & Detail Pengiriman</div></a>        
        </div>
        <div class="checkout">
          <div class="checkout-heading">Step 3: Detail Pembayaran</div>  
          <form class="form-horizontal" action="{{URL::to('konfirmasi')}}" name='pembayaran' method='post'>
            <div class="checkout-content" style="display:block">
              <p>Silakan pilih salah satu metode pembayaran yang kami sediakan.</p>
              <label class="radio">
                <input type="radio" name="pembayaran" id="optionsRadios1" value="bank" checked>
                Transfer Bank<br>
                <hr>
                <div class="well" style="margin-left:2%">
                  <table cellpadding="5">
                    <thead>
                      <tr>
                        <th>Bank</th>
                        <th>No. Rekening</th>
                        <th>Atas Nama</th>                                       
                      </tr>
                    </thead>   
                    <tbody>
                      @foreach($banktrans as $key =>$banktran)
                      <tr>
                        <td class="center">
                          @if($banktran->bankDefaultId=='1')
                          <img src="{{URL::to('img/bank/bri.png')}}" width="100">
                          @elseif($banktran->bankDefaultId=='2')
                          <img src="{{URL::to('img/bank/bca.png')}}" width="100">
                          @elseif($banktran->bankDefaultId=='3')
                          <img src="{{URL::to('img/bank/mandiri.png')}}" width="100">
                          @endif
                        </td>
                        <td class="center">{{$banktran->noRekening}}</td>
                        <td class="center">{{$banktran->atasNama}}</td>                   
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </label>
              @if($paypal->aktif)
              <label class="radio">
                <input type="radio" name="pembayaran" id="optionsRadios2" value="paypal">
                Paypal
                <hr>
              </label>
              @endif
              @if($creditcard->aktif)
              <label class="radio">
                <input type="radio" name="pembayaran" id="optionsRadios2" value="creditcard">
                Kartu Kredit
                <hr>
              </label>
              @endif
              <div class="buttons">
                <div class="right">
                  <input type="submit" class="button" id="button-payment-address" value="Lanjut Ke Konfirmasi">
                </div>
              </div>              
            </div>        
          </form>
        </div>
        <div class="checkout">
          <div class="checkout-heading">Step 4: Konfirmasi Order</div>          
        </div>
        <div class="checkout">
          <div class="checkout-heading">Step 5: Finish Order</div>          
        </div>        
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </section>