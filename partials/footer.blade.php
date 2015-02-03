			<!-- About Store information Start -->
			<section id="footer-top-outside">
				<div class="line-bottom">
					<div id="customHome" class="container_12">
						<div id="about_us_footer"	class="grid_3">
							<h2>{{$aboutUs[1]->judul}}</h2>
							{{shortDescription($aboutUs[1]->isi,300)}}
						</div>
						<!--  TWITTER -->
						<div id="twitter_footer" class="grid_3">
							<h2>Latest Testimonial</h2>
							<br>
							@foreach(recentTestimonial() as $items)	
							<div class="twitter_footer">
								<strong>{{$items->nama}}</strong></small>
								<p>{{$items->isi}}</p>      
							</div>
							@endforeach	
							<br>
							<small><strong><a href="{{URL::to('testimoni')}}">Lihat lebih banyak..</a></strong></small>
						</div>
						<div id="contact_footer" class="grid_3">
							<h2>Contact Us</h2>
							<ul>
								<li>
									@if($kontak->telepon)	
									<!-- TELEPHONE -->
									<ul id="tel" class="contact_column">
										<li id="footer_telephone">{{$kontak->telepon}}</li>
										@if($kontak->hp)	
										<li id="footer_telephone2">{{$kontak->hp}}</li>
										@endif	
									</ul>
									@endif	
									<!-- EMAIL -->
									<ul id="mail" class="contact_column">
										<li id="footer_email" ><a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a></li>
									</ul>
									@if($kontak->bb)	
									<!-- bb -->
									<ul class="contact_column">
										<li ><div class="pull-left" style="float:left;margin-left:-25px;margin-top:-10px;margin-right:10px "><img src="{{URL::to('img/bbm.png')}}" style="width: 40px;"></div><span>{{$kontak->bb}}</span></li>
									</ul>
									@endif	
								</li>
							</ul>
						</div>
						<!--  FACEBOOK -->
						<div id="facebook_footer" class="grid_3">
							<h2>Facebook</h2>
							<div class="facebook-outer">
								<div id="facebook" >
									<div id="fb-root"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
									</script>
									<div class="fb-like-box" data-href="{{$kontak->fb}}" data-width="240" data-connections="12" data-height="255" data-show-faces="true" data-stream="false" data-header="false" data-border-color="#fff"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="line-bottom1"></div>
			</section>
			<footer id="footer-main">
				<div id="footer">
				@foreach($tautan as $key=>$group)	
					@if($key==0 || $key>2)	
					<div class="column">
						<h3>{{$group->nama}}</h3>
						<ul>
						@foreach($quickLink as $key=>$link)	
							@if($group->id==$link->tautanId)	
							<li>
								@if($link->halaman=='1')	
									<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@elseif($link->url=='1')	
									<a href="{{strtolower($link->linkTo)}}">{{$link->nama}}</a>
								@else 	
									<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@endif	
							</li>
							@endif	
						@endforeach	
						</ul>
					</div>
					@else 	
					<div class="column">
						<h3>{{$group->nama}}</h3>
						<ul>
						@foreach($quickLink as $key=>$link)	
							@if($group->id==$link->tautanId)	
							<li>
								@if($link->halaman=='1')	
									<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@elseif($link->url=='1')	
									<a href="http://{{strtolower($link->linkTo)}}">{{$link->nama}}</a>
								@else 	
									<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@endif	
							</li>
							@endif	
						@endforeach	
						</ul>
						</div>
					@endif	
				@endforeach   
				
					<div class="column">
						<h3>Pembayaran Bank</h3>
						<ul>
						@foreach($bank as $value)	
							<li><img style="" src="{{URL::to('img/'.$value->bankdefault->logo)}}" alt="" width="100px"/></li>
						@endforeach	
						</ul>
					</div>
				</div>
				<div class="powered-main">
					<div id="powered">
						<div class="fl">&copy; 2012 {{ Theme::place('title') }}. Powered by <a target="_blank" href="http://jarvis-store.com">Jarvis Store</a></div>
					<div class="back-to-top" id="back-top"><a title="Back to Top" href="javascript:void(0)" class="backtotop">Top</a></div>
					</div>
				</div>
			</footer>