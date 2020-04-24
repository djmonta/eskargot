<article @php post_class('ph3') @endphp>
  <header>
    @include('partials/eye-catch')
    @include('partials/entry-meta')
    <h3 class="entry-title normal sans-serif"><a href="{{ get_permalink() }}" class="link f5 no-underline black">{!! get_the_title() !!}</a></h3>
  </header>
</article>
