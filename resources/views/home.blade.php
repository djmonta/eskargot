@extends('layouts.app')

@section('content')

  @php $post_collection = FrontPage::homePosts(); @endphp
  @foreach ($post_collection as $category => $posts)
  <div id="{{ $category }}" class="wrap wrap--{{ $category }}">
  <div class="container br4">
    <div class="page-header">
      <h2 class="pv2">{{ strtoupper(get_category_by_slug($category)->name) }} <span>{{ category_description(get_category_by_slug($category)->term_id) }}</span></h2>
    </div>
    <div class="section-contents {{ $category }}">
      <div class="@if ($category == 'news') slider @else flex @endif">
      @foreach ($posts as $key => $a_post) @php global $post; $post = $a_post; @endphp
        <div class="w-50-l @if ($category == 'live' && $key > 0) dn db-l @else w-100 @endif">
        @include('partials.content-' . $category)
        </div>
      @endforeach
      </div>
      <div class="more-container">
        <a href="/{{ $category }}" class="button button--more link grow">More {{ get_category_by_slug($category)->name }}</a>
      </div>
    </div>
  </div>
  </div>
  @endforeach

  @php $bio_and_music = FrontPage::homeBioAndMusic(); @endphp
  @php global $wp_query; @endphp
  @foreach ($bio_and_music as $category => $posts_category)
  <div id="{{ $category }}" class="wrap wrap--{{ $category }}">
  <div class="container br4">
    <div class="page-header">
      <h2 class="pv2">{{ strtoupper($category) }} <span class="mv2">@if($category == 'biography') 略歴 @elseif ($category == 'discography') 作品 @else 動画 @endif</span></h2>
    </div>
    <div id="{{ $category }}" class="section-contents {{ $category }} flex flex-wrap">
      @if ($category == 'biography')
        @php $wp_query->setup_postdata($posts_category); @endphp
        <article>
          <div class="entry-header">
            @include('partials/eye-catch')
          </div>
          <div class="entry-content">
          {{ the_content() }}
          </div>
        </article>

      @elseif ($category == 'discography')
        @foreach ($posts_category as $format => $p_coll)
        <h3 class="w-100">{{ $format }}</h3>
        <div class="flex flex-wrap justify-center-l">
          @foreach ($p_coll as $b_post)
            @php global $post; $post = $b_post; @endphp
            @php $wp_query->setup_postdata($b_post); @endphp
              @include('partials.content-home-' . $category)
          @endforeach
        </div>
        @endforeach

      @else
        @foreach ($posts_category as $c_post)
          @php global $post; $post = $c_post; @endphp
          @php $wp_query->setup_postdata($c_post); @endphp
            @include('partials.content-home-' . $category)
        @endforeach
      @endif

      @php wp_reset_postdata(); @endphp

    </div>
  </div>
  </div>
  @endforeach

@endsection
