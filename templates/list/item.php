
<?php extract($args); ?>

<div class="post-thumb sg-col-12-xs sg-col-6-md">
    
    %THUMBNAIL%
</div>
<div class="post-excerpt right sg-col-12-xs sg-col-6-md">
    <div class="post-meta">
        <span class="post-cat">
            <a href="%CAT_LINK%"> %CAT% </a>
        </span>
        <time class="post-date"> <i class="icon-clock mr-2"></i> %DATE% </time>
        <span class="posted-by"> 
            <a href="%AUTHOR_LINK%"><i class="icon-user mr-2"></i> %AUTHOR% </a> 
        </span>

    </div>
    <h2 class="post-title">
        <a href="%LINK%"> %TITLE% </a>
    </h2>
    <p class="excerpt" >
        %EXCERPT%
    </p>
    <div class="margin-top-small">
        <a href="%LINK%" class="read-more"><?php echo esc_html_e( 'Continue Reading', 'sagani' ); ?></a>
    </div>
    <!-- <div class="share-counter">
        <span class="post-likes">
            <a href="#"><i class="fa fa-heart"></i>110</a>
        </span>
        <span class="post-comments"><a href="#"><i class="fa fa-comment"></i>77</a></span>
        <span class="post-views"><i class="fa fa-eye"></i>50</span>
        <span class="post-share"><a href="#"><i class="fa fa-share-alt"></i> Share</a></span>
    </div> -->
    
    <?php get_template_part( 'components/list-styles/post-footer-a', '', $post_share ); ?>
</div>