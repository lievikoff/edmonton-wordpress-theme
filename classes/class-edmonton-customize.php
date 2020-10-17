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

			Kirki::add_panel(
				'header',
				[
					'title'          => esc_html__( 'Header', 'kirki' ),
					'priority'       => 90,
				]
			);

			/** Header General ------------------------------------------------------ */

			Kirki::add_section(
				'header_general',
				[
					'title'          => esc_html__( 'General', 'kirki' ),
					'panel'          => 'header',
				]
			);

			Kirki::add_config(
				'header_general_font',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_general_font',
				[
				'type'        => 'typography',
				'settings'    => 'header_general_font',
				'label'       => esc_html__( 'Font Style', 'kirki' ),
				'section'     => 'header_general',
				'default'     => [
					'font-family'    => 'Roboto',
					'variant'        => 'regular',
					'font-size'      => '16px',
					'color'          => '#ffffff',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.site-description',
					],
				],
			] );

			Kirki::add_config(
				'header_general_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_general_color',
				[
					'type'      => 'color',
					'settings'  => 'title_text',
					'label'     => esc_attr__( 'Header color', 'text-domain' ),
					'section'   => 'header_general',
					'settings'  => 'header_general_color',
					'default'   => '#202020',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '#site-header',
							'property' => 'background-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_general_border_bottom_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_general_border_bottom_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Bottom border color', 'text-domain' ),
					'section'   => 'header_general',
					'settings'  => 'header_general_border_bottom_color',
					'default'   => '#303030',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '#site-header',
							'property' => 'border-bottom-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_general_border_bottom_width',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_general_border_bottom_width',
				[
					'type'		=> 'slider',
					'label'		=> esc_attr__( 'Bottom border width', 'text-domain' ),
					'section'	=> 'header_general',
					'settings'  => 'header_general_border_bottom_width',
					'default'	=> 1,
					'transport'	=> 'auto',
					'output'	=> [
						[
							'element' => '#site-header',
							'property' => 'border-bottom-width',
							'suffix'  => 'px',
						],
					],
					'choices'	=> [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			Kirki::add_config(
				'header_logo_position',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'header_logo_position',
				[
					'type'      => 'radio-image',
					'label'     => esc_attr__( 'Layout', 'text-domain' ),
					'section'   => 'header_general',
					'settings'  => 'header_logo_position',
					'default'	=> 'center',
					'choices'   => [
						'left' => [
							'title' => esc_attr__( 'Logo Left' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M84.7214 28.5V57H42.371H0.0206504V28.5V-1.22935e-07H42.371H84.7214V28.5ZM0.867658 11.1537V21.463H42.371H83.8744V11.1537V0.844444H42.371H0.867658V11.1537ZM0.867658 39.0907V56.1556H42.371H83.8744V39.0907V22.0259H42.371H0.867658V39.0907Z" fill="#004BA4"/><path d="M23.8992 7.34667C24.0404 7.48037 24.238 7.76186 24.3368 7.98L24.5133 8.38111V11.407V14.44L24.3015 14.8833C24.1745 15.1437 23.991 15.397 23.8498 15.5096L23.6027 15.6926H15.655H7.70724L7.4602 15.5096C7.31903 15.397 7.13551 15.1437 7.00846 14.8833L6.79671 14.44V11.4V8.36L7.00846 7.91667C7.13551 7.6563 7.31903 7.40297 7.4602 7.29037L7.70724 7.10741H15.6691H23.638L23.8992 7.34667Z" fill="#004BA4"/><path d="M79.357 9.9926C79.4135 10.0207 79.5476 10.0841 79.6535 10.1193C79.9923 10.253 80.0981 10.5133 80.0981 11.1889C80.0981 11.7237 80.077 11.8152 79.9217 12.0193C79.8229 12.1389 79.6323 12.2726 79.4982 12.3148C79.3217 12.3711 72.3551 12.3852 55.6267 12.3711L31.9952 12.35L31.7693 12.1248C31.5505 11.8996 31.5435 11.8856 31.5435 11.2382C31.5364 10.4641 31.6211 10.253 32.0093 10.0559C32.2634 9.92223 32.7787 9.92223 55.7608 9.92926C68.6777 9.92926 79.3005 9.95741 79.357 9.9926Z" fill="#004BA4"/></svg>',
						],
						'center' => [
							'title' => esc_attr__( 'Logo Center' ),
							'path'	=> '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M84.7214 28.5V57H42.371H0.0206504V28.5V-1.22935e-07H42.371H84.7214V28.5ZM0.867658 11.1537V21.463H42.371H83.8744V11.1537V0.844444H42.371H0.867658V11.1537ZM0.867658 39.0907V56.1556H42.371H83.8744V39.0907V22.0259H42.371H0.867658V39.0907Z" fill="#004BA4"/><path d="M50.1025 4.23926C50.2436 4.37297 50.4413 4.65445 50.5401 4.8726L50.7166 5.27371V8.29963V11.3326L50.5048 11.7759C50.3777 12.0363 50.1942 12.2896 50.0531 12.4022L49.806 12.5852H41.8583H33.9105L33.6635 12.4022C33.5223 12.2896 33.3388 12.0363 33.2117 11.7759L33 11.3326V8.2926V5.2526L33.2117 4.80926C33.3388 4.54889 33.5223 4.29556 33.6635 4.18297L33.9105 4H41.8724H49.8413L50.1025 4.23926Z" fill="#004BA4"/><path d="M65.814 15.0657C65.8704 15.0939 66.0045 15.1572 66.1104 15.1924C66.4492 15.3261 66.5551 15.5865 66.5551 16.262C66.5551 16.7968 66.5339 16.8883 66.3786 17.0924C66.2798 17.212 66.0892 17.3457 65.9551 17.3879C65.7787 17.4442 58.812 17.4583 42.0836 17.4442L18.4521 17.4231L18.2263 17.1979C18.0075 16.9728 18.0004 16.9587 18.0004 16.3113C17.9933 15.5372 18.078 15.3261 18.4663 15.129C18.7204 14.9953 19.2356 14.9953 42.2177 15.0024C55.1346 15.0024 65.7575 15.0305 65.814 15.0657Z" fill="#004BA4"/></svg>',
						],
						'right' => [
							'title' => esc_attr__( 'Logo Right' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg" id="first-layout"><rect width="85" height="57" fill="none"/><path d="M0.278625 28.5V57H42.629H84.9793V28.5V-1.22935e-07H42.629H0.278625V28.5ZM84.1323 11.1537V21.463H42.629H1.12563V11.1537V0.844444H42.629H84.1323V11.1537ZM84.1323 39.0907V56.1556H42.629H1.12563V39.0907V22.0259H42.629H84.1323V39.0907Z" fill="#004BA4"/><path d="M61.1008 7.34667C60.9596 7.48037 60.762 7.76186 60.6632 7.98L60.4867 8.38111V11.407V14.44L60.6985 14.8833C60.8255 15.1437 61.009 15.397 61.1502 15.5096L61.3973 15.6926H69.345H77.2928L77.5398 15.5096C77.681 15.397 77.8645 15.1437 77.9915 14.8833L78.2033 14.44V11.4V8.36L77.9915 7.91667C77.8645 7.6563 77.681 7.40297 77.5398 7.29037L77.2928 7.10741H69.3309H61.362L61.1008 7.34667Z" fill="#004BA4"/><path d="M5.64299 9.9926C5.58652 10.0207 5.45241 10.0841 5.34653 10.1193C5.00773 10.253 4.90186 10.5133 4.90186 11.1889C4.90186 11.7237 4.92303 11.8152 5.07832 12.0193C5.17713 12.1389 5.36771 12.2726 5.50182 12.3148C5.67828 12.3711 12.6449 12.3852 29.3733 12.3711L53.0048 12.35L53.2307 12.1248C53.4495 11.8996 53.4565 11.8856 53.4565 11.2382C53.4636 10.4641 53.3789 10.253 52.9907 10.0559C52.7366 9.92223 52.2213 9.92223 29.2392 9.92926C16.3223 9.92926 5.69945 9.95741 5.64299 9.9926Z" fill="#004BA4"/></svg>',
						],
					],
				]
			);

			Kirki::add_config(
				'show_tagline',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'show_tagline',
				[
					'type'        => 'toggle',
					'settings'    => 'show_tagline',
					'label'       => esc_html__( 'Show site description', 'kirki' ),
					'section'     => 'header_general',
					'default'     => 'on',
					'priority'    => 10,
					'choices'     => [
						'on'  	=> esc_html__( '', 'kirki' ),
						'off' 	=> esc_html__( '', 'kirki' ),
					],
				]
			);

			Kirki::add_config(
				'custom_header_width',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'custom_header_width',
				[
					'type'        => 'slider',
					'settings'    => 'custom_header_width',
					'label'       => esc_html__( 'Custom header width', 'kirki' ),
					'description' => esc_html__( 'Header, menu and search line will be take up as much width as you specity (px). If you have problems settings the width, check if it is checked in the Content->General->Full width. If it`s checked — remove.', 'kirki' ),
					'section'     => 'header_general',
					'default'     => 1110,
					'choices'     => [
						'min'  => 1030,
						'max'  => 1700,
						'step' => 1,
					],
				]
			);

			Kirki::add_config(
				'header_width_full',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'header_width_full',
				[
					'type'        => 'checkbox',
					'settings'    => 'header_width_full',
					'label'       => esc_html__( 'Full width', 'kirki' ),
					'description' => esc_html__( 'Header, menu and search line will be take up the entire of the content.', 'kirki' ),
					'section'     => 'header_general',
					'default'     => false,
				]
			);

			/** Header Navigation --------------------------------------------------------------------- */
			Kirki::add_section(
				'header_navigation',
				[
					'title'          => esc_html__( 'Navigation', 'kirki' ),
					'panel'          => 'header',
				]
			);

			Kirki::add_config(
				'header_navigation_font',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_font',
				[
					'type'        => 'typography',
					'settings'    => 'header_navigation_font',
					'label'       => esc_html__( 'Font Style', 'kirki' ),
					'section'     => 'header_navigation',
					'default'     => [
						'font-family'    => 'Roboto',
						'variant'        => 'regular',
						'font-size'      => '14px',
						'color'          => '#ffffff',
					],
					'transport'   => 'auto',
					'output'      => [
						[
							'element' => '.primary-menu li',
						],
						[
							'element' => '.primary-menu li a, .primary-menu .icon',
							'suffix'  => '!important',
						],
					],
				]
			);

			Kirki::add_config(
				'header_navigation_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_color',
				[
					'type'      => 'color',
					'settings'  => 'title_text',
					'label'     => esc_attr__( 'Navigation color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_color',
					'default'   => '#202020',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.primary-menu-wrapper',
							'property' => 'background-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_navigation_border_top_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_border_top_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Border top color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_top_color',
					'default'   => '#000000',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'nav.primary-menu-wrapper',
							'property' => 'border-top-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_navigation_border_top_width',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_border_top_width',
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Border top width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_top_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'nav.primary-menu-wrapper',
							'property' => 'border-top-width',
							'suffix'  => 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					],
				]
			);

			Kirki::add_config(
				'header_navigation_border_bottom_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_border_bottom_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Border bottom color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_bottom_color',
					'default'   => '#000000',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => 'nav.primary-menu-wrapper',
							'property' => 'border-bottom-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_navigation_border_bottom_width',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_border_bottom_width',
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Border bottom width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_border_bottom_width',
					'default'	=> 0,
					'transport' => 'auto',
					'output'    => [
						[
							'element'	=> 'nav.primary-menu-wrapper',
							'property'	=> 'border-bottom-width',
							'suffix' 	=> 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					],
				]
			);

			Kirki::add_config(
				'header_navigation_left_side_separator_color',
				[
					'capability'	=> 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_left_side_separator_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Left side of separator color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_left_side_separator_color',
					'default'   => '#303030',
					'transport' => 'auto',
					'output'    => [
						[
							'element'	=> 'ul.primary-menu > li:not(:last-child)',
							'property'	=> 'border-right-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_navigation_left_side_separator_width',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_left_side_separator_width',
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Left side of separator width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_left_side_separator_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' 	=> 'ul.primary-menu > li:not(:last-child)',
							'property'  => 'border-right-width',
							'suffix'    => 'px',
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			Kirki::add_config(
				'header_navigation_right_side_separator_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_right_side_separator_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Right side of separator color', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_right_side_separator_color',
					'default'   => '#101010',
					'transport' => 'auto',
					'output'    => [
						[
							'element' 			=> 'ul.primary-menu > li:not(:last-child)',
							'property' 			=> 'box-shadow',
							'value_pattern'		=> 'border_widthpx 0 0 0 $',
							'pattern_replace'	=> array(
								'border_width'    => 'header_navigation_right_side_separator_width',
							),
						],
					],
				]
			);

			Kirki::add_config(
				'header_navigation_right_side_separator_width',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_navigation_right_side_separator_width',
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Right side of separator width', 'text-domain' ),
					'section'   => 'header_navigation',
					'settings'  => 'header_navigation_right_side_separator_width',
					'default'     => 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' 			=> 'ul.primary-menu > li:not(:last-child)',
							'property' 			=> 'box-shadow',
							'value_pattern'		=> '$px 0 0 0 border_color',
							'pattern_replace'	=> array(
								'border_color'    => 'header_navigation_right_side_separator_color',
							),
						],
					],
					'choices'     => [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			/** Header Bar ----------------------------------------------------------------- */

			Kirki::add_section(
				'header_bar',
				[
					'title'          => esc_html__( 'Bar', 'kirki' ),
					'panel'          => 'header',
				]
			);

			Kirki::add_config(
				'header_bar_font',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_bar_font',
				[
					'type'        => 'typography',
					'settings'    => 'header_bar_font',
					'label'       => esc_html__( 'Font Style', 'kirki' ),
					'section'     => 'header_bar',
					'default'     => [
						'font-family'    => 'Roboto',
						'variant'        => 'regular',
						'font-size'      => '14px',
						'color'          => '#8492A6',
					],
					'priority'    => 10,
					'transport'   => 'auto',
					'output'      => [
						[
							'element' => '.alt-navigation-search input',
						],
					],
				]
			);

			Kirki::add_config(
				'header_bar_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_bar_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Bar color', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_color',
					'default'   => '#ffffff',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper',
							'property' => 'background-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_bar_border_bottom_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_bar_border_bottom_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Border bottom color', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_border_bottom_color',
					'default'   => '#E5E5E5',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper',
							'property' => 'border-bottom-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_bar_border_bottom_width',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_bar_border_bottom_width',
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Border bottom width', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_border_bottom_width',
					'default'	=> 2,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper',
							'property' => 'border-bottom-width',
							'suffix'  => 'px',
						],
					],
					'choices'	=> [
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					],
				]
			);

			Kirki::add_config(
				'header_bar_separator_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_bar_separator_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Separator color', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_separator_color',
					'default'   => '#f8f8f8',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper .alt-navigation-social-media .social-media, .menu-bottom .social-media, .alt-navigation-wrapper .breadcrumbs-wrapper',
							'property' => 'border-color'
						],
					],
				]
			);

			Kirki::add_config(
				'header_bar_separator_width',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_bar_separator_width',
				[
					'type'      => 'slider',
					'label'     => esc_attr__( 'Separator width', 'text-domain' ),
					'section'   => 'header_bar',
					'settings'  => 'header_bar_separator_width',
					'default'	=> 1,
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.alt-navigation-wrapper .alt-navigation-social-media .social-media, .menu-bottom .social-media',
							'property' => 'border-left-width',
							'suffix'  => 'px',
						],
					],
					'choices'	=> [
						'min'  => 0,
						'max'  => 5,
						'step' => 1,
					],
				]
			);

			/** Header Cover ----------------------------------------- */

			Kirki::add_section(
				'header_cover',
				[
					'title'          => esc_html__( 'Cover', 'kirki' ),
					'panel'          => 'header',
				]
			);

			Kirki::add_config(
				'cover_enable',
				[
					'capability'    => 'edit_theme_options',
					'transport'		=> 'postMessage',
				]
			);

			Kirki::add_field(
				'cover_enable',
				[
					'type'        => 'checkbox',
					'settings'    => 'cover_enable',
					'label'       => esc_html__( 'Cover Enable', 'kirki' ),
					'section'     => 'header_cover',
					'default'     => false,
				]
			);

			Kirki::add_config(
				'cover_image',
				[
					'capability'    => 'edit_theme_options',
					'transport'		=> 'postMessage',
				]
			);

			Kirki::add_field(
				'cover_image',
				[
					'type'        => 'image',
					'settings'    => 'cover_image',
					'label'       => esc_html__( 'Cover Image', 'kirki' ),
					'section'     => 'header_cover',
					'default'     => false,
				]
			);

			Kirki::add_config(
				'cover_color',
				[
					'capability'    => 'edit_theme_options',
					'transport'		=> 'postMessage',
				]
			);

			Kirki::add_field(
				'cover_color',
				[
					'type'        => 'color',
					'settings'    => 'cover_color',
					'settings'	  => 'color_setting_url',
					'section'     => 'header_cover',
					'priority'    => 10,
					'label'       => esc_html__( 'Cover Color', 'kirki' ),
					'description' => esc_html__( 'Before choosing a color remove image', 'kirki' ),
				]
			);

			Kirki::add_config(
				'cover_opacity',
				[
					'capability'    => 'edit_theme_options',
					'transport'		=> 'postMessage',
				]
			);

			Kirki::add_field( 'cover_opacity', [
				'type'        => 'slider',
				'settings'    => 'cover_opacity',
				'label'       => esc_html__( 'Opacity', 'kirki' ),
				'section'     => 'header_cover',
				'default'     => 0.7,
				'choices'     => [
					'min'  => 0,
					'max'  => 1,
					'step' => 0.01,
				],
				'output'    => [
						[
							'element' => '.cover',
							'property' => 'opacity',
						],
					],
			] );

			/**
			 * Footer
			 */
/*
			Kirki::add_panel(
				'footer',
				[
					'title'      => esc_html__( 'Footer', 'kirki' ),
					'priority'   => 70,
				]
			);
*/
			/* Footer general ---------------------------------------------------- */

			Kirki::add_section(
				'footer_general',
				[
					'title'      => esc_html__( 'Footer', 'kirki' ),
					'priority'   => 91,
					//'panel'      => 'footer',
					'capability' => 'edit_theme_options',
				]
			);

			Kirki::add_config(
				'footer_text',
				[
					'capability'	=> 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'footer_text',
				[
					'type'     	=> 'textarea',
					'settings' 	=> 'footer_text',
					'label'    	=> esc_html__( 'Footer text', 'kirki' ),
					'section'  	=> 'footer_general',
					'transport' => 'postMessage',
					'priority' 	=> 10,
					'js_vars'   => [
						[
							'element'  => '.footer-user-text',
							'function' => 'html',
						],
					]
				]
			);

			/**
			 * Social Media
			 */

			Kirki::add_panel(
				'social_media',
				[
					'title'      => esc_html__( 'Social Media', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
				]
			);

			/* Icon display setting ----------------------------------------------- */

			Kirki::add_section(
				'display_setting',
				[
					'title'      => esc_html__( 'Display setting', 'kirki' ),
					'priority'   => 40,
					'panel'      => 'social_media',
					'icon'		 => 'dashicons-admin-generic',
				]
			);


			Kirki::add_config(
				'social_header_enable',
				[
					'capability'        => 'edit_theme_options',
					'default'           => true,
				]
			);

			Kirki::add_field(
				'social_header_enable',
				[
					'type'        => 'checkbox',
					'settings'    => 'social_header_enable',
					'section'  	  => 'display_setting',
					'priority' 	  => 10,
					'label'    	  => esc_html__( 'Display social in header', 'kirki' ),
				]
			);

			Kirki::add_config(
				'social_mobile_menu_enable',
				[
					'capability'        => 'edit_theme_options',
					'default'           => true,
				]
			);

			Kirki::add_field(
				'social_mobile_menu_enable',
				[
					'type'        => 'checkbox',
					'settings'    => 'social_mobile_menu_enable',
					'section'  	  => 'display_setting',
					'priority' 	  => 10,
					'label'    	  => esc_html__( 'Display social in mobile menu', 'kirki' ),
				]
			);


			Kirki::add_config(
				'show_icon_background',
				[
					'capability'	=> 'edit_theme_options',
					'default'		=> false,
					'transport'		=> 'refresh',
				]
			);

			Kirki::add_field(
				'show_icon_background',
				[
					'type'        => 'checkbox',
					'settings'    => 'checkbox_setting',
					'settings'    => 'show_icon_background',
					'section'  	  => 'display_setting',
					'priority' 	  => 10,
					'label'    	  => esc_html__( 'Show icon background', 'kirki' ),
				]
			);

			Kirki::add_config(
				'color_icon_background',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'postMessage',
				]
			);

			Kirki::add_field(
				'color_icon_background',
				[
					'type'        => 'color',
					'settings'    => 'color_icon_background',
					'section'     => 'display_setting',
					'priority'    => 10,
					'label'       => esc_html__( 'Icon background color', 'kirki' ),
				]
			);

			Kirki::add_config(
				'color_icon',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'postMessage',
				]
			);

			Kirki::add_field(
				'color_icon',
				[
					'type'        => 'color',
					'settings'    => 'color_icon',
					'section'  => 'display_setting',
					'priority' => 10,
					'label'    => esc_html__( 'Icon color', 'kirki' ),
				]
			);

			Kirki::add_config(
				'border_radius_social_icon_background',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'auto',
				]
			);

			Kirki::add_field(
				'border_radius_social_icon_background',
				[
					'type'	   => 'slider',
					'settings' => 'slider_setting',
					'settings' => 'border_radius_social_icon_background',
					'label'    => esc_html__( 'Border-radius of social media icon', 'kirki' ),
					'section'  => 'display_setting',
					'default'  => 6,
					'choices'  => [
						'min'	=> 1,
						'max'	=> 25,
						'step'	=> 1,
					],
					'output'   => [
						[
							'element'	=> '.alt-navigation-social-media a',
							'property'	=> 'border-radius',
							'suffix'    => 'px',
						],
					],
				]
			);

			Kirki::add_config(
				'href_target',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'auto',
				]
			);

			Kirki::add_field(
				'href_target',
				[
					'type'	   => 'toggle',
					'settings' => 'toggle_setting',
					'settings' => 'href_target',
					'section'  => 'display_setting',
					'priority' => 10,
					'label'    => esc_html__( 'Open link in new tab', 'kirki' ),
				]
			);

			Kirki::add_config(
				'separator_social_text',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'auto',
				]
			);

			Kirki::add_field( 'separator_social_text', [
				'type'        => 'custom',
				'settings'    => 'separator_social_text',
				'section'     => 'display_setting',
				'default'     => '<h3 class="customize-control-title" style="padding:15px 10px; background:#fff; margin:0;">' . __( 'In footer', 'kirki' ) . '</h3>',
				'priority'    => 10,
			] );


			Kirki::add_config(
				'social_footer_enable',
				[
					'capability'        => 'edit_theme_options',
					'default'           => false,
				]
			);

			Kirki::add_field(
				'social_footer_enable',
				[
					'type'        => 'checkbox',
					'settings'    => 'social_footer_enable',
					'section'  	  => 'display_setting',
					'priority' 	  => 10,
					'label'    	  => esc_html__( 'Display social in footer', 'kirki' ),
				]
			);

			Kirki::add_config(
				'color_icon_footer',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'auto',
				]
			);

			Kirki::add_field(
				'color_icon_footer',
				[
					'type'		=> 'color',
					'settings'	=> 'color_icon_footer',
					'section'	=> 'display_setting',
					'default'	=> '#e5e5e5',
					'priority'	=> 10,
					'label'		=> esc_html__( 'Icon color (footer)', 'kirki' ),
					'output'	=> array(
						array(
							'element'	=> '.footer-top .social-media-block img',
							'property'	=> 'color',
						),
						array(
							'element'	=> '.footer-top .social-media-block svg',
							'property'	=> 'fill',
						),
					),
				]
			);


			Kirki::add_config(
				'position_social_footer',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'position_social_footer',
				[
					'type'      => 'radio-image',
					'label'     => esc_attr__( 'Position', 'text-domain' ),
					'section'   => 'display_setting',
					'settings'  => 'position_social_footer',
					'default'	=> 'flex-start',
					'priority'  => 10,
					'choices'   => [
						'flex-start' => [
							'title' => esc_attr__( 'Left' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" fill="none"/><path d="M0 28.5V57H42.5H85V28.5V-1.22935e-07H42.5H0V28.5ZM84.2067 7.01593L84.1854 13.2648H42.5H0.814583L0.793333 7.01593L0.772083 0.774074H42.5H84.2279L84.2067 7.01593ZM84.1783 13.9193C84.1996 13.9544 84.1925 20.2878 84.1713 27.9933L84.1288 42.0111H42.5H0.87125L0.82875 27.9933C0.8075 20.2878 0.800417 13.9544 0.821667 13.9193C0.87125 13.8419 84.1288 13.8419 84.1783 13.9193ZM84.15 49.3648V56.1556H42.5H0.85V49.3648V42.5741H42.5H84.15V49.3648Z" fill="#0000FF"/><path d="M36.0258 5.42559C36.0683 5.49596 35.8417 5.56633 35.7567 5.51003C35.7071 5.48188 35.7 5.50299 35.7354 5.55929C35.7779 5.62966 35.7637 5.64373 35.6858 5.60855C35.5512 5.55929 35.275 5.83373 35.3317 5.97447C35.3529 6.03781 35.3317 6.05188 35.275 6.0167C35.2183 5.98151 35.1971 5.98855 35.2254 6.03781C35.2821 6.12225 35.2112 6.34744 35.1404 6.30522C35.1192 6.29114 35.0979 6.49522 35.0979 6.75559C35.0979 7.01596 35.1192 7.22003 35.1404 7.20596C35.2112 7.16373 35.2821 7.38892 35.2254 7.47336C35.1971 7.52262 35.2183 7.52966 35.275 7.49447C35.3458 7.45225 35.36 7.46633 35.3246 7.54373C35.275 7.67744 35.5512 7.95188 35.6929 7.89559C35.7567 7.87447 35.7708 7.89559 35.7354 7.95188C35.7 8.00818 35.7071 8.02929 35.7567 8.00114C35.8417 7.94484 36.0683 8.01522 36.0258 8.08559C36.0117 8.1067 36.2171 8.12781 36.4792 8.12781C36.7412 8.12781 36.9467 8.1067 36.9325 8.08559C36.89 8.01522 37.1167 7.94484 37.2017 8.00114C37.2512 8.02929 37.2583 8.00818 37.2229 7.95188C37.1875 7.89559 37.2017 7.87447 37.2654 7.89559C37.4071 7.95188 37.6833 7.67744 37.6337 7.54373C37.5983 7.46633 37.6125 7.45225 37.6833 7.49447C37.74 7.52966 37.7612 7.52262 37.7329 7.47336C37.6762 7.38892 37.7471 7.16373 37.8179 7.20596C37.8392 7.22003 37.8604 7.01596 37.8604 6.75559C37.8604 6.49522 37.8392 6.29114 37.8179 6.30522C37.7471 6.34744 37.6762 6.12225 37.7329 6.03781C37.7612 5.98855 37.74 5.98151 37.6833 6.0167C37.6125 6.05892 37.5983 6.04484 37.6337 5.96744C37.6833 5.83373 37.4071 5.55929 37.2654 5.61559C37.2017 5.6367 37.1875 5.61559 37.2229 5.55929C37.2583 5.50299 37.2512 5.48188 37.2017 5.51003C37.1167 5.56633 36.89 5.49596 36.9325 5.42559C36.9467 5.40447 36.7412 5.38336 36.4792 5.38336C36.2171 5.38336 36.0117 5.40447 36.0258 5.42559Z" fill="#4D82C1"/><path d="M41.728 5.53813C41.303 5.79146 41.1259 6.1222 41.1117 6.72035C41.0905 7.65628 41.5934 8.15591 42.5355 8.13479C43.1234 8.12072 43.4634 7.95183 43.7184 7.54368C43.9521 7.16368 43.9592 6.41072 43.7326 6.00257C43.4776 5.56628 43.1517 5.39035 42.5213 5.38331C42.0963 5.37628 41.9546 5.39739 41.728 5.53813Z" fill="#4D82C1"/><path d="M47.9683 5.40445C47.9187 5.41852 47.8974 5.45371 47.9187 5.48889C47.9399 5.51704 47.9045 5.5663 47.8408 5.58741C47.7699 5.61556 47.7487 5.60149 47.777 5.53815C47.8053 5.49593 47.7628 5.53112 47.6849 5.6226C47.6141 5.71408 47.4724 5.85482 47.3803 5.92519C47.2883 6.0026 47.2528 6.04482 47.2953 6.01667C47.3591 5.98852 47.3733 6.00963 47.3449 6.08C47.3237 6.14334 47.2741 6.17149 47.2387 6.15038C47.1678 6.10815 47.1608 6.14334 47.1395 6.72038C47.1253 7.19889 47.1608 7.41 47.2458 7.35371C47.2741 7.3326 47.3237 7.36778 47.3449 7.43112C47.3733 7.50149 47.3591 7.5226 47.2953 7.49445C47.2528 7.4663 47.2883 7.50852 47.3803 7.58593C47.4724 7.6563 47.6141 7.79704 47.6849 7.88852C47.7628 7.98 47.8053 8.01519 47.777 7.97297C47.7487 7.90963 47.7699 7.89556 47.8408 7.92371C47.9045 7.94482 47.9328 7.99408 47.9116 8.02926C47.8691 8.09963 47.9045 8.10667 48.4853 8.12778C48.967 8.14186 49.1795 8.10667 49.1228 8.02223C49.1016 7.99408 49.137 7.94482 49.2008 7.92371C49.2716 7.89556 49.2928 7.90963 49.2645 7.97297C49.2362 8.01519 49.2787 7.98 49.3566 7.88852C49.4274 7.79704 49.5691 7.6563 49.6612 7.58593C49.7533 7.50852 49.7887 7.4663 49.7462 7.49445C49.6824 7.5226 49.6683 7.50149 49.6966 7.43112C49.7178 7.36778 49.7674 7.33963 49.8028 7.36075C49.8737 7.40297 49.8808 7.36778 49.902 6.79075C49.9162 6.31223 49.8808 6.10112 49.7958 6.15741C49.7674 6.17852 49.7178 6.14334 49.6966 6.08C49.6683 6.00963 49.6824 5.98852 49.7462 6.01667C49.7887 6.04482 49.7533 6.0026 49.6612 5.92519C49.5691 5.85482 49.4274 5.71408 49.3566 5.6226C49.2787 5.53112 49.2362 5.49593 49.2645 5.53815C49.2928 5.60149 49.2716 5.61556 49.2008 5.58741C49.137 5.5663 49.1087 5.51704 49.1299 5.48186C49.1512 5.44667 49.1441 5.41149 49.1087 5.41149C48.9316 5.38334 48.0391 5.3763 47.9683 5.40445Z" fill="#4D82C1"/><path d="M11.2342 24.883L11.05 25.073V27.937V30.8011L11.2342 30.9911L11.4255 31.1741H19.0188H26.6121L26.8034 30.9911L26.9875 30.8011V27.937V25.073L26.8034 24.883L26.6121 24.7H19.0188H11.4255L11.2342 24.883Z" fill="#0000FF"/><path d="M36.0258 47.7885C36.0683 47.8589 35.8417 47.9292 35.7567 47.8729C35.7071 47.8448 35.7 47.8659 35.7354 47.9222C35.7779 47.9926 35.7637 48.0066 35.6858 47.9715C35.5512 47.9222 35.275 48.1966 35.3317 48.3374C35.3529 48.4007 35.3317 48.4148 35.275 48.3796C35.2183 48.3444 35.1971 48.3515 35.2254 48.4007C35.2821 48.4852 35.2112 48.7104 35.1404 48.6681C35.1192 48.6541 35.0979 48.8581 35.0979 49.1185C35.0979 49.3789 35.1192 49.5829 35.1404 49.5689C35.2112 49.5266 35.2821 49.7518 35.2254 49.8363C35.1971 49.8855 35.2183 49.8926 35.275 49.8574C35.3458 49.8152 35.36 49.8292 35.3246 49.9066C35.275 50.0404 35.5512 50.3148 35.6929 50.2585C35.7567 50.2374 35.7708 50.2585 35.7354 50.3148C35.7 50.3711 35.7071 50.3922 35.7567 50.3641C35.8417 50.3078 36.0683 50.3781 36.0258 50.4485C36.0117 50.4696 36.2171 50.4907 36.4792 50.4907C36.7412 50.4907 36.9467 50.4696 36.9325 50.4485C36.89 50.3781 37.1167 50.3078 37.2017 50.3641C37.2512 50.3922 37.2583 50.3711 37.2229 50.3148C37.1875 50.2585 37.2017 50.2374 37.2654 50.2585C37.4071 50.3148 37.6833 50.0404 37.6337 49.9066C37.5983 49.8292 37.6125 49.8152 37.6833 49.8574C37.74 49.8926 37.7612 49.8855 37.7329 49.8363C37.6762 49.7518 37.7471 49.5266 37.8179 49.5689C37.8392 49.5829 37.8604 49.3789 37.8604 49.1185C37.8604 48.8581 37.8392 48.6541 37.8179 48.6681C37.7471 48.7104 37.6762 48.4852 37.7329 48.4007C37.7612 48.3515 37.74 48.3444 37.6833 48.3796C37.6125 48.4218 37.5983 48.4078 37.6337 48.3304C37.6833 48.1966 37.4071 47.9222 37.2654 47.9785C37.2017 47.9996 37.1875 47.9785 37.2229 47.9222C37.2583 47.8659 37.2512 47.8448 37.2017 47.8729C37.1167 47.9292 36.89 47.8589 36.9325 47.7885C36.9467 47.7674 36.7412 47.7463 36.4792 47.7463C36.2171 47.7463 36.0117 47.7674 36.0258 47.7885Z" fill="#4D82C1"/><path d="M41.728 47.9011C41.303 48.1544 41.1259 48.4852 41.1117 49.0833C41.0905 50.0193 41.5934 50.5189 42.5355 50.4978C43.4351 50.4767 43.8671 50.0474 43.8884 49.1537C43.8955 48.5626 43.7113 48.1685 43.3005 47.9152C42.918 47.6759 42.1176 47.6689 41.728 47.9011Z" fill="#4D82C1"/><path d="M47.9683 47.7674C47.9187 47.7815 47.8974 47.8167 47.9187 47.8519C47.9399 47.88 47.9045 47.9293 47.8408 47.9504C47.7699 47.9785 47.7487 47.9645 47.777 47.9011C47.8053 47.8589 47.7628 47.8941 47.6849 47.9856C47.6141 48.0771 47.4724 48.2178 47.3803 48.2882C47.2883 48.3656 47.2528 48.4078 47.2953 48.3796C47.3591 48.3515 47.3733 48.3726 47.3449 48.443C47.3237 48.5063 47.2741 48.5345 47.2387 48.5134C47.1678 48.4711 47.1608 48.5063 47.1395 49.0834C47.1253 49.5619 47.1608 49.773 47.2458 49.7167C47.2741 49.6956 47.3237 49.7308 47.3449 49.7941C47.3733 49.8645 47.3591 49.8856 47.2953 49.8574C47.2528 49.8293 47.2883 49.8715 47.3803 49.9489C47.4724 50.0193 47.6141 50.16 47.6849 50.2515C47.7628 50.343 47.8053 50.3782 47.777 50.3359C47.7487 50.2726 47.7699 50.2585 47.8408 50.2867C47.9045 50.3078 47.9328 50.3571 47.9116 50.3922C47.8691 50.4626 47.9045 50.4696 48.4853 50.4908C48.967 50.5048 49.1795 50.4696 49.1228 50.3852C49.1016 50.3571 49.137 50.3078 49.2008 50.2867C49.2716 50.2585 49.2928 50.2726 49.2645 50.3359C49.2362 50.3782 49.2787 50.343 49.3566 50.2515C49.4274 50.16 49.5691 50.0193 49.6612 49.9489C49.7533 49.8715 49.7887 49.8293 49.7462 49.8574C49.6824 49.8856 49.6683 49.8645 49.6966 49.7941C49.7178 49.7308 49.7674 49.7026 49.8028 49.7237C49.8737 49.7659 49.8808 49.7308 49.902 49.1537C49.9162 48.6752 49.8808 48.4641 49.7958 48.5204C49.7674 48.5415 49.7178 48.5063 49.6966 48.443C49.6683 48.3726 49.6824 48.3515 49.7462 48.3796C49.7887 48.4078 49.7533 48.3656 49.6612 48.2882C49.5691 48.2178 49.4274 48.0771 49.3566 47.9856C49.2787 47.8941 49.2362 47.8589 49.2645 47.9011C49.2928 47.9645 49.2716 47.9785 49.2008 47.9504C49.137 47.9293 49.1087 47.88 49.1299 47.8448C49.1512 47.8096 49.1441 47.7745 49.1087 47.7745C48.9316 47.7463 48.0391 47.7393 47.9683 47.7674Z" fill="#4D82C1"/></svg>',
						],
						'center' => [
							'title' => esc_attr__( 'Center' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" fill="none"/><path d="M0 28.5V57H42.5H85V28.5V-1.22935e-07H42.5H0V28.5ZM84.2067 7.01593L84.1854 13.2648H42.5H0.814583L0.793333 7.01593L0.772083 0.774074H42.5H84.2279L84.2067 7.01593ZM84.1783 13.9193C84.1996 13.9544 84.1925 20.2878 84.1713 27.9933L84.1288 42.0111H42.5H0.87125L0.82875 27.9933C0.8075 20.2878 0.800417 13.9544 0.821667 13.9193C0.87125 13.8419 84.1288 13.8419 84.1783 13.9193ZM84.15 49.3648V56.1556H42.5H0.85V49.3648V42.5741H42.5H84.15V49.3648Z" fill="#0000FF"/><path d="M36.0258 5.42559C36.0683 5.49596 35.8417 5.56633 35.7567 5.51003C35.7071 5.48188 35.7 5.50299 35.7354 5.55929C35.7779 5.62966 35.7637 5.64373 35.6858 5.60855C35.5512 5.55929 35.275 5.83373 35.3317 5.97447C35.3529 6.03781 35.3317 6.05188 35.275 6.0167C35.2183 5.98151 35.1971 5.98855 35.2254 6.03781C35.2821 6.12225 35.2112 6.34744 35.1404 6.30522C35.1192 6.29114 35.0979 6.49522 35.0979 6.75559C35.0979 7.01596 35.1192 7.22003 35.1404 7.20596C35.2112 7.16373 35.2821 7.38892 35.2254 7.47336C35.1971 7.52262 35.2183 7.52966 35.275 7.49447C35.3458 7.45225 35.36 7.46633 35.3246 7.54373C35.275 7.67744 35.5512 7.95188 35.6929 7.89559C35.7567 7.87447 35.7708 7.89559 35.7354 7.95188C35.7 8.00818 35.7071 8.02929 35.7567 8.00114C35.8417 7.94484 36.0683 8.01522 36.0258 8.08559C36.0117 8.1067 36.2171 8.12781 36.4792 8.12781C36.7412 8.12781 36.9467 8.1067 36.9325 8.08559C36.89 8.01522 37.1167 7.94484 37.2017 8.00114C37.2512 8.02929 37.2583 8.00818 37.2229 7.95188C37.1875 7.89559 37.2017 7.87447 37.2654 7.89559C37.4071 7.95188 37.6833 7.67744 37.6337 7.54373C37.5983 7.46633 37.6125 7.45225 37.6833 7.49447C37.74 7.52966 37.7612 7.52262 37.7329 7.47336C37.6762 7.38892 37.7471 7.16373 37.8179 7.20596C37.8392 7.22003 37.8604 7.01596 37.8604 6.75559C37.8604 6.49522 37.8392 6.29114 37.8179 6.30522C37.7471 6.34744 37.6762 6.12225 37.7329 6.03781C37.7612 5.98855 37.74 5.98151 37.6833 6.0167C37.6125 6.05892 37.5983 6.04484 37.6337 5.96744C37.6833 5.83373 37.4071 5.55929 37.2654 5.61559C37.2017 5.6367 37.1875 5.61559 37.2229 5.55929C37.2583 5.50299 37.2512 5.48188 37.2017 5.51003C37.1167 5.56633 36.89 5.49596 36.9325 5.42559C36.9467 5.40447 36.7412 5.38336 36.4792 5.38336C36.2171 5.38336 36.0117 5.40447 36.0258 5.42559Z" fill="#4D82C1"/><path d="M41.728 5.53813C41.303 5.79146 41.1259 6.1222 41.1117 6.72035C41.0905 7.65628 41.5934 8.15591 42.5355 8.13479C43.1234 8.12072 43.4634 7.95183 43.7184 7.54368C43.9521 7.16368 43.9592 6.41072 43.7326 6.00257C43.4776 5.56628 43.1517 5.39035 42.5213 5.38331C42.0963 5.37628 41.9546 5.39739 41.728 5.53813Z" fill="#4D82C1"/><path d="M47.9683 5.40445C47.9187 5.41852 47.8974 5.45371 47.9187 5.48889C47.9399 5.51704 47.9045 5.5663 47.8408 5.58741C47.7699 5.61556 47.7487 5.60149 47.777 5.53815C47.8053 5.49593 47.7628 5.53112 47.6849 5.6226C47.6141 5.71408 47.4724 5.85482 47.3803 5.92519C47.2883 6.0026 47.2528 6.04482 47.2953 6.01667C47.3591 5.98852 47.3733 6.00963 47.3449 6.08C47.3237 6.14334 47.2741 6.17149 47.2387 6.15038C47.1678 6.10815 47.1608 6.14334 47.1395 6.72038C47.1253 7.19889 47.1608 7.41 47.2458 7.35371C47.2741 7.3326 47.3237 7.36778 47.3449 7.43112C47.3733 7.50149 47.3591 7.5226 47.2953 7.49445C47.2528 7.4663 47.2883 7.50852 47.3803 7.58593C47.4724 7.6563 47.6141 7.79704 47.6849 7.88852C47.7628 7.98 47.8053 8.01519 47.777 7.97297C47.7487 7.90963 47.7699 7.89556 47.8408 7.92371C47.9045 7.94482 47.9328 7.99408 47.9116 8.02926C47.8691 8.09963 47.9045 8.10667 48.4853 8.12778C48.967 8.14186 49.1795 8.10667 49.1228 8.02223C49.1016 7.99408 49.137 7.94482 49.2008 7.92371C49.2716 7.89556 49.2928 7.90963 49.2645 7.97297C49.2362 8.01519 49.2787 7.98 49.3566 7.88852C49.4274 7.79704 49.5691 7.6563 49.6612 7.58593C49.7533 7.50852 49.7887 7.4663 49.7462 7.49445C49.6824 7.5226 49.6683 7.50149 49.6966 7.43112C49.7178 7.36778 49.7674 7.33963 49.8028 7.36075C49.8737 7.40297 49.8808 7.36778 49.902 6.79075C49.9162 6.31223 49.8808 6.10112 49.7958 6.15741C49.7674 6.17852 49.7178 6.14334 49.6966 6.08C49.6683 6.00963 49.6824 5.98852 49.7462 6.01667C49.7887 6.04482 49.7533 6.0026 49.6612 5.92519C49.5691 5.85482 49.4274 5.71408 49.3566 5.6226C49.2787 5.53112 49.2362 5.49593 49.2645 5.53815C49.2928 5.60149 49.2716 5.61556 49.2008 5.58741C49.137 5.5663 49.1087 5.51704 49.1299 5.48186C49.1512 5.44667 49.1441 5.41149 49.1087 5.41149C48.9316 5.38334 48.0391 5.3763 47.9683 5.40445Z" fill="#4D82C1"/><path d="M34.1842 25.1829L34 25.3729V28.237V31.1011L34.1842 31.2911L34.3754 31.4741H41.9688H49.5621L49.7533 31.2911L49.9375 31.1011V28.237V25.3729L49.7533 25.1829L49.5621 25H41.9688H34.3754L34.1842 25.1829Z" fill="#0000FF"/><path d="M36.0258 47.7885C36.0683 47.8589 35.8417 47.9292 35.7567 47.8729C35.7071 47.8448 35.7 47.8659 35.7354 47.9222C35.7779 47.9926 35.7637 48.0066 35.6858 47.9715C35.5512 47.9222 35.275 48.1966 35.3317 48.3374C35.3529 48.4007 35.3317 48.4148 35.275 48.3796C35.2183 48.3444 35.1971 48.3515 35.2254 48.4007C35.2821 48.4852 35.2112 48.7104 35.1404 48.6681C35.1192 48.6541 35.0979 48.8581 35.0979 49.1185C35.0979 49.3789 35.1192 49.5829 35.1404 49.5689C35.2112 49.5266 35.2821 49.7518 35.2254 49.8363C35.1971 49.8855 35.2183 49.8926 35.275 49.8574C35.3458 49.8152 35.36 49.8292 35.3246 49.9066C35.275 50.0404 35.5512 50.3148 35.6929 50.2585C35.7567 50.2374 35.7708 50.2585 35.7354 50.3148C35.7 50.3711 35.7071 50.3922 35.7567 50.3641C35.8417 50.3078 36.0683 50.3781 36.0258 50.4485C36.0117 50.4696 36.2171 50.4907 36.4792 50.4907C36.7412 50.4907 36.9467 50.4696 36.9325 50.4485C36.89 50.3781 37.1167 50.3078 37.2017 50.3641C37.2512 50.3922 37.2583 50.3711 37.2229 50.3148C37.1875 50.2585 37.2017 50.2374 37.2654 50.2585C37.4071 50.3148 37.6833 50.0404 37.6337 49.9066C37.5983 49.8292 37.6125 49.8152 37.6833 49.8574C37.74 49.8926 37.7612 49.8855 37.7329 49.8363C37.6762 49.7518 37.7471 49.5266 37.8179 49.5689C37.8392 49.5829 37.8604 49.3789 37.8604 49.1185C37.8604 48.8581 37.8392 48.6541 37.8179 48.6681C37.7471 48.7104 37.6762 48.4852 37.7329 48.4007C37.7612 48.3515 37.74 48.3444 37.6833 48.3796C37.6125 48.4218 37.5983 48.4078 37.6337 48.3304C37.6833 48.1966 37.4071 47.9222 37.2654 47.9785C37.2017 47.9996 37.1875 47.9785 37.2229 47.9222C37.2583 47.8659 37.2512 47.8448 37.2017 47.8729C37.1167 47.9292 36.89 47.8589 36.9325 47.7885C36.9467 47.7674 36.7412 47.7463 36.4792 47.7463C36.2171 47.7463 36.0117 47.7674 36.0258 47.7885Z" fill="#4D82C1"/><path d="M41.728 47.9011C41.303 48.1544 41.1259 48.4852 41.1117 49.0833C41.0905 50.0193 41.5934 50.5189 42.5355 50.4978C43.4351 50.4767 43.8671 50.0474 43.8884 49.1537C43.8955 48.5626 43.7113 48.1685 43.3005 47.9152C42.918 47.6759 42.1176 47.6689 41.728 47.9011Z" fill="#4D82C1"/><path d="M47.9683 47.7674C47.9187 47.7815 47.8974 47.8167 47.9187 47.8519C47.9399 47.88 47.9045 47.9293 47.8408 47.9504C47.7699 47.9785 47.7487 47.9645 47.777 47.9011C47.8053 47.8589 47.7628 47.8941 47.6849 47.9856C47.6141 48.0771 47.4724 48.2178 47.3803 48.2882C47.2883 48.3656 47.2528 48.4078 47.2953 48.3796C47.3591 48.3515 47.3733 48.3726 47.3449 48.443C47.3237 48.5063 47.2741 48.5345 47.2387 48.5134C47.1678 48.4711 47.1608 48.5063 47.1395 49.0834C47.1253 49.5619 47.1608 49.773 47.2458 49.7167C47.2741 49.6956 47.3237 49.7308 47.3449 49.7941C47.3733 49.8645 47.3591 49.8856 47.2953 49.8574C47.2528 49.8293 47.2883 49.8715 47.3803 49.9489C47.4724 50.0193 47.6141 50.16 47.6849 50.2515C47.7628 50.343 47.8053 50.3782 47.777 50.3359C47.7487 50.2726 47.7699 50.2585 47.8408 50.2867C47.9045 50.3078 47.9328 50.3571 47.9116 50.3922C47.8691 50.4626 47.9045 50.4696 48.4853 50.4908C48.967 50.5048 49.1795 50.4696 49.1228 50.3852C49.1016 50.3571 49.137 50.3078 49.2008 50.2867C49.2716 50.2585 49.2928 50.2726 49.2645 50.3359C49.2362 50.3782 49.2787 50.343 49.3566 50.2515C49.4274 50.16 49.5691 50.0193 49.6612 49.9489C49.7533 49.8715 49.7887 49.8293 49.7462 49.8574C49.6824 49.8856 49.6683 49.8645 49.6966 49.7941C49.7178 49.7308 49.7674 49.7026 49.8028 49.7237C49.8737 49.7659 49.8808 49.7308 49.902 49.1537C49.9162 48.6752 49.8808 48.4641 49.7958 48.5204C49.7674 48.5415 49.7178 48.5063 49.6966 48.443C49.6683 48.3726 49.6824 48.3515 49.7462 48.3796C49.7887 48.4078 49.7533 48.3656 49.6612 48.2882C49.5691 48.2178 49.4274 48.0771 49.3566 47.9856C49.2787 47.8941 49.2362 47.8589 49.2645 47.9011C49.2928 47.9645 49.2716 47.9785 49.2008 47.9504C49.137 47.9293 49.1087 47.88 49.1299 47.8448C49.1512 47.8096 49.1441 47.7745 49.1087 47.7745C48.9316 47.7463 48.0391 47.7393 47.9683 47.7674Z" fill="#4D82C1"/></svg>',
						],
						'flex-end' => [
							'title' => esc_attr__( 'Right' ),
							'path'	=> '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" fill="none"/><path d="M0 28.5V57H42.5H85V28.5V-1.22935e-07H42.5H0V28.5ZM84.2067 7.01593L84.1854 13.2648H42.5H0.814583L0.793333 7.01593L0.772083 0.774074H42.5H84.2279L84.2067 7.01593ZM84.1783 13.9193C84.1996 13.9544 84.1925 20.2878 84.1713 27.9933L84.1288 42.0111H42.5H0.87125L0.82875 27.9933C0.8075 20.2878 0.800417 13.9544 0.821667 13.9193C0.87125 13.8419 84.1288 13.8419 84.1783 13.9193ZM84.15 49.3648V56.1556H42.5H0.85V49.3648V42.5741H42.5H84.15V49.3648Z" fill="#0000FF"/><path d="M36.0258 5.42559C36.0683 5.49596 35.8417 5.56633 35.7567 5.51003C35.7071 5.48188 35.7 5.50299 35.7354 5.55929C35.7779 5.62966 35.7637 5.64373 35.6858 5.60855C35.5512 5.55929 35.275 5.83373 35.3317 5.97447C35.3529 6.03781 35.3317 6.05188 35.275 6.0167C35.2183 5.98151 35.1971 5.98855 35.2254 6.03781C35.2821 6.12225 35.2112 6.34744 35.1404 6.30522C35.1192 6.29114 35.0979 6.49522 35.0979 6.75559C35.0979 7.01596 35.1192 7.22003 35.1404 7.20596C35.2112 7.16373 35.2821 7.38892 35.2254 7.47336C35.1971 7.52262 35.2183 7.52966 35.275 7.49447C35.3458 7.45225 35.36 7.46633 35.3246 7.54373C35.275 7.67744 35.5512 7.95188 35.6929 7.89559C35.7567 7.87447 35.7708 7.89559 35.7354 7.95188C35.7 8.00818 35.7071 8.02929 35.7567 8.00114C35.8417 7.94484 36.0683 8.01522 36.0258 8.08559C36.0117 8.1067 36.2171 8.12781 36.4792 8.12781C36.7412 8.12781 36.9467 8.1067 36.9325 8.08559C36.89 8.01522 37.1167 7.94484 37.2017 8.00114C37.2512 8.02929 37.2583 8.00818 37.2229 7.95188C37.1875 7.89559 37.2017 7.87447 37.2654 7.89559C37.4071 7.95188 37.6833 7.67744 37.6337 7.54373C37.5983 7.46633 37.6125 7.45225 37.6833 7.49447C37.74 7.52966 37.7612 7.52262 37.7329 7.47336C37.6762 7.38892 37.7471 7.16373 37.8179 7.20596C37.8392 7.22003 37.8604 7.01596 37.8604 6.75559C37.8604 6.49522 37.8392 6.29114 37.8179 6.30522C37.7471 6.34744 37.6762 6.12225 37.7329 6.03781C37.7612 5.98855 37.74 5.98151 37.6833 6.0167C37.6125 6.05892 37.5983 6.04484 37.6337 5.96744C37.6833 5.83373 37.4071 5.55929 37.2654 5.61559C37.2017 5.6367 37.1875 5.61559 37.2229 5.55929C37.2583 5.50299 37.2512 5.48188 37.2017 5.51003C37.1167 5.56633 36.89 5.49596 36.9325 5.42559C36.9467 5.40447 36.7412 5.38336 36.4792 5.38336C36.2171 5.38336 36.0117 5.40447 36.0258 5.42559Z" fill="#4D82C1"/><path d="M41.728 5.53813C41.303 5.79146 41.1259 6.1222 41.1117 6.72035C41.0905 7.65628 41.5934 8.15591 42.5355 8.13479C43.1234 8.12072 43.4634 7.95183 43.7184 7.54368C43.9521 7.16368 43.9592 6.41072 43.7326 6.00257C43.4776 5.56628 43.1517 5.39035 42.5213 5.38331C42.0963 5.37628 41.9546 5.39739 41.728 5.53813Z" fill="#4D82C1"/><path d="M47.9683 5.40445C47.9187 5.41852 47.8974 5.45371 47.9187 5.48889C47.9399 5.51704 47.9045 5.5663 47.8408 5.58741C47.7699 5.61556 47.7487 5.60149 47.777 5.53815C47.8053 5.49593 47.7628 5.53112 47.6849 5.6226C47.6141 5.71408 47.4724 5.85482 47.3803 5.92519C47.2883 6.0026 47.2528 6.04482 47.2953 6.01667C47.3591 5.98852 47.3733 6.00963 47.3449 6.08C47.3237 6.14334 47.2741 6.17149 47.2387 6.15038C47.1678 6.10815 47.1608 6.14334 47.1395 6.72038C47.1253 7.19889 47.1608 7.41 47.2458 7.35371C47.2741 7.3326 47.3237 7.36778 47.3449 7.43112C47.3733 7.50149 47.3591 7.5226 47.2953 7.49445C47.2528 7.4663 47.2883 7.50852 47.3803 7.58593C47.4724 7.6563 47.6141 7.79704 47.6849 7.88852C47.7628 7.98 47.8053 8.01519 47.777 7.97297C47.7487 7.90963 47.7699 7.89556 47.8408 7.92371C47.9045 7.94482 47.9328 7.99408 47.9116 8.02926C47.8691 8.09963 47.9045 8.10667 48.4853 8.12778C48.967 8.14186 49.1795 8.10667 49.1228 8.02223C49.1016 7.99408 49.137 7.94482 49.2008 7.92371C49.2716 7.89556 49.2928 7.90963 49.2645 7.97297C49.2362 8.01519 49.2787 7.98 49.3566 7.88852C49.4274 7.79704 49.5691 7.6563 49.6612 7.58593C49.7533 7.50852 49.7887 7.4663 49.7462 7.49445C49.6824 7.5226 49.6683 7.50149 49.6966 7.43112C49.7178 7.36778 49.7674 7.33963 49.8028 7.36075C49.8737 7.40297 49.8808 7.36778 49.902 6.79075C49.9162 6.31223 49.8808 6.10112 49.7958 6.15741C49.7674 6.17852 49.7178 6.14334 49.6966 6.08C49.6683 6.00963 49.6824 5.98852 49.7462 6.01667C49.7887 6.04482 49.7533 6.0026 49.6612 5.92519C49.5691 5.85482 49.4274 5.71408 49.3566 5.6226C49.2787 5.53112 49.2362 5.49593 49.2645 5.53815C49.2928 5.60149 49.2716 5.61556 49.2008 5.58741C49.137 5.5663 49.1087 5.51704 49.1299 5.48186C49.1512 5.44667 49.1441 5.41149 49.1087 5.41149C48.9316 5.38334 48.0391 5.3763 47.9683 5.40445Z" fill="#4D82C1"/><path d="M58.2342 24.883L58.05 25.073V27.937V30.8011L58.2342 30.9911L58.4255 31.1741H66.0188H73.6121L73.8034 30.9911L73.9875 30.8011V27.937V25.073L73.8034 24.883L73.6121 24.7H66.0188H58.4255L58.2342 24.883Z" fill="#0000FF"/><path d="M36.0258 47.7885C36.0683 47.8589 35.8417 47.9292 35.7567 47.8729C35.7071 47.8448 35.7 47.8659 35.7354 47.9222C35.7779 47.9926 35.7637 48.0066 35.6858 47.9715C35.5512 47.9222 35.275 48.1966 35.3317 48.3374C35.3529 48.4007 35.3317 48.4148 35.275 48.3796C35.2183 48.3444 35.1971 48.3515 35.2254 48.4007C35.2821 48.4852 35.2112 48.7104 35.1404 48.6681C35.1192 48.6541 35.0979 48.8581 35.0979 49.1185C35.0979 49.3789 35.1192 49.5829 35.1404 49.5689C35.2112 49.5266 35.2821 49.7518 35.2254 49.8363C35.1971 49.8855 35.2183 49.8926 35.275 49.8574C35.3458 49.8152 35.36 49.8292 35.3246 49.9066C35.275 50.0404 35.5512 50.3148 35.6929 50.2585C35.7567 50.2374 35.7708 50.2585 35.7354 50.3148C35.7 50.3711 35.7071 50.3922 35.7567 50.3641C35.8417 50.3078 36.0683 50.3781 36.0258 50.4485C36.0117 50.4696 36.2171 50.4907 36.4792 50.4907C36.7412 50.4907 36.9467 50.4696 36.9325 50.4485C36.89 50.3781 37.1167 50.3078 37.2017 50.3641C37.2512 50.3922 37.2583 50.3711 37.2229 50.3148C37.1875 50.2585 37.2017 50.2374 37.2654 50.2585C37.4071 50.3148 37.6833 50.0404 37.6337 49.9066C37.5983 49.8292 37.6125 49.8152 37.6833 49.8574C37.74 49.8926 37.7612 49.8855 37.7329 49.8363C37.6762 49.7518 37.7471 49.5266 37.8179 49.5689C37.8392 49.5829 37.8604 49.3789 37.8604 49.1185C37.8604 48.8581 37.8392 48.6541 37.8179 48.6681C37.7471 48.7104 37.6762 48.4852 37.7329 48.4007C37.7612 48.3515 37.74 48.3444 37.6833 48.3796C37.6125 48.4218 37.5983 48.4078 37.6337 48.3304C37.6833 48.1966 37.4071 47.9222 37.2654 47.9785C37.2017 47.9996 37.1875 47.9785 37.2229 47.9222C37.2583 47.8659 37.2512 47.8448 37.2017 47.8729C37.1167 47.9292 36.89 47.8589 36.9325 47.7885C36.9467 47.7674 36.7412 47.7463 36.4792 47.7463C36.2171 47.7463 36.0117 47.7674 36.0258 47.7885Z" fill="#4D82C1"/><path d="M41.728 47.9011C41.303 48.1544 41.1259 48.4852 41.1117 49.0833C41.0905 50.0193 41.5934 50.5189 42.5355 50.4978C43.4351 50.4767 43.8671 50.0474 43.8884 49.1537C43.8955 48.5626 43.7113 48.1685 43.3005 47.9152C42.918 47.6759 42.1176 47.6689 41.728 47.9011Z" fill="#4D82C1"/><path d="M47.9683 47.7674C47.9187 47.7815 47.8974 47.8167 47.9187 47.8519C47.9399 47.88 47.9045 47.9293 47.8408 47.9504C47.7699 47.9785 47.7487 47.9645 47.777 47.9011C47.8053 47.8589 47.7628 47.8941 47.6849 47.9856C47.6141 48.0771 47.4724 48.2178 47.3803 48.2882C47.2883 48.3656 47.2528 48.4078 47.2953 48.3796C47.3591 48.3515 47.3733 48.3726 47.3449 48.443C47.3237 48.5063 47.2741 48.5345 47.2387 48.5134C47.1678 48.4711 47.1608 48.5063 47.1395 49.0834C47.1253 49.5619 47.1608 49.773 47.2458 49.7167C47.2741 49.6956 47.3237 49.7308 47.3449 49.7941C47.3733 49.8645 47.3591 49.8856 47.2953 49.8574C47.2528 49.8293 47.2883 49.8715 47.3803 49.9489C47.4724 50.0193 47.6141 50.16 47.6849 50.2515C47.7628 50.343 47.8053 50.3782 47.777 50.3359C47.7487 50.2726 47.7699 50.2585 47.8408 50.2867C47.9045 50.3078 47.9328 50.3571 47.9116 50.3922C47.8691 50.4626 47.9045 50.4696 48.4853 50.4908C48.967 50.5048 49.1795 50.4696 49.1228 50.3852C49.1016 50.3571 49.137 50.3078 49.2008 50.2867C49.2716 50.2585 49.2928 50.2726 49.2645 50.3359C49.2362 50.3782 49.2787 50.343 49.3566 50.2515C49.4274 50.16 49.5691 50.0193 49.6612 49.9489C49.7533 49.8715 49.7887 49.8293 49.7462 49.8574C49.6824 49.8856 49.6683 49.8645 49.6966 49.7941C49.7178 49.7308 49.7674 49.7026 49.8028 49.7237C49.8737 49.7659 49.8808 49.7308 49.902 49.1537C49.9162 48.6752 49.8808 48.4641 49.7958 48.5204C49.7674 48.5415 49.7178 48.5063 49.6966 48.443C49.6683 48.3726 49.6824 48.3515 49.7462 48.3796C49.7887 48.4078 49.7533 48.3656 49.6612 48.2882C49.5691 48.2178 49.4274 48.0771 49.3566 47.9856C49.2787 47.8941 49.2362 47.8589 49.2645 47.9011C49.2928 47.9645 49.2716 47.9785 49.2008 47.9504C49.137 47.9293 49.1087 47.88 49.1299 47.8448C49.1512 47.8096 49.1441 47.7745 49.1087 47.7745C48.9316 47.7463 48.0391 47.7393 47.9683 47.7674Z" fill="#4D82C1"/></svg>',
						],
					],
				]
			);

			/* Social display order ----------------------------------------------- */

			Kirki::add_section(
				'social_media_order_section',
				[
					'title'      	=> esc_html__( 'Social media order', 'kirki' ),
					'description'   => esc_html__( 'Here you can change the order in which social media icons are displayed on your website.', 'kirki' ),
					'priority'   	=> 40,
					'panel'      	=> 'social_media',
					'icon'			=> 'dashicons-visibility',
				]
			);

			Kirki::add_config(
				'social_media_order',
				[
					'capability'        => 'edit_theme_options',
					'default'           => false,
				]
			);

			Kirki::add_field(
				'social_media_order',
				[
					'type'      => 'sortable',
					'settings'  => 'sortable_setting',
					'settings'  => 'social_media_order',
					'section'   => 'social_media_order_section',
					'default'	=>	[
						'facebook',
						'gitHub',
						'instagram',
						'pinterest',
						'twitter',
						'youTube',
					],
					'choices'   => [
						'500px'			=> esc_html__( '500px', 'kirki' ),
						'amazon' 		=> esc_html__( 'amazon', 'kirki' ),
						'bandcamp' 		=> esc_html__( 'bandcamp', 'kirki' ),
						'behance' 		=> esc_html__( 'behance', 'kirki' ),
						'codepan' 		=> esc_html__( 'codepan', 'kirki' ),
						'deviantArt'	=> esc_html__( 'deviantArt', 'kirki' ),
						'dropbox'		=> esc_html__( 'dropbox', 'kirki' ),
						'facebook' 		=> esc_html__( 'facebook', 'kirki' ),
						'flickr' 		=> esc_html__( 'flickr', 'kirki' ),
						'gitHub'		=> esc_html__( 'gitHub', 'kirki' ),
						'google' 		=> esc_html__( 'google', 'kirki' ),
						'instagram'		=> esc_html__( 'instagram', 'kirki' ),
						'linkedIn' 		=> esc_html__( 'linkedIn', 'kirki' ),
						'pinterest' 	=> esc_html__( 'pinterest', 'kirki' ),
						'reddit' 		=> esc_html__( 'reddit', 'kirki' ),
						'skype' 		=> esc_html__( 'skype', 'kirki' ),
						'snapchat' 		=> esc_html__( 'snapchat', 'kirki' ),
						'telegram' 		=> esc_html__( 'telegram', 'kirki' ),
						'tikTok' 		=> esc_html__( 'tikTok', 'kirki' ),
						'tumblr' 		=> esc_html__( 'tumblr', 'kirki' ),
						'twitch' 		=> esc_html__( 'twitch', 'kirki' ),
						'twitter' 		=> esc_html__( 'twitter', 'kirki' ),
						'viber' 		=> esc_html__( 'viber', 'kirki' ),
						'wattpad' 		=> esc_html__( 'wattpad', 'kirki' ),
						'whatsApp' 		=> esc_html__( 'whatsApp', 'kirki' ),
						'youTube' 		=> esc_html__( 'youTube', 'kirki' ),
						'vK' 			=> esc_html__( 'vK', 'kirki' ),
						'oK' 			=> esc_html__( 'oK', 'kirki' ),
					],
					'priority'  => 10,
				]
			);

			/* Show DeviantArt ----------------------------------------------- */

			Kirki::add_section(
				'deviantArt',
				[
					'title'      => esc_html__( 'DeviantArt', 'kirki' ),
					'priority'   => 40,
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_deviantArt',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_deviantArt',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings'    	=> 'url_deviantArt',
					'section'  		=> 'deviantArt',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_deviantArt',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_deviantArt',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_deviantArt',
					'section'  		=> 'deviantArt',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Facebook ----------------------------------------------- */

			Kirki::add_section(
				'facebook',
				[
					'title'      => esc_html__( 'Facebook', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_facebook',
				[
					'capability'  => 'edit_theme_options',
					'default'     => 'https://www.facebook.com/',
				]
			);

			Kirki::add_field(
				'url_facebook',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_facebook',
					'section'  		=> 'facebook',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_facebook',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_facebook',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_facebook',
					'section'  		=> 'facebook',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Flickr ----------------------------------------------- */

			Kirki::add_section(
				'flickr',
				[
					'title'      => esc_html__( 'Flickr', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_flickr',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_flickr',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_flickr',
					'section'  		=> 'flickr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_flickr',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_flickr',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_flickr',
					'section'  		=> 'flickr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show GitHub ----------------------------------------------- */

			Kirki::add_section(
				'gitHub',
				[
					'title'      => esc_html__( 'GitHub', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_gitHub',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://www.github.com/',
				]
			);

			Kirki::add_field(
				'url_gitHub',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings'		=> 'url_gitHub',
					'section'  		=> 'gitHub',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_gitHub',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_gitHub',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_gitHub',
					'section'  		=> 'gitHub',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Instagram ----------------------------------------------- */

			Kirki::add_section(
				'instagram',
				[
					'title'      => esc_html__( 'Instagram', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_instagram',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://instagram.com/',
				]
			);

			Kirki::add_field(
				'url_instagram',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_instagram',
					'section'  		=> 'instagram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_instagram',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_instagram',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_instagram',
					'section'  		=> 'instagram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show LinkedIn ----------------------------------------------- */

			Kirki::add_section(
				'linkedIn',
				[
					'title'      => esc_html__( 'LinkedIn', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_linkedIn',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_linkedIn',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_linkedIn',
					'section'  		=> 'linkedIn',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_linkedIn',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_linkedIn',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_linkedIn',
					'section'  		=> 'linkedIn',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Pinterest ----------------------------------------------- */

			Kirki::add_section(
				'pinterest',
				[
					'title'      => esc_html__( 'Pinterest', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_pinterest',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://pinterest.com/',
				]
			);

			Kirki::add_field(
				'url_pinterest',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_pinterest',
					'section'  		=> 'pinterest',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_pinterest',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_pinterest',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_pinterest',
					'section'  		=> 'pinterest',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Snapchat ----------------------------------------------- */

			Kirki::add_section(
				'snapchat',
				[
					'title'      => esc_html__( 'Snapchat', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_snapchat',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_snapchat',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_snapchat',
					'section'  		=> 'snapchat',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_snapchat',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_snapchat',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_snapchat',
					'section'  		=> 'snapchat',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Telegram ----------------------------------------------- */

			Kirki::add_section(
				'telegram',
				[
					'title'      => esc_html__( 'Telegram', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_telegram',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_telegram',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_telegram',
					'section'  		=> 'telegram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_telegram',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_telegram',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_telegram',
					'section'  		=> 'telegram',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show TikTok ----------------------------------------------- */

			Kirki::add_section(
				'tikTok',
				[
					'title'      => esc_html__( 'TikTok', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_tikTok',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_tikTok',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_tikTok',
					'section'  		=> 'tikTok',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_tikTok',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_tikTok',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_tikTok',
					'section'  		=> 'tikTok',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Tumblr ----------------------------------------------- */

			Kirki::add_section(
				'tumblr',
				[
					'title'      => esc_html__( 'Tumblr', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_tumblr',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_tumblr',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_tumblr',
					'section'  		=> 'tumblr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_tumblr',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_tumblr',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_tumblr',
					'section'  		=> 'tumblr',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Twitter ----------------------------------------------- */

			Kirki::add_section(
				'twitter',
				[
					'title'      => esc_html__( 'Twitter', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_twitter',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://twitter.com/',
				]
			);

			Kirki::add_field(
				'url_twitter',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_twitter',
					'section'  		=> 'twitter',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_twitter',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_twitter',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_twitter',
					'section'  		=> 'twitter',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Viber ----------------------------------------------- */

			Kirki::add_section(
				'viber',
				[
					'title'      => esc_html__( 'Viber', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_viber',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_viber',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_viber',
					'section'  		=> 'viber',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_viber',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_viber',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_viber',
					'section'  		=> 'viber',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Wattpad ----------------------------------------------- */

			Kirki::add_section(
				'wattpad',
				[
					'title'      => esc_html__( 'Wattpad', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_wattpad',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_wattpad',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_wattpad',
					'section'  		=> 'wattpad',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_wattpad',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_wattpad',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_wattpad',
					'section'  		=> 'wattpad',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show WhatsApp ----------------------------------------------- */

			Kirki::add_section(
				'whatsApp',
				[
					'title'      => esc_html__( 'WhatsApp', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_whatsApp',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_whatsApp',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_whatsApp',
					'section'  		=> 'whatsApp',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_whatsApp',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_whatsApp',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_whatsApp',
					'section'  		=> 'whatsApp',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show YouTube ----------------------------------------------- */

			Kirki::add_section(
				'youTube',
				[
					'title'      => esc_html__( 'YouTube', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_youTube',
				[
					'capability'        => 'edit_theme_options',
					'default'           => 'https://youtube.com/',
				]
			);

			Kirki::add_field(
				'url_youTube',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_youTube',
					'section'  		=> 'youTube',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_youTube',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_youTube',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_youTube',
					'section'  		=> 'youTube',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show ВКонтакте ----------------------------------------------- */

			Kirki::add_section(
				'vK',
				[
					'title'      => esc_html__( 'ВКонтакте', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_vK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_vK',
				[
					'type'     		=> 'link',
					'settings' 		=> 'link_setting',
					'settings' 		=> 'url_vK',
					'section'  		=> 'vK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_vK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_vK',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_vK',
					'section'  		=> 'vK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/* Show Одноклассники ----------------------------------------------- */

			Kirki::add_section(
				'oK',
				[
					'title'      => esc_html__( 'Одноклассники', 'kirki' ),
					'priority'   => 40,
					'capability' => 'edit_theme_options',
					'panel'      => 'social_media',
				]
			);

			Kirki::add_config(
				'url_oK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'url_oK',
				[
					'type'     		=> 'link',
					'settings' 		=> 'url_oK',
					'section'  		=> 'oK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'URL', 'kirki' ),
					'input_attrs'	=> array (
						'placeholder'	=> 'https://',
					),
				]
			);

			Kirki::add_config(
				'icon_oK',
				[
					'capability'        => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'icon_oK',
				[
					'type'     		=> 'image',
					'settings'    	=> 'icon_oK',
					'section'  		=> 'oK',
					'priority' 		=> 10,
					'label'    		=> esc_html__( 'Icon', 'kirki' ),
				]
			);

			/**
			 * Content
			 */

			Kirki::add_panel(
				'content',
				[
					'title'          => esc_html__( 'Content', 'kirki' ),
					'priority'       => 90,
				]
			);

			/** Content General ------------------------------------------------------ */

			Kirki::add_section(
				'content_general',
				[
					'title'          => esc_html__( 'General', 'kirki' ),
					'panel'          => 'content',
				]
			);

			Kirki::add_config(
				'content_sidebar_position',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'refresh',
				]
			);

			Kirki::add_field(
				'content_sidebar_position',
				[
					'type'      => 'radio-image',
					'label'     => esc_attr__( 'Layout', 'text-domain' ),
					'section'   => 'content_general',
					'settings'  => 'content_sidebar_position',
					'default'	=> 'right',
					'priority'  => 10,
					'choices'   => [
						'left' => [
							'title' => esc_attr__( 'Main sidebar Left' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M85 28.5V57H42.5H-2.75671e-06V28.5V-1.22935e-07H42.5H85V28.5ZM0.849997 5.41852V9.99259H42.5H84.15V5.41852V0.844444H42.5H0.849997V5.41852ZM0.835831 16.0937C0.821664 19.1056 0.821664 29.3515 0.835831 38.8656L0.849997 56.1556H42.5H84.15L84.1642 38.8585C84.1783 29.3515 84.1783 19.1056 84.1642 16.0937L84.15 10.6259H42.5H0.849997L0.835831 16.0937Z" fill="#3157E2"/><path d="M54.1166 14.7778C66.5266 14.7989 76.6841 14.827 76.6912 14.8341C76.7053 14.8411 76.7124 22.8282 76.7124 32.5815V50.3148H59.762C50.4474 50.3148 40.1199 50.2937 36.812 50.2656L30.8124 50.2233V32.4619V14.7074L31.1807 14.7215C31.3862 14.7285 41.7066 14.7567 54.1166 14.7778Z" fill="#3157E2"/><path d="M23.729 32.5463V50.3148H15.654H7.57894V32.5463V14.7778H15.654H23.729V32.5463Z" fill="#3157E2"/></svg>',
						],
						'right' => [
							'title' => esc_attr__( 'Main sidebar Right' ),
							'path'	=> '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" fill="none"/><path d="M0 28.5V57H42.5H85V28.5V-1.22935e-07H42.5H0V28.5ZM84.15 5.41852V9.99259H42.5H0.85V5.41852V0.844444H42.5H84.15V5.41852ZM84.1642 16.0937C84.1783 19.1056 84.1783 29.3515 84.1642 38.8656L84.15 56.1556H42.5H0.85L0.835833 38.8585C0.821667 29.3515 0.821667 19.1056 0.835833 16.0937L0.85 10.6259H42.5H84.15L84.1642 16.0937Z" fill="#3157E2"/><path d="M30.8834 14.7778C18.4734 14.7989 8.31593 14.827 8.30885 14.8341C8.29468 14.8411 8.2876 22.8282 8.2876 32.5815V50.3148H25.238C34.5526 50.3148 44.8801 50.2937 48.188 50.2656L54.1876 50.2233V32.4619V14.7074L53.8193 14.7215C53.6138 14.7285 43.2934 14.7567 30.8834 14.7778Z" fill="#3157E2"/><path d="M61.271 32.5463V50.3148H69.346H77.4211V32.5463V14.7778H69.346H61.271V32.5463Z" fill="#3157E2"/></svg>',
						],
						'top' => [
							'title' => esc_attr__( 'Main sidebar Top' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M85 28.5V57H42.5H-2.75671e-06V28.5V-1.22935e-07H42.5H85V28.5ZM0.849997 5.41852V9.99259H42.5H84.15V5.41852V0.844444H42.5H0.849997V5.41852ZM0.835831 16.0937C0.821664 19.1056 0.821664 29.3515 0.835831 38.8656L0.849997 56.1556H42.5H84.15L84.1642 38.8585C84.1783 29.3515 84.1783 19.1056 84.1642 16.0937L84.15 10.6259H42.5H0.849997L0.835831 16.0937Z" fill="#3157E2"/><path d="M43.017 26.0553C61.1318 26.0719 75.9586 26.0941 75.969 26.0996C75.9897 26.1051 76 32.3858 76 40.0553V54H51.2576C37.6611 54 22.5861 53.9834 17.7576 53.9613L9 53.9281V39.9613V26L9.53766 26.0111C9.8375 26.0166 24.9022 26.0387 43.017 26.0553Z" fill="#3157E2"/><path d="M42.4999 12H75.9999V18V24H42.4999H8.99993V18V12H42.4999Z" fill="#3157E2"/></svg>',
						],
						'bottom' => [
							'title' => esc_attr__( 'Main sidebar Buttom' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M85 28.5V57H42.5H-2.75671e-06V28.5V-1.22935e-07H42.5H85V28.5ZM0.849997 5.41852V9.99259H42.5H84.15V5.41852V0.844444H42.5H0.849997V5.41852ZM0.835831 16.0937C0.821664 19.1056 0.821664 29.3515 0.835831 38.8656L0.849997 56.1556H42.5H84.15L84.1642 38.8585C84.1783 29.3515 84.1783 19.1056 84.1642 16.0937L84.15 10.6259H42.5H0.849997L0.835831 16.0937Z" fill="#3157E2"/><path d="M43.017 12.0553C61.1318 12.0719 75.9586 12.0941 75.969 12.0996C75.9897 12.1051 76 18.3858 76 26.0553V40H51.2576C37.6611 40 22.5861 39.9834 17.7576 39.9613L9 39.9281V25.9613V12L9.53766 12.0111C9.8375 12.0166 24.9022 12.0387 43.017 12.0553Z" fill="#3157E2"/><path d="M42.5 41.5H76V47.5V53.5H42.5H9V47.5V41.5H42.5Z" fill="#3157E2"/></svg>',
						],
					],
				]
			);

			Kirki::add_config(
				'custom_content_width',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'custom_content_width',
				[
					'type'        => 'slider',
					'settings'    => 'custom_content_width',
					'label'       => esc_html__( 'Custom content width', 'kirki' ),
					'description' => esc_html__( 'Content will be take up as much width as you specity. (px)', 'kirki' ),
					'section'     => 'content_general',
					'priority'    => 10,
					'default'     => 1110,
					'choices'     => [
						'min'  => 1030,
						'max'  => 1700,
						'step' => 1,
					],
				]
			);

			Kirki::add_config(
				'content_full',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'content_full',
				[
					'type'        => 'checkbox',
					'settings'    => 'checkbox_setting',
					'settings'    => 'content_full',
					'label'       => esc_html__( 'Full width', 'kirki' ),
					'description' => esc_html__( 'Content will be take up the entire of the content.', 'kirki' ),
					'section'     => 'content_general',
					'priority'    => 10,
					'default'     => false,
				]
			);

			Kirki::add_config(
				'masonry',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'refresh',
				]
			);

			Kirki::add_field(
				'masonry',
				[
					'type'        => 'toggle',
					'settings'    => 'masonry',
					'label'       => esc_html__( 'masonry', 'kirki' ),
					'section'     => 'content_general',
					'default'     => 'false',
					'priority'    => 10,
				]
			);

			/* Content Post ----------------------------------------------------------*/

			Kirki::add_section(
				'content_post',
				[
					'title'          => esc_html__( 'Post', 'kirki' ),
					'panel'          => 'content',
				]
			);

			Kirki::add_config(
				'content_post_header_font',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'content_post_header_font',
				[
				'type'        => 'typography',
				'settings'    => 'content_post_header_font',
				'section'     => 'content_post',
				'default'     => [
					'font-family'    => 'Inter',
					'variant'        => '700',
					'font-size'      => '18px',
					'color'          => '#101010',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => 'h2.entry-title-catalog, .entry-title-catalog a',
					],
				],
				]
			);

			Kirki::add_config(
				'content_post_author_font',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'content_post_author_font',
				[
				'type'        => 'typography',
				'settings'    => 'content_post_author_font',
				'section'     => 'content_post',
				'default'     => [
					'font-family'    => 'Roboto',
					'variant'        => 'regular',
					'font-size'      => '15px',
					'color'          => '#8492A6',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.author-post-catalog, .author-post-catalog a',
					],
				],
				]
			);

			Kirki::add_config(
				'content_post_main_text_font',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'content_post_main_text_font',
				[
				'type'        => 'typography',
				'settings'    => 'content_post_main_text_font',
				'section'     => 'content_post',
				'default'     => [
					'font-family'    => 'Roboto',
					'variant'        => 'regular',
					'font-size'      => '16px',
					'color'          => '#303030',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.entry-content-catalog p',
					],
				],
				]
			);

			Kirki::add_config(
				'content_post_bottom_line_font',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'content_post_bottom_line_font',
				[
				'type'        => 'typography',
				'settings'    => 'content_post_bottom_line_font',
				'section'     => 'content_post',
				'default'     => [
					'font-family'    => 'Roboto',
					'variant'        => 'regular',
					'font-size'      => '15px',
					'color'          => '#8492A6',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.block-footer-catalog, .block-footer-catalog a',
					],
				],
				]
			);

			Kirki::add_config(
				'content_post_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'content_post_color',
				[
					'type'      => 'color',
					'settings'  => 'title_text',
					'label'     => esc_attr__( 'Post background color', 'text-domain' ),
					'section'   => 'content_post',
					'settings'  => 'content_post_color',
					'default'   => '#ffffff',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.catalog-item',
							'property' => 'background-color'
						],
					],
				]
			);

			/**
			 * Color Scheme
			 */
/*
			Kirki::add_panel(
				'color',
				[
					'title'          => esc_html__( 'Color', 'kirki' ),
					'priority'       => 93,
				]
			);
*/
			Kirki::add_section(
				'color_scheme',
				[
					'title'          => esc_html__( 'Color Scheme', 'kirki' ),
					'priority'       => 93,
					//'panel'			 => 'color',
				]
			);

			Kirki::add_config(
				'primary_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'primary_color',
				[
					'type'        => 'color-palette',
					'settings'    => 'primary_color',
					'label'       => esc_html__( 'Primary Color', 'kirki' ),
					'description' => esc_html__( 'Select the main color', 'kirki' ),
					'section'     => 'color_scheme',
					'default'     => '#e5e5e5',
					'choices'     => [
						'colors'  => Kirki_Helper::get_material_design_colors( 'A100' ),
						'size'	  => 15,
					],
					'output'      => [
						[
							'element'  => 'body',
							'property' => 'background-color',
							'suffix'   => '!important',
						],
					],
				]
			);

			Kirki::add_config(
				'secondary_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'secondary_color',
				[
					'type'        => 'color-palette',
					'settings'    => 'secondary_color',
					'label'       => esc_html__( 'Secondary Color', 'kirki' ),
					'description' => esc_html__( 'Select header and footer color', 'kirki' ),
					'section'     => 'color_scheme',
					'default'     => '#202020',
					'choices'     => [
						'colors' => [ '#000000','#101010', '#202020', '#303030', '#404040', '#505050', '#606060', '#707070', '#808080', '№909090' ],
					],
					'output'      => [
						[
							'element'  => '#footer-container, #site-header, .primary-menu-wrapper',
							'property' => 'background-color',
							'suffix'   => '!important',
						],
					],
				]
			);

			Kirki::add_config(
				'primary_color_custom',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'primary_color_custom',
				[
					'type'      => 'color',
					'settings'  => 'primary_color_custom',
					'label'     => esc_attr__( 'Primary Color (custom)', 'text-domain' ),
					'section'   => 'color_scheme',
					'default'   => '#e5e5e5',
					'output'      => [
						[
							'element'  => 'body',
							'property' => 'background-color',
							'suffix'   => '!important',
						],
					],
				]
			);



			Kirki::add_config(
				'secondary_color_custom',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'secondary_color_custom',
				[
					'type'      => 'color',
					'settings'  => 'secondary_color_custom',
					'label'     => esc_attr__( 'Secondary Color (custom)', 'text-domain' ),
					'section'   => 'color_scheme',
					'default'   => '#202020',
					'output'      => [
						[
							'element'  => '#footer-container, #site-header, .primary-menu-wrapper',
							'property' => 'background-color',
							'suffix'   => '!important',
						],
					],
				]
			);

			/**
			 * Breadcrumbs
			 */
/*
			Kirki::add_panel(
				'breadcrumbs',
				[
					'title'          => esc_html__( 'Breadcrumbs', 'kirki' ),
					'priority'       => 90,
				]
			);
*/

			Kirki::add_section(
				'breadcrumbs_general',
				[
					'title'          => esc_html__( 'Breadcrumbs', 'kirki' ),
					'priority'       => 92,
					//'panel'			 => 'breadcrumbs',
				]
			);

			Kirki::add_config(
				'breadcrumbs_enable',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'breadcrumbs_enable',
				[
					'type'        => 'checkbox',
					'settings'    => 'breadcrumbs_enable',
					'label'       => esc_html__( 'Breadcrumbs Enable', 'kirki' ),
					'section'     => 'breadcrumbs_general',
					'default'     => false,
				]
			);

			Kirki::add_config(
				'breadcrumbs_separator',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'breadcrumbs_separator',
				[
					'type'        => 'generic',
					'settings'    => 'breadcrumbs_separator',
					'label'       => esc_html__( 'Separator', 'kirki' ),
					'description' => esc_html__( 'Add your separator', 'kirki' ),
					'section'     => 'breadcrumbs_general',
					'default'     => '',
					'choices'     => [
						'element'  => 'input',
						'type'     => 'text',
					],
				]
			);

			Kirki::add_config(
				'breadcrumbs_font',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'breadcrumbs_font',
				[
					'type'        => 'typography',
					'settings'    => 'breadcrumbs_font',
					'label'       => esc_html__( 'Font Style', 'kirki' ),
					'section'     => 'breadcrumbs_general',
					'default'     => [
						'font-family'    => 'Roboto',
						'variant'        => 'regular',
						'font-size'      => '14px',
						'color'          => '#8492A6',
					],
					'priority'    => 10,
					'transport'   => 'auto',
					'output'      => [
						[
							'element' =>
								[
									'.breadcrumbs',
									'.breadcrumbs a',
								],
						],
					],
				]
			);

			Kirki::add_config(
				'header_breadcrumbs_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'header_breadcrumbs_color',
				[
					'type'      => 'color',
					'label'     => esc_attr__( 'Bar color', 'text-domain' ),
					'section'   => 'breadcrumbs_general',
					'settings'  => 'header_breadcrumbs_color',
					'default'   => '#ffffff',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.breadcrumbs',
							'property' => 'background-color'
						],
					],
				]
			);

			Kirki::add_config(
				'breadcrumbs_position',
				[
					'capability'    => 'edit_theme_options',
					'transport'     => 'postMessage',
				]
			);

			Kirki::add_field(
				'breadcrumbs_position',
				[
					'type'      => 'radio-image',
					'label'     => esc_attr__( 'Position', 'text-domain' ),
					'section'   => 'breadcrumbs_general',
					'settings'  => 'breadcrumbs_position',
					'default'	=> 'left',
					'choices'   => [
						'left' => [
							'title' => esc_attr__( 'Logo Left' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M84.7214 28.5V57H42.371H0.0206504V28.5V-1.22935e-07H42.371H84.7214V28.5ZM0.867658 11.1537V21.463H42.371H83.8744V11.1537V0.844444H42.371H0.867658V11.1537ZM0.867658 39.0907V56.1556H42.371H83.8744V39.0907V22.0259H42.371H0.867658V39.0907Z" fill="#004BA4"/><path d="M23.8992 7.34667C24.0404 7.48037 24.238 7.76186 24.3368 7.98L24.5133 8.38111V11.407V14.44L24.3015 14.8833C24.1745 15.1437 23.991 15.397 23.8498 15.5096L23.6027 15.6926H15.655H7.70724L7.4602 15.5096C7.31903 15.397 7.13551 15.1437 7.00846 14.8833L6.79671 14.44V11.4V8.36L7.00846 7.91667C7.13551 7.6563 7.31903 7.40297 7.4602 7.29037L7.70724 7.10741H15.6691H23.638L23.8992 7.34667Z" fill="#004BA4"/><path d="M79.357 9.9926C79.4135 10.0207 79.5476 10.0841 79.6535 10.1193C79.9923 10.253 80.0981 10.5133 80.0981 11.1889C80.0981 11.7237 80.077 11.8152 79.9217 12.0193C79.8229 12.1389 79.6323 12.2726 79.4982 12.3148C79.3217 12.3711 72.3551 12.3852 55.6267 12.3711L31.9952 12.35L31.7693 12.1248C31.5505 11.8996 31.5435 11.8856 31.5435 11.2382C31.5364 10.4641 31.6211 10.253 32.0093 10.0559C32.2634 9.92223 32.7787 9.92223 55.7608 9.92926C68.6777 9.92926 79.3005 9.95741 79.357 9.9926Z" fill="#004BA4"/></svg>',
						],
						'center' => [
							'title' => esc_attr__( 'Logo Center' ),
							'path'	=> '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="85" height="57" transform="matrix(-1 0 0 1 85 0)" fill="none"/><path d="M84.7214 28.5V57H42.371H0.0206504V28.5V-1.22935e-07H42.371H84.7214V28.5ZM0.867658 11.1537V21.463H42.371H83.8744V11.1537V0.844444H42.371H0.867658V11.1537ZM0.867658 39.0907V56.1556H42.371H83.8744V39.0907V22.0259H42.371H0.867658V39.0907Z" fill="#004BA4"/><path d="M50.1025 4.23926C50.2436 4.37297 50.4413 4.65445 50.5401 4.8726L50.7166 5.27371V8.29963V11.3326L50.5048 11.7759C50.3777 12.0363 50.1942 12.2896 50.0531 12.4022L49.806 12.5852H41.8583H33.9105L33.6635 12.4022C33.5223 12.2896 33.3388 12.0363 33.2117 11.7759L33 11.3326V8.2926V5.2526L33.2117 4.80926C33.3388 4.54889 33.5223 4.29556 33.6635 4.18297L33.9105 4H41.8724H49.8413L50.1025 4.23926Z" fill="#004BA4"/><path d="M65.814 15.0657C65.8704 15.0939 66.0045 15.1572 66.1104 15.1924C66.4492 15.3261 66.5551 15.5865 66.5551 16.262C66.5551 16.7968 66.5339 16.8883 66.3786 17.0924C66.2798 17.212 66.0892 17.3457 65.9551 17.3879C65.7787 17.4442 58.812 17.4583 42.0836 17.4442L18.4521 17.4231L18.2263 17.1979C18.0075 16.9728 18.0004 16.9587 18.0004 16.3113C17.9933 15.5372 18.078 15.3261 18.4663 15.129C18.7204 14.9953 19.2356 14.9953 42.2177 15.0024C55.1346 15.0024 65.7575 15.0305 65.814 15.0657Z" fill="#004BA4"/></svg>',
						],
						'right' => [
							'title' => esc_attr__( 'Logo Right' ),
							'path'  => '<svg width="85" height="57" viewBox="0 0 85 57" fill="none" xmlns="http://www.w3.org/2000/svg" id="first-layout"><rect width="85" height="57" fill="none"/><path d="M0.278625 28.5V57H42.629H84.9793V28.5V-1.22935e-07H42.629H0.278625V28.5ZM84.1323 11.1537V21.463H42.629H1.12563V11.1537V0.844444H42.629H84.1323V11.1537ZM84.1323 39.0907V56.1556H42.629H1.12563V39.0907V22.0259H42.629H84.1323V39.0907Z" fill="#004BA4"/><path d="M61.1008 7.34667C60.9596 7.48037 60.762 7.76186 60.6632 7.98L60.4867 8.38111V11.407V14.44L60.6985 14.8833C60.8255 15.1437 61.009 15.397 61.1502 15.5096L61.3973 15.6926H69.345H77.2928L77.5398 15.5096C77.681 15.397 77.8645 15.1437 77.9915 14.8833L78.2033 14.44V11.4V8.36L77.9915 7.91667C77.8645 7.6563 77.681 7.40297 77.5398 7.29037L77.2928 7.10741H69.3309H61.362L61.1008 7.34667Z" fill="#004BA4"/><path d="M5.64299 9.9926C5.58652 10.0207 5.45241 10.0841 5.34653 10.1193C5.00773 10.253 4.90186 10.5133 4.90186 11.1889C4.90186 11.7237 4.92303 11.8152 5.07832 12.0193C5.17713 12.1389 5.36771 12.2726 5.50182 12.3148C5.67828 12.3711 12.6449 12.3852 29.3733 12.3711L53.0048 12.35L53.2307 12.1248C53.4495 11.8996 53.4565 11.8856 53.4565 11.2382C53.4636 10.4641 53.3789 10.253 52.9907 10.0559C52.7366 9.92223 52.2213 9.92223 29.2392 9.92926C16.3223 9.92926 5.69945 9.95741 5.64299 9.9926Z" fill="#004BA4"/></svg>',
						],
					],
				]
			);

			/**  Pagination -------------------------------------------------------------------------------------------------------------------------------- */

			Kirki::add_section(
				'pagination_general',
				[
					'title'          => esc_html__( 'Pagination', 'kirki' ),
					'priority'       => 92,
				]
			);

			Kirki::add_config(
				'active_page_color',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'active_page_color',
				[
					'type'      => 'color',
					'settings'  => 'active_page_color',
					'label'     => esc_attr__( 'Active page marker color', 'text-domain' ),
					'section'   => 'pagination_general',
					'default'   => '#F7A600',
					'transport' => 'auto',
					'output'    => [
						[
							'element' => '.page-numbers.current',
							'property' => 'background-color'
						],
					],
				]
			);

			Kirki::add_config(
				'pagination_font',
				[
					'capability'    => 'edit_theme_options',
				]
			);

			Kirki::add_field(
				'pagination_font',
				[
				'type'        => 'typography',
				'settings'    => 'pagination_font',
				'label'       => esc_html__( 'Pagination Font Style', 'kirki' ),
				'section'     => 'pagination_general',
				'default'     => [
					'font-family'    => 'Inter',
					'variant'        => 'regular',
					'font-size'      => '16px',
					'color'          => '#000000',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.pagination a, .page-numbers.current',
					],
				],
			]);

			Kirki::add_config(
				'border_radius_pagination_marker',
				[
					'capability'        => 'edit_theme_options',
					'transport'         => 'auto',
				]
			);

			Kirki::add_field(
				'border_radius_pagination_marker',
				[
					'type'	   => 'slider',
					'settings' => 'border_radius_pagination_marker',
					'label'    => esc_html__( 'Roundness of the marker', 'kirki' ),
					'section'  => 'pagination_general',
					'default'  => 0,
					'choices'  => [
						'min'	=> 1,
						'max'	=> 25,
						'step'	=> 1,
					],
					'output'   => [
						[
							'element'	=> '.page-numbers.current',
							'property'	=> 'border-radius',
							'suffix'    => 'px',
						],
					],
				]
			);

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

