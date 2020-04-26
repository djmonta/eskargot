@extends('layouts.app')

@section('content')

  @php $post_collection = FrontPage::homePosts(); @endphp
  @foreach ($post_collection as $category => $posts)
  <div id="{{ $category }}" class="wrap wrap--{{ $category }} pv5">
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

  @php $bio_and_music = FrontPage::homeBioAndMusic(); @endphp
  @foreach ($bio_and_music as $category => $posts_category)
  <div id="{{ $category }}" class="wrap wrap--{{ $category }} pv5">
  <div class="container br4 ph5 pv4">
    <div class="page-header">
      <h2 class="pv2">{{ strtoupper($category) }} <span class="mv2">@if($category == 'biography') 略歴 @elseif ($category == 'discography') 作品 @else 動画 @endif</span></h2>
    </div>
    <div class="mv8 {{ $category }} flex">
      @if ($category == 'biography')
        <div class="entry-content">
        @php global $post; $post = $posts_category; @endphp
        {!! apply_filters('the_content', $post->post_content) !!}
        </div>
      @elseif ($category == 'discography')
        @foreach ($posts_category as $p_coll)
          @foreach ($p_coll as $b_post)
            @php global $post; $post = $b_post; @endphp
              @include('partials.content-home-' . $category)
          @endforeach
        @endforeach

      @else
        @foreach ($p_coll as $b_post)
          @php global $post; $post = $b_post; @endphp
            @include('partials.content-home-' . $category)
        @endforeach
      @endif

      @php wp_reset_postdata(); @endphp

    </div>
  </div>
  </div>
  @endforeach

  {!! get_the_posts_navigation() !!}
@endsection
