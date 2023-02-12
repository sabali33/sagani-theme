<?php

class Sagani_Main {
    
    public static function get_instance( $refresh = false ) {
        // from customizer
        $skin_name = "travel";
        $instance = self::get_skin($skin_name)->get_instance( $refresh );
        
        return $instance;
    }
    public static function get_skin( $skin_name = null ){
        if( !$skin_name ){
            //from customizer
            $skin_name = "travel";
        }
        return Sagani::$skin_name();
    }
}
//