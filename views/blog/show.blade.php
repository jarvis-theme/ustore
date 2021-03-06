		<!--Right Part-->
		<div id="column-right">
			@if(list_blog_category()->count() > 0)
			<!--Categories Part Start-->
			<div class="box">
				<div class="box-heading">Kategori Blog</div>
				<div class="box-content box-category">
					<ul>
						@foreach(list_blog_category() as $key=>$value)
						<li><a href="{{blog_url($value)}}">{{$value->nama}}</a></li>
						@endforeach  
					</ul>
				</div>
			</div>
			<!--Categories Part End-->
			@endif
			@if(best_seller()->count() > 0)
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
						@foreach(best_seller() as $item)
						<div>
							<div class="image">
								<a href="{{product_url($item)}}">
									{{HTML::image(product_image_url($item->gambar1,'thumb', short_description($item->nama,10), array('width'=>'50','height'=>'50')))}}
								</a>
							</div>
						</div>
						@endforeach 
					</div>
				</div>
			</section>
			@endif
		</div>
		<!--Right End-->
		<!--Middle Part Start-->
		<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb">
				<a href="{{url('home')}}">Home</a> » <a href="{{url('blog')}}">Blog</a> » {{$detailblog->judul}}
			</div>
			<!--Breadcrumb Part End-->
			<h1>{{$detailblog->judul}}</h1>
			{{$detailblog->isi}}
			<h1>&nbsp;</h1>
			<div class="buttons">
			@if(next_blog($detailblog))
				<div class="right"><a class="button" href="{{blog_url(next_blog())}}">Selanjutnya &rarr;</a></div>
			@endif
			@if(prev_blog($detailblog))
				<div class="left"><a class="button" href="{{blog_url(prev_blog())}}">&larr; Sebelumnya</a></div>
			@endif
			</div>
			<h1>Comments</h1>
			{{$fbscript}}
			{{fbcommentbox(blog_url($detailblog), '100%', '10', 'light')}}
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>