<?php 
    $args = [
        'post_date' => true,
        'post_author' => true,
        'post_cats' => true,
        'post_comments' => true,
        'post_share' => [
            'post_comments' => true,
            'post_views' => true,
            'post_likes' => true,
            'share_icons' => [
                'facebook' => true,
                'linkedin' => false
            ]
        ],

    ];
   
   $main = Sagani::tpl()->get('/templates/post-gallery/main', [] );

   $item = Sagani::tpl()->get('/templates/post-gallery/item', $args );

    echo preg_replace("/%POSTS%/", $item, $main, 1 );
