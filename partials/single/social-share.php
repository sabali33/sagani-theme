<?php 
    $args;

    $social_shares = [
        'facebook' => [
            'icon' => 'icon-facebook',
            'link' => 'http://www.facebook.com/sharer.php?u='. urlencode(get_permalink()),
        ],
        'twitter' => [
            'icon' => 'icon-twitter',
            'link' => 'https://twitter.com/intent/tweet?url='. rawurlencode(get_permalink()).'&text='. rawurlencode(get_the_title())
        ],
        'linkedin' => [
            'icon' => 'icon-linkedin',
            'link' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='.urlencode(get_permalink())
        ],
        'vk' => [
            'icon' => 'icon-linkedin',
            'link' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='.urlencode(get_permalink())
        ],
        'pinterest' => [
            'icon' => 'icon-linkedin',
            'link' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='.urlencode(get_permalink())
        ]
    ];

?>

<div class="post-share sg-px-8-lg">
    <span class="post-share-icon">
        <i class="icon-share icon-xlarge"></i>
    </span>
    <ul class="share-icons-list sg-row">
        <?php foreach ( $social_shares as $network => $social_share ): ?>
            <?php if($args[$network] ): ?>
                <li class="share-icon <?php echo esc_attr($network); ?>">
                    <a href="<?php echo esc_url($social_share['link']); ?>" class="">
                        <i class="icon icon-<?php echo esc_attr($network); ?> mr-2"></i>
                        <?php echo esc_html($network); ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <!-- <ul class="share-icons-list">
        <li class="share-icon facebook">
            <a href="#" class="fa fa-facebook">Facebook</a>
        </li>
        <li class="share-icon twitter">
            <a href="#" class="fa fa-twitter">Twitter</a>
        </li>
        <li class="share-icon instagram">
            <a href="#" class="fa fa-instagram">Instagram</a>
        </li>
        <li class="share-icon pinterest">
            <a href="#" class="fa fa-pinterest">Pinterest</a>
        </li>
        <li class="share-icon vkontackt">
            <a href="#" class="fa fa-vk">vKontackt</a>
        </li>
    </ul> -->
</div>


   