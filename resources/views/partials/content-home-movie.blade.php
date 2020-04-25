<article @php post_class('fl w-50 ph3') @endphp>
  <header>
    @include('partials/eye-catch')
    @include('partials/entry-meta')
  </header>
  <div>{{ the_excerpt() }}</div>
</article>
