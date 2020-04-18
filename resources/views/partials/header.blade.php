<header class="banner flex flex-wrap justify-center sans-serif">
  <div class="bg-container absolute contain">
    <!-- <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a> -->
    <!-- <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav> -->
  </div>
  <div id="global--menu-button">
    <button class="hamburger hamburger--squeeze" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
  <div class="relative w-100 h-100">
    <div id="gnavi" class="menu--overlay w-100 flex items-center justify-center w-100 dn">
        <div class="v-mid tc">
          <div class="menu--item pa3">
            <img src="@asset('images/logo_w.png')" alt="" class="o-70 w-90 w-100-ns">
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="/" >
              <span class="arial-black f2 fw4">NEWS</span><br>お知らせ一覧
            </a>
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="/" >
              <span class="arial-black f2 fw4">BLOG</span><br>ブログ
            </a>
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="/" >
              <span class="arial-black f2 fw4">GOODS</span><br>グッズ
            </a>
          </div>
          <div class="menu--item">
            <a class="hover-white no-underline white-70" href="/" >
              <span class="arial-black f2 fw4">CONTACT</span><br>お問い合わせ
            </a>
          </div>
          <div class="menu--item pt3">
            <a href="" class="dib w2 w3-ns mh2 hover-white"><img src="@asset('images/icon/facebook_icon.png')" alt="facebook" class="o-70 glow"></a>
            <a href="" class="dib w2 w3-ns mh2 hover-white"><img src="@asset('images/icon/twitter_icon.png')" alt="twitter" class="o-70 glow"></a>
            <a href="" class="dib w2 w3-ns mh2 hover-white"><img src="@asset('images/icon/instagram_icon.png')" alt="instagram" class="o-70 glow"></a>
          </div>
          <!-- <a class="f6 fw4 hover-white menu-hover no-underline white-70 dib ml2 pv2 ph3 ba" href="/" >Sign Up</a> -->
        </div>
    </div>
    <div class="header--content tc">
      <div class="header--image-space">

      </div>
      <nav class="flex flex-column flex-row-ns flex-wrap-m items-center w-100 mw8 center v-mid">
        <div class="header--image-wrap">
          <!-- <a href="{{ home_url('/') }}" class="dib w2 h2 pa1 ba b--white-90 grow-large border-box"> -->
            <!-- <svg class="link white-90 hover-white" data-icon="skull" viewBox="0 0 32 32" style="fill:currentcolor"><title>skull icon</title><path d="M16 0 C6 0 2 4 2 14 L2 22 L6 24 L6 30 L26 30 L26 24 L30 22 L30 14 C30 4 26 0 16 0 M9 12 A4.5 4.5 0 0 1 9 21 A4.5 4.5 0 0 1 9 12 M23 12 A4.5 4.5 0 0 1 23 21 A4.5 4.5 0 0 1 23 12"></path></svg> -->
            <img src="@asset('images/top_member.png')" alt="">
          <!-- </a> -->
        </div>
        <div class="header--menu w-100 w-30-l tr">
          <div>
            <a class="menu-hover no-underline white dib" href="/" >NEWS</a>
          </div>
          <div>
            <a class="menu-hover no-underline white dib" href="/" >LIVE INFO</a>
          </div>
          <div>
            <a class="menu-hover no-underline white dib" href="/" >BIOGRAPHY</a>
          </div>
          <div>
            <a class="menu-hover no-underline white dib" href="/" >DISCOGRAPHY</a>
          </div>
          <div>
            <a class="menu-hover no-underline white dib" href="/" >MOVIE</a>
          </div>
          <!-- <a class="f6 fw4 hover-white menu-hover no-underline white-70 dib ml2 pv2 ph3 ba" href="/" >Sign Up</a> -->
        </div>
      </nav>
    </div>

  </div>
</header>
