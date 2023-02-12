<?php
/**
 * Theme Customizer
 *
 * @package sagani
 */

require_once get_template_directory() . '/inc/customizer/renderer.php';
require_once get_template_directory() . '/admin/customizer/options-translator.php';

class Swimghana_Customizer {

	public function __construct(){
		add_action( 'customize_register', [ $this, 'customize_register' ] );
		add_action( 'customize_preview_init', [ $this, 'customize_preview_js' ] );
	}
	public function customize_register( $wp_customize ) {
		$this->customize = $wp_customize;
		require_once get_template_directory() . '/inc/customizer/custom-controls/class-control-multiple-checkbox.php';
        $wp_customize->register_control_type( 'Sagani_Customize_Control_Checkbox_Multiple' );

        $this->add_panels_sections( Sagani_Options_Translator::get_panels() );

		$this->add_settings( Sagani_Options_Translator::get_all_options() );
	}

	public function add_panels_sections($panels){
		if( !is_array($panels )){
			return;
		}
		
		foreach ( $panels as $panel ){
			if( $panel['name'] !== 'woocommerce'){
				// add panels
				$this->customize->add_panel(
					$panel['name'],
					array(
						'title' => $panel['label'],
						'priority' => 3,
					)
				);
			}
			
			foreach( $panel['sections'] as $section_name => $section ){
				$section['panel'] = $panel['name'] !== 'woocommerce' ? $panel['name'] : 'woocommerce';
				$section['capabilities'] = "edit_theme_options";
				// add sections
				$this->customize->add_section(
					$section_name,
					$section
				);
			}
		}
	}

	public function add_settings($settings){
		if( !is_array($settings )){
			return;
		}
		$renderer = Swimghana_Renderer::get_instance($this->customize);
		foreach ( $settings as $setting ){
			$renderer->render($setting);
		}
	}
	public function customize_preview_js(){
		
	}
	
}
new Swimghana_Customizer();