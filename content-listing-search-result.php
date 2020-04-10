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
<li id="listing_result_<?php echo $postid; ?>" class="listing_result" data-latlong="<?php echo '['.get_field('latitude').','.get_field('longitude').']'; ?>" data-lodging_type="<?php if($lodging_type) { echo $lodging_type->slug; } else { echo 'none'; } ?>">
	<?php if(has_post_thumbnail()) : ?>
		<?php //$thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumb-351-251' ); ?>
<!-- 		<img width="351" height="251" src="<?php echo $thumbnail; ?>" /> -->
		<?php the_post_thumbnail('thumb-351-251'); ?>
	<?php endif; ?>
	
	<?php if($lodging_type) : ?>
		<?php $badge_icon = get_field('badge_icon', $lodging_type); ?>
		<img class="result_badge" src="<?php if($badge_icon) { echo $badge_icon['url']; } else { echo bloginfo('template_url').'/images/badge_'.$lodging_type->slug.'.png'; } ?>" alt="badge">
	<?php endif; ?>
	<div class="result_content">
		<h3 class="listing_result_title"><a href="<?php echo get_the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo summary( str_replace( '/', ' / ', get_the_title() ), 45 ); ?></a></h3>
		<?php
			if (get_field('state') === 'California') {
				$stateRewrite = 'CA';
			} elseif (get_field('state') === 'Nevada') {
				$stateRewrite = 'NV';
			}
		?>
		<p><?php echo get_field('address').', '.get_field('city').', '.$stateRewrite.' '.get_field('zip'); ?></p>
		<div class="wave_border"></div>
		<div class="result_amenities">
			<?php 
				$lodging_terms = get_the_terms($postid, 'lodging');
				$result_amenities = array();
				if($lodging_terms) :
					foreach($lodging_terms as $term) :
						if($term->parent == 115) :
							$result_amenities[] = $term;
						endif;
					endforeach;
				endif;
			?>
			<?php if($result_amenities) : ?>
				<?php $i = 0; ?>
				<?php foreach($result_amenities as $amenity) : ?>
					<?php $amenity_icon = get_field('filter_icon', $amenity); ?>
					<?php if($i < 5) : ?>
						<div class="result_amenity tooltip" title="<?php echo $amenity->name; ?>" style="background-image: url('<?php echo $amenity_icon['url']; ?>');"></div>
						<?php /*<img class="result_amenity" src="<?php echo bloginfo('template_url'); ?>/images/amenity_icon.png" alt="amenity" data-amenity="<?php echo $amenity->name; ?>">*/ ?>
					<?php endif; $i++; ?>
				<?php endforeach; ?>
				<?php if(count($result_amenities) > 5) : ?>
					
					<?php $amenity_content = "&lt;ul&gt;"; ?>
					<?php foreach($result_amenities as $amenity) : ?>
						<?php $amenity_icon = get_field('filter_icon', $amenity); ?>
						<?php $amenity_content .= "&lt;li&gt;&lt;div class=&quot;result_amenity&quot; style=&quot;background-image: url('".$amenity_icon['url']."');&quot;&gt;&lt;/div&gt;&lt;p&gt;".$amenity->name."&lt;/p&gt;&lt;/li&gt;"; ?>
					<?php endforeach; ?>
					<?php $amenity_content .= "&lt;/ul&gt;"; ?>
					<a href="#" class="full_list_tooltip" title="<?php echo $amenity_content; ?>">FULL LIST</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="listing_buttons">
		<div class="blue_border_button">
			<a href="<?php the_permalink(); ?>" class="view_details">View Details</a>
		</div>
		<?php if(get_field('book_online_url')) : ?>
			<div class="blue_border_button">
				<a href="<?php the_field('book_online_url'); ?>" class="book_now" target="_blank">Book Now</a>
			</div>
		<?php endif; ?>
	</div>
</li>