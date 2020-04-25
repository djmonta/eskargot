<article @php post_class('fl w-50 ph3') @endphp>
  <header>
    @include('partials/eye-catch')
    @include('partials/entry-meta-live')
  </header>
  <div>{{ the_excerpt() }}</div>
</article>
