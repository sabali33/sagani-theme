<?php extract($args); ?>
<header>
    <div class="post-slider">
        %VIDEOS%
       
    </div>
    
    <div class="post-meta pl-8 pt-8">
        <span class="post-cat"><a href=" %CAT_LINK%"> %CAT% </a></span>
        <time class="post-date"> %DATE% </time>
        <span class="posted-by"> <a href=" %AUTHOR_POST_LINK%">  %AUTHOR% </a> </span>
        <h2 class="post-title mt-4"><a href=" %LINK%"> %TITLE%</a></h2>
    </div>
    
</header>
<div class="post-excerpt p-8">
    <p>
    %EXCERPT%
    </p>
    <div class="margin-top-small">
        <a href=" %LINK%" class="read-more">
            <?php echo esc_html_e('Continue Reading', 'sagani'); ?> 
        </a>
    </div>
    
</div>
<?php get_template_part( 'components/list-styles/post-footer-a', '', $post_share ); ?>
<!-- <div class="share-counter">
    <span class="post-likes">
        <a href="#"><i class="fa fa-heart"></i>110</a>
    </span>
    <span class="post-comments"><a href="#"><i class="fa fa-comment"></i>77</a></span>
    <span class="post-views"><i class="fa fa-eye"></i>50</span>
    <span class="post-share"><a href="#"><i class="fa fa-share-alt"></i> Share</a></span>
</div> -->