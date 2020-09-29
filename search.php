<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

get_header();
?>

<main id="main">

	<?php if ( have_posts() ) : ?>
		<header class="search-header">
			<h2 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'edmonton' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</header><!-- .page-header -->

		<div class="main-wrap results">
			<div class="main-content">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'catalog' );

				endwhile;

				the_posts_navigation(
					array(
						'prev_text' => '<span class="nav-icon"><i class="fas fa-long-arrow-alt-left"></i></span> <span class="nav-title">Older posts</span>',
						'next_text' => '<span class="nav-title">Newer posts</span> <span class="nav-icon"><i class="fas fa-long-arrow-alt-right"></i></span>',
					)
				);

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			</div>

		</div>

</main>

<?php
get_footer( );
