<?php
extract([
    'date' => true,
    'cat' => true
]);

$tpl = Sagani::tpl()->get('templates/cta/item', [
    'date' => $date, 
    'cat' => $cat,
    ] );
$item_wrap = Sagani::tpl()->get('templates/cta/item-wrap', [
    'date' => $date, 
    'cat' => $cat,
]);
$main = Sagani::tpl()->get('templates/cta/main', [
    'date' => $date, 
    'cat' => $cat,
]);

$query_args = array(
    'posts_per_page' => 4,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'terms' => "1,2,4",
            'field' => "id"
        ],
        [
            'taxonomy' => 'post_tag',
            'terms' => "1,2,4",
            'field' => "id"
        ],
        'relation' => 'OR'
    ]
);

$query = new WP_Query( apply_filters('sagani_featured_posts_args', $query_args ) );

$post_thumbnail_args = [
    'class' => '',
    'size' => 'sagani-medium'
];

$templates = [
    'tpl' => $tpl,
    'item' => $item_wrap,
    'main' => $main
];

echo Sagani::utils()->loop( $query, function( $post_arr ) use( $templates ){

    $items = Sagani::tpl()->parse_list( $post_arr, $templates );
    return preg_replace("/%POSTS%/", $items, $templates['main'] );
    
}, $post_thumbnail_args );
