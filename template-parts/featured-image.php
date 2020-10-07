<?php
/**
 * Displays the featured image
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

if ( has_post_thumbnail() && ! post_password_required() ) {

	$featured_media_inner_classes = '';

	// Make the featured media thinner on archive pages.
	if ( ! is_singular() ) {
		$featured_media_inner_classes .= ' medium';
	}
	?>

	<figure class="featured-media-post">

		<div class="featured-media-inner-post">

			<a href="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ); ?>">

				<?php
				the_post_thumbnail();
				?>

			</a>

		</div><!-- .featured-media-inner -->

	</figure><!-- .featured-media -->

	<?php
}
