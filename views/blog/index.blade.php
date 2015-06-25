	  	<!--Right Part-->
	  	<div id="column-right">
			<!--Categories Part Start-->
			<div class="box">
			  	<div class="box-heading">Kategori Blog</div>
				<div class="box-content box-category">
				<ul>
				  @foreach(list_blog_category() as $key=>$value)
					<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>             
				  @endforeach              
				</ul>
			  </div>
			</div>
			<!--Categories Part End-->
			<section class="box">
				<div class="box-heading"><span>Best Sellers</span></div>
				<div class="box-content">
					<div class="box-product">
				 	@foreach(best_seller(9) as $item)
					<div>
				 		<div class="image">
				 			<a href="{{product_url($item)}}">
				 				{{HTML::image(product_image_url($item->gambar1,'thumb'),short_description($item->nama,10),array('width'=>'50','height'=>'50'))}}
			 				</a>
			 			</div>
			   		</div>
			   		@endforeach 
					</div>
			  	</div>
			</section>        
	  	</div>
	  	<!--Right End-->
	  	<!--Middle Part Start-->
	  	<div id="content">
			<!--Breadcrumb Part Start-->
			<div class="breadcrumb"><a href="{{url('home')}}">Home</a> » Blog</div>
			<!--Breadcrumb Part End-->
			<h1>Blog</h1>
			@if(count(list_blog(null, @$blog_category)) > 0)  
				@foreach(list_blog() as $key=>$value)
				<article>
			  		<a href='{{blog_url($value)}}'><h2>{{$value->judul}}</h2></a>
			  		<p><small class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($value->updated_at))}}</small> | oleh: <small>{{$value->authors->nama}}</small></p>
			  		{{short_description($value->isi,250)}}
			  		<p><a href='{{blog_url($value)}}' class="theme">Baca Selengkapnya →</a></p>
				</article>
				<h1></h1>
				@endforeach   
			@else
				<center><p style="font-style: italic">Blog tidak ditemukan.</p></center>
			@endif	
			<!--Pagination Part Start-->
			<div class="pagination">
			  	<div class="links">
				@for($i=1;$i<=ceil(list_blog()->getTotal()/list_blog()->getPerPage());$i++)
					@if(list_blog()->getCurrentPage()==$i)
						<b>{{$i}}</b>
					@else 	
						<a href="{{list_blog()->getUrl($i)}}">{{$i}}</a>
					@endif	
				@endfor
			  </div>
			  <div class="results">Showing {{list_blog()->getFrom()}} to {{ceil(list_blog()->getTotal()/list_blog()->getPerPage())}} page(s)</div>
			</div>
			<!--Pagination Part End-->   
	  	</div>     
	  	<!--Middle Part End-->
	  	<div class="clear"></div>