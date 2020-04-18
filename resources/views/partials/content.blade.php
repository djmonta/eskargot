<article @php post_class() @endphp>
  <header>
    @include('partials/entry-meta')
    <h2 class="entry-title sans-serif"><a href="{{ get_permalink() }}" class="no-underline">{!! get_the_title() !!}</a></h2>
  </header>
  <!-- <div class="entry-summary">
    @php the_excerpt() @endphp
  </div> -->
</article>
