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

<main id="main" <?php echo ( is_search() ) ? 'style="min-height: 150px;"' : ''; ?>>

	<?php
	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		global $wp_query;

		if ( $wp_query->found_posts ) {
			$archive_title = sprintf(
				'%1$s %2$s',
				__( 'Results for ', 'edmonton' ),
				'&ldquo;' . get_search_query() . '&rdquo;'
			);
		} else {
			$archive_title = sprintf(
				'%1$s %2$s',
				__( 'No results for ', 'edmonton' ),
				'&ldquo;' . get_search_query() . '&rdquo;'
			);
		}
	} else if ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'edmonton' );
	} else if ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
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

	if ( !is_active_sidebar( 'sidebar-1' ) ) {
		$site_content_main = 'site-content-main-full';
		$site_content = 'site-content-column';
	}

	?>
	<main id="site-content" class="<?php echo $site_content ?>" role="main">

	<?php
		if ( is_home() ) {
			?>

			<div id="site-content-main" style="<?php echo ( is_active_sidebar( 'sidebar-1' ) ) ? '' : 'width: 100%;'; echo ( get_theme_mod( 'masonry', false ) ) ? 'grid-auto-rows: 5px;' : ''; ?>" class="catalog-grid <?php echo $site_content_main ?>">

			<?php
		} else {
			?>

			<div id="site-content-main" style="<?php echo ( is_active_sidebar( 'sidebar-1' ) ) ? '' : 'width: 100%;'; echo ( get_theme_mod( 'masonry', false ) ) ? 'grid-auto-rows: 5px;' : ''; ?>" class="catalog-grid <?php echo $site_content_main ?>">

			<?php
		}

				if ( have_posts() ) {

					while ( have_posts() ) {

						the_post();
						get_template_part( 'template-parts/content-catalog', get_post_type() );

					}
				} else if ( is_search() ) {
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

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

			<div id="site-content-sitebar" class="<?php echo $site_content_sidebar ?>">
				<!-- sitebar -->


				<div id="true-side" class="sidebar">

					<?php dynamic_sidebar( 'sidebar-1' ); ?>

				</div>

			</div>

		<?php } ?>

	</main><!-- #site-content -->

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main>

<?php

if ( get_theme_mod( 'masonry', false ) ) {
	?>

	<script>
		function resizeGridItem( item ) {

			grid = document.getElementsByClassName( 'catalog-grid' )[0];
			rowHeight = parseInt( window.getComputedStyle( grid ).getPropertyValue( 'grid-auto-rows' ) );
			rowGap = parseInt( window.getComputedStyle( grid ).getPropertyValue( 'grid-row-gap' ) );
			rowSpan = Math.ceil( ( item.querySelector( '.catalog-content' ).getBoundingClientRect().height+rowGap ) / ( rowHeight+rowGap ) );
			item.style.gridRowEnd = 'span ' + rowSpan;
		}

		function resizeAllGridItems() {
			allItems = document.getElementsByClassName( 'catalog-item' );
			for( x=0; x < allItems.length; x++ ) {
				resizeGridItem( allItems[x] );
			}
		}

		window.onload = resizeAllGridItems();

		window.addEventListener( 'resize', resizeAllGridItems );

		allItems = document.getElementsByClassName( 'catalog-item' );
		for( x=0; x < allItems.length; x++ ) {
			imagesLoaded( allItems[x], resizeInstance );
		}

		function resizeInstance( instance ) {
			item = instance.elements[0];
			resizeGridItem( item);
		}
	</script>

	<?php
}

get_footer( );