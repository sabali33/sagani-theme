<?php

    $home_settings = [
        
        'home_layouts' =>[
            [
                'name' => 'home_slider',
                'type' => 'select',
                'value' => '',
                'class' => 'home-slider',
                'options' => array_column( get_terms(['taxonomy' => 'category', 'hide_empty' => false]), 'name', 'term_id'),
                'selector' => "%s",
                'label' => __('Set Home Slider', 'swimghana'),
                'section' => 'home_layouts'
            ],
        ]
    ];