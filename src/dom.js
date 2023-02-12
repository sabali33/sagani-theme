
import Highlights_On_Tab_Switch from './handlers/highlights-tab-switch';
import Load_More from './handlers/load-more'
import { Slider, Main_Slider } from './slider';
import {toggleMobileNav} from './mobile-menu-canvas';

jQuery(document).ready( ($) => {
    let loaded = [];
    //Load highlight posts on tab switch
    $('.tab-trigger').on('click', Highlights_On_Tab_Switch.bind(this, $, loaded) );
    //enable post slider
    Slider();
    Main_Slider();
    $('.load-more-link').on( 'click', Load_More )
    $('.mobile-hamburger').on('click', toggleMobileNav );

    $('.menu-item-has-children > i').on('click', () => {
        $('.menu-item-has-children').toggleClass('active')
    })

});