(function($) {

  "use strict";

  var searchPopup = function() {
      // open search box
    $('#header-nav').on('click', '.search-button', function(e) {
      $('.search-popup').toggleClass('is-visible');
    });

    $('#header-nav').on('click', '.btn-close-search', function(e) {
      $('.search-popup').toggleClass('is-visible');
    });

    $(".search-popup-trigger").on("click", function(b) {
      b.preventDefault();
      $(".search-popup").addClass("is-visible"),
      setTimeout(function() {
        $(".search-popup").find("#search-popup").focus()
      }, 350)
    }),
    $(".search-popup").on("click", function(b) {
      ($(b.target).is(".search-popup-close") || $(b.target).is(".search-popup-close svg") || $(b.target).is(".search-popup-close path") || $(b.target).is(".search-popup")) && (b.preventDefault(),
        $(this).removeClass("is-visible"))
    }),
    $(document).keyup(function(b) {
      "27" === b.which && $(".search-popup").removeClass("is-visible")
    })
  }

  var initProductQty = function(){

    $('.product-qty').each(function(){

      var $el_product = $(this);
      var quantity = 0;

      $el_product.find('.quantity-right-plus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($el_product.find('#quantity').val());
        $el_product.find('#quantity').val(quantity + 1);
      });

      $el_product.find('.quantity-left-minus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($el_product.find('#quantity').val());
        if(quantity>0){
          $el_product.find('#quantity').val(quantity - 1);
        }
      });

    });

  }

  $(document).ready(function() {

    searchPopup();
    initProductQty();

    var swiper = new Swiper(".main-swiper", {
      speed: 500,
      navigation: {
        nextEl: ".swiper-arrow-prev",
        prevEl: ".swiper-arrow-next",
      },
    });

    $("[class*='swiper-loaihang-']").each(function () {
      const $container = $(this);
      const classList = $container.attr('class').split(/\s+/);
      const swiperClass = classList.find(c => c.startsWith('swiper-loaihang-'));

      if (!swiperClass) return;

    const id = swiperClass.split('-').pop(); // Lấy số ID phía sau
    const swiperSelector = '.' + swiperClass;
    const paginationSelector = `#pagination-${id} .swiper-pagination`;

    new Swiper(swiperSelector, {
      slidesPerView: 4,
      spaceBetween: 20,
      pagination: {
        el: paginationSelector,
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        980: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
    });
  });

    var swiper = new Swiper(".testimonial-swiper", {
      loop: true,
      navigation: {
        nextEl: ".swiper-arrow-prev",
        prevEl: ".swiper-arrow-next",
      },
    }); 

  }); // End of a document ready

})(jQuery);