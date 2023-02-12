<?php

global $wp_query;

echo Sagani::tpl()->loop( $wp_query, function( $post_arr ) {
    $post_tpl = Sagani::tpl()->get('components/list-styles/list');
    
    $posts_html = array_map( function($post) use( $post_tpl ){
        return Sagani::utils()->parse_post($post, $post_tpl);
    }, $post_arr );
    
    return join( "\n", $posts_html );

}, ['size' => 'sagani-list-tall'] );