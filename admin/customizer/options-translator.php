<?php
    
    class Sagani_Options_Translator {

        public function __construct(){
           
        }
        public static function get_panels()
        {
            include  get_template_directory() . '/admin/customizer/panels.php';
            return $panels;
        }
        public static function get_all_options()
        {
            $panels = self::get_panels();
            $all_options = [];
            
            foreach ( (array) $panels as $panel ){
                $file_name = str_replace( '_', '-', $panel['name'] );
                
                if( file_exists( get_template_directory() . "/admin/customizer/options/{$file_name}.php" ) ){

                   include get_template_directory() . "/admin/customizer/options/{$file_name}.php"; 
                }else{
                    continue;
                }
                $panel_settings_name = $panel['name'] . "_settings";
                
                $all_options = array_merge( $all_options, self::combine_settings( ${ $panel_settings_name } ) );
                
            }
            
            return $all_options;
        }
        public static function combine_settings( $panel_settings )
        {
            if( !is_array( $panel_settings ) ){
                return [];
            }
            $parsed_panel_settings = [];
            foreach( $panel_settings as $section_name => $settings ){
                $parsed_panel_settings = array_merge( $parsed_panel_settings, self::parse_options( $settings, $section_name ) );
            }
            
            return $parsed_panel_settings;
        }
        public static function parse_options( $settings, $section_name ) {
            if( !is_array( $settings ) ){
                return [];
            }
            $parsed_options = [];

            foreach( $settings as $setting ){

                if( !isset( $setting['universal'] ) ){
                    $parsed_options [] = $setting;
                    continue;
                }
                $setting['section'] = $section_name;
                include get_template_directory() . "/admin/customizer/options/universal.php";
                
                $parsed_options[] = isset($universal[$setting['universal']]) ?? self::parse_option( $universal[$setting['universal']], $setting );
                
            }
            
            return $parsed_options;
        }
        public static function parse_option($option, $setting )
        {
            if( !is_array($option) ){
                return [];
            }
           
            $parsed_option = [];
            foreach ( $option as $key => $value ){
                if(is_array($value)){
                    continue;
                }
                preg_match('/\%s/', $value, $matches );
                if( $key === 'section'){
                    $parsed_option[$key] = sprintf( $value, $setting['section'] );
                }elseif( $key === 'label' ){
                    $parsed_option[$key] = sprintf( $value, $setting['label'] );
                }else{
                    $parsed_option[$key] = $matches ? sprintf($value, $setting['name'] ) : $value;
                }
                
            }
            
            return $parsed_option;
        }
    }