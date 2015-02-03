<section class="wrapper">
	<div id="container">
	  	<!--Right Part-->
	  	<div id="column-right">
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
			<section class="box">
		  		<div class="box-heading"><span>Featured</span></div>
		  		<div class="box-content">
					<div class="box-product1">
			  		@foreach(featured(3) as $item)
			  			<div>
			   				<div class="image"><a href="{{slugProduk($item)}}">{{imageProduk($item,array('width'=>50,'height'=>50))}}</a></div>
			   				<div class="name"><a href="{{slugProduk($item)}}">{{$item->nama}}</a></div>
			   				<div class="price"> <span class="price-old">{{($item->hargaCoret!='' || $item->hargaCoret!=0) ?jadiRupiah($item->hargaCoret ): ''}}</span> <span class="price-new">{{jadiRupiah($item->hargaJual)}}</span> </div>
			 			</div>
		 			@endforeach 
		   			</div>
		 		</div>
	 		</section>
	 		<section class="box">
	  			<div class="box-heading"><span>Latest</span></div>
	  			<div class="box-content">
					<div class="box-product">
	  				@foreach(latestProduk(6) as $item)
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
			<div class="breadcrumb"><a href="{{URL::to('')}}">Home</a> » {{$data->judul}}</div>
			<!--Breadcrumb Part End-->
			<h1>{{$data->judul}}</h1>
			{{$data->isi}}
	  	</div>
	  	<!--Middle Part End-->
	  	<div class="clear"></div>
	</div>
</section>