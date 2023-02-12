<?php

    class Sagani_Utils {

        public function some( $data ){
            return !!array_filter( $data, function( $item ){
                return $item;
            });
        }

        public function every( $data ){
            $checked = array_filter( $data, function( $item ){
                return $item;
            });
            return count( $checked ) === count( $data );
        }
        public function array_map_with_keys($callback, $array ){
            if( !$array ){
                return;
            }
            foreach( $array as $key => $value ){
                $callback( $value, $key );
            }
        }
        public function get_object_slug($object_slug){

            return sprintf($this->get_theme_prefix(), $object_slug);
        }
        public static function get_theme_prefix(){

            return 'sagani_%s';
        }
        public function loop( $query, $callback, $args = [] )
        {
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
                    }
                    
                endwhile;
                wp_reset_postdata();

                return call_user_func($callback, $post_arr );
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
            $size = isset($args['size']) ? $args['size'] : 'medium';
            return [
                'id' => get_the_ID(),
                'excerpt' => get_the_excerpt(),
                'title' => get_the_title(),
                'date' => get_the_date(),
                'link' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail( null, $size ),
                'author' => get_the_author(),
                'cat' => $post_cat['name'],
                'cat_link' => $post_cat['link']
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
        public function post_cats()
        {
            return [ 
                'name' => 'travel',
                'link' => '#'
            ];
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
        public function parse_loop_posts( array $post_arr, $templates ) {
            
            if( isset( $post_arr['error-404'] ) ){

                return $post_arr['error-404'];
            }
            $tpl = $templates['tpl'];
            
            $posts = array_map( function($post) use( $tpl ) {
                
                return $this->parse_post( $post, $tpl );
               
            }, $post_arr );
            
            $posts_html = array_reduce( $posts, function( $acc, $post ){
                
                return preg_replace("/%POST%/", $post, $acc, 1 );
                
            }, $templates['tpls'] );
            
            return $posts_html;
        }
        public function post_class($classes, $post_id)
        {
            if( !is_string( $classes ) ){
                return $classes;
            }
            $post_classes = get_post_class($classes, $post_id ) ;
            $post_class_str = join(' ', $post_classes );
            return "class='$post_class_str'";
        }
        public function get_pagination_links()
        {

            $pagination_links =  paginate_links([
                'mid_size'  => 4,
                'prev_text' => __( '<i class="icon icon-base icon-arrow-left"></i>', 'sagani' ),
                'next_text' => __( '<i class="icon icon-base icon-arrow-right"></i>', 'sagani' ),
                'class' => 'pagination__numbers',
                'type' => 'array'
            ]);
            return is_array($pagination_links) ? $pagination_links : [];
        }
    }