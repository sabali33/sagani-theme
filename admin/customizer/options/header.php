<?php

    $header_settings = [
        'general' => [
            [
                'name' => 'header_style',
                'type' => 'select',
                'value' => '',
                'class' => 'header-style',
                'selector' => "%s",
                'label' => __('Home Grid Product Count', 'sagani'),
                'section' => 'general'
            ],
            
            [
                'name' => 'header_background_image',
                'type' => 'file',
                'value' => '',
                'class' => 'header-backgrounnd-image',
                'selector' => "%s",
                'label' => __('Header background Image', 'sagani'),
                'section' => 'general'
            ],
            
            [
                
                'name' => 'general_header',
                'label' => "Header Background Color",
                'universal' => 'background',
            ]
        ],
        'top_bar' => [
            [
                'name' => 'tob_bar_gb',
                'type' => 'color',
                'value' => '',
                'class' => 'top-bar-bg',
                'tag' => 'style',
                'selector' => "%s",
                'label' => __('Top Bar Background', 'swimghana'),
                'section' => 'top_bar'
            ],
            [
                'name' => 'facebook',
                'type' => 'text',
                'value' => '',
                'class' => 'home-contact-facebook',
                'selector' => "%s",
                'label' => __('Facebook', 'swimghana'),
                'section' => 'top_bar'
            ],
            [
                'name' => 'twitter',
                'type' => 'text',
                'value' => '',
                'class' => 'home-contact-twitter',
                'selector' => "%s",
                'label' => __('Twitter', 'swimghana'),
                'section' => 'top_bar'
            ],
            [
                'name' => 'instagram',
                'type' => 'text',
                'value' => '',
                'class' => 'home-contact-instagram',
                'selector' => "%s",
                'label' => __('Instagram', 'swimghana'),
                'section' => 'top_bar'
            ],
        ],
        'nav' => [
            [
                'name' => 'nav_cart_link',
                'type' => 'color ',
                'value' => '',
                'class' => 'nav-car_link',
                'selector' => "%s",
                'label' => __('Enable Cart Link', 'sagani'),
                'section' => 'nav'
            ],
            [
                'name' => 'nav_menu_link_color',
                'type' => 'color ',
                'value' => '',
                'class' => 'nav-menu-link-color',
                'selector' => "%s",
                'label' => __('Nav Menu Text Color', 'sagani'),
                'section' => 'nav'
            ],
            [
                'name' => 'nav_current_menu_text_color',
                'type' => 'color ',
                'value' => '',
                'class' => 'nav-current-menu-text-color',
                'selector' => "%s",
                'label' => __('Nav Current Menu Text Color', 'sagani'),
                'section' => 'nav'
            ],
            [
                'name' => 'nav_sub_menu_text_color',
                'type' => 'color ',
                'value' => '',
                'class' => 'nav-sub-menu-text-color',
                'selector' => "%s",
                'label' => __( 'Nav Sub Menu Text Color', 'sagani' ),
                'section' => 'nav'
            ],
            [
                'name' => 'nav_menu',
                'label' => "Navigation Backgound",
                'universal' => 'background',
            ],
            [
                'name' => 'nav_menu',
                'label' => "Navigation Menu Text Case",
                'universal' => 'text_transform',
            ],
            [
                'name' => 'nav_menu',
                'label' => "Navigation font_size",
                'universal' => 'font_size',
            ],
            [
                'name' => 'nav_menu',
                'label' => "Navigation Menu Letter Spacing",
                'universal' => 'letter_spacing',
            ]
            
        ]
    ];
    