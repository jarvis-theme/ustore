    <!--Middle Part Start-->
    {{Form::open(array('url'=>'pengiriman', 'method' => 'post','name'=>'checkout'))}}
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="{{url('home')}}">Home</a> » Shopping Cart</div>
        <!--Breadcrumb Part End-->
        <h1>Shopping Cart</h1>
        @if($cart->contents())
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
                  <input type="text" class="w30 cartqty" value="{{$item['qty']}}" name='{{ $item['rowid'] }}'/>
                  &nbsp;
                  <input type="image" title="hapus" alt="hapus" onclick="deletecart('{{$item["rowid"]}}')" src="{{url('themes/ustore/assets/images/remove.png')}}">
                </td>
                <td class="price">{{ price($item['price'])}}</td>
                <td class="total"><span class="{{ $item['rowid'] }}">{{ price($item['price'] * $item['qty'])}}</span></td>
              </tr>
              @endforeach
              <tr>
                <td class="image"></td>
                <td class="name"></td>
                <td class="quantity"></td>
                <td class="price">Sub total :</td>
                <td><span id='subtotalcart'>{{price(Shpcart::cart()->total())}}</span></td>
              </tr>            
            </tbody>
          </table>
        </div>
        <h2>Apa yang akan kamu lakukan selanjutnya?</h2>
        <p>Masukkan kupon code atau diskon code untuk mendapatkan potongan harga dan jangan lupa pilih ekspedisi untuk pengirima pesanan anda.</p>
        <div class="accordion">
          <div class="accordion-heading">
            Use Coupon Code             
          </div>
          <div class="accordion-content">
            <div id="coupon">
              <form enctype="multipart/form-data" method="post" action="">
                Enter your coupon here:&nbsp;
                <input type="text" value="" name="coupon" name='kodeplace' id='kuponplace'>
                &nbsp;
                <input type="submit" class="button" id='kuponbtn' value="Pakai Kupon">
              </form>
            </div>
          </div>
        </div>
        <input type="hidden" id="statusPengiriman" value="{{$pengaturan->statusEkspedisi}}">
        @if($pengaturan->statusEkspedisi==1)
        <div class="accordion">
          <div class="accordion-heading">Ekspedisi dan Biaya Pengiriman</div>
          <div class="accordion-content">
            <div id="shipping">
              <p>Masukkan kota tujuan pengiriman anda.</p>
              <table>
                <tbody>                                
                  <tr>
                    <td><span class="required" id="postcode-required">*</span> Nama Kota:</td>
                    <td><input type="text" class="input" id='tujuan' placeholder="nama tujuan.."></td>
                    <td><input type="button" class="button" id="ekspedisibtn"  value="Cari"></td>
                  </tr>
                </tbody>
              </table>
              <div class="well" id='ekspedisiplace'>
                <p>Masukkan nama kota tujuan dahulu..</p><hr>   
              </div>
            </div>
          </div>
        </div>
        <br>

        @endif        
        <div class="cart-total">
          <table id="total">
            <tbody>
              <tr>
                <td class="right"><b>Biaya Ekspedisi:</b></td>
                <td class="right"><span id='ekspedisitext'>{{$pengaturan->statusEkspedisi==2 ?'<strong>Free Shipping</strong>' : ($pengaturan->statusEkspedisi==3?'Pengiriman Menyusul':'0')}}</span></td>
              </tr>
              <tr>
                <td class="right"><b>Potongan (diskon):</b></td>
                <td class="right"><span id='kupontext'>{{price(0)}}</span></td>
              </tr>              
              <tr>
                <td class="right"><b>Pajak:</b></td>
                <td class="right">
                  <span id='pajaktext'>{{Pajak::all()->first()->status==0? '<em>pajak non-aktif</em>' : Pajak::all()->first()->pajak.'%'}}</span>
                </td>
              </tr>
              <tr>
                <td class="right">Kode Unik:</td>
                <td class="right">
                  <span id='kodeuniktext'>{{price($kodeunik)}}</span>
                </td>
              </tr>
              <tr>
                <td class="right"><b>Total:</b></td>
                <td class="right">
                  <strong>
                    <span id='totalcart'>                
                      {{price(Shpcart::cart()->total())}}
                    </span>
                  </strong>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="buttons">
          <div class="right"><input type="submit" class="button" value="Lanjut Ke Pengiriman"></div>
          <div class="left"><a class="button" href="{{url('produk')}}">Continue Shopping</a></div>
        </div>         
        @else
        <div class="buttons">
          <div class="center">
            <h2>Maaf, tapi keranjang belanja anda masih kosong?</h2><br>
            <a class="button" href="{{url('produk')}}">Continue Shopping</a>
          </div>
        </div>
        @endif
      </div>
    {{Form::close()}}
    <!--Middle Part End-->
    <div class="clear"></div>