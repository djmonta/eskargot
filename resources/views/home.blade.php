@extends('layouts.app')

@section('content')

  @php $post_collection = FrontPage::homePosts(); @endphp
  @foreach ($post_collection as $category => $posts)
  <div id="{{ $category }}" class="wrap wrap--{{ $category }} pv5">
  <div class="container br4 ph5 pv4">
    <div class="page-header">
      <h2 class="pv2">{{ strtoupper(get_category_by_slug($category)->name) }} <span>{{ category_description(get_category_by_slug($category)->term_id) }}</span></h2>
    </div>
    <div class="section-contents {{ $category }}">
      <div class="@if ($category == 'news') slider @else flex @endif">
      @foreach ($posts as $a_post) @php global $post; $post = $a_post; @endphp
        @php if($category == 'live' && empty(get_field('show_on_top', false, false))) continue; @endphp
        @include('partials.content-home-' . $category)
      @endforeach
      </div>
      <div class="tc mt4 pv3">
        <a href="/{{ $category }}" class="button button--more link grow">More {{ get_category_by_slug($category)->name }}</a>
      </div>
    </div>
  </div>
  </div>
  @endforeach

  @php $bio_and_music = FrontPage::homeBioAndMusic(); @endphp
  @php global $wp_query; @endphp
  @foreach ($bio_and_music as $category => $posts_category)
  <div id="{{ $category }}" class="wrap wrap--{{ $category }} pv5">
  <div class="container br4 ph5 pv4">
    <div class="page-header">
      <h2 class="pv2">{{ strtoupper($category) }} <span class="mv2">@if($category == 'biography') 略歴 @elseif ($category == 'discography') 作品 @else 動画 @endif</span></h2>
    </div>
    <div class="section-contents {{ $category }} flex flex-wrap">
      @if ($category == 'biography')
        @php $wp_query->setup_postdata($posts_category); @endphp
        <article>
          <div class="entry-header fl w-50 ph2">
            @include('partials/eye-catch');
          </div>
          <div class="entry-content fl w-50 pl4">
        {{ the_content() }}
        </div>
        </article>

      @elseif ($category == 'discography')
        @foreach ($posts_category as $format => $p_coll)
        <h3 class="fl w-100">{{ $format }}</h3>
        <div class="flex justify-center">
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

  {!! get_the_posts_navigation() !!}
@endsection
