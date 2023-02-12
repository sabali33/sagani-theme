<?php

class Sagani_Core {
    public function __construct(){
        add_action( 'after_setup_theme', array( $this, 'add_core' ), 12 );
        add_action( 'widgets_init', array( $this, 'register_sidebars') );
		add_action( 'wp_enqueue_scripts', [$this, 'add_theme_scripts'] );

		add_action( 'wp_ajax_sagani_temp_loader', [$this, 'load_ajax_templates_callback'] );
		add_action( 'wp_ajax_nopriv_sagani_temp_loader', [$this, 'load_ajax_templates_callback'] );
        if ( !defined( 'SAGANI_VERSION' ) ) {
            define( 'SAGANI_VERSION', '1.0.0' );
		}
		add_filter( 'get_post_gallery', [$this, 'get_post_gallery' ], 10, 2 );
    }
    public function add_core(){

        load_theme_textdomain( 'sagani', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		
		add_theme_support( 'title-tag' );

		
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		$content_width = Sagani::options()->get('enable_sidebar') ?  728 : 1200 ;
		apply_filters( 'sagani_content_width', $content_width );
		$GLOBALS['content_width'] = $content_width;

        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
        );

        add_theme_support( 'custom-logo', $defaults );
		
		$this->register_menus();
		$this->add_image_sizes();
    }
    public function register_menus()
    {
        $menus = apply_filters('sagani_menus', [
            'main_nav' => esc_html__( 'Primary Menu', 'sagani' ),
            'top_nav' => esc_html__( 'Top Menu', 'sagani' ),
        ]);
        foreach ($menus as $key => $label ){
            register_nav_menus( array(
                $key => $label,
            ) );
        }
	}
	public function add_image_sizes()
	{
		
		$sizes = array(
			'sagani-medium' => [ 'width' => 279, 'height' => 235 ],
			'sagani-main' => [ 'width' => 776, 'height' => 405 ],
			'sagani-list-tall' => [ 'width' => 346, 'height' => 485 ],
			'sagani-thumbnail' => [ 'width' => 105, 'height' => 101 ],
			'sagani-wrap-full' => [ 'width' => 1120, 'height' => 555 ],
			'sagani-list-main' => [ 'width' => 337, 'height' => 222 ],
			'sagani-2-grid-slider' => [ 'width' => 802, 'height' => 589 ],
			'sagani-3-grid-slider-large' => [ 'width' => 975, 'height' => 579 ],
			'sagani-3-grid-slider-small' => [ 'width' => 628, 'height' => 289 ],
			'sagani-highlight-main' => [ 'width' => 345, 'height' => 255 ],
			'sagani-highlight-main' => [ 'width' => 345, 'height' => 255 ],
		);
		foreach ( $sizes as $size_name => $size ){
			add_image_size($size_name, $size['width'], $size['height'], true );
		}
	}
    public function add_theme_scripts(){
		wp_enqueue_style( 'sagani-theme', get_template_directory_uri() .'/style.css', [], SAGANI_VERSION, 'all' );
		wp_enqueue_script( 'sagani-slick', get_template_directory_uri() .'/js/vendor/slick.min.js', ['jquery'], SAGANI_VERSION, true );
		wp_enqueue_script( 'sagani-theme', get_template_directory_uri() .'/js/sagani.js', ['jquery','sagani-slick'], SAGANI_VERSION, true );
		wp_enqueue_style( 'sagani-theme-icons', get_template_directory_uri() .'/css/font.css', [ 'sagani-theme' ], SAGANI_VERSION, 'all' );
		wp_enqueue_style( 'sagani-slick', get_template_directory_uri() .'/css/vendor/slick.css', [ 'sagani-theme' ], SAGANI_VERSION, 'all' );
		wp_enqueue_style( 'sagani-fonts', 'https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:wght@300;400;500;700&display=swap', [ 'sagani-theme' ], SAGANI_VERSION, 'all' );



        wp_dequeue_style( 'wc-blocks-style' );
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		$ajax_data = [
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'sagani-template-loader-nonce' ),
		];
		wp_localize_script( 'sagani-theme', 'Sagani', $ajax_data );
    }
    public function register_sidebars(){
        $sidebars = apply_filters( 'sagani_sidebars', array(
			array(
				'name'          => esc_html__( 'Main Sidebar', 'sagani' ),
				'id'            => Sagani::utils()->get_object_slug('main_sidebar'),
				'description'   => esc_html__( 'Add widgets here.', 'sagani' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
            ),
            
            array(
				'name'          => esc_html__( 'Lower Footer', 'sagani' ),
				'id'            => Sagani::utils()->get_object_slug('lower_footer'),
				'description'   => esc_html__( 'Add widgets here.', 'sagani' ),
				'before_widget' => '<ul id="%1$s" class="widget %2$s">',
				'after_widget'  => '</ul>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
            )
            
		) );
		foreach( $sidebars as $sidebar ){
			register_sidebar( $sidebar );
		}
    }

	public function get_post_thumbnails( $thumb, $attr ){
		if( !has_post_thumbnail() ){
			return sprintf("<div class='no-post-thumbnail pb-8'>%s</div>", __('') );
		}
        ob_start();
		get_template_part('partials/featured-image');
		return ob_get_clean();
	}
	public function get_comments( $comment, $args, $depth ){
		$GLOBALS[ 'comment' ] = $comment;
		
		get_template_part('partials/comment', '', ['comment' => $comment, 'depth' => $depth, 'args' => $args ] );

	}
	public function load_ajax_templates_callback(){
		if( !isset($_GET ) ){
			wp_die('Sorry, you are not allowed');
		}
		if( !wp_verify_nonce( $_GET['nonce'], 'sagani-template-loader-nonce' )	){
			wp_die( 'You are not authorized' );
		}
		
		$template_name = $_GET['template_name'];
		$query = $_GET['query'];
		$query_args = [];
		$query_args['cat'] = explode(',', $query['cat'] );
		$query_args['posts_per_page'] = sanitize_text_field( $query['posts_per_page'] );

		$highlights_query = new WP_Query( $query_args );
		
		$args = Sagani::options()->get_highlights_args();
		
		$response = Sagani::utils()->loop($highlights_query, function( $post_arr ) use( $args ) {
			if(isset( $post_arr['error-404'] ) ){
				return [
					'large' => false,
					'list' => __('<li class="post-item clearfix">No Posts Found</li>', 'sagani' )
				];
			}
			$large_tpl = Sagani::tpl()->get( 'templates/highlights/large-post', [
				'cat' => $args['large_args']['cat'],
				'date' => $args['large_args']['date'],
			] );
			$list_tpl = Sagani::tpl()->get( 'templates/highlights/ajax-list', [] );
			$tpl = Sagani::tpl()->get( 'templates/highlights/post-list', [
				'cat' => $args['large_args']['cat'],
				'date' => $args['large_args']['date'],
			] );
			$large_post = Sagani::utils()->parse_post( $post_arr[0], $large_tpl );

			unset($post_arr[0]);
			
			$list_post = array_map(function( $post ) use( $list_tpl, $tpl ) {
				$parsed_post = Sagani::utils()->parse_post( $post, $tpl );
				return str_replace( "%POST%", $parsed_post, $list_tpl );
			}, $post_arr );
			return [
				'large' => $large_post ?? null,
				'list' =>  join("\n", $list_post ),
			];
		});

		wp_send_json_success( $response, 202 );
	}
	/**
	 * 
	 * @copyright https://gist.github.com/BinaryMoon/cd1eb239d4a14ba3ab45b756e4c64828
	 */
	public function get_post_gallery( $gallery, $post ) {

		// Already found a gallery so lets quit.
		if ( $gallery ) {
			return $gallery;
		}
	
		// Check the post exists.
		$post = get_post( $post );
		if ( ! $post ) {
			return $gallery;
		}
	
		// Not using Gutenberg so let's quit.
		if ( ! function_exists( 'has_blocks' ) ) {
			return $gallery;
		}
	
		// Not using blocks so let's quit.
		if ( ! has_blocks( $post->post_content ) ) {
			return $gallery;
		}
	
		/**
		 * Search for gallery blocks and then, if found, return the html from the
		 * first gallery block.
		 *
		 * Thanks to Gabor for help with the regex:
		 * https://twitter.com/javorszky/status/1043785500564381696.
		 */
		$pattern = "/<!--\ wp:gallery.*-->([\s\S]*?)<!--\ \/wp:gallery -->/i";
		preg_match_all( $pattern, $post->post_content, $the_galleries );
		// Check a gallery was found and if so change the gallery html.
		if ( ! empty( $the_galleries[1] ) ) {
			$gallery = reset( $the_galleries[1] );
		}
	
		return $gallery;
	
	}
	
}