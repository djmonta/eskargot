export default {
  init() {
    // JavaScript to be fired on all pages
    $('.hamburger').click(function() {
      $(this).toggleClass('is-active');
      $('.sns--main-top').toggleClass('dn');
      $('.header--content').toggleClass('dn');
      $('.bg-container').toggleClass('dn');
      $('.banner').toggleClass('menu-open');
      $('.menu--overlay').toggleClass('dn');
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
