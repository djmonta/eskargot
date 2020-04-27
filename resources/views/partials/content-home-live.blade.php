<article @php post_class() @endphp>
  <header>
    @include('partials/eye-catch')
    @include('partials/entry-meta-live')
  </header>
  <div class="entry-excerpt">{{ the_excerpt() }}</div>
</article>
