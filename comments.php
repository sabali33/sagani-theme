<?php 
    if ( post_password_required() ) {
        return;
    }
?>
<div class="comments-box sg-px-8-lg">
    <?php if ( !have_comments() ) : ?>
        <p class="mb-10"><?php echo esc_html_e( 'Be the first to comment on this post', 'sagani' );  ?></p>
    <?php endif; ?>
    <?php 
        $commenter = wp_get_current_commenter(); 
        $consent  = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
        $comments_count = get_comments_number();
    
    ?>
  
    <span class="comments-count sub-heading margin-top-small">
        <?php 
            printf( esc_html(_nx("%d Comment", "%d Comments", $comments_count, 'sagani') ), number_format_i18n( $comments_count )); 
        ?> 
    </span>
    <ul class="comments">
        <?php 
            wp_list_comments( [
                'callback' => [Sagani::active()->get_instance(), 'get_comments'],
                'max-depth' => 4
            ] );
        
        ?>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')): // are there comments to navigate through ?>
		<nav class="comment-nav">
			<div class="nav-previous"><?php previous_comments_link(__( 'Older Comments', 'sagani')); ?></div>
			<div class="nav-next"><?php next_comments_link(__( 'Newer Comments;', 'sagani')); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
        
        <?php 

            $fields = [
                'author' => sprintf( '<ul class="">
                            <li class="field">
                                <input type="text" name="author" value="" placeholder="Name" value="%s">
                            </li>', $commenter['comment_author'] ),
                'email'  => sprintf( ' <li class="field">
                                <input type="email" name="email" value=" " placeholder="Email" value="%s">
                            </li>', $commenter['comment_author_email'] ),
                'url'   => sprintf( ' <li class="field">
                                <input type="text" name="url" value="" placeholder="Website" value="%s">
                            </li> </ul>', $commenter[ 'comment_author_url' ] ),
                'cookies' => '<p class="mt-8">
                            <label for="comment-consent"> 
                            <input type="checkbox" name="wp-comment-cookies-consent" value="0" id="wp-comment-cookies-consent" tabindex="0" '.$consent.'> 
                            I have agreed to receive news from this site
                            </label>
                        </p>'
            ];
            $fields = apply_filters('comment_form_default_fields', $fields);
            $args = [
                'title_reply' => '<span class="reply-head">' . __('Leave A Reply', 'sagani') . '</span>',
                'title_reply_to' => '<span class="reply-head">' . __('Reply To %s', 'sagani') . '</span>',
                'comment_notes_before' => '',
                'comment_notes_after'  => '',
            
                'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'sagani'), 
                                            admin_url('profile.php'), $user_identity, wp_logout_url(get_permalink())) . '</p>',
            
                'comment_field' => '
                    <p>
                        <textarea name="comment" id="comment-text" rows="10" class="comment-text" aria-required="true" placeholder="'. esc_attr__('Enter Your comment', 'sagani') .'"></textarea>
                    </p>',
            
                'id_submit' => 'comment-submit',
                'label_submit' => __('Post Comment', 'sagani'),
            
                'cancel_reply_link' => __('<i class="icon-times"></i>Cancel Reply', 'sagani'),
        
                'fields' => $fields,
            ];
        
        ?>
        <div class="coment-form-box margin-bottom-small">
            <div class="form-fields">
                <?php comment_form($args); ?>
            </div>
        </div>
        </ul>
</div>