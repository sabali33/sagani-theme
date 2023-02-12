<?php

if( !function_exists('is_woocommerce') ){
    return;
}
    extract([
        'date' => true,
        'cat' => true
    ]);

    $tpl = Sagani::tpl()->get('templates/products/home-featured-item' );
    $tpls = Sagani::tpl()->get('templates/products/home-featured-items' );

    $query_args = array(
        'posts_per_page' => 4,
        'post_type' => 'product',
        'post__in' => wc_get_featured_product_ids()
    );
    extract([
        'date' => true,
        'cat' => true
    ]);

    $query_args = array(
        'posts_per_page' => 4,
        'post_type' => 'product',
        'post__in' => wc_get_featured_product_ids(),
    );
    $post_thumbnail_args = [
        'size' => 'sagani-thumbnail'
    ];
    $templates = [ 'tpl' => $tpl, 'tpls' => $tpls ];

    $featured_products = new WP_Query( $query_args );

    echo Sagani::utils()->loop( $featured_products, function( $product_arr ) use ( $templates ) {

        return Sagani::utils()->parse_loop_posts( $product_arr, $templates );

    }, $post_thumbnail_args );

    wp_reset_postdata();