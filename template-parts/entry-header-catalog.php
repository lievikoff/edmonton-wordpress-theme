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

<header class="entry-header-catalog">

	<div class="entry-header-inner-catalog">

		<?php
		
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title-catalog"><a href="' . esc_url( get_permalink() ) . '" title="' . get_the_title() . '">', '</a></h2>' );
		}
		?>

		<div class="author-post-catalog">

			<?php
			
			$author_id = get_post_field ( 'post_author', get_the_ID() );
			$name = get_the_author_meta( 'display_name' , $author_id ); 

			echo 'Posted by ' . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . $name . '</a> in ';
			get_the_category_custom( 4 );
			?>

		</div>
	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->
