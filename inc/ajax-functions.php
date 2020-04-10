<?php

/**
* Vendor listing: Ajax function to filter listing by type
*/
function filter_vendor_listing_by_type () {
	
	$listing_type = ( $_POST['listing_type'] );
	ob_start();
	
	if ( empty( $listing_type ) ) { ?>
		<p>Page configuration error: Listing type not selected</p>
		<div class="wave_border"></div>	
		<?php 
	} else {
		$taxonomies = get_object_taxonomies( 'directory_listing' );
		
		$terms = get_terms( $taxonomies, $args );
		
		if( $terms ) {
			foreach( $terms as $term ) {
				if ( $term->slug == $listing_type ) {
					$taxonomy = $term->taxonomy;
				}
			}
		}
	
		$paged = ( isset( $_POST['paged'] ) ) ? $_POST['paged'] : 1;
		$paged = intval( $paged );
		$posts_per_page = 5;
		$excluded_posts = (isset($_POST['excluded_posts'])) ? $_POST['excluded_posts'] : null;
			
		$args = array (
				'post_type' => 'directory_listing',
				'posts_per_page' => $posts_per_page,
				'orderby' => 'rand',
				'order' => 'ASC',
				'tax_query' => array(
						array(
								'taxonomy' => $taxonomy,
								'field' => 'slug',
								'terms' => $listing_type,
						),
				),
				'post__not_in' => $excluded_posts,
		);
		
		$listing = new WP_Query( $args );
		$total_posts = $listing->found_posts;
		if($excluded_posts) {
			$total_posts += count($excluded_posts);
		}
		
		if ( $listing->have_posts() ) {
			
			if ( $paged == 1 ) { ?>
				<h4 class="results_number"><?php echo $listing->found_posts; ?> Results</h4>
				<div class="wave_border"></div>
				<ul>
			<?php }		
					while ( $listing->have_posts() ) { $listing->the_post(); ?>
						<li class="listing_info" data-post_id="<?php echo get_the_ID(); ?>">
							<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo summary( strip_tags( get_field( 'long_description', get_the_ID() ) ), 230 ) ; ?></p>
							<?php if ( $website = get_field ( 'website_url', get_the_ID() ) ) : ?>
								<div class="blue_border_button">
				   					<a href="<?php echo $website; ?>" target="_blank">GO TO SITE</a>
				   				</div>
				   			<?php endif; ?>
				   			<?php if ( $activity_ticket_url = get_field ( 'activity_ticket', get_the_ID() ) ) : ?>
								<div class="blue_border_button">
				   					<a href="<?php echo $activity_ticket_url; ?>" target="_blank">BUY TICKET NOW</a>
				   				</div>
				   			<?php endif; ?>
						</li>
					<?php } ?>
				</ul>
				<?php if ( $paged * $posts_per_page < $total_posts ) { ?>
					<div class="blue_border_button large_blue_border_button">
		   				<a href="#" class="load_more">Load More</a>
		   			</div>
				<?php }
		} else {
			if ( $paged == 1 ) { ?>
				<h4 class="results_amount">No Results Found</h4>
				<div class="wave_border"></div>
			<?php }
		}
		
		wp_reset_postdata();
	}
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_filter_vendor_listing_by_type", "filter_vendor_listing_by_type");
add_action("wp_ajax_nopriv_filter_vendor_listing_by_type", "filter_vendor_listing_by_type");






/**
* Deals: Ajax function to filter deals by type
*/
function filter_deals_by_type () {
	
	ob_start();
	
	$start_date = (isset($_GET['startdate'])) ? $_GET['startdate'] : null;
	$end_date = (isset($_GET['enddate'])) ? $_GET['enddate'] : null;
	$types = (isset($_GET['types'])) ? $_GET['types'] : null;
	$towns = (isset($_GET['towns'])) ? $_GET['towns'] : null;
	
	$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
	$excluded_posts = (isset($_GET['excluded_posts'])) ? $_GET['excluded_posts'] : null;

	$args = array (
		'post_type' => 'deal',
		'posts_per_page' => 30,
		'orderby' => 'rand',
		'order' => 'ASC',
		'tax_query' => array(
			'relation' => 'AND',	
		),
		'post__not_in' => $excluded_posts,
	);
			
	if($types) :
		$new_array = array();
		foreach($types as $type) {
			$new_array[] = $type;
		}
		$type_array = array('taxonomy' => 'type', 'field' => 'slug', 'terms' => $new_array);
		$args['tax_query'][] = $type_array;
	endif;
	
	if($towns) :
		$new_array = array();
		foreach($towns as $town) {
			$new_array[] = $town;
		}
		$towns_array = array('taxonomy' => 'location', 'field' => 'slug', 'terms' => $new_array);
		$args['tax_query'][] = $towns_array;
	endif;
	
	if($start_date && $end_date) :
		$start_time = date('Ymd', strtotime($start_date));
		$end_time = date('Ymd', strtotime($end_date));
		
		$args['meta_query'] = array(
			'relation' => 'AND',
			array(
				'key' => 'expiration_date',
				'value' => $start_time,
				'compare' => '>=',	
				'type' => 'DATE',
			),
			array(
				'key' => 'start_date',
				'value' => $end_time,
				'compare' => '<=',	
				'type' => 'DATE',
			),
		);
	endif;
	
	$deals = new WP_Query($args);
	$total_posts = $deals->found_posts;
	if($excluded_posts) {
		$total_posts += count($excluded_posts);
	}
		
	if ( $deals->have_posts() ) : 
		
		if($paged == 1) : ?>
			<h3 class="results_number"><?php echo $deals->found_posts; ?> Results</h3>
			<div class="wave_border"></div>
			<div class="blue_border_button mobile_filter_button">
				<a href="#">Filter Results</a>
			</div>
			<ul>
		<?php endif; ?>
	
		<?php while( $deals->have_posts() ) : $deals->the_post(); ?>
		
			<?php get_template_part('content', 'deal-search-result'); ?>
		
		<?php endwhile; ?>
		
		<?php if($total_posts > (30*$paged)) : ?>
			<div class="blue_border_button large_blue_border_button">
				<a href="#" class="load_more">Load More</a>
			</div>
		<?php endif; ?>
	
		<?php if($paged == 1) : ?>
			</ul>
		<?php endif; ?>
	<?php else : ?>	
		<?php if($paged == 1) : ?>
			<h3 class="results_number">No Results Found</h3>
			<div class="wave_border"></div>
			<div class="blue_border_button mobile_filter_button">
				<a href="#">Filter Results</a>
			</div>
		<?php endif; ?>
	<?php endif; ?>

<?php
	wp_reset_postdata();
	
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_filter_deals_by_type", "filter_deals_by_type");
add_action("wp_ajax_nopriv_filter_deals_by_type", "filter_deals_by_type");







/**
* Events: Ajax function to filter events by type
*/
function filter_events_by_type () {
	
	ob_start();
	$start_date = (isset($_GET['startdate'])) ? $_GET['startdate'] : null;
	$end_date = (isset($_GET['enddate'])) ? $_GET['enddate'] : null;
	$filter_by = (isset($_GET['filterby'])) ? $_GET['filterby'] : null;
	$event_cat = (isset($_GET['category'])) ? $_GET['category'] : null;
	
	$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
	
	if ($event_cat) {
		$args = array (
			'posts_per_page' => 31,
			'paged' => $paged,
			'orderby' => '_EventStartDate',
			'order' => 'ASC',
			'eventDisplay' => 'all',
			'tax_query' => array(
				array(
					'taxonomy' => 'tribe_events_cat',
					'field'    => 'slug',
					'terms'    => $event_cat,
				),
			),
		); 
	} else {
		$args = array (
			'posts_per_page' => 31,
			'paged' => $paged,
			'orderby' => '_EventStartDate',
			'order' => 'ASC',
			'eventDisplay' => 'all',
		);
	}
	
	if($start_date) {
		$start_time = date('Y-m-d', strtotime($start_date));
		$args['start_date'] = $start_time;
	}
	if($end_date) {
		$end_time = date('Y-m-d', strtotime($end_date));
		$args['end_date'] = $end_time;
	}

	$events = tribe_get_events($args);

	$event_count = count($events);
	if($event_count > 30) {
		array_pop($events);
	}
	
	if($events) :
		global $post;
		
		$current_date = null;

		foreach($events as $post ) :
			setup_postdata($post);
	 
			$event_date = tribe_get_start_date( $post, false, 'F j' ); 
			$current_time = time();
			if($start_date) {
				$current_time = strtotime($start_date);
			}
			if(strtotime($event_date) < $current_time) {
				$event_date = date('F j', $current_time);
			}
			if($event_date != $current_date) :
				$current_date = $event_date;
		?>
			<h3 class="date_header"><?php echo $event_date; ?></h3>
		<?php endif; ?>
		<div class="event">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
			<div class="blue_border_button">
				<a href="<?php the_permalink(); ?>">Read More</a>
			</div>
			<?php
				// Get Venue info.. 
				$venue_id = tribe_get_venue_id( $post->ID );
				$venue_url = tribe_get_event_meta( $venue_id, '_VenueURL', true );
			?>
			<?php if ( ! empty( $venue_url ) ) : ?>			
				<div class="blue_border_button buy_ticket">
					<a href="<?php echo $venue_url; ?>">Buy Ticket Now</a>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; wp_reset_postdata(); ?>
	<?php if($event_count == 31) : ?>
		<div class="blue_border_button large_blue_border_button">
			<a href="#" class="load_more">Load More</a>
		</div>
	<?php endif; ?>
	
	
	<?php else : ?>
		<h3 class="date_header">No Results Found</h3>
	<?php endif; ?>
	<input type="hidden" value="<?php echo count($events); ?>" id="events_count">
<?php 
		
	wp_reset_query();
	
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_filter_events_by_type", "filter_events_by_type");
add_action("wp_ajax_nopriv_filter_events_by_type", "filter_events_by_type");







/**
* Lodging Listing: Ajax function to filter lodging by type
*/
function filter_lodging_by_type () {
	
	ob_start();
	
	$types = (isset($_GET['types'])) ? $_GET['types'] : null;
	$towns = (isset($_GET['towns'])) ? $_GET['towns'] : null;
	$amenities = (isset($_GET['amenities'])) ? $_GET['amenities'] : null;
	$excluded_posts = (isset($_GET['excluded_posts'])) ? $_GET['excluded_posts'] : null;
	
	$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
	$paged = intval($paged);

	$args = array (
		'post_type' => 'directory_listing',
		'posts_per_page' => 30,
		'orderby' => 'rand',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'lodging',
				'field' => 'slug',
				'terms' => 'type',
				'include_children' => true,
			),		
		),
	);
			
	if($types) :
		$new_array = array();
		foreach($types as $type) {
			$new_array[] = $type;
		}
		$type_array = array('taxonomy' => 'lodging', 'field' => 'slug', 'terms' => $new_array);
		$args['tax_query'][] = $type_array;
	endif;
	
	if($towns) :
		$new_array = array();
		foreach($towns as $town) {
			$new_array[] = $town;
		}
		$towns_array = array('taxonomy' => 'location', 'field' => 'slug', 'terms' => $new_array);
		$args['tax_query'][] = $towns_array;
	endif;
	
	if($amenities) :
		$new_array = array();
		foreach($amenities as $amenity) {
			$amenities_array = array('relation' => 'AND', 'taxonomy' => 'lodging', 'field' => 'slug', 'terms' => $amenity);
			$args['tax_query'][] = $amenities_array;
		}
		
	endif;
	
	if($excluded_posts) {
		$args['post__not_in'] = $excluded_posts;
	}
	
	$lodging = new WP_Query($args);
		
	if ( $lodging->have_posts() ) : 

		if($paged == 1) : ?>
			<h3 class="results_number"><?php echo $lodging->found_posts; ?> Results</h3>
			<a href="#" class="view_map">View Map</a>
			<div class="wave_border"></div>
			<div class="blue_border_button mobile_filter_button">
				<a href="#">Filter Results</a>
			</div>
			<ul class="listing_results">
		<?php endif; ?>
	
		<?php while( $lodging->have_posts() ) : $lodging->the_post(); ?>
		
			<?php get_template_part('content', 'listing-search-result'); ?>
		
		<?php endwhile; ?>

		<?php 
			$number_of_posts = $lodging->found_posts;
			if($excluded_posts) {
				$number_of_posts += count($excluded_posts);
			}
		?>
	
		<?php if($number_of_posts > (30*$paged)) : ?>
			<div class="blue_border_button large_blue_border_button">
				<a href="#" class="load_more">Load More</a>
			</div>
		<?php endif; ?>
	
		<?php if($paged == 1) : ?>
			</ul>
		<?php endif; ?>
	
	<?php else: ?>
		<?php if($paged == 1) : ?>
			<h3 class="results_number">No Results Found</h3>
			<div class="wave_border"></div>
		<?php endif; ?>
	<?php endif; ?>

<?php 
	
	wp_reset_postdata();
	
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_filter_lodging_by_type", "filter_lodging_by_type");
add_action("wp_ajax_nopriv_filter_lodging_by_type", "filter_lodging_by_type");







/**
* Search Ajax: Ajax function to load more search results
*/
function load_more_listing_taxonomy () {
	
	ob_start();
	
	$taxonomy_name = (isset($_GET['taxonomy_name'])) ? $_GET['taxonomy_name'] : null;
	$taxonomy_terms = (isset($_GET['taxonomy_terms'])) ? $_GET['taxonomy_terms'] : null;
	$excluded_posts = (isset($_GET['excluded_posts'])) ? $_GET['excluded_posts'] : null;
	
	$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
	$paged = intval($paged);

	$args = array (
		'post_type' => 'directory_listing',
		'posts_per_page' => 30,
		'orderby' => 'rand',
		'order' => 'ASC',
		'tax_query' => array(	
			array(
				'taxonomy' => $taxonomy_name,
				'field' => 'id',
				'terms' => $taxonomy_terms,
			),
		),
	);
	
	if($excluded_posts) {
		$args['post__not_in'] = $excluded_posts;
	}
	
	$query = new WP_Query($args); ?>	
	
	<?php /* Start the Loop */ ?>
	<?php if($query->have_posts()) : ?>
		
		<?php while($query->have_posts()) : $query->the_post(); ?>

			<?php get_template_part('content', 'listing-search-result'); ?>
			
		<?php endwhile; wp_reset_postdata(); ?>
			
	<?php endif; ?>
	
	<?php if($query->found_posts > (30*$paged)) : ?>
			<div class="blue_border_button large_blue_border_button">
				<a href="#" class="load_more">Load More</a>
			</div>
	<?php endif; ?>

<?php 
	
	wp_reset_postdata();
	
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_load_more_listing_taxonomy", "load_more_listing_taxonomy");
add_action("wp_ajax_nopriv_load_more_listing_taxonomy", "load_more_listing_taxonomy");







/**
* Search Ajax: Ajax function to load more search results
*/
function load_more_search_results() {
	
	ob_start();
	
	$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
	$paged = intval($paged);
	
	global $query_string;

	$query_args = explode("&", $query_string);
	$search_query = array();
	
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
	$search_query['posts_per_page'] = 5;
	$search_query['paged'] = $paged;
	
	$search = new WP_Query($search_query); ?>	
	
	<?php /* Start the Loop */ ?>
	<?php while ( $search->have_posts() ) : $search->the_post(); ?>

		<?php get_template_part( 'content', 'search' ); ?>

	<?php endwhile; wp_reset_postdata(); ?>
	
	<?php if($search->found_posts > (5*$paged)) : ?>
		<div class="blue_border_button large_blue_border_button">
			<a href="#" class="load_more">Load More</a>
		</div>
	<?php endif; ?>

<?php 
	
	wp_reset_postdata();
	
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_load_more_search_results", "load_more_search_results");
add_action("wp_ajax_nopriv_load_more_search_results", "load_more_search_results");




/**
* Blog Ajax: Ajax function to load more blog posts
*/
function load_more_blog_results() {
	
	ob_start();
	
	$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
	$paged = intval($paged);
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 10,
		'paged' => $paged,
		'orderby' => 'publish_date',
		'order' => 'DESC'	
	);
	
	$post_query = new WP_Query($args);
	
	if($post_query->have_posts()) : ?>	
	
		<?php /* Start the Loop */ ?>
		<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
	
			<?php get_template_part( 'content', 'blog-single' ); ?>
	
		<?php endwhile; wp_reset_postdata(); ?>
		
		<?php if($post_query->found_posts > (10*$paged)) : ?>
			<div class="blue_border_button large_blue_border_button">
				<a href="#" class="load_more">Load More</a>
			</div>
		<?php endif; ?>
		
	<?php endif; ?>

<?php 
	
	wp_reset_postdata();
	
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_load_more_blog_results", "load_more_blog_results");
add_action("wp_ajax_nopriv_load_more_blog_results", "load_more_blog_results");




/**
* Press Images: Ajax function to load in press images
*/

function filter_press_images_by_season() {
	ob_start();
	
	$pageID = (isset($_GET['pageID'])) ? $_GET['pageID'] : null;
	$season = (isset($_GET['season'])) ? $_GET['season'] : 'summer';
	
	$paged = (isset($_GET['paged'])) ? $_GET['paged'] : 1;
	$paged = intval($paged);
		
	if($pageID) {
		$seasonRepeater = 'summer_press_images';
		
		if($season == 'winter') {
			$seasonRepeater = 'winter_press_images';
		}
		
		$link_url = is_user_logged_in();
		
		if(have_rows($seasonRepeater, $pageID)) : ?>
			<?php while(have_rows($seasonRepeater, $pageID)) : the_row(); ?>
				<?php $largeImage = get_sub_field('large_image', $pageID); ?>
				<li class="press_image">
					<img src="<?php echo $largeImage['sizes']['thumb-351-251']; ?>">
					<div class="image_content">
						<div class="wave_border"></div>
						<?php if($link_url) : ?>
							<a class="download_press_image" href="<?php echo $largeImage['url']; ?>" download>Download</a>
						<?php else : ?>
							<a class="download_press_image login_alert" href="#">Download</a>
						<?php endif; ?>
						<div class="blue_border_button">
							<?php if($link_url) : ?>
								<a href="<?php echo $largeImage['sizes']['medium']; ?>" target="_blank">Small</a>
							<?php else : ?>
								<a href="#" class="login_alert">Small</a>
							<?php endif; ?>
						</div>
						<div class="blue_border_button">
							<?php if($link_url) : ?>
								<a href="<?php echo $largeImage['sizes']['large']; ?>" target="_blank">Medium</a>
							<?php else : ?>
								<a href="#" class="login_alert">Medium</a>
							<?php endif; ?>
						</div>
						<div class="blue_border_button">
							<?php if($link_url) : ?>
								<a href="<?php echo $largeImage['url']; ?>" target="_blank">Large</a>
							<?php else : ?>
								<a href="#" class="login_alert">Large</a>
							<?php endif; ?>
						</div>
					</div>
				</li>	
			<?php endwhile; ?>
		<?php endif;
	}
	
	echo ob_get_clean();
	die();
}
add_action("wp_ajax_filter_press_images_by_season", "filter_press_images_by_season");
add_action("wp_ajax_nopriv_filter_press_images_by_season", "filter_press_images_by_season");

?>