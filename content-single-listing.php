<?php
/**
 * @package boiler
 */
?>

<div class="content">
	<h1><?php the_title(); ?></h1>
	<div class="wave_border"></div>
	<?php 
		$postid = get_the_ID();
		$lodging_terms = get_the_terms($postid, 'lodging');
		$lodging_type = null;
		if($lodging_terms) :
			foreach($lodging_terms as $term) :
				if($term->parent == 153) :
					$lodging_type = $term;
					break;
				endif;
			endforeach;
		endif;
	?>
	<input type="hidden" id="lodging_type" value="<?php if($lodging_type) { echo $lodging_type->slug; } else { echo 'none'; } ?>">
	<input type="hidden" id="latlong" value="<?php echo '['.get_field('latitude').','.get_field('longitude').']'; ?>">
	<?php if(get_field('phone')) : ?>
		<p class="phone_number"><?php the_field('phone'); ?></p>
	<?php endif; ?>
	<?php
		if (get_field('state') === 'California') {
			$stateRewrite = 'CA';
		} elseif (get_field('state') === 'Nevada') {
			$stateRewrite = 'NV';
		}
		$address = false;
		if(get_field('address')) { 
			$address .= get_field('address').', ';
		} 
		if(get_field('city')) { 
			$address .= get_field('city').', ';
		} 
		if($stateRewrite) { 
			$address .= $stateRewrite.' '; 
		} 
		if(get_field('zip')) { 
			$address .= get_field('zip'); 
		};
		if(get_field('latitude')) {
			$latitude = get_field('latitude');
		}
		if(get_field('longitude')) {
			$longitude = get_field('longitude');
		}
	?>
	<?php if (get_field('address') || get_field('city') || get_field('zip') || $stateRewrite ) : ?>
	<p class="address"><?php if(get_field('address')) { echo get_field('address').', '; } if(get_field('city')) { echo get_field('city').', '; } if ($stateRewrite) { echo $stateRewrite.' '; } if(get_field('zip')) { echo get_field('zip'); } ?></p>
	<?php endif; ?>
	<?php if ($address && (get_field('address') && get_field('city') && $stateRewrite )) : ?>
		<a href="http://maps.google.com/?q=<?php echo $address; ?>" target="_blank" class="view_map">View Map</a>
	<?php elseif($latitude && $longitude) : ?>
		<a href="http://maps.google.com/?q=<?php echo $latitude.','.$longitude; ?>" target="_blank" class="view_map">View Map</a>
	<?php endif; ?>
	<div class="blue_border_buttons">
		<div class="blue_border_button">
			<a href="<?php the_field('website_url'); ?>" class="book_now" target="_blank">Go To Site</a>
		</div>
		<?php if(get_field('book_online_url')) : ?>
			<div class="blue_border_button">
				<a href="<?php the_field('book_online_url'); ?>" class="book_now" target="_blank">Book Now</a>
			</div>
		<?php endif; ?>
		<?php if(get_field('activity_ticket')) : ?>
			<div class="blue_border_button">
				<a href="<?php the_field('activity_ticket'); ?>" class="buy_activities">BUY ACTIVITIES TICKET</a>
			</div>
		<?php endif; ?>
	</div>
	<div class="listing_content">
		<?php if(have_rows('additional_images')) : ?>
			<?php $i = 0; ?>
			<div class="listing_swiper">
				<div id="slider-1" class="swiper-container">
					<div class="swiper-wrapper">
					<?php while(has_sub_field('additional_images')) : ?>
						<?php 
							$hasSwiper = true;
							$slideImage = get_sub_field('additional_image');
							if($hasSwiper) {
								wp_enqueue_script('swiperCustom', get_template_directory_uri() . '/js/swiperCustom.js', array('jquery'), true);
							}
						?>
							<div class="swiper-slide">
								<img src="<?php echo $slideImage['url']; ?>" alt="<?php echo $slideImage['alt']; ?>" />
								<?php if($slideImage['caption']) : ?>
									<div class="image_caption">
										<p><?php echo $slideImage['caption']; ?></p>
									</div>
								<?php endif; ?>
							</div>
					<?php $i++; endwhile; ?>
					</div>
				</div>
				<div class="swiper_nav">
					<div class="swiper_left">
						<img src="<?php echo bloginfo('template_url'); ?>/images/image_nav_left.png" />
					</div>
					<div class="swiper_right">
						<img src="<?php echo bloginfo('template_url'); ?>/images/image_nav_right.png" />
					</div>
				</div>
				<div class="slide_count">
					<div class="slides_num"><span>1</span> of <div class="slide_upper"><?php echo $i; ?></div></div>
				</div>
			</div>
		<?php else : ?>
			<?php the_post_thumbnail('large'); ?>
		<?php endif; ?>
		<?php the_field('long_description'); ?>
	</div>
	
	
	<?php 
		$lodging_terms = get_the_terms(get_the_ID(), 'lodging');
		$result_amenities = array();
		if($lodging_terms) :
			foreach($lodging_terms as $term) :
				if($term->parent == 115) :
					$result_amenities[] = $term;
				endif;
			endforeach;
		endif;
	?>
	<?php if( ($result_amenities) || get_field('amenities_description') ) : ?>
		<div class="amenities_list">
		<h3>Full Amenities List</h3>
		<div class="wave_border"></div>
		<?php if (get_field('amenities_description')) : ?>
			<p><?php the_field('amenities_description'); ?></p>
		<?php endif; ?>
			<?php if ( $result_amenities ) : ?>
				<ul class="full_amenity_list">
					<?php foreach($result_amenities as $amenity) : ?>
						<?php $amenity_icon = get_field('filter_icon', $amenity); ?>
						<li><div class="result_amenity" style="background-image: url('<?php echo $amenity_icon['url']; ?>');"></div><p><?php echo $amenity->name; ?></p></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
	
	<?php if(have_rows('downloads')) : ?>
		<div class="downloads">
			<h3>Downloads</h3>
			<div class="wave_border"></div>
			<?php if (get_field('downloads_description')) : ?>
				<p><?php the_field('downloads_description'); ?></p>
			<?php endif; ?>
			<?php while(have_rows('downloads')) : the_row(); ?>
				<?php $download = get_sub_field('download_file'); ?>
				<a href="<?php echo $download['url']; ?>" download><?php $url_array = explode('/', $download['url']); echo array_pop($url_array); ?></a>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>	
		
	<?php if(have_rows('meeting_floor_plan')) : ?>
		<div class="floor_plans">
			<h3>Floor Plans</h3>
			<div class="wave_border"></div>
			<?php if (get_field('floor_plans_description')) : ?>
				<p><?php the_field('floor_plans_description'); ?></p>
			<?php endif; ?>
			<?php while(have_rows('meeting_floor_plan')) : the_row(); ?>
				<?php $floor_plan = get_sub_field('floor_plan'); ?>
				<a href="<?php echo $floor_plan['url']; ?>"><?php $url_array = explode('/', $floor_plan['url']); echo array_pop($url_array); ?></a>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>	
	
	<?php get_template_part('content', 'sections'); ?>
	
	<div class="wave_border"></div>
	<div class="blue_border_buttons">
		<div class="blue_border_button">
			<a href="<?php the_field('website_url'); ?>" class="book_now" target="_blank">Go To Site</a>
		</div>
		<?php if(get_field('book_online_url')) : ?>
			<div class="blue_border_button">
				<a href="<?php the_field('book_online_url'); ?>" class="book_now">Book Now</a>
			</div>
		<?php endif; ?>
		<?php if(get_field('activity_ticket_url')) : ?>
			<div class="blue_border_button">
				<a href="<?php the_field('activity_ticket_url'); ?>" class="buy_activities">BUY ACTIVITIES TICKET</a>
			</div>
		<?php endif; ?>
	</div>
</div>