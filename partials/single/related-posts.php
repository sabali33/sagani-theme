<?php
    $query_args = [

        'posts_per_page' => $args['count'],
        'post__not_in' => array( $args['post_id'] ),
        'tax_query' => [
            [
                'taxonomy' => 'post_tag',
                'terms' => wp_get_post_tags($args['post_id'], array('fields' => 'ids')),
                'field' => 'id'
            ],
            [
                'taxonomy' => 'category',
                'terms' => wp_get_post_categories($args['post_id'], array('fields' => 'ids')),
                'field' => 'id'
            ],
            'relation' => 'OR',
        ],

    ];
    
    $related_posts = new WP_Query( $query_args );

?>
<?php if( $related_posts->have_posts() ) : ?>
    <div class="related-posts sg-px-8-lg">
        <h2 class="section-head main-heading"><?php echo esc_html_e('Related Posts'); ?></h2>
        
        <ul class="post-list sg-row">
            <?php while( $related_posts->have_posts()): $related_posts->the_post(); ?>
                <li class="post-item sg-col-11-xs sg-col-2-md sg-col-4-lg sg-col-3-xl >">
                    <!-- <img src="img/jd-mason-262717-unsplash.jpg" alt="post title"> -->
                    <?php the_post_thumbnail( 'sagani-list-main' ); ?>
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                    </h3>
                    <span class="post-date">
                        <time><?php the_date(''); ?></time>
                    </span>		
                </li>
            <?php endwhile; ?>
        </ul>
    
    </div>
    <?php wp_reset_query(); ?>
<?php endif; ?>						