export default {
  init() {
    let toggleClassArray = ['.sns--main-top', '.header--content', '.bg-container', '.menu--overlay'];

    // JavaScript to be fired on all pages
    $('.hamburger').click(function() {
      $(this).toggleClass('is-active');
      $('.banner').toggleClass('menu-open');
      $('body').toggleClass('overflow-y-hidden');
      toggleClassArray.forEach(function(item) {
        $(item).toggleClass('dn');
      });
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
