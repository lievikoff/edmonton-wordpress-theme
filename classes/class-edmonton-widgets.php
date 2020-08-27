<?php
/**
 * Edmonton functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

 
function true_remove_default_widget() {
	unregister_widget('WP_Widget_Archives');
	//unregister_widget('WP_Widget_Calendar'); 
	unregister_widget('WP_Widget_Categories'); 
	unregister_widget('WP_Widget_Meta'); 
	unregister_widget('WP_Widget_Pages'); 
	unregister_widget('WP_Widget_Recent_Comments'); 
	unregister_widget('WP_Widget_Recent_Posts'); 
	unregister_widget('WP_Widget_RSS'); 
	unregister_widget('WP_Widget_Search'); 
	unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Nav_Menu_Widget');
}

add_action( 'widgets_init', 'true_remove_default_widget' );

class theMostPopularArticle extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'popular_article', 
			'Popular article',
			array( 'description' => 'Allows you to display posts sorted by the number of views.' )
		);
	}
 
	public function widget( $args, $instance ) {
		global $wpdb;

		$title = apply_filters( 'widget_title', $instance['title'] ); 
		$posts_per_page = $instance['posts_per_page'];
		$popular_feature = $instance['popular_feature'];
		$time_period = $instance['time_period'];
		
		echo $args['before_widget'];
 
		if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];

		if ( $popular_feature == 'post_views_count' ) {
			$where = 'WHERE meta_key = \'post_views_count\'';
			$order_by = 'ORDER BY meta_value';
		} else if ( $popular_feature == 'comment_count' ) {
			$where = '';
			$order_by = 'ORDER BY ' . $popular_feature; 
		}
		
		switch ( $time_period ) {
			case 'all_time':
				$where .= ' and post_date <= current_date()';
				break;
			case 'this_year':
				$where .= ' and ( year( post_date ) = year( current_date() ) and post_date <= current_date() ) ';
				break;
			case 'last_year':
				$where .= ' and ( post_date >= date_sub(current_date(), interval 1 year) and post_date <= current_date() ) ';
				break;
			case 'last_half_a_year':
				$where .= ' and ( post_date >= date_sub(current_date(), interval 6 month) and post_date <= current_date() ) ';	
				break;
			case 'last_tree_month':
				$where .= ' and ( post_date >= date_sub(current_date(), interval 3 month) and post_date <= current_date() ) ';
				break;
			case 'last_month':
				$where .= ' and ( post_date >= date_sub(current_date(), interval 1 month) and post_date <= current_date() ) ';
				break;
			case 'last_two_weeks':
				$where .= ' and ( post_date >= date_sub(current_date(), interval 2 week) and post_date <= current_date() ) ';
				break;
			case 'last_week':
				$where .= ' and ( post_date >= date_sub(current_date(), interval 1 week) and post_date <= current_date() ) ';
				break;
			case 'last_day':
				$where .= ' and ( post_date >= date_sub(current_date(), interval 1 day) and post_date <= current_date() ) ';
				break;
		}

		$all_popular_posts = $wpdb->get_results( "SELECT *, CAST(meta_value AS UNSIGNED) as meta_value FROM $wpdb->posts INNER JOIN $wpdb->postmeta ON post_id = ID $where $order_by DESC LIMIT $posts_per_page" );
		$all_popular_posts = json_decode( json_encode( $all_popular_posts ), true );
		
		?>

		<div class="sidebar-main">

		<?php
		$i = 0;
		while ( $i < count( $all_popular_posts ) ) {
			?>

			<a href="<?php the_permalink( $all_popular_posts[$i]['post_id'] ); ?>" class="sidebar-item" 
				title="<?php echo $all_popular_posts[$i]['post_title']; ?>">

				<div class="sidebar-thumbnail">

					<img src="<?php echo get_the_post_thumbnail_url( $all_popular_posts[$i]['post_id'], 'thumbnail' )?>">

				</div>

				<div class="sidebar-content">

						<div class="sidebar-title">
							
							<?php
							echo $all_popular_posts[$i]['post_title'];
							?>

						</div>

						<div class="sidebar-post-data">

							<?php
							$date = date( 'F j, Y', strtotime( $all_popular_posts[$i]['post_date'] ) );
							
							$comment = $all_popular_posts[$i]['comment_count'];
							
							if ( $comment == 1 ) {
								$comment = ' - 1 comment';
							} else if ( $comment > 1 ) {
								$comment = ' - ' . $comment . ' comments';
							} else {
								$comment = '';
							}

							echo $date . $comment;
							?>

						</div>

				</div>

			</a>

			<?php
			$i++;
		}
		
		unset( $all_popular_posts );
		?>

		</div>

		<?php
 
		echo $args['after_widget'];
	}
 
	public function form( $instance ) {

		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}

		if ( isset( $instance['posts_per_page'] ) ) {
			$posts_per_page = $instance['posts_per_page'];
		}

		if ( isset( $instance['popular_feature'] ) ) {
			$popular_feature = $instance['popular_feature'];
		}

		if ( isset( $instance['time_period'] ) ) {
			$time_period = $instance['time_period'];
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"> Title </label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo ( ( !empty( $title ) ) && ( $title ) ) ? esc_attr( $title ) : ''; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>"> Number of posts: </label> 
			<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="number" style="width: 55px;" value="<?php echo ( ( !empty( $posts_per_page ) ) && ( $posts_per_page ) ) ? esc_attr( $posts_per_page ) : '6'; ?>" step="1" min="1" max="99" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'popular_feature' ); ?>"> Popularity for: </label> 
			<select id="<?php echo $this->get_field_id( 'popular_feature' ); ?>" name="<?php echo $this->get_field_name( 'popular_feature' ); ?>">

			<?php 

			$array_feature = [
				'post_views_count'	=> 'views',
				'comment_count'		=> 'comments',
			];

			if ( ( !empty( $popular_feature ) ) && ( $popular_feature ) ) {
				$feature = esc_attr( $popular_feature );
			} else {
				$feature = 'post_views_count'; 
			}

			foreach ($array_feature as $key => $value ) {
				?>

				<option value="<?php echo $key ?>" <?php if ( $key == $feature) { echo " selected";	} ?>> <?php echo $value; ?> </option>

				<?php
			}
			?>

			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'time_period' ); ?>"> Time period: </label> 
			<select id="<?php echo $this->get_field_id( 'time_period' ); ?>" name="<?php echo $this->get_field_name( 'time_period' ); ?>">

			<?php 

			$array_time_period = [
				'all_time'			=> 'all time',
				'this_year'			=> 'this year',
				'last_year'			=> 'last year',
				'last_half_a_year'	=> 'last half a year',
				'last_tree_month'	=> 'last tree month',
				'last_month'		=> 'last month',
				'last_two_weeks'	=> 'last two weeks',
				'last_week'			=> 'last week',
				'last_day'			=> 'last day',
			];

			if ( ( !empty( $time_period ) ) && ( $time_period ) ) {
				$period = esc_attr( $time_period );
			} else {
				$period = 'all_time'; 
			}

			foreach ($array_time_period as $key => $value ) {
				?>

				<option value="<?php echo $key ?>" <?php if ( $key == $period) { echo " selected";	} ?>> <?php echo $value; ?> </option>

				<?php
			}
			?>

			</select>
		</p>

		<?php 
	}
 
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) && isset( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '10'; 
		$instance['popular_feature'] = ( ! empty( $new_instance['popular_feature'] ) ) ? strip_tags( $new_instance['popular_feature'] ) : 'post_views_count';
		$instance['time_period'] = ( ! empty( $new_instance['time_period'] ) ) ? strip_tags( $new_instance['time_period'] ) : 'all_time';

		return $instance;
	}
}
 
function the_most_popular_article() {
	register_widget( 'theMostPopularArticle' );
}

add_action( 'widgets_init', 'the_most_popular_article' );

class quickLinks extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'quick_links', 
			'Quick links',
			array( 'description' => '' )
		);
	}
 
	public function widget( $args, $instance ) {
		global $wpdb;

		$title = apply_filters( 'widget_title', $instance['title_quick_link'] ); 
		
		echo $args['before_widget'];
		
		if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];

		if ( has_nav_menu('quick_link' ) ) {
			wp_nav_menu( array(
				'container' 	 => '',
				'theme_location' => 'quick_link',
				'menu_class' 	 => 'menu',
				)
			);
		}	
 
		echo $args['after_widget'];
	}
 
	public function form( $instance ) {

		if ( isset( $instance['title_quick_link'] ) ) {
			$title = $instance['title_quick_link'];
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_quick_link' ); ?>"> Title </label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_quick_link' ); ?>" name="<?php echo $this->get_field_name( 'title_quick_link' ); ?>" type="text" value="<?php echo ( ( !empty( $title ) ) && ( $title ) ) ? esc_attr( $title ) : ''; ?>" />
		</p>

		<?php 
	}
 
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		
		$instance['title_quick_link'] = ( ! empty( $new_instance['title_quick_link'] ) ) ? strip_tags( $new_instance['title_quick_link'] ) : '';

		return $instance;
	}
}
 
function quick_links() {
	register_widget( 'quickLinks' );
}

add_action( 'widgets_init', 'quick_links' );

class resentPosts extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'resent_posts', 
			'Resent posts',
			array( 'description' => 'Your site’s most recent Posts.' ) 
		);
	}
 
	public function widget( $args, $instance ) {
		global $wpdb;

		$title = apply_filters( 'widget_title', $instance['title_resent_posts'] ); 
		$count_posts = $instance['count_resent_posts'];
		
		echo $args['before_widget'];
 
		if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];
		

		$resent_posts = $wpdb->get_results( "SELECT * FROM wp_posts INNER JOIN wp_postmeta ON post_id = ID WHERE post_status = 'publish' AND post_type = 'post' ORDER BY `post_date` DESC LIMIT $count_posts" );
		$resent_posts = json_decode( json_encode( $resent_posts ), true );
		?>

		<div class="sidebar-main">

		<?php
		$i = 0;
		while ( $i < count( $resent_posts ) ) {
			?>

			<a href="<?php the_permalink( $resent_posts[$i]['post_id'] ); ?>" class="sidebar-item" 
				title="<?php echo $resent_posts[$i]['post_title']; ?>">

				<div class="sidebar-thumbnail">

					<img src="<?php echo get_the_post_thumbnail_url( $resent_posts[$i]['post_id'], 'thumbnail' )?>">

				</div>

				<div class="sidebar-content">

						<div class="sidebar-title">
							
							<?php
							echo $resent_posts[$i]['post_title'];
							?>

						</div>

						<div class="sidebar-post-data">

							<?php
							$date = date( 'F j, Y', strtotime( $resent_posts[$i]['post_date'] ) );
							echo $date;
							?>

						</div>

				</div>

			</a>

			<?php
			$i++;
		}
		
		unset( $all_popular_posts );
		?>
		
		</div>

		<?php
 
		echo $args['after_widget'];
	}
 
	public function form( $instance ) {

		if ( isset( $instance['title_resent_posts'] ) ) {
			$title = $instance['title_resent_posts'];
		}

		if ( isset( $instance['count_resent_posts'] ) ) {
			$count_posts = $instance['count_resent_posts'];
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_resent_posts' ); ?>"> Title </label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title_resent_posts' ); ?>" name="<?php echo $this->get_field_name( 'title_resent_posts' ); ?>" type="text" value="<?php echo ( ( !empty( $title ) ) && ( $title ) ) ? esc_attr( $title ) : ''; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'count_resent_posts' ); ?>"> Number of posts: </label> 
			<input id="<?php echo $this->get_field_id( 'count_resent_posts' ); ?>" name="<?php echo $this->get_field_name( 'count_resent_posts' ); ?>" type="number" style="width: 55px;" value="<?php echo ( ( !empty( $count_posts ) ) && ( $count_posts ) ) ? esc_attr( $count_posts ) : '3'; ?>" step="1" min="1" max="99" size="3" />
		</p>

		<?php 
	}
 
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title_resent_posts'] = ( ! empty( $new_instance['title_resent_posts'] ) ) ? strip_tags( $new_instance['title_resent_posts'] ) : '';
		$instance['count_resent_posts'] = ( is_numeric( $new_instance['count_resent_posts'] ) && isset( $new_instance['count_resent_posts'] ) ) ? $new_instance['count_resent_posts'] : '3'; 

		return $instance;
	}
}
 
function resent_posts() {
	register_widget( 'resentPosts' );
}

add_action( 'widgets_init', 'resent_posts' );