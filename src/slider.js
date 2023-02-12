import $ from "jquery";
import 'slick-carousel';

export const Slider = () => {
    $('.post-159 .post-slider').slick({
        slidesToShow: 1,
        adaptiveHeight: true,
        respondTo: 'slider'
    });
}

export const Main_Slider = () => {
    console.log('fires')
    $('.sg-slides').slick({
        slidesToShow: 2,
        prevArrow: ".slider-nav.prev",
        nextArrow: ".slider-nav.next",
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },

        ]
    });
}