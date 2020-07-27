<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

?>

<div class="catalog-item" id="post-<?php the_ID(); ?>">

	<?php

    
    get_template_part( 'template-parts/featured-image-catalog' );

	get_template_part( 'template-parts/entry-header-catalog' );

	?>

	<div class="post-inner-catalog">

		<div class="entry-content-catalog">

			<?php
			the_excerpt();
			?>

		</div><!-- .entry-content -->

    </div><!-- .post-inner -->
    
    <?php
    get_template_part( 'template-parts/entry-footer-catalog' );
    ?>

</div><!-- .post -->
