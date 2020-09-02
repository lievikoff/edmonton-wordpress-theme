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
	
	<?php
	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			__( 'Search:', 'edmonton' ),
			'&ldquo;' . get_search_query() . '&rdquo;, ' . __('results:', 'edmonton')
		);

		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
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

			<div class="archive-header-inner archive-section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle archive-section-inner-result thin max-percentage"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
	}

	$site_content = '';
	$site_content_main = '';
	$site_content_sidebar = '';

	if ( get_theme_mod( 'content_sidebar_position' ) ) {

		$sidebar_position = get_theme_mod( 'content_sidebar_position' );
		
		if ( $sidebar_position ) {

			switch ($sidebar_position) {
				case 'left':
					$site_content = 'site-content-row-reverse';
					$site_content_main = 'site-content-main-cut';
					$site_content_sidebar = 'main-sidebar-left';
					break;
				
				case 'right':
					$site_content = 'site-content-row';
					$site_content_main = 'site-content-main-cut';
					$site_content_sidebar = 'main-sidebar-right';
					break;

				case 'top':
					$site_content = 'site-content-column-reverse';
					$site_content_main = 'site-content-main-full';
					$site_content_sidebar = 'main-sidebar-top';
					break;

				case 'bottom':
					$site_content = 'site-content-column';
					$site_content_main = 'site-content-main-full';
					$site_content_sidebar = 'main-sidebar-bottom';
					break;
			}
		}
	}

	if ( !is_active_sidebar( 'main_sidebar' ) ) {
		$site_content_main = 'site-content-main-full';
		$site_content = 'site-content-column';
	}
	
	?>
	<main id="site-content" class="<?php echo $site_content ?>" role="main">

	<?php
		if ( is_home() ) {
			?>
		
			<div id="site-content-main" style="<?php echo ( is_active_sidebar( 'main_sidebar' ) ) ? '' : 'width: 100%;' ?>" class="catalog-grid <?php echo $site_content_main ?>">

			<?php
		} else {
			?>

			<div id="site-content-main" style="<?php echo ( is_active_sidebar( 'main_sidebar' ) ) ? '' : 'width: 100%;' ?>" class="catalog-grid <?php echo $site_content_main ?>">
			
			<?php
		}

				if ( have_posts() ) {

					while ( have_posts() ) {

						the_post();
						get_template_part( 'template-parts/content-catalog', get_post_type() );

					}
				} elseif ( is_search() ) {
					?>

					
					<div class="no-search-results-form section-inner thin">
					Search more
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

		<?php if ( is_active_sidebar( 'main_sidebar' ) ) { ?>

			<div id="site-content-sitebar" class="<?php echo $site_content_sidebar ?>">
				<!-- sitebar -->

		
				<div id="true-side" class="sidebar">

					<?php dynamic_sidebar( 'main_sidebar' ); ?>

				</div>

			</div>

		<?php } ?>

	</main><!-- #site-content -->
	
	<?php get_template_part( 'template-parts/pagination' ); ?>

</main>

<?php

get_footer( );