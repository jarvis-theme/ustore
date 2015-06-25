			<header class="header-top-main">
				<section class="header-top">
					@if (is_login())	
					<div id="welcome">Selamat datang {{user()->nama}}, {{HTML::link('member', 'Akun')}} | {{HTML::link('order-history', 'Order History' )}} | {{HTML::link('logout', 'Logout')}}</div>
					@else 	
					<div id="welcome">Selamat datang! Silakan {{HTML::link('member', 'Login disini')}} atau {{HTML::link('member/create', 'Register')}}</div>
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
							<a href="{{ url('home') }}">
								{{HTML::image(logo_image_url(), 'logo', array('height'=>'85px', 'style'=>'min-width:200px'))}}
							</a>
						</div>

						<div class="links">
							@foreach(main_menu()->link as $link)
							<a href="{{menu_url($link)}}">{{$link->nama}}</a>
							@endforeach
						</div>
						<div id="search">
					  		<form action="{{url('search')}}"  method="post">
								<input type="text" placeholder="Cari Produk" id="filter_name" name="search" required>
					  			<button class="button-search" type="submit"></button>
					  		</form>
						</div>
				  	</div>
				</section>
				<!-- Main Navigation Start-->
				<nav class="menu-main">
				  	<h3 class="menuarrow"><span>Menu</span></h3>
				  	<div id="menu">
						<ul>
						{{--*/ $i=0 /*--}}
						@foreach(list_category() as $menu)
							@if($i >= 0 && $i < 8)
						  		@if($menu->parent=='0')
								<li><a href="{{category_url($menu)}}">{{$menu->nama}}</a>
	                        	@if($menu->anak->count() != 0)
						  		<div>
									<ul>
									@foreach($menu->anak as $submenu)
								  		@if($submenu->parent == $menu->id)
										<li><a href="{{category_url($submenu)}}">{{$submenu->nama}}</a></li>
                                		@if($submenu->anak->count() != 0)
                            			<ul>
                            				@foreach($submenu->anak as $submenu2)
                                			@if($submenu2->parent == $submenu->id)
                            				<li>
                                    			<a href="{{category_url($submenu2)}}" style="margin-left:10px">{{$submenu2->nama}}</a>
                            				</li>
                            				@endif
                            				@endforeach
                            			</ul>
                            			@endif
								 		@endif
									@endforeach
									</ul>
						  		</div>
								@endif
								</li>
						  		@endif
					  		@endif
				  		{{--*/ $i += 1 /*--}}
						@endforeach                    
						</ul>
				  	</div>
				</nav>
				<!-- Main Navigation Start-->
			</header>