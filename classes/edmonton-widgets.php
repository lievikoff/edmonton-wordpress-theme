<?php
/**
 * Edmonton functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Edmonton
 * @since Edmonton 1.0
 */

 
 


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
			<input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="number" value="<?php echo ( ( !empty( $posts_per_page ) ) && ( $posts_per_page ) ) ? esc_attr( $posts_per_page ) : '6'; ?>" step="1" min="1" size="3" />
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