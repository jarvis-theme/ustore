<div class="slider-wrapper">
	<div id="slideshow" class="nivoSlider">
		@foreach(slideshow() as $slides)
			@if(!empty($slides->url))
			<a href="{{filter_link_url($slides->url)}}" target="_blank">
			@else
			<a href="#">
			@endif
				<img src="{{slide_image_url($slides->gambar)}}" alt="{{$slides->title}}" />
			</a>
		@endforeach
	</div>
</div>