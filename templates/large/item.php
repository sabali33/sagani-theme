<?php
    extract( $args );

?>
<div class="sg-post-body p-4 sg-p-6-lg">
    <header class="header">
        <?php
            //echo Sagani::active()->get_skin()->get_post_thumbnails( 'sagani-large', [] );
        ?>
        %THUMBNAIL%
        <div class="post-meta">
            <span class="post-cat">
                <a href="%CAT_LINK%">%CAT%</a>
                <!-- <a href="#" class="mr-2">Entertainment</a>
                <a href="#" class="mr-2">Business</a> -->

            </span>

            <time class="post-date" class="" dateTime="">
                <a href="<?php the_permalink(); ?>">
                    <i class="icon-clock mr-2"></i>
                    %DATE%
                </a>

            </time>
            <span class="posted-by">
                <a href="%AUTHOR_POST_LINK%" >
                    <i class="icon-user mr-2"></i>
                    %AUTHOR%
                </a>

            </span>

        </div>
        <h1 class="post-title mt-4">
            <a href="%LINK%">%TITLE%</a>
        </h1>
    </header>
    <?php if( is_single() ): ?>
        <div class="<?php echo esc_attr(join(' ', [ 'post-content'] )); ?>">
            %CONTENT%
        </div>
    <?php else: ?>
        <div class="post-excerpt">

            %EXCERPT%

            <div class="my-8">
                <a href="%LINK%" class="read-more">
                    <?php echo esc_html_e( 'Continue Reading', 'sagani' ); ?>
                    <i class="icon-long-arrow-right icon-base ml-4"></i>
                </a>
            </div>

        </div>
    <?php endif; ?>
</div>
<?php if( !is_single() ): ?>

    <?php get_template_part( 'partials/list-styles/post-footer-a', '', $post_share ); ?>

<?php endif; ?>
