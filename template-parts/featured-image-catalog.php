<?php
/**
 * Displays the featured image
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */



$featured_media_inner_classes = '';

// Make the featured media thinner on archive pages.
?>

<figure class="featured-media-catalog">

	<a href="<?php the_permalink(); ?>">

		<div class="featured-media-inner-catalog" style="display: <?php if ( !has_post_thumbnail() ) echo 'none'; ?>;">

			<?php
			the_post_thumbnail();
			?>

		</div><!-- .featured-media-inner -->

	</a>

</figure><!-- .featured-media -->
