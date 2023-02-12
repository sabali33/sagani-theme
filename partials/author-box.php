<div class="post-author-box sg-px-8">
    <div class="inner-author-box sg-row">
        <div class="image sg-col-10-xs sg-col-2-lg">
            <?php echo get_avatar(get_the_author_meta('user_email'), 96 ); ?>
        </div>
        <div class="bio-graphy sg-col-10-xs sg-col-8-lg">
            <ul class="meta-items">
                <li class="meta-item label"><?php echo esc_html_e('Author', 'sagani'); ?> </li>
                <li class="meta-item author-name" >
                    <h4>
                        <?php the_author_posts_link(); ?>
                    </h4>
                </li>
                <li class="meta-item description">
                    <?php echo get_the_author_meta( 'description' ); ?>
                </li>
                <li class="meta-item">
                    <ul class="social-media-icons">
                        <li class="social-media-item">
                            <a href="#" class="icon icon-facebook"></a>
                        </li>
                        <li class="social-media-item">
                            <a href="#" class="icon icon-twitter"></a>
                        </li>
                        <li class="social-media-item">
                            <a href="#" class="icon icon-instagram"></a>
                        </li>
                        <li class="social-media-item">
                            <a href="#" class="icon icon-vk"></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>