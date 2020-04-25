@extends('layouts.app')

@section('content')

  @php $post_collection = FrontPage::homePosts(); @endphp
  @foreach ($post_collection as $category => $posts)
  <div class="wrap wrap--{{ $category }} pv5">
  <div class="container br4 ph5 pv4">
    <div class="page-header mid-gray arial-black tracked-mega tc mw8">
      <h2 class="pv2">{{ strtoupper(get_category_by_slug($category)->name) }} <span class="mv2">{{ category_description(get_category_by_slug($category)->term_id) }}</span></h2>
    </div>
    <div class="mw8 {{ $category }} @if ($category == 'news') slider @elseif ($category == 'live') flex @endif">
    @foreach ($posts as $a_post) @php global $post; $post = $a_post; @endphp
      @include('partials.content-home-' . $category)
    @endforeach
    </div>
    <div class="tc mt4 pv3">
      <a href="/{{ $category }}" class="button button--more link grow">More {{ get_category_by_slug($category)->name }}</a>
    </div>
  </div>
  </div>
  @endforeach

  {!! get_the_posts_navigation() !!}
@endsection
