<?php 

get_header(); ?>

<section class="homepage wrapper">
	
	
	
	<div class="container">
		
		<!-- Featured Events -->
		<article class="featured_events">
			<div class="title_row">
				<h3>Featured Events</h3>
				<div class="blue_border_button">
					<a href="/events">See All Events</a>
				</div>
			</div>
			<?php 
				$event_count = 0;
				$event_ids = array();
				
				// get current date and turn it into time
				$current_date = date('m/d/y'); 
				$current_time = strtotime($current_date);
			?>
			
			<div class="featured_event_row">
				<?php if( have_rows('featured_events') ): ?>				
				    <?php while ( have_rows('featured_events') ) : the_row(); ?>
				    	<?php if($event_count < 3) : // make sure we don't already have 3 events ?>
							<?php 
								// Get start and end times and turn them into time to check against current
								$start_date = get_sub_field('start_date');
								$end_date = get_sub_field('end_date');
								
								$start_time = strtotime($start_date);
								$end_time = strtotime($end_date);
							?>
							<?php if($current_time >= $start_time && $current_time <= $end_time) : // check if event is current ?>
									<?php 
										// increment $event_count
										$event_count++;
										
										// get featured event and display it
										$featured_event = get_sub_field('event'); 
										if( $featured_event ): 
											$post = $featured_event;
											setup_postdata( $post ); 
											
											// add id to $event_ids in case we need to exclude it from query
											$event_ids[] = get_the_ID();
									?>
										<div class="featured_event">
											<?php if(has_post_thumbnail()) : ?>
												<?php the_post_thumbnail('thumb-351-251'); ?>
											<?php endif; ?>
											<?php 
												$event_title = get_the_title();
												if(strlen($event_title) > 45) {
													$event_title = substr($event_title, 0, 42).'...';
												}
											?>
											<h2><a href="<?php the_permalink(); ?>"><?php echo $event_title; ?></a></h2>
											<div class="wave_border"></div>
											<p class="event_time"><?php echo tribe_get_start_date( $post, false, 'h:iA' ).' - '.tribe_get_end_date( $post, false, 'h:i A' ); ?></p>
											<p class="event_days">
												<?php 
													if(function_exists('tribe_get_start_date')) {
														if(function_exists('tribe_is_recurring_event')) {
															if(tribe_is_recurring_event()) { 
																$day = tribe_get_start_date( $event_id, false, 'l');
																echo 'Every '.$day;
															} else { 
																echo tribe_get_start_date( $event_id, false, 'M d, Y' ); 
															}
														} else {
															echo tribe_get_start_date( $event_id, false, 'M d, Y' ); 
														} 
													}
												?>
											</p>
											<?php the_excerpt(); ?>
											<?php 
												$terms = get_the_terms($post->ID, 'tribe_events_cat');
												if ($terms) {
													foreach($terms as $term) {
														$termLink = get_term_link($term->term_id, 'tribe_events_cat');
													}
												}
											?>
											<?php if ($terms) : ?>
											<div class="blue_border_button">
												<a href="<?php echo $termLink; ?>">See Similar</a>
											</div>
											<?php else : ?>
											<div class="blue_border_button">
												<a href="/events">More Events</a>
											</div>
											<?php endif; ?>
											<div class="blue_border_button">
												<a href="<?php the_permalink(); ?>">Read More</a>
											</div>
										</div>
									<?php
											wp_reset_postdata();
										endif;
									?>
							<?php endif; // end of time check ?>
						<?php endif; // end of event count check ?>
					<?php endwhile; ?>
				<?php endif; ?>
				
				<?php if($event_count < 3) : // if we didn't find 3 in repeater then we need to get more ?>
					<?php 
						// Figure out how many events we need from the query
						$events_needed = 3 - $event_count;
						
						$start_date = date('Y-m-d');
						
						$args = array(
							'posts_per_page' => $events_needed,
							'order_by' => 'start_date',
							//'end_date' => $start_date	
						);
						
						$events = tribe_get_events($args);
		
						if($events) :
					?>	
						<?php foreach($events as $post ) : ?>
							<?php setup_postdata( $post ); ?>
							<div class="featured_event">
								<?php if(has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('medium'); ?>
								<?php endif; ?>
								<?php 
									$event_title = get_the_title();
									if(strlen($event_title) > 45) {
										$event_title = substr($event_title, 0, 42).'...';
									}
								?>
								<h2><a href="<?php the_permalink(); ?>"><?php echo $event_title; ?></a></h2>
								<div class="wave_border"></div>
								<p class="event_time"><?php echo tribe_get_start_date( $post, false, 'h:iA' ).' - '.tribe_get_end_date( $post, false, 'h:i A' ); ?></p>
								<p class="event_days">
									<?php 		
										if(function_exists('tribe_get_start_date')) {
											if(function_exists('tribe_is_recurring_event')) {
												if(tribe_is_recurring_event()) { 
													$day = tribe_get_start_date( $post, false, 'l');
													echo 'Every '.$day;
												} else { 
													echo tribe_get_start_date( $post, false, 'M d, Y' ); 
												}
											} else {
												echo tribe_get_start_date( $post, false, 'M d, Y' ); 
											}
										}
									?>
								</p>
								<?php the_excerpt(); ?>
								<?php 
									$terms = get_the_terms($post->ID, 'tribe_events_cat');
									foreach($terms as $term) {
										$termLink = get_term_link($term->term_id, 'tribe_events_cat');
									}
								?>
								<?php if ($terms) : ?>
								<div class="blue_border_button">
									<a href="<?php echo $termLink; ?>">See Similar</a>
								</div>
								<?php else : ?>
								<div class="blue_border_button">
									<a href="/events">More Events</a>
								</div>
								<?php endif; ?>
								<div class="blue_border_button">
									<a href="<?php the_permalink(); ?>">Read More</a>
								</div>
							</div>
						
						<?php endforeach; wp_reset_postdata(); ?>
						
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</article>
	</div>
	
</section>

<section class="homepage">
	<article class="featured_activity">
		<?php $featured_activity_image = get_field('featured_activity_image'); ?>
		<?php if($featured_activity_image) : ?>
			<img src="<?php echo $featured_activity_image['url']; ?>" alt="<?php echo $featured_activity_image['alt']; ?>">
		<?php endif; ?>
		<?php 
			$featured_activity = get_field('featured_activity');
		?>
		<div class="featured_activity_content">
			<div class="container">
				<div class="title_row">
					<h3>Featured Activity</h3>
					<div class="white_border_button">
						<a href="/things">See All Activities</a>
					</div>
				</div>
				<?php //the_field('featured_activity_text'); ?>
				<div class="featured_titles">
					<h2 class="light_title"><?php the_field('featured_activity_line_1'); ?></h2>
					<h2 class="bold_title"><?php the_field('featured_activity_line_2'); ?></h2>
					<a class="arrow_cta" href="<?php echo $featured_activity; ?>"></a>
				</div>
			</div>
		</div>
	</article>	
</section>

<?php get_template_part('content', 'social-footer');  ?>

<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>