<?php
/**
 * Customizer Separator Control settings for this theme.
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	if ( ! class_exists( 'Edmonton_Separator_Control' ) ) {
		/**
		 * Separator Control.
		 */
		class Edmonton_Separator_Control extends WP_Customize_Control {
			/**
			 * Render the hr.
			 */
			public function render_content() {
				echo '<hr/>';
			}

		}
	}
}
