@if (has_post_thumbnail())
{{ Hybrid\Carbon\Image::display( 'featured', array('size' => 768, 'class' => 'h-auto') ) }}
@else
<img src="@asset('images/default_image.png')" alt="">
@endif
