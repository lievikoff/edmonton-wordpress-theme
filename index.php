<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

get_header();
?>

<main id="main">

	<main id="site-content" role="main">

	<?php
		if ( is_home() ) {
			?>
		
			<div id="site-content-main" class="catalog-grid">

			<?php
		} else {
			?>

			<div id="site-content-main">
			
			<?php
		}

			$archive_title    = '';
			$archive_subtitle = '';

			if ( is_search() ) {
				global $wp_query;

				$archive_title = sprintf(
					'%1$s %2$s',
					'<span class="color-accent">' . __( 'Search:', 'edmonton' ) . '</span>',
					'&ldquo;' . get_search_query() . '&rdquo;'
				);

				if ( $wp_query->found_posts ) {
					$archive_subtitle = sprintf(
						/* translators: %s: Number of search results. */
						_n(
							'We found %s result for your search.',
							'We found %s results for your search.',
							$wp_query->found_posts,
							'edmonton'
						),
						number_format_i18n( $wp_query->found_posts )
					);
				} else {
					$archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'edmonton' );
				}
			} elseif ( is_archive() && ! have_posts() ) {
				$archive_title = __( 'Nothing Found', 'edmonton' );
			} elseif ( ! is_home() ) {
				$archive_title    = get_the_archive_title();
				$archive_subtitle = get_the_archive_description();
			}

			if ( $archive_title || $archive_subtitle ) {
				?>

				<header class="archive-header has-text-align-center header-footer-group">

					<div class="archive-header-inner section-inner medium">

						<?php if ( $archive_title ) { ?>
							<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
						<?php } ?>

						<?php if ( $archive_subtitle ) { ?>
							<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
						<?php } ?>

					</div><!-- .archive-header-inner -->

				</header><!-- .archive-header -->

				<?php
			}

				if ( have_posts() ) {

					$i = 0;

					while ( have_posts(array( 'posts_per_page' => 3 )) ) {
						$i++;
						the_post();

						get_template_part( 'template-parts/content-catalog', get_post_type() );

					}
				} elseif ( is_search() ) {
					?>

					<div class="no-search-results-form section-inner thin">

						<?php
						get_search_form(
							array(
								'label' => __( 'search again', 'edmonton' ),
							)
						);
						?>

					</div><!-- .no-search-results -->

					<?php
				}
			
			
	?>
			
		</div>

		<div id="site-content-sitebar">
			<!-- sitebar -->
			<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
	
			<div id="true-side" class="sidebar">

				<?php dynamic_sidebar( 'sidebar' ); ?>

			</div>

			<?php } ?>

		</div>

	</main><!-- #site-content -->

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main>

<?php

