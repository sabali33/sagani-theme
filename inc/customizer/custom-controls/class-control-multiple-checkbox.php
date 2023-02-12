<?php
/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class Sagani_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'multiple_checkbox';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'swimghana-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'jquery' ), '20151215', true );
	}
	public function __construct($manager, $id, $args = []){
		parent::__construct($manager, $id, $args );
		if( isset($args['sub_props'])){
			$this->sub_props = $args['sub_props'];
		}
		if( isset($args['class'])){
			$this->class = $args['class'];
		}
		
	}
	/**
	 * Displays the control content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function render_content() {
		/*if ( empty( $this->choices ) )
			return; ?>

		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

		<?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		<ul>
			<?php foreach ( $this->choices as $value => $label ) : ?>

				<li>
					<label>
						<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> class="home-layout-item" />
						<?php echo esc_html( $label ); ?>
					</label>
				</li>

			<?php endforeach; ?>
		</ul>

		<input type="hidden" <?php $this->link(); ?>="" value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
	<?php */
	}
	public function content_template() {
        ?>
       
        <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
        <# } #>
        <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>
       
        
        <div class="customize-control-content">
        	
        	<ul>
	        	<# if(data.choices) { 
	        			console.log(data);
						for( var key in data.choices ){
							
							var current = !data.value ? false : data.value.split(',').find(function(style){ 
								return style == key ? true : false 
							});
							var found = current || false;
							var checked = found ? "checked " : '';
							
			        	#>
							<li>
								<label>
									<input type="checkbox" value="{{{ key }}}" {{ checked }} name="{{{ data.name }}}" class="home-layout-item {{ key }}" />
								   {{{ data.choices[key] }}}
								</label>
								<ul>
									<#
									if(data.sub_props){
										data.sub_props.forEach(function(sub_element){ 

											var fieldName = sub_element.name.replace('#', key );
											
											var sub_element_label = sub_element.label + ' for ' + key;
											var can_appear_on = sub_element.can_appear_on.find(function(item){
												return item == key ? true : false;
											});

											if(can_appear_on){
											var toggle = checked ? '' : 'disabled';
											var hide_parent = checked ? '' : "style=display:none";
										#>
												<li {{ hide_parent }}>
													<label for="{{ fieldName }}">
														{{ sub_element_label }}
														<input type="number" name="{{{ fieldName }}}" value="{{ sub_element.value}}" placeholder="{{ sub_element_label }}" class="sg-sub-element {{ key }}"  data-customize-setting-link="{{fieldName}}" {{ toggle }} id="{{ fieldName }}">

													</label>
												</li>
										<#
											}
										})
									}
									#>
								</ul>
							</li>
				        <# } #>
				    	<input type="hidden" name="{{{data.name}}}" value="{{ data.value}}" class="{{data.class}}" {{{ data.link }}}>
		        <# } #>
            </ul>
        </div>
       
        <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #> 

        <?php
    }
    public function to_json() {
	  parent::to_json();
	  //$this->json['sub_props'] = $this->sub_props;
	  $this->json['choices']  = $this->choices;
	  $this->json['value']  = $this->value();
	  $this->json['name']  = $this->id;
 	  $this->json['class']  = $this->class;
 	  $this->json['link']  = $this->get_link();
	}
	function active_callback() {
	  return is_front_page();
	}
}