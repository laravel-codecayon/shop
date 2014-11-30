{{--*/ $slides = SiteHelpers::GetSlideshow('top') /*--}}
<div class="slider-wrapper">
        <div id="slideshow" class="nivoSlider"> 
        	@foreach($slides as $slide)
				<a href="{{$slide->slideshow_link}}"><img src="../uploads/slideshow/thumb/{{$slide->slideshow_image}}" alt="{{$slide->slideshow_name}}" /></a> 
        	@endforeach
        	
        </div>
      </div>
      <script type="text/javascript">
$(document).ready(function() {
	$('#slideshow').nivoSlider();
});
</script>