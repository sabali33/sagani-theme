<?php
/*
A class to render general Setting.
 */

class Swimghana_Renderer{
	public function __construct($wp_customize = null){
		if($wp_customize){
			$this->wp_customize = $wp_customize;
		}
	}
	public static function get_instance($wp_customize = null){
		$class = new self($wp_customize);
		return $class;
	}
	public function is_wp_customizer(){

		return isset($this->wp_customize) ? true : false;

	}
	public function render($element){
		$type = isset($element['type']) ? $element['type'] : "";
		switch($type){
			case "text":
				$input = $this->render_text($element);
				break;
			case "select":
				$input = $this->render_select($element);
				break;
			case "radio":
				$input = $this->render_radio($element);
				break;
			case "checkbox":
				$input = $this->render_checkbox($element);
				break;
			case "multiple_checkbox":
				$input = $this->render_multiple_checkbox($element);
				break;
			case "textarea":
				$input = $this->render_textarea($element);
				break;
			case "number":
				$input = $this->render_number($element);
				break;
			default:
				$input = $this->render_text($element);
		}

		return $input;
	}
	public function render_text($element){
		if($this->is_wp_customizer()){
			$this->wp_customize->add_setting(
				isset($element['name']) ? $element['name']: null,
				array(
					'type' => 'theme_mod',
					'capability' => 'manage_options',
					'default' => isset($element['value']) ? $element['value'] : '',
				)
			);
			ob_start();
			$this->wp_customize->add_control(
				isset($element['name']) ? $element['name'] : null, 
				array(
					'type' => isset( $element['type'] ) ? $element['type'] : null,
					'section' => $element['section'], // Required, core or custom.
					'label' => isset($element['label']) ? $element['label'] : '',
					'description' => isset($element['description']) ? $element['description'] : '',
					'input_attrs' => array(
						'class' => isset( $element['class'] ) ? $element['class'] : '',
						'placeholder' => isset($element['placeholder']) ? $element['placeholder'] : '',
					),
					//'active_callback' => 'is_front_page'
				)
			);
			$field = ob_get_clean();
		}else{

		}
		return $field;
	}
	public function render_radio($element){
		if($this->is_wp_customizer()){
			$this->wp_customize->add_setting(
				$element['name'],
				array(
					'type' => 'theme_mod',
					'capability' => 'manage_options',
					'default' => $element['value'],
				)
			);
			ob_start();
			$this->wp_customize->add_control(
				$element['name'], 
				array(
					'type' => $element['type'],
					'section' => $element['section'], // Required, core or custom.
					'label' => $element['label'],
					'description' => isset($element['description']) ? $element['description'] : '',
					'input_attrs' => array(
						'class' => $element['class'],
					),
					'choices' => $element['options']
				)
			);
			$field = ob_get_clean();
		}else{

		}
		return $field;
	}
	public function render_number($element){
		if($this->is_wp_customizer()){
			$this->wp_customize->add_setting(
				$element['name'],
				array(
					'type' => 'theme_mod',
					'capability' => 'manage_options',
					'default' => $element['value'],
				)
			);
			ob_start();
			$this->wp_customize->add_control(
				$element['name'], 
				array(
					'type' => $element['type'],
					'section' => $element['section'], // Required, core or custom.
					'label' => $element['label'],
					'description' => isset($element['description']) ? $element['description'] : '',
					'input_attrs' => array(
						'class' => $element['class'],
						'placeholder' => isset($element['placeholder']) ? $element['placeholder'] : '',
						'min' => 1
					),
					//'active_callback' => 'is_front_page'
				)
			);
			$field = ob_get_clean();

		}else{

		}
		return $field;
	}
	public function render_textarea($element){
		if($this->is_wp_customizer()){
			$this->wp_customize->add_setting(
				$element['name'],
				array(
					'type' => 'theme_mod',
					'capability' => 'manage_options',
					'default' => $element['value'],
				)
			);
			ob_start();
			$this->wp_customize->add_control(
				$element['name'], 
				array(
					'type' => $element['type'],
					'section' => $element['section'], // Required, core or custom.
					'label' => $element['label'],
					'description' => isset($element['description']) ? $element['description'] : '',
					'input_attrs' => array(
						'class' => $element['class'],
					),
					//'active_callback' => 'is_front_page'
				)
			);
			$field = ob_get_clean();
		}else{

		}
		return $field;
	}
	public function render_checkbox($element){
		if($this->is_wp_customizer()){
			$this->wp_customize->add_setting(
				$element['name'],
				array(
					'type' => 'theme_mod',
					'capability' => 'manage_options',
					'default' => $element['value'],
				)
			);
			ob_start();
			$this->wp_customize->add_control(
				$element['name'], 
				array(
					'type' => $element['type'],
					'section' => $element['section'], // Required, core or custom.
					'label' => $element['label'],
					'description' => isset($element['description']) ? $element['description'] : '',
					'input_attrs' => array(
						'class' => $element['class'],
					),
					'choices' => $element['options']
				)
			);
			//echo $this->render_dep_elements($element);
			$field = ob_get_clean();
		}else{

		}
		return $field;
	}
	public function render_select($element){
		if($this->is_wp_customizer()){
			$this->wp_customize->add_setting(
				$element['name'],
				array(
					'type' => 'theme_mod',
					'capability' => 'manage_options',
					'default' => $element['value'],
				)
			);
			ob_start();
			$this->wp_customize->add_control(
				$element['name'], 
				array(
					'type' => $element['type'],
					'section' => $element['section'], // Required, core or custom.
					'label' => $element['label'],
					'description' => isset($element['description']) ? $element['description'] : '',
					'input_attrs' => array(
						'class' => $element['class'],
					),
					'choices' => $element['options']
				)
			);
			$field = ob_get_clean();
		}else{

		}
		return $field;
	}
	public function render_dep_elements($element){
		if(!isset($element['sub_props']) || !$element || empty($element)){
			return null;
		}
		$output = [];
		foreach( $element['value'] as $key => $selected_value ){
			
			foreach( $element['sub_props'] as $sub_element ){
				$sub_element['name'] = sprintf($sub_element['name'], $selected_value );
				$sub_element['label'] = sprintf($sub_element['label'], ucfirst($selected_value ));
				$output[] = $this->render($sub_element);
				
			}
		}
		return $output;
	}
	public function render_multiple_checkbox($element){
		if($this->is_wp_customizer()){
			$this->wp_customize->add_setting(
				$element['name'],
				array(
					'type' => 'theme_mod',
					'capability' => 'manage_options',
					'default' => $element['value'],
					'transport' => 'refresh'
				)
			);

			// Add settings of dependent elements
			$this->add_dependant_settings($element);

			$this->wp_customize->selective_refresh->add_partial( $element['name'], array(
		        'selector' => '.site-title a',
		        'render_callback' => function() {
		            return true;
		        },
		    ) );
			ob_start();
			$this->wp_customize->add_control(
				new Sagani_Customize_Control_Checkbox_Multiple( 
					$this->wp_customize, 
					$element['name'],
					array(
						'section' => $element['section'], // Required, core or custom.
						'label' => $element['label'],
						'description' => isset($element['description']) ? $element['description'] : '',
						'input_attrs' => array(
							'class' => $element['class'],
						),
						'choices' => $element['options'],
						'sub_props' => isset($element['sub_props']) ? $element['sub_props'] : [],
						'value'  => $element['value'],
						'class'  => $element['class']
					)
				)
			);
			
			$field = ob_get_clean();
		}else{

		}
		return $field;
	}
	public function add_dependant_settings($element){
		$this->wp_customize->add_setting(
			'home_layouts_count_overlay',
			array(
				'type' => 'theme_mod',
				'capability' => 'manage_options',
				'default' => 'right',
			)
		);
		$parsed_options = isset($element['sub_props']) ? parse_options($element['sub_props'], $element['name'], true) : [];

		foreach( (array) $element['value'] as $value ){
			foreach( $parsed_options as $element ){
				$element['name'] = str_replace('#', $value, $element['name']);
				
				if( in_array($value, $element['can_appear_on'])){
					$this->wp_customize->add_setting(
						$element['name'],
						array(
							'type' => 'theme_mod',
							'capability' => 'manage_options',
							'default' => $element['value'],
						)
					);
				}
			}
		}
		

	}
}