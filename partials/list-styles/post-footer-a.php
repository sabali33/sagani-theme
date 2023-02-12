<?php if( Sagani::utils()->some( $args ) ): ?>

<div class="share-counter flex">
    <div class="flex">
        <?php if($args['post_likes']): ?>
            <span class="post-likes mr-8 share-meta">
                <a href="#"><i class="icon-heart icon-xlarge icon"></i>110</a>
            </span>
        <?php endif; ?>

        <?php if($args['post_comments']): ?>
            <span class="post-comments mr-8 share-meta">
                <a href="#">
                    <i class="icon-comment icon-sm icon"></i>77
                </a>
            </span>
        <?php endif; ?>

        <?php if($args['share_icons']): ?>
            <span class="post-views mr-8 share-meta">
                <a href="#">
                    <i class="icon-eye icon icon-large"></i>50
                </a>
            </span>
        <?php endif; ?>

    </div>

    <?php if( Sagani::utils()->some($args['share_icons']) ): ?>
        <span class="post-share">
            <a href="#">
                <i class="icon-share mr-2 icon-large icon"></i> 
                <?php echo esc_html_e('Share', 'sagani' ); ?>
            </a>
            <div class="social-share">
                <ul class="social-share-list flex">

                    <?php if( isset( $args['share_icons']['facebook'] ) ): ?>
                        <li class="social-icon facebook mr-4">
                            <a href="#">
                                <i class="icon-facebook icon-base"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( isset( $args['share_icons']['twitter'] ) ): ?>
                        <li class="social-icon twitter mr-4">
                            <a href="#">
                                <i class="icon-twitter icon-base"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( isset($args['share_icons']['instagram'] ) ): ?>
                        <li class="social-icon instagram mr-4">
                            <a href="#">
                                <i class="icon-instagram icon-base"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( isset($post_share['share_icons']['facebook'] ) ): ?>
                        <li class="social-icon vkontackt mr-4">
                            <a href="#">
                                <i class="icon-vk icon-base"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </span>
    <?php endif; ?>
</div>
<?php endif; ?>