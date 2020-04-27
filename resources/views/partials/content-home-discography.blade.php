<article @php post_class('ph2 ph3-l') @endphp>
  <header>
    @include('partials/eye-catch')
  </header>
  @php $format = wp_get_post_terms(get_the_ID(), 'format')[0]->slug; @endphp
  @php $date_format = 'Y'; if($format == 'album') $date_format = 'Y.n.j'; @endphp
  <h3 class="entry-title">{{ the_title() }} ({{ date($date_format, strtotime(get_field('release_date'))) }})</h3>
  <div class="entry-content f6">{{ the_content() }}</div>
  @if ($format == 'album' && !empty(get_field('apple_music_link')))
  <a href="{!! get_field('apple_music_link') !!}" rel="nofollow" target="_blank" class="db tc"><img src="@asset('images/JP_Apple_Music_Badge_RGB.svg')" alt="Apple Music" class="badge--applemusic"></a>
  @endif
</article>
