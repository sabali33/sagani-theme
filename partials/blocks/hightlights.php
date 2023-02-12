<?php
    
    $args = Sagani::options()->get_highlights_args();
    
    $query_args = $args['query_args' ];
    
    $highlighted_query = new WP_Query( $query_args );

    echo Sagani::tpl()->load_highlights( $highlighted_query, $args );

    wp_reset_postdata();