<aside class="events_sidebar sidebar">
	<div class="sidebar_section">
		<h3>Good To Know</h3>
		<div class="section">
			<img src="http://gotahoe.red8dev.com/wp-content/uploads/2015/03/dining_mobile_640x440.jpg">
			<p>Tahoe Towns</p>
			<a href="http://gotahoe.red8dev.com/north-lake-tahoe/towns/">View </a>
		</div>
		<div class="section">
			<img src="http://gotahoe.red8dev.com/wp-content/uploads/2015/03/towns_mobile_640x440.jpg">
			<p>Tahoe Dining</p>
			<a href="http://gotahoe.red8dev.com/things/dining/">View </a>
		</div>
		<div class="section">
			<img src="http://gotahoe.red8dev.com/wp-content/uploads/2015/03/environment_forest_wildlife_content_image_305x305.jpg">
			<p>About the Lake</p>
			<a href="http://gotahoe.red8dev.com/north-lake-tahoe/environment/">View </a>
		</div>
	</div>

	<?php global $post; ?>
	<?php $post_type = get_post_type(get_the_ID()); ?>
	<?php if($post_type === 'tribe_events') : ?>		
		<?php 
			// Get up to 5 related events
			
			$related_events = array();
			$related_events = tribe_get_related_posts(5, $post);
			$time_format = get_option( 'time_format' );
		?>
		<?php if (is_array($related_events) && !empty($related_events)) : ?>
			<h3>Similar Events</h3>
			<ul>
			<?php foreach ($related_events as $related_event) : ?>
				<li><?php echo $related_event->post_title; ?><a href="<?php the_permalink(); ?>"> Link to page ></a></li>		
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php 
		// Grab up to 5 events for this current week
		
		$args = array (
			'posts_per_page' => 5,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		
		$start_date = strtotime('Sunday last week');
		$end_date = strtotime('Saturday this week');
		
		if($start_date) {
			$start_time = date('Y-m-d', $start_date);
			$args['start_date'] = $start_time;
		}
		if($end_date) {
			$end_time = date('Y-m-d', $end_date);
			$args['end_date'] = $end_time;
		}
		
		$events = tribe_get_events($args);
		
		if($events) : ?>
		
	<h3>Events This Week</h3>
	<ul>
	<?php
			global $post;
		
			$current_date = null;

			foreach($events as $post ) :
				setup_postdata($post);
	?>
				<li><?php the_title(); ?><a href="<?php the_permalink(); ?>"> Link to page ></a></li>
	<?php 	
			endforeach; 
			wp_reset_query(); 
		endif;
	?>
	</ul>
</aside>