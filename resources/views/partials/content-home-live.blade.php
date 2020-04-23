<article @php post_class() @endphp>
  <header>
    @include('partials/eye-catch')
    @include('partials/entry-meta-live')
    <p>{{ the_excerpt() }}</p>
  </header>
</article>
