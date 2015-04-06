			<header class="header-top-main">
				<section class="header-top">
				@if (is_login())	
					<div id="welcome">Selamat datang {{user()->nama}}, {{HTML::link('member', 'Akun')}} | {{HTML::link('order-history', 'Order History' )}} | {{HTML::link('logout', 'logout')}}</div>
				@else 	
					<div id="welcome">Selamat datang! Silakan {{HTML::link('member', 'Login disini')}} atau {{HTML::link('member/create', 'Register')}}.</div>
				@endif      
				  	<!--<div id="currency"> <a title="US Dollar"><b>$</b></a> <a title="Euro">€</a> <a title="Pound Sterling">£</a> </div>-->
				  	<div id="language"> 
				  
				  	</div>
				  	<!-- Mini Cart Start-->
					<div id='shoppingcartplace'>
						{{$ShoppingCart}}      
					</div>
				  	<!-- Mini Cart End-->
				  	<div class="clear"></div>
				</section>
				<section id="header-main">
				  	<div id="header">
						<div id="logo">
							{{HTML::image(logo_image_url(), '', array('height'=>'85px', 'style'=>'min-width:200px'))}}
						</div>

						<div class="links"> 
						@foreach($mainMenu as $key=>$link)
							@if($link->halaman=='1')
								<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
							@elseif($link->url=='1')
								<a href={{"'".URL::to('http://'.strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
							@else
								<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
							@endif
						@endforeach
						</div>
						<div id="search">
					  		<div class="button-search"></div>
					  		<form action="{{URL::to('search')}}"  method="post">
								<input type="text" value="" placeholder="Cari Produk" id="filter_name" name="search">
					  		</form>
						</div>
				  	</div>
				</section>
				<!-- Main Navigation Start-->
				<nav class="menu-main">
				  	<h3 class="menuarrow"><span>Menu</span></h3>
				  	<div id="menu">
						<ul>
						@foreach($katMenu as $key=>$menu)
					  		@if($menu->parent=='0')
							<li><a href="{{slugKategori($menu)}}">{{$menu->nama}}</a>
							@foreach($anMenu as $key=>$submenu)                                
						  		@if($menu->id==$submenu->parent)
						  		<div>
									<ul>        
										<li><a href="{{slugKategori($submenu)}}">{{$submenu->nama}}</a></li>
									</ul>
						  		</div>	
						 		@endif
							@endforeach
							</li>
					  		@endif
						@endforeach                    
						</ul>
				  	</div>
				</nav>
				<!-- Main Navigation Start-->
			</header>