<?php
/**
 * Customizer settings for this theme.
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

if ( ! class_exists( 'Edmonton_Customize' ) ) {
	/**
	 * CUSTOMIZER SETTINGS
	 */
	class Edmonton_Customize {

		/**
		 * Register customizer options.
		 */
		public static function register() {

			/**
			 * Header
			 */

			Kirki::add_panel( 'header', array(
				'title'          => esc_html__( 'Header', 'kirki' ),
				'priority'       => 90,
			) );

			Kirki::add_section( 'header_general', array(
				'title'          => esc_html__( 'My Section', 'kirki' ),
				'description'    => esc_html__( 'My section description.', 'kirki' ),
				'panel'          => 'header',
			) );

			Kirki::add_config( 'kirki_demo', array(
				'capability'    => 'edit_theme_options',
			) );

			Kirki::add_field( 'kirki_demo', array(
				'type'        => 'color',
				'settings'    => 'color_setting_hex',
				'label'       => __( 'Color Control (hex-only)', 'kirki' ),
				'description' => esc_html__( 'This is a color control', 'kirki' ),
				'section'     => 'header_general',
				'settings'    => 'kirki_demo',
				'default'     => '#0088CC',
				'transport'   => 'auto',
				'output' => array(
					array(
						'element'  => 'body',
						'property' => 'color',
					),
				),
			) );

			Kirki::add_config( 'my_theme', array(
				'capability'    => 'edit_theme_options',
			) );

			Kirki::add_field( 'my_theme', array(
				'type'      => 'color',
				'settings'  => 'title_text',
				'label'     => esc_attr__( 'Header title color', 'text-domain' ),
				'section'   => 'header_general',
				'settings'  => 'my_theme',
				'default'   => '#ffffff',
				'transport' => 'auto',
				'output' => array(
					array(
						'element' => '#site-header',
						'property' => 'background-color'
					)
				),
			));

		}
	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'init', array( 'Edmonton_Customize', 'register' ) );

}

/**
 * PARTIAL REFRESH FUNCTIONS
 * */
if ( ! function_exists( 'edmonton_customize_partial_blogname' ) ) {
	/**
	 * Render the site title for the selective refresh partial.
	 */
	function edmonton_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

if ( ! function_exists( 'edmonton_customize_partial_blogdescription' ) ) {
	/**
	 * Render the site description for the selective refresh partial.
	 */
	function edmonton_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}

if ( ! function_exists( 'edmonton_customize_partial_site_logo' ) ) {
	/**
	 * Render the site logo for the selective refresh partial.
	 *
	 * Doing it this way so we don't have issues with `render_callback`'s arguments.
	 */
	function edmonton_customize_partial_site_logo() {
		edmonton_site_logo();
	}
}


/**
 * Input attributes for cover overlay opacity option.
 *
 * @return array Array containing attribute names and their values.
 */
function edmonton_customize_opacity_range() {
	/**
	 * Filter the input attributes for opacity
	 *
	 * @param array $attrs {
	 *     The attributes
	 *
	 *     @type int $min Minimum value
	 *     @type int $max Maximum value
	 *     @type int $step Interval between numbers
	 * }
	 */
	return apply_filters(
		'edmonton_customize_opacity_range',
		array(
			'min'  => 0,
			'max'  => 90,
			'step' => 5,
		)
	);
}

function edmonton_customize_opacity_range_header_width() {
	/**
	 * Filter the input attributes for opacity
	 *
	 * @param array $attrs {
	 *     The attributes
	 *
	 *     @type int $min Minimum value
	 *     @type int $max Maximum value
	 *     @type int $step Interval between numbers
	 * }
	 */
	return apply_filters(
		'edmonton_customize_opacity_range',
		array(
			'min'  => 100,
			'max'  => 3000,
			'step' => 1,
		)
	);
}

