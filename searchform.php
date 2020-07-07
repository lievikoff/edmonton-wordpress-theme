<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$edmonton_unique_id = edmonton_unique_id( 'search-form-' );

$edmonton_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form role="search" <?php echo $edmonton_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $edmonton_unique_id ); ?>">
		<span class="screen-reader-text"><?php _e( 'Search for:', 'edmonton' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<input type="search" id="<?php echo esc_attr( $edmonton_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search this site &hellip;', 'placeholder', 'edmonton' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
</form>
