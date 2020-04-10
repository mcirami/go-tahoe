<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$event_id = get_the_ID();

?>

<div class="single_event">
	<div class="blue_border_button back_to_results">
		<a href="<?php bloginfo('url'); ?>/events" class="back_to_results">BACK TO RESULTS</a>
	</div>
	<div class="event_content">
		<div class="event_header">
			<h2><?php the_title(); ?></h2>
			<div class="social_icons">
				<?php if (tribe_get_custom_field('Facebook URL')) : ?>
					<a href="<?php tribe_custom_field('Facebook URL'); ?>">
						<img src="/wp-content/uploads/2015/03/facebook-logo.png" alt="" />
					</a>
				<?php endif; ?>
				<?php if (tribe_get_custom_field('Twitter URL')) : ?>
					<a href="<?php tribe_custom_field('Twitter URL'); ?>">
						<img src="/wp-content/uploads/2015/03/twitter-logo.png" alt="" />
					</a>
				<?php endif; ?>
				<?php if (tribe_get_custom_field('Google Plus URL')) : ?>
					<a href="<?php tribe_custom_field('Google Plus URL'); ?>">
						<img src="/wp-content/uploads/2015/03/googleplus-logo.png" alt="" />
					</a>
				<?php endif; ?>
				<?php if (tribe_get_custom_field('Youtube URL')) : ?>
					<a href="<?php tribe_custom_field('Youtube URL'); ?>">
						<img src="/wp-content/uploads/2015/03/youtube-logo.png" alt="" />
					</a>
				<?php endif; ?>
				<?php if (tribe_get_custom_field('Instagram URL')) : ?>
					<a href="<?php tribe_custom_field('Instagram URL'); ?>">
						<img src="/wp-content/uploads/2015/03/instagram-logo.png" alt="" />
					</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="wave_border"></div>
			<div class="event_info">
				<ul>
					<li class="event_time"><?php echo tribe_get_start_date( $event_id, false, 'h:iA' ).' - '.tribe_get_end_date( $event_id, false, 'h:i A' ); ?></li>
					<li class="event_day">
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
					</li>
					<li class="event_address"><?php echo tribe_get_venue( $event_id ); ?></li>
					<li class="event_price"><?php tribe_get_cost($event_id); ?></li>
				</ul>
			</div>
			<?php $url = tribe_get_event_website_url( $event_id ); ?>
			<?php if ( ! empty( $url ) ) : ?>
				<div class="blue_border_button">
					<a href="<?php echo $url; ?>" target="_blank">GO TO SITE</a>
				</div>
			<?php endif; ?>
			
			<?php
				// Get Venue info.. 
				$venue_id = tribe_get_venue_id( $event_id );
				$venue_url = tribe_get_event_meta( $venue_id, '_VenueURL', true );
			?>
			<?php if ( ! empty( $venue_url ) ) : ?>
				<div class="blue_border_button buy_ticket">
					<a class="desktop_text" href="<?php echo $venue_url; ?>">BUY ACTIVITES TICKET</a>
					<a class="mobile_text" href="<?php echo $venue_url; ?>">Book Now</a>
				</div>
			<?php endif; ?>
			
		<div class="article_content">
			<div class="slider">
				<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
</div>
