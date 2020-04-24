<!-- <time class="updated sans-serif f5 b dib mt3" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time> -->
<h3 class="entry-title normal sans-serif"><a href="{{ get_permalink() }}" class="link f5 no-underline black">{{ the_title() }}</a></h3>
<p> {{ the_field('live_date') }} @ {{ the_field('live_at') }}</p>
<!-- <p class="byline author vcard">
  {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ get_the_author() }}
  </a>
</p> -->
