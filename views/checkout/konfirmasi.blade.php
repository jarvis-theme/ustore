<section class="wrapper">
  <div id="container">
    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » <a href="{{URL::to('checkout')}}">Shopping Cart</a> » Konfirmasi Pesanan</div>
      <!--Breadcrumb Part End-->
      <h1>Konfirmasi Pesanan Anda</h1>
      <div class="checkout">
        <a href="{{URL::to('checkout')}}"><div class="checkout-heading">Step 1: Checkout Options</div></a>          
      </div>
      <div class="checkout">
        <a href="javascript:history.go(-2)"><div class="checkout-heading">Step 2: Account & Detail Pengiriman</div></a>        
      </div>
      <div class="checkout">
        <a href="javascript:history.go(-1) "><div class="checkout-heading">Step 3: Detail Pembayaran</div></a>          
      </div>
      <div class="checkout">
        <div class="checkout-heading">Step 4: Konfirmasi Order </div>          
        {{Form::open(array('url'=>'finish','method'=>'post'))}}
          <div class="checkout-content" style="display:block">
            <div class="left">
              <h3>Data Pelanggan</h3>
              <div class="content">
                <table class="cart-info">
                  <tbody>
                    <tr>
                      <td width="20%">Nama</td>
                      <td width="80%">{{$datapengirim['nama']}}</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>{{$datapengirim['email']}}</td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>{{$datapengirim['alamat']}}</td>
                    </tr>
                    <tr>
                      <td>Negara</td>
                      <td>{{$datapengirim['negara']}}</td>
                    </tr>
                    <tr>
                      <td>Provisi</td>
                      <td>{{$datapengirim['provinsi']}}</td>
                    </tr>
                    <tr>
                      <td>Kota</td>
                      <td>{{$datapengirim['kota']}}</td>
                    </tr>
                    <tr>
                      <td>Kode Pos</td>
                      <td>{{$datapengirim['kodepos']}}</td>
                    </tr>
                    <tr>
                      <td>Telp / HP</td>
                      <td>{{$datapengirim['telp']}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="right">
              <h3>Data Pengiriman</h3>
              <div class="content">
                <table class="cart-info">
                  <tbody>                
                    <tr>
                      <td>Nama Ekspedisi</td>
                      <td>({{$dataekspedisi}})</td>
                    </tr>   
                    <tr>
                      <td width="20%">Nama</td>
                      <td width="80%">{{array_key_exists('statuspenerima',$datapengirim) ?  $datapengirim['nama'] : $datapengirim['namapenerima']}}</td>
                    </tr>
                    <tr>
                      <td>Telp / HP</td>
                      <td>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['telp'] : $datapengirim['telppenerima']}}</td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['alamat'] : $datapengirim['alamatpenerima']}}</td>
                    </tr>
                    <tr>
                      <td>Kota</td>
                      <td>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['kota'] : $datapengirim['kotapenerima']}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <div class="checkout-content" style="display:block">
            <h3>Konfirmasi Pesanan Anda</h3>
            <div class="cart-info">
              <table>
                <thead>
                  <tr>
                    <td class="image">Image</td>
                    <td class="name">Product Name</td>
                    <td class="quantity">Quantity</td>
                    <td class="price">Unit Price</td>
                    <td class="total">Total</td>
                  </tr>
                </thead>              
                <tbody>
                  @foreach ($cart->contents() as $key => $item) 
                  <tr id="cart{{$item['rowid']}}">
                    <td class="image">
                      <a href="#">
                        {{HTML::image(getPrefixDomain().'/produk/'.$item['image'],'',array('height'=>80,'width'=>80))}}
                      </a>
                    </td>
                    <td class="name">{{$item['name']}}
                      <div> 
                        <!-- Check if this cart item has options. -->
                        @if ($cart->has_options($item['rowid']))
                        @foreach ($cart->item_options($item['rowid']) as $option_name => $option_value)
                        - <small>{{ $option_name }}: {{ $option_value }}</small><br>
                        @endforeach
                        @endif
                      </div>
                    </td>
                    <td class="quantity">
                      {{$item['qty']}}
                    </td>
                    <td class="price">{{ jadiRupiah($item['price'])}}</td>
                    <td class="total"><span class="{{ $item['rowid'] }}">{{ jadiRupiah($item['price'] * $item['qty'])}}</span></td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="5" align="right">Sub-Total :<span id='subtotalcart'>{{jadiRupiah(Shpcart::cart()->total())}}</span></td>
                  </tr>            
                </tbody>
              </table>
            </div>
            <div class="cart-total">
              <table id="total">
                <tbody>
                  <tr>
                    <td><b>Biaya Pengiriman :</b></td>
                    <td ><span id='ekspedisitext'> ({{$dataekspedisi}})</span><br>
                      {{jadiRupiah(Session::get('ongkosKirim'))}}
                    </td>
                  </tr>
                  <tr>
                    <td><b>Pembayaran :</b></td>
                    <td ><b>
                      @if($datapembayaran['pembayaran']=='bank')
                        Via Transfer Bank
                      @endif
                      @if($datapembayaran['pembayaran']=='paypal')
                        Via Paypal
                      @endif
                      @if($datapembayaran['pembayaran']=='creditcard')
                        Via Credit Card
                      @endif</b>
                    </td>
                  </tr>
                  <tr>
                    <td ><b>Potongan {{$kodekupon=='' ? '':'('.$kodekupon.')' }}:</b></td>
                    <td ><span id='kupontext'>- {{jadiRupiah($diskon)}}</span></td>
                  </tr>              
                  <tr>
                    <td ><b>Pajak:</b></td>
                    <td >
                      <span id='pajaktext'>{{Pajak::all()->first()->status==0? '<em>pajak non-aktif</em>' : Pajak::all()->first()->pajak.'%'}}</span>
                    </td>
                  </tr>
                  <tr>
                    <td >Kode Unik:</td>
                    <td >
                      <span id='kodeuniktext'>{{jadiRupiah($kodeunik)}}</span>
                    </td>
                  </tr>
                  <tr>
                    <td ><b>Total:</b></td>
                    <td >
                      <strong>
                         {{jadiRupiah($total)}}
                     </strong>
                   </td>
                 </tr>
               </tbody>
             </table>
           </div>              
           <div class="buttons">
            <div class="right">
              <input type="submit" class="button" id="button-payment-address" value="Step 5. Selesaikan Order">
            </div>
          </div>              
        </div>        
      </form>
    </div>
    <div class="checkout">
      <div class="checkout-heading">Step 5: Finish Order</div>          
    </div>        
  </div>
  <!--Middle Part End-->
  <div class="clear"></div>
</div>
</section>