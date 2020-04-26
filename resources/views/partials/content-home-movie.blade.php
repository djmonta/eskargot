<article @php post_class('fl w-50 ph3') @endphp>
  {{ the_content() }}
  <h3 class="entry-title">{{ the_title() }}</h3>
  <p class="entry-excerpt">
    {!! apply_filters('the_content', get_field('description_for_movie')) !!}
  </p>
</article>
