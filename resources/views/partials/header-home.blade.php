<header class="banner banner--home flex flex-wrap justify-between">
  <div class="bg-container absolute contain">
  </div>
  <div class="sns--main-top w-70 w-40-ns">
    @include('partials/sns_icons')
  </div>
  <div id="global--menu-button" class="w-30 w-50-ns tr">
    <button class="hamburger hamburger--squeeze" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="relative">
    <div id="gnavi" class="menu--overlay w-100 w-70-ns center-ns flex justify-center dn">
        <div class="v-mid tc">
          <div class="menu--item logo">
            <img src="@asset('images/logo_w.png')" alt="" class="o-70 w-90 w-100-ns">
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="/news" >
              <span class="arial-black f2 fw4">NEWS</span><br>お知らせ一覧
            </a>
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="/blog" >
              <span class="arial-black f2 fw4">BLOG</span><br>ブログ
            </a>
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="@if(!empty(get_option('goods'))){{ get_option('goods') }}@endif" rel="nofollow" target="_blank">
              <span class="arial-black f2 fw4">GOODS</span><br>グッズ
            </a>
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="/contact" >
              <span class="arial-black f2 fw4">CONTACT</span><br>お問い合わせ
            </a>
          </div>
          <div class="menu--item sns">
            @include('partials/sns_icons')
          </div>
        </div>
    </div>
    <div class="header--content tc">
      <div class="header--image-space">

      </div>
      <nav class="flex flex-column flex-row-ns flex-wrap-m items-center w-100 h-100 mw8 center v-mid">
        <div class="header--image-wrap">
          <a href="{{ home_url('/') }}" class="db pa1 w-100 h-100">
            <img src="@asset('images/logo_w.png')" alt="{{ App::title() }}" class="o-0">
          </a>
        </div>
      </nav>
    </div>
  </div>
</header>
