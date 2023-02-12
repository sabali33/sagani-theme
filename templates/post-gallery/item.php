<?php extract( $args ); ?>

<div class="post-meta mb-4 pl-8">
    <span class="post-cat"><a href="%CAT_LINK%">%CAT%</a></span>
    <time class="post-date"> <i class="icon-clock mr-2"></i> %DATE% </time>
    <span class="posted-by"> 
        <a href="%AUTHOR_POST_LINK%"> <i class="icon-user mr-2"></i> By %AUTHOR% </a> 
    </span>
    <h2 class="post-title mt-4"><a href="%LINK%">%TITLE%</a></h2>
</div>
<div class="post-gallery">
   
    %GALLERY%
</div>
<div class="post-excerpt right p-8">
    
    <p>
        %EXCERPT%
    </p>
    <div class="margin-top-small">
        <a href="%LINK%" class="read-more">
            <?php echo esc_html_e('Continue Reading', 'sagani'); ?>
        </a>
    </div>
    
</div>

<?php get_template_part( 'components/list-styles/post-footer-a', '', $post_share ); ?>