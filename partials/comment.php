<li <?php comment_class( 'comment' ); ?> id="comment-<?php comment_ID() ?>">
    <div class="commenter-avatar">
    <?php
        echo get_avatar($comment, apply_filters('bunyad_comment_avatar_size', 40));
    ?>
    </div>
    <div class="content">
        <div class="commenter">
            <?php comment_author_link(); ?>
            <span class="reply-link"> 
                <?php
                    comment_reply_link(array_merge($args['args'], array(
                        'reply_text' => ' <i class="icon-reply mr-4"></i>'.__( 'Reply', 'bunyad'),
                        'depth'      => $args['depth'],
                        'max_depth'  => $args['args']['max_depth']
                    ))); 
                ?>
            </span>
        </div>
        <time class="comment-time">
            <span class="human-diff-time">
                <?php echo esc_html( human_time_diff( get_comment_time('U'), current_time('timestamp') ) ) . ' ago'; ?>
            </span>
            <span class="comment-date">
                <?php comment_date(); ?>
            </span>
           
        </time>
       <div class="comment-text mt-6">
           <?php comment_text(); ?>
       </div>
        

        <?php if ($comment->comment_approved == '0'): ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'bunyad'); ?></em>
        <?php endif; ?>
    </div>
    
</li>