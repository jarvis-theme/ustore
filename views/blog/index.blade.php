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
			<div class="breadcrumb"><a href="{{URL::to('')}}">Home</a> » Blog</div>
			<!--Breadcrumb Part End-->
			<h1>Blog</h1>
			@if(count($bloglist) > 0)  
			@foreach($bloglist as $key=>$value)
			<article>
		  		<a href={{"'".URL::to("blog/".$value->slug)."'"}}><h2>{{$value->judul}}</h2></a>
		  		<p><small class="date"><i class="icon-calendar"></i> {{date("d M Y", strtotime($value->updated_at))}}</small> | oleh: <small>{{$value->authors->nama}}</small></p>
		  		{{firstPara($value->isi,0,250)}}
		  		<p><a href={{"'".URL::to("blog/".$value->slug)."'"}} class="theme">Baca Selengkapnya →</a></p>
			</article>    
			<h1></h1>    
			@endforeach   

			@else
			<center><p>Blog tidak ditemukan.</p></center>
			@endif	
			<!--Pagination Part Start-->
			<div class="pagination">
			  	<div class="links">
				@for($i=1;$i<=ceil($bloglist->getTotal()/$bloglist->getPerPage());$i++)
					@if($bloglist->getCurrentPage()==$i)
						<b>{{$i}}</b>
					@else
						<a href="{{$bloglist->getUrl($i)}}">{{$i}}</a>
					@endif              
				@endfor
			  </div>
			  <div class="results">Showing {{$bloglist->getFrom()}} to {{ceil($bloglist->getTotal()/$bloglist->getPerPage())}} page(s)</div>
			</div>
			<!--Pagination Part End-->   
	  	</div>     
	  	<!--Middle Part End-->
	  	<div class="clear"></div>
	</div>
</section>