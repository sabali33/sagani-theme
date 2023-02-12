<?php 

class Sagani_Options {

    public function get_highlights_args(){
        extract([
            'date' => true,
            'cat' => true,
            'cats' => $this->get_highlights_terms(),
        ]);
        $all_cats = array_column( $cats, 'id' );
        array_unshift( $cats, [
            'name' => 'All',
            'slug' => 'all',
            'id' => $all_cats
        ] );
        $query_args = array(
            'posts_per_page' => 5,
            'cat' => $all_cats
        );
        
        return [
            'post_thumbnail' => [ 'size' => 'sagani-thumbnail'],
            'list_args' => [
                'date' => $date,
                'cat' => $cat,
            ],
            'large_args' => [
                'date' => $date,
                'cat' => $cat,
            ],
            'main_args' => [
                'cats' => $cats,
                'posts_per_page' => 5
            ],
            'query_args' => $query_args,
        ];
    }
    public function get( $key ){
        return get_theme_mod($key);
    }

    public function get_highlights_terms()
    {
        $customizer_settings = false;
        if($customizer_settings){
            return $customizer_settings;
        }
        return array_reduce(get_categories(['count' => 4]), function($acc, $category){
            if( count($acc) < 5){
                $acc[] = [
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'id' => $category->term_id,
                ];
            }
            return $acc;

        }, []);
    }
}