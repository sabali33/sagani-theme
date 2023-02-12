<?php
    /**
     * List of panels
     */

$panels = [
	
	[
		'name' => 'header',
		'label' => __('Header & Top Bar', 'swimghana' ),
		'sections' => [
			'top_bar' => [
				'title' => __('Top Bar', 'swimghana'),
			],
			'general' => [
				'title' => __('General', 'swimghana'),
			],
			'nav' => [
				'title' => __('Navigation', 'swimghana'),
			]
		]
	],
	[
		'name' => 'home',
		'label' => __('Homepage', 'swimghana' ),
		'sections' => [
			'home_layouts' => [
				'title' => __('Home Layouts', 'swimghana'),
			],
			'slider' => [
				'title' => __('Home Slider', 'swimghana'),
			],
			'cta' => [
				'title' => __('Call To Action', 'swimghana'),
			]
		]
    ],
    [
		'name' => 'woocommerce',
		'label' => __('WooCommerce', 'swimghana' ),
		'sections' => [
			'home_cat_lists' => [
				'title' => __('Home page categories', 'swimghana'),
			],
			'home_listing' => [
				'title' => __('Home Listings', 'swimghana'),
			],
			
		]
    ],
    [
		'name' => 'general_layout',
		'label' => __('General Layout', 'swimghana' ),
		'sections' => [
			'overall' => [
				'title' => __('Overall', 'swimghana'),
			],
			'main_content' => [
				'title' => __('Main Content Area', 'swimghana'),
            ],
            'sidebar' => [
				'title' => __('Sidebar', 'swimghana'),
            ]
			
		]
    ],
    [
		'name' => 'home_subscribe',
		'label' => __('Home Subscribe', 'swimghana' ),
		'sections' => [
			'form' => [
				'title' => __('Form', 'swimghana'),
			],
			
			
		]
	],
	[
		'name' => 'swimghana_footer',
		'label' => __('Footer Settings', 'swimghana' ),
		'sections' => [
			'lower_footer' => [
				'title' => __('Lower Footer', 'swimghana'),
			],
			
			
		]
	],
	
];