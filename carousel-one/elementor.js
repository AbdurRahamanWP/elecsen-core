( function ($, elementor) {
  "use strict";

  var Na_plugin_scripts = {

      init: function () {

          var widgets = {
              'xyz_accordion.default': Na_plugin_scripts.Xyz_Accordion,
              'xyz_tabs.default': Na_plugin_scripts.Xyz_Tabs,
              'xyz_mail.default': Na_plugin_scripts.Yyz_Mail,
              'xyz_slider.default': Na_plugin_scripts.Xyz_slider,
              'star_reviews_carousel.default': Na_plugin_scripts.Star_Reviews_Carousel,
              'carousel_two.default': Na_plugin_scripts.Carousel_Two,
              'card_slider.default': Na_plugin_scripts.Card_Slider,
              

          };

          $.each(widgets, function (widget, callback) {
              elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
          });
      },
      Xyz_Accordion: function ($scope) {
         
        let el = $scope.find('.accordion-item-header');
            el.on('click', function(){
              //  icon 
                $(this).toggleClass('open');
                $(this).siblings('.accordion-item-body').slideToggle();
                $(this).parent().siblings().find('.accordion-item-body').slideUp();
                $(this).parent().siblings().find('.accordion-item-header').removeClass('open');

            });
      },
      Xyz_Tabs: function ( $scope ) {
        let el = $scope.find('.tab-menu a');
        el.on('click', function(e){
          e.preventDefault();
         let id = $(this).attr('href');
         $(id).addClass('open');
         $(id).siblings().removeClass('open')
        });
       
      },
      Yyz_Mail: function ( $scope ) {
        let mail = $scope.find('#')
      },
      Xyz_slider: function ($scope){
        let slider = $scope.find('.slider-wrapper');
        if (slider.length){
          slider.slick({
            // arrows: true,
            // dots: true
          });
        }
      },
      // star reviews slider ===================================//
        
      Star_Reviews_Carousel:  function ($scope) {
        let star = $scope.find('.slider');
          if (star.length) {
            star.slick({
              autoplay: true,
              dots: false,
              arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 4,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
            });
          } 
      },


// image gallery slider ===================================//
        
    Carousel_Two:  function ($scope) {
        let carouselTwo = $scope.find('.carousel-wrapper');
          if (carouselTwo.length) {
            carouselTwo.slick({
            infinite: true,
            nextArrow: '<span class="next-arr arr">next</span>',
            prevArrow: '<span class="prev-arr arr">prev</span>',
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
            });
          } 
      },








   };

  $(window).on('elementor/frontend/init', Na_plugin_scripts.init);


}(jQuery, window.elementorFrontend) );