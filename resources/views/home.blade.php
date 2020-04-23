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
  <div class="wrap wrap--{{ $category }} pv5">
  <div class="container br4 ph2 pv5">
    <div class="page-header mid-gray arial-black tracked-mega tc">
      <h2>{{ strtoupper($category) }} <span>{{ FrontPage::categoryDescFromSlug($category) }}</span></h2>
    </div>
    <div class="{{ $category }} @if ($category == 'news') slider @endif">
    @foreach ($posts as $a_post) @php global $post; $post = $a_post; @endphp
      @include('partials.content-home-' . $category)
    @endforeach
    </div>
    <div class="tc pv3">
      <a href="/{{ $category }}" class="button button--more link dim">More {{ $category }}</a>
    </div>
  </div>
  </div>
  @endforeach

  {!! get_the_posts_navigation() !!}
@endsection
