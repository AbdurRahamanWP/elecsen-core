;(function ($, elementor) {
    "use strict";
    var $window = $(elementor);

    var quaxCore = {
        onInit: function () {
            var E_FRONT = elementorFrontend;
            var widgetHandlersMap = {
                "quax_testimonial.default" : quaxCore.Testimonial,
                "quax-video.default" : quaxCore.Quax_video
            };

            $.each(widgetHandlersMap, function (widgetName, callback) {
                E_FRONT.hooks.addAction("frontend/element_ready/" + widgetName, callback);
                
            });

        },
      
     

        //========================= Testimonial ==============================//
        Testimonial: function ($scope) {

            let $testimonial_carousel = $scope.find( '#testimonial_carousel' );
            let dataRtl = $testimonial_carousel.data('rtl');
            
            if ( $testimonial_carousel.length > 0 ) {
                $testimonial_carousel.slick({
                    dots: true,
                    arrows: false,
                    slidesToShow: 3,
                    autoplay: false,
                    infinite: true,
                    rtl: dataRtl,
                    autoplaySpeed: 4500,
                    slidesToScroll: 1,
                    centerMode: true,
                     centerPadding: '0',
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            },
                        },
                    ],
                });
            }


            let $testimonial_two_carousel = $scope.find( '#testimonial_carousel_two' );
            
            if ( $testimonial_two_carousel.length > 0 ) {
                $testimonial_two_carousel.slick({
                    dots: true,
                    arrows: false,
                    slidesToShow: 1,
                    autoplay: false,
                    infinite: true,
                    autoplaySpeed: 4500,
                    slidesToScroll: 1,
                    centerMode: true,
                     centerPadding: '0',
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            },
                        },
                    ],
                });
            }
        },

        Quax_video: function ( $scope ) {
            
            $('.quax-video-popup').magnificPopup({
                type: 'iframe'
            });
    
        }

             


    }

    $window.on("elementor/frontend/init", quaxCore.onInit);

})(jQuery, window);