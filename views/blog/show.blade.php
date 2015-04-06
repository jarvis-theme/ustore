<section class="wrapper">
	<div id="container">
		<!--Right Part-->
	  	<div id="column-right">
			<!--Categories Part Start-->
			<div class="box">
			  	<div class="box-heading">Kategori Blog</div>
			  	<div class="box-content box-category">
				<ul>
				@foreach($categoryList as $key=>$value)
					<li><a href="{{URL::to('blog/category/'.generateSlug($value))}}">{{$value->nama}}</a></li>             
				@endforeach              
				</ul>
			  </div>
			</div>
			<!--Categories Part End-->
			<section class="box">
			  	<div class="box-heading"><span>Bestsellers</span></div>
			  	<div class="box-content">
					<div class="box-product">
				  	@foreach(bestSeller(9) as $item)
						<div>
				 			<div class="image"><a href="{{slugProduk($item)}}">{{imageProduk($item,array('width'=>50,'height'=>50))}}</a></div>
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
			<div class="breadcrumb">
				<a href="{{URL::to('')}}">Home</a> » <a href="{{URL::to('blog')}}">Blog</a> » {{$detailblog->judul}}
			</div>
			<!--Breadcrumb Part End-->
			<h1>{{$detailblog->judul}}</h1>          
			{{$detailblog->isi}}
			<h1>&nbsp;</h1>
			<div class="buttons">
			@if($next!=null)
			  	<div class="right"><a class="button" href="{{$next->slug}}">Selanjutnya &rarr;</a></div>
		  	@endif
		  	@if($prev!=null)
			  	<div class="left"><a class="button" href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
		  	@endif
			</div>
			<h1>Comments</h1>
			{{$fbscript}}
			{{--$fbcomment--}}
			{{fbcommentbox(blog_url($detailblog), 600, 10, 'light')}}
		</div>
		<!--Middle Part End-->
		<div class="clear"></div>
	</div>
</section>