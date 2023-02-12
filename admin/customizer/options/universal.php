<?php

$universal = array(

	'position' => array(
		'name' => '%s_pos',
		'type' => 'radio',
		'options' => [ 'center', 'left', 'right' ],
		'value' => 'center',
		'class' => 'sag-%s-option &c',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'background' => array(
		'name' => '%s_background_color',
		'type' => 'color',
		'options' => [ 'center', 'left', 'right' ],
		'value' => 'center',
		'class' => 'sag-%s-option &c',
		'tag' => 'style',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'background_image' => array(
		'name' => '%s_background_image',
		'type' => 'upload',
		'value' => 0,
		'class' => 'sag-%s-option &c',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'font_size' => array(
		'name' => '%s_font_size',
		'type' => 'select',
		'options' => range( 12, 36),
		'value' => 16,
		'class' => 'sag-%s-option &c',
		'tag' => 'typography',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'font_color' => array(
		'name' => '%s_font_color',
		'type' => 'color',
		'options' => [ 'black', 'green', 'blue' ],
		'value' => '#eee',
		'class' => 'sag-%s-option &c',
		'tag' => 'style',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'font_family' => array(
		'name' => '%s_font_family',
		'type' => 'select',
		'options' => [ 'Open Sans', 'cambria', 'etc'],
		'value' => 0,
		'class' => 'sag-%s-option &c',
		'tag' => 'typography',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'font_weight' => array(
		'name' => '%s_font_weight',
		'type' => 'select',
		'options' => [ 100, 200, 300, 400, 500, 600, 900],
		'value' => 100,
		'class' => 'sag-%s-option &c',
		'tag' => 'typography',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'width' => array(
		'name' => '%s_width',
		'type' => 'number',
		'value' => 1140,
		'min-value' => 1078,
		'max-value' => 1600,
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'height' => array(
		'name' => '%s_height',
		'type' => 'number',
		'value' => 100,
		'min-value' => 10,
		'max-value' => 1000,
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
	),
	'border' => array(
		'name' => '%s_border',
		'type' => 'check',
		'options' => ['yes', 'no'],
		'value' => 'no',
		'sub_props' => [
			array(
				'name' => '%s_border_side',
				'type' => 'radio',
				'options' => ['All', 'bottom', 'top', 'left', 'right'],
				'value' => 'All',
				'class' => 'sag-%s-option',
				'label' => "%s"
			),
			array(
				'name' => '%s_border_color',
				'type' => 'color',
				'options' => [ 'black', 'green', 'blue' ],
				'value' => 'black',
				'class' => 'sag-%s-option &c',
				'label' => "%s"
			)
			
		],
		'tag' => 'style',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
    ),
    'text_transform' => array(
        'name' => '%s_text_transform',
		'type' => 'select',
		'options' => [ 'none', 'capitalize', 'uppercase', 'lower_case' ],
		'value' => 'none',
		'class' => 'sag-%s-option &c',
		'tag' => 'typography',
		'selector' => "%s",
        'label' => '%s',
        'section' => '%s'
    )
);