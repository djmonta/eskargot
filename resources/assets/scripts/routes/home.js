export default {
  init() {
    // JavaScript to be fired on the home page
    $('.slider').slick(sliderOptions);
    $(window).load(function() {
      footerPosition;
      $(window).trigger('resize');
    });
    $(window).resize(footerPosition);
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

const sliderOptions = {
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
};

const footerPosition = function() {
  let footerHeight = $('footer').height();
  let pbMovie = footerHeight + 64;
  let movieOffset = $('.wrap--movie').offset();
  let movieHeight = $('.wrap--movie').height();
  $('.wrap--movie').css('padding-bottom', pbMovie + 'px');

  let footerTop = parseInt(movieOffset.top) + movieHeight + 64*2;
  $('footer').css('top', footerTop);
};
