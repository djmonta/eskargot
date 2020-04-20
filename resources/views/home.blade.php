@extends('layouts.app')

@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @php $post_collection = FrontPage::homePosts(); @endphp
  @foreach ($post_collection as $category => $posts)
    <div class="page-header mid-gray arial-black tracked-mega pv5 tc">
      <h2>{{ strtoupper($category) }}</h2>
    </div>
    <div class="{{ $category }} @if ($category == 'news') slider @endif">
    @foreach ($posts as $post) @php the_post() @endphp
      @include('partials.content-home-' . $category)
    @endforeach
    </div>
  @endforeach

  {!! get_the_posts_navigation() !!}
@endsection
