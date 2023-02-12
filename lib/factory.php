<?php

declare(strict_types=1);

require_once get_template_directory() . '/inc/util-class.php';
require_once get_template_directory() . '/inc/sagani.php';
require_once get_template_directory() . '/inc/skins/travel-skin.php';
require_once get_template_directory() . '/inc/customizer/settings.php';
require_once get_template_directory() . '/lib/template-loader.php';
require_once get_template_directory() . '/lib/options.php';

 class Sagani {

    public static function __callStatic( $method, $args ){

        $aliases = self::get_aliases();
        if( isset( $aliases[ $method ] ) ){
            
            $registry = get_transient( 'sagani_registry' );
            
            if( $registry ){
                
                $unserialized_registry = maybe_unserialize($registry);
                
                if( isset( $unserialized_registry[$method] ) ){
                    return $unserialized_registry[ $method ];
                }
            }
            
            $_cache = $registry  ? maybe_unserialize( $registry ) : [] ;

            $instance = new $aliases[$method];
            
            $_cache[$method] = $instance;
            set_transient( 'sagani_registry', maybe_serialize( $_cache ), 60 * 60 );
            
            return $instance;
        }
        return null;
    }
    public static function get_aliases(){
        return [
            'utils' => Sagani_Utils::class,
            'active' => Sagani_Main::class,
            'travel' => Sagani_Travel::class,
            'tpl' => Sagani_Template_Loader::class,
            'options' => Sagani_Options::class,
            'customizer' => Sagani_Customizer_Settings::class
        ];
    }

 }