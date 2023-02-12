<?php
require_once get_template_directory() .'/lib/theme-base.php';

class Sagani_Travel extends Sagani_Core {
    
    public static function get_instance( $refresh = false ){
        
        if( $refresh ){
            delete_transient( 'sagani_registry' );
            
        }
        
        if( $registry = get_transient('sagani_registry') ){
            
            if( isset( $registry['travel'] ) && !$refresh  ){
                
                return $registry['travel'];
            }
        }
        $instance = Sagani::travel();
        
        add_filter( 'sagani_sidebars', [ $instance, 'add_sidebars' ] );
        
        add_filter( 'wp_list_categories', [ $instance, 'filter_categories_widget' ], 10, 2 );
        add_filter( 'excerpt_length', [$instance, 'excerp_length_callback']);

        return $instance;
    }
    public function excerp_length_callback() {
        $excerpt_length = 15;
        return $excerpt_length;
    }
    public function add_sidebars( $sidebars ) {
        
        $travel_skin_sidebars = [
            array(
				'name'          => esc_html__( 'Header Right', 'sagani' ),
				'id'            => Sagani::utils()->get_object_slug( 'header_right' ),
				'description'   => esc_html__( 'Add widgets here.', 'sagani' ),
				'before_widget' => '<ul id="%1$s" class="widget %2$s">',
				'after_widget'  => '</ul>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
            ),
            array(
				'name'          => esc_html__( 'Top Footer', 'sagani' ),
				'id'            => Sagani::utils()->get_object_slug('top_footer'),
				'description'   => esc_html__( 'Add widgets here.', 'sagani' ),
				'before_widget' => '<ul id="%1$s" class="widget %2$s">',
				'after_widget'  => '</ul>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
            ),
        ];
        return array_merge( $sidebars, $travel_skin_sidebars );
    }
    public function filter_categories_widget( $output, $args ) {
        preg_match_all("/> \(\d+\)/", $output, $matches );
        $new_output = '';
        
        foreach ($matches[0] as $match ){
            $count_html = trim($match, "> " );
            
            $count_html_b = str_replace("(", '', $count_html );
            $count = str_replace(")", '', $count_html_b );
            $span = sprintf("<span class='cat-posts-count'>%s</span>", $count );
            $new_output = str_replace( $count_html, $span , $output );
            $output = $new_output;
        }
        
       return $new_output;
    }
    public function get_post_featured_gallery( $post_id = null ){
        return get_post_gallery( $post_id, false );
        
    }
    public function get_post_videos(){
        global $GLOBALS;
        $content_width = $GLOBALS['content_width'];
        $videos = [
            'https://www.youtube.com/watch?v=blGoTO7hHHY',
            'https://www.youtube.com/watch?v=DG_wS0D7yHU'
        ];
        $img_tpl = Sagani::tpl()->get('/templates/video-slider/video');
        
        $featured_videos = array_map( function( $video ) use( $img_tpl ) {
            $video_html = $GLOBALS['wp_embed']->run_shortcode("[embed]  $video  [/embed]");
            return preg_replace("/%VIDEO_EMBED%/", $video_html, $img_tpl, 1 );
        }, $videos );
        return  join("\n", $featured_videos ) ;
    }
}