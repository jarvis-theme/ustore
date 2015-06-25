@if(Session::has('errorlogin'))
    <div class="error" id='message' style='display:none'>
        <p>Maaf, email atau password anda salah.</p>
    </div>
@endif
@if(Session::has('error'))
    <div class="error" id='message' style='display:none'>
        {{Session::get('error')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="success" id='message' style='display:none'>
        <p>Selamat, anda sudah berhasil register. Silakan check email untuk mengetahui informasi akun anda.</p>
    </div>
@endif
@if(Session::has('errorrecovery'))
    <div class="error" id='message' style='display:none'>
        <p>Maaf, email anda tidak ditemukan.</p>
    </div>
@endif
@if(Session::has('forget'))
<div class="success" id='message' style='display:none'>
    <p>Cek email untuk me-reset password anda!</p>
</div>  
@endif
@if(Session::has('error'))
<div class="error" id='message' style='display:none'>
    <p>{{Session::get('error')}}</p>
</div>  
@endif
@if(Session::has('recovery'))
<div class="success" id='message' style='display:none'>
    <p>Selamat password anda berhasil di reset, Silakan login kembali</p>
</div>  
@endif

      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> » <a href="{{URL::to('checkout')}}">Shopping Cart</a> » Pengiriman</div>
        <!--Breadcrumb Part End-->
        <h1>Pengiriman</h1>
        <div class="checkout">
          <a href="{{URL::to('checkout')}}"><div class="checkout-heading">Step 1: Checkout Options</div></a>
          @if ( !Sentry::check())
          <div class="checkout-content" style="display: block">
            <div class="left">
              <h2>New Customer</h2>              
              <br>
              <p>Anda tidak perlu menjadi member untuk berbelanja. Silakan klik tombol "Lanjut ke data pengiriman" untuk melanjutkan sebagai guest. Untuk mempercepat proses belanja dimasa mendatang plus mendapatkan sejumlah tawaran menarik lainnya, anda dapat mendaftar menjadi member dihalaman <a href="{{URL::to('register')}}">pendafaran/registrasi</a></p>
              <input type="button" class="button" id="button-account" value="Lanjut Sebagai Tamu">
              <br>
              <br>
            </div>
            <div class="right" id="login">
              <h2>Returning Customer</h2>
              <p>I am a returning customer</p>
              <form class="form-horizontal" action="{{URL::to('member/login')}}" method="post">
                <b>E-Mail:</b><br>
                <input type="text" name="email" id="inputEmail" placeholder="Email" required>              
                <br>
                <br>
                <b>Password:</b><br>
                <input type="password" name="password" id="inputPassword" placeholder="Password" required>
                <br>
                <br>
                <input type="submit" class="button" id="button-login" value="Login">
                <br>
                <br>
              </form>
            </div>
          </div>
          @endif
        </div>
        <div class="checkout">
          <div class="checkout-heading">Step 2: Account & Detail Pengiriman</div>
          <form class="form-horizontal" action="{{URL::to('pembayaran')}}" name='pengiriman' method='post'>
          <div class="checkout-content detail-content" {{Sentry::check()?'style="display: block"':''}}>
            <div class="left">
              <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span>Nama:</td>
                  <td>
                     <input type="text" name='nama' value='{{$user ? $user->nama : (Input::old("nama")? Input::old("nama") :"")}}' required class="large-field">
                  </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Email:</td>
                  <td>
                     <input type="text" name='email' value='{{$user ? $user->email :(Input::old("email")? Input::old("email") :"")}}' required class="large-field">
                  </td>
                </tr>
                <tr>
                  <td><span class="required">*</span>Telp/Hp:</td>
                  <td>
                    <input type="text" name='telp' value='{{$user ? $user->telp :(Input::old("telp")? Input::old("telp") :"")}}' required class="large-field">
                  </td>
                </tr>
                <tr>
                  <td> <span class="required">*</span>Alamat:</td>
                  <td><textarea name='alamat' required>{{$user ? $user->alamat :(Input::old("alamat")? Input::old("alamat") :"")}}</textarea></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Negara:</td>
                  <td>
                     {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara'))}}
                  </td>
                </tr>
                <tr>
                  <td><span class="required">*</span>Provinsi:</td>
                  <td>
                    {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi'))}}
                  </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> City/Kota:</td>
                  <td>
                     {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota'))}}
                  </td>
                </tr>
                <tr>
                  <td><span class="required" id="payment-postcode-required">*</span> Post Code:</td>
                  <td>
                    <input type="text" name='kodepos' value='{{$user ? $user->kodepos :(Input::old("kodepos")? Input::old("kodepos") :"")}}' required class="large-field">
                  </td>
                </tr>
                <tr>
                  <td>Pesan Tambahan</td>
                  <td>
                     <textarea class="w96" rows="8" name="pesan">{{Input::old("pesan")}}</textarea>
                  </td>
                </tr>                
                <tr>
                  <td></td>
                  <td>
                    <input type="checkbox" name='statuspenerima' value=1 style="width:auto;"> Data penerima sama dengan data pelanggan 
                  </td>
                </tr> 
              </tbody>
            </table>
            </div>
            <div class="right">

            <div class="col-1" id='datapenerima'>
               <table class="form">
                <tr>
                  <td><span class="required">*</span>Nama Penerima:</td>
                  <td>
                    <input type="text" value="" name='namapenerima' class="input-text">
                  </td>
                </tr>               
                <tr>
                  <td><span class="required">*</span>Telp/Hp Penerima:</td>
                  <td>
                    <input type="text" name='telppenerima' class="input-text">
                  </td>
                </tr>
                 <tr>
                  <td><span class="required">*</span> Alamat Penerima:</td>
                  <td>
                    <input type="text" name='alamatpenerima' class="input-text">
                  </td>
                </tr>
                 <tr>
                  <td><span class="required">*</span> Kota Penerima:</td>
                  <td>
                     {{Form::select('kotapenerima',array('' => '-- Pilih Kota --') + $kota )}}
                  </td>
                </tr>
              </table>            
            </div>
            </div>            
            <div class="buttons">
              <div class="right">
                <input type="submit" class="button" id="button-payment-address" value="Lanjut Ke Pembayaran">
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="checkout">
          <div class="checkout-heading">Step 3: Detail Pembayaran</div>          
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