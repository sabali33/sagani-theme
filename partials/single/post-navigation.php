<?php
    $args = 
    $next = get_next_post(
        true,
        '',
        'category'
    );
    $prev = get_previous_post(
        true,
        '',
        'category'
    );
    $next_link = get_permalink($next);
    $prev_link = get_permalink($prev);
?>
<section class="post-navigation sg-row sg-px-8-lg">

    <?php if ( $prev ): ?>
        <div class="nav-item prev">
            <a href="<?php echo esc_url( $prev_link ); ?>">
                <i class="icon-arrow-left mr-2"></i>
                <?php echo esc_html_e('Prev Post', 'sagani'); ?>
            </a>
            <div class="post flex">
                <a href="<?php echo esc_url( $prev_link ); ?>">
                    <?php echo get_the_post_thumbnail($prev, 'thumbnail');?>
                </a>
                <span class="mt-5">
                    <a href="<?php echo esc_url( $prev_link ); ?>">
                        <?php echo esc_html( $prev->post_title ); ?>
                    </a>
                </span>
            </div>
        </div>
        
    <?php endif; ?>

    <?php if ( $next ): ?>
        <div class="nav-item next">
									
            <a href="<?php echo esc_url( $next_link ); ?>">
                <?php echo esc_html_e('Next Post', 'sagani'); ?>
                <i class="icon-arrow-right ml-2"></i>
            </a>
            <div class="post flex">
                <a href="<?php echo esc_url( $next_link ); ?>">
                    <?php echo get_the_post_thumbnail($next, 'thumbnail');?>
                </a>
                <span class="mt-5">
                    <a href="<?php echo esc_url( $next_link ); ?>">
                        <?php echo esc_html( $next->post_title ); ?>
                    </a>
                </span>
            </div>
        </div>
        
    <?php endif; ?>
</section>