<?php

global $wp_query;

$list_styles = [
    'list-alt',
    'listing-classic-left',
    'blog-style'
];
$args = [
    'shared_class' => 'listing sg-shadow-lg listing-classic-left blog-style sg-row'
];

 echo Sagani::tpl()->loop( $wp_query, function($post_arr, $options ) use( $list_styles ) {
   if( isset( $post_arr['error-404'] ) ){
       return __(' No posts fount', 'sagani' );
   }
   
    $posts_html = array_map( function($post, $key ) use( $list_styles, $options ) {
        
        $random = rand(0, ( count($list_styles) -1 ) );
        $tpl_index = $key % 3 ? 0 : 1;
        $list_style = $list_styles[ $random ];

        $post_class = sprintf("%s %s", $options['shared_class'], $list_style );
        
        $post_class_attr = Sagani::utils()->post_class($post_class, $post['id'] ); 
        
        $tpl = Sagani::tpl()->get( 'partials/list-styles/'. $list_style, [] );
        $tpl = preg_replace('/%POST_CLASS%/', $post_class_attr , $tpl );

        return Sagani::utils()->parse_post($post, $tpl );

    }, $post_arr, range(1, count( $post_arr ) ));
    
    return join( "\n", $posts_html );
}, $args );


get_template_part('partials/pagination/numbers');