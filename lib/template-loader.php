<?php

    class Sagani_Template_Loader{

        public function get( $path, $args = [] )
        {

            ob_start();

            get_template_part( $path, '', $args );

            return ob_get_clean();
        }
        public function load( $query,  $templates = [], $template_name = null, $args = [] )
        {
            if( !( $query instanceof WP_Query ) ){
                return;
            }
            switch($template_name){
                case 'highlights':
                    return $this->load_highlights($query, $args );
                    break;
                default:
                    return Sagani::utils()->loop( $query, function( $post_arr ) use( $templates ){

                        return Sagani::utils()->parse_loop_posts( $post_arr, $templates );
                        
                    }, $post_thumbnail_args );
                    break;
            }
            
        }
        
        public function load_highlights( $query,  $args ){
            if( !is_array($args) || !( $query instanceof WP_Query ) ){
                return;
            }
            $main = $this->get('templates/highlights/main', [ 
                'cats' => $args['main_args']['cats'], 
                'posts_per_page' => $args['main_args']['posts_per_page'], 
            ] );
            $large = Sagani::tpl()->get('templates/highlights/large-post', [ 
                'date' => $args['large_args']['date'], 
                'cat' => $args['large_args']['cat'] 
            ] );
            $list = Sagani::tpl()->get('templates/highlights/post-list', [ 
                'date' => $args['list_args']['date'], 
                'cat' =>  $args['list_args']['cat']
            ] );
            $item_wrap = Sagani::tpl()->get('templates/highlights/ajax-list', [ 
                'date' => $args['list_args']['date'], 
                'cat' =>  $args['list_args']['cat']
            ] );

            $templates = [ 'large' => $large, 'main' => $main, 'tpl' => $list, 'item' => $item_wrap ];

            return Sagani::utils()->loop( $query, function( $post_arr ) use ( $templates ) {
                $large = Sagani::utils()->parse_post( $post_arr[0], $templates['large'] );
                $main = preg_replace( "/%LARGE_POST%/", $large, $templates['main'] );
                $templates['main'] = $main;
                unset($post_arr[0]);
                unset($templates['large']);
                unset($templates['main']);
                
                $post_html = Sagani::tpl()->parse_list($post_arr, $templates);//utils()->parse_loop_posts( $post_arr, $templates );
                return preg_replace("/%POSTS%/", $post_html, $main );
        
            }, $args );
        }
        public function parse_list($post_arr, $templates )
        {
            if( isset( $post_arr['error-404'] ) ){

                return $post_arr['error-404'];
            }
            $tpl = $templates['tpl'];
            
            $posts = array_map( function($post) use( $tpl ) {
                
                return Sagani::utils()->parse_post( $post, $tpl );
               
            }, $post_arr );
            
            $posts_html = array_map( function( $post ) use( $templates ) {
                
                return preg_replace("/%POST%/", $post, $templates['item'] );
                
            }, $posts);
            
            return join("\n", $posts_html);
        }
        public function loop( $query = null, $callback, $args = [] )
        {
            if( !$query ){
                global $wp_query;
                $query = $wp_query;
            }
            if( !( $query instanceof WP_Query ) ){
                return;
            }
            
            if( $query->have_posts() ){
                
                $post_arr = [];
                while( $query->have_posts()):  

                    $query->the_post();

                    $func = 'get_'. get_post_type() .'_schema';
                    
                    if( method_exists( $this, $func  ) ){
                        $schema = call_user_func([ $this, $func ], $args );
                        $post_arr[] = $schema;
                    }else{
                        $schema = call_user_func([ $this, 'get_post_schema' ], $args );
                        $post_arr[] = $schema;
                    }
                    
                endwhile;
                wp_reset_query(  );

                return call_user_func($callback, $post_arr, $args );
            }else{
                return $callback( [ 'error-404' => __( "No Posts found", "sagani" ) ]  );
            }
            
        }
        public function get_post_schema( $args = [] ){
            if( !in_the_loop(  ) ){
                //return false;
            }
            $post_id = get_the_ID();
            $post_cat = self::post_cats( $post_id );
            $size = $args['size'] ?? 'medium';
            $featured_image = Sagani::active()->get_skin()->get_post_thumbnails( $size, [] );
            $featured_gallery_image = Sagani::active()->get_skin()->get_post_featured_gallery(get_the_ID()) ?
                Sagani::active()->get_skin()->get_post_featured_gallery(get_the_ID()) :
                $featured_image;
            $featured_videos = Sagani::active()->get_skin()->get_post_videos() ?
                Sagani::active()->get_skin()->get_post_videos() :
                $featured_image;
            $post_class = $args['post_class'] ?? '';

            return [
                'id' => get_the_ID(),
                'excerpt' =>  get_the_excerpt(),
                'content' => get_the_content(),
                'title' => get_the_title(),
                'date' => get_the_date(),
                'link' => get_permalink(),
                'thumbnail' => $featured_image,
                'author' => get_the_author(),
                'author_post_link' => get_author_posts_url(get_the_author_meta( 'ID' )),
                'gallery' => $featured_gallery_image,
                'videos' => $featured_videos,
                'cat' => $post_cat[0]['name'],
                'cat_link' => $post_cat[0]['link'],
                //'post_class' => get_post_class( $post_class )
            ];
        }
        public function get_product_schema( $args = [] )
        {
           
            $product = wc_get_product( get_the_ID() );
            $size = isset($args['size']) ? $args['size'] : 'medium';

            return [
                    'id' => get_the_ID(),
                    'excerpt' => get_the_excerpt(),
                    'title' => get_the_title(),
                    'price' => wc_price($product->get_price()),
                    'link' => get_permalink(),
                    'thumbnail' => get_the_post_thumbnail( null, $size ),
                ];
            
        }
        public function post_cats(){
            $post_cats = get_the_category();
            if(! $post_cats ){
                return;
            }

            return array_map(function($cat) {
                return [
                    'name' => $cat->name,
                    'link' => get_category_link($cat)
                ];
            }, $post_cats);
        }
        public function parse_post( $post_arr, $tpl ) {
            if( !is_array( $post_arr ) || !$tpl ){
                return;
            }
            $post_html = '';
            foreach( $post_arr as $key => $value ){
                $placeholder = '%' . strtoupper( $key ) . '%';
                
                $post_html = str_replace( $placeholder, $value, $tpl );
                
                $tpl = $post_html;
                
            }
            return $post_html;
        }
    }