<?php
/**
 * Displays the post header
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

?>

<header class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">

	<div class="entry-header-inner section-inner medium">

		<?php
		/**
		 * Allow child themes and plugins to filter the display of the categories in the entry header.
		 *
		 * @since Edmonton 1.0
		 *
		 * @param bool   Whether to show the categories in header, Default true.
		 */

		if ( is_singular() ) {
			the_title( '<h1 class="entry-title title-default">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title title-default heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}

		?>

	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->
