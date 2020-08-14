<?php
/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

/**
 * Translators:
 * This text contains HTML to allow the text to be shorter on small screens.
 * The text inside the span with the class nav-short will be hidden on small screens.
 */

$prev_text = sprintf(
	'<svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg" id="left-pagination-arrow">
	<path d="M13.1667 2.33333L10.8333 0L0.833344 10L10.8333 20L13.1667 17.6667L5.50001 10L13.1667 2.33333Z" fill="white"/>
	</svg>'
);
$next_text = sprintf(
	'<svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg" id="right-pagination-arrow">
	<path d="M0.833322 17.6667L3.16666 20L13.1667 10L3.16666 1.03312e-06L0.833323 2.33333L8.49999 10L0.833322 17.6667Z" fill="white"/>
	</svg>'
);

$posts_pagination = get_the_posts_pagination(
	array(
		'mid_size'  => 1,
		'prev_text' => $prev_text,
		'next_text' => $next_text,
	)
);

// If we're not outputting the previous page link, prepend a placeholder with `visibility: hidden` to take its place.
if ( strpos( $posts_pagination, 'prev page-numbers' ) === false ) {
	$posts_pagination = str_replace( '<div class="nav-links">', '<div class="nav-links"><span class="prev page-numbers placeholder" aria-hidden="true">' . $prev_text . '</span>', $posts_pagination );
}

// If we're not outputting the next page link, append a placeholder with `visibility: hidden` to take its place.
if ( strpos( $posts_pagination, 'next page-numbers' ) === false ) {
	$posts_pagination = str_replace( '</div>', '<span class="next page-numbers placeholder" aria-hidden="true">' . $next_text . '</span></div>', $posts_pagination );
}

if ( $posts_pagination ) { ?>

	<div class="pagination-wrapper section-inner">

		<?php echo $posts_pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped during generation. ?>

	</div><!-- .pagination-wrapper -->

	<?php
}
