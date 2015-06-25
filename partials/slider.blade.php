<div class="slider-wrapper">
	<div id="slideshow" class="nivoSlider">
		@foreach(slideshow() as $slides)
		<img src="{{slide_image_url($slides->gambar)}}" />
		@endforeach
	</div>
</div>