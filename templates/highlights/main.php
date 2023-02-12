<div class="listing highlight sg-shadow-lg">
    <ul class="tab-cat-list">
        
        <li class="alert">
            <label class="heading">
            <?php echo esc_html_e("Don't Miss", 'sagani'); ?>
            <i class="icon-arrow-right icon-xlarge"></i>
            </label>
        </li>

        <?php foreach( $args['cats'] as $cat ): ?>
            <li class="tab">
                <label for="tab-<?php echo esc_attr( $cat['slug'] ); ?>">
                    <?php echo esc_html( $cat['name'] ); ?>
                </label>
            </li>
        <?php endforeach; ?>
        
    </ul>
    <div class="waiting-response">
        <img src="<?php echo esc_url(get_template_directory_uri() .'/img/loading.svg'); ?>" alt="Waiting..." class="w-25">
    </div>
    <input type="checkbox" name="tab-checkbox" value="" id="tab-more" class="tab-more">
    
    <?php foreach ( $args['cats'] as $cat ) : ?>
    <?php $checked = $cat['slug'] == 'all' ? 'checked' : ''; ?>
    <div class="tab-content <?php echo esc_attr($cat['slug']); ?>">
        
        <input 
            type="radio" 
            name="tab-radio" 
            value="" 
            id="tab-<?php echo esc_attr($cat['slug']); ?>" 
            class="tab-trigger" 
            <?php echo esc_attr($checked); ?>
            data-loaded="0"
            data-ppp="<?php echo esc_attr( $args['posts_per_page'] ); ?>"
            data-cat-ids="<?php echo is_array($cat['id']) ? esc_attr(join(',', $cat['id'] ) ) : $cat['id']; ?>"
        >
        <div class="content sg-row sg-grid-gap-2-md">
            
            <div class="sg-col-12-xs sg-col-6-md large">
                <div class="large-post">
                    %LARGE_POST%
                </div>
            </div>
            <div class="sg-col-12-xs sg-col-6-md post-list-box">
                <ul class="post-list">
                    %POSTS%
                </ul>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    
</div>