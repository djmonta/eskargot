<article @php post_class() @endphp>
  <header>
    @include('partials/eye-catch')
    <h3 class="entry-title b"><a href="{{ get_permalink() }}" class="f5 no-underline">{{ the_title() }}</a></h3>
    @include('partials/entry-meta-live')
  </header>
  <div class="entry-excerpt">{{ the_excerpt() }}</div>
</article>
