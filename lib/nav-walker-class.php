<?php

class Sagani_Nav_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output = '', $depth = 0, $args= []){
        
        $indent = $depth > 0 ? str_repeat("\t", $depth) : '';
        $sub_menu = ($depth + 1) > 0 ? 'sub-menu-box' : 'parent';
        $output .= sprintf("\n%1s<ul class='%2s depth-%3s'>\n", $indent, $sub_menu, $depth );
        
    }
    public function end_lvl(&$output = '', $depth=0, $args= []){
        $output .= '</ul>';
        return $output;
    }
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0){
        $indent = $depth ? str_repeat("\t", $depth) : '';
        $list_attr = '';
        $class_names = '';
        $menu_id =  "menu-item-{$item->ID}";
        $classes = [];
        $classes[] = empty($item->classes) ? [] :  join( ' ', $item->classes );

        $classes[] = $args->walker && $args->walker->has_children ? "has-children relative parent" : '';
        $classes[] = $args->walker && $args->walker->has_children && $depth ? "has-sub-children parent" : '';
        $classes[] = $item->current || $item->current_item_ancestor ? "active-menu" : '';
       // $classes[] = $depth == 0 ? "block lg:inline-block lg:mr-10" : '';
        $classes[] = $menu_id;
        $filtered_classes = apply_filters( 'nav_menu_css_class', array_filter($classes), $item, $args );
        $class_names = join(' ', $filtered_classes );
        $class_names = sprintf("class='%s navigation__item'", esc_attr( $class_names ) );
        $id = apply_filters( 'nav_menu_item_id', $menu_id, $item, $args );
        $id = sprintf("class='%s'", esc_attr( $id ) );
        $output .= sprintf("%1s<li %2s %3s %4s>", $indent, $class_names, $id, $list_attr  );

        $attributes = !empty( $item->attr_title ) ? sprintf( 'title="%s"', $item->attr_title ) : '';
        $attributes .= !empty( $item->target ) ? sprintf( 'target="%s"', $item->target ) : '';
        $attributes .= !empty( $item->xfn ) ? sprintf( 'rel="%s"', $item->xfn) : '';
        $attributes .= !empty( $item->url ) ? sprintf( 'href="%s"', $item->url) : '';
        $icons = ' ';
        if($args->walker && $args->walker->has_children && $depth > 0){
            $icons .= sprintf( "class='%s'", 'icon-base ml-2 icon-angle-right');
        }elseif( $args->walker->has_children && $depth == 0 ){
            $icons .= sprintf( "class='%s'", "icon-xs ml-2 icon-angle-down");
        }else{
            $attributes .= sprintf( 'class="%s menu-item-link"', 'child-less');
        }
        $attributes .= $args->walker && $args->walker->has_children ? sprintf( 'class="%s menu-item-link"', 'angle-down') : 'menu-item-link';
        
        $menu_item = $args->before;
        
        $menu_item .= sprintf( "<a %s > ", $attributes );
        $icons = sprintf("\n<i %s > </i>", $icons );
        
        $menu_item .= $args->link_before .apply_filters('the_title', $item->title, $item->ID ). $args->link_after;
        $menu_item .= '</a>'.$icons.$args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $menu_item, $item, $depth, $args );

        
    }
    public function end_el(&$output, $item, $depth = 0, $args =[], $id = 0){
        //$output .= '</ul>';
        
    }
}
