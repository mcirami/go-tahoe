<?php
/**
 *
 * Template Name: Lodging Listings
 *
 */

get_header(); ?>

	<section class="lodging_listings wrapper">
		
		<?php 
			$types = (isset($wp_query->query_vars['lodging-by-type'])) ? $wp_query->query_vars['lodging-by-type'] : null;
			$towns = (isset($wp_query->query_vars['lodging-by-town'])) ? $wp_query->query_vars['lodging-by-town'] : null;
			$amenities = (isset($wp_query->query_vars['lodging-by-amenity'])) ? $wp_query->query_vars['lodging-by-amenity'] : null;
		?>
	
		<article class="container">
			
			<div class="header_content">
				<h2>WHERE TO STAY</h2>
				<?php the_content(); ?>
			</div>


			<!-- Sidebar filtering -->
			<div class="filter_sidebar">
				<div class="mobile_filter_close">
					<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/mobile_close_popup.png" alt="close_popup"></a>
				</div>
				<div class="filter_lists_container">
					<div class="type_filter filter_section">
						<h3 class="filter_open">Filter By Lodging Type</h3>
						<?php 
							$taxonomy = array('lodging');
							$args = array(
								'child_of' => 153,
							);
							$terms = get_terms($taxonomy, $args);
						?>
						<?php if($terms) : ?>
							<ul>
							<?php foreach($terms as $term) : ?>
								<?php 
									$filter_icon = get_field('filter_icon', $term);
									
									$has_types = false;
									if($types) :
										if($types == $term->slug || $types == 'all') :
											$has_types = true;
										endif;
									else :
										$has_types = true;
									endif; 
								?>
								<li><a href="#" data-taxonomy="<?php echo $term->slug; ?>" <?php if($has_types) { echo 'class="filtered"'; } ?>><div style="background-image: url('<?php echo $filter_icon['url']; ?>');"></div><?php echo $term->name; ?></a></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
					
					<div class="town_filter filter_section">
						<h3 class="filter_open">Filter By Town</h3>
						<?php 
							$taxonomy = array('location');
							$args = array(
								 	
							);
							$terms = get_terms($taxonomy, $args);
						?>
						<?php if($terms) : ?>
							<ul>
							<div class="apply_to_all">
								<a href="#" class="clear_filters">Clear filter</a>
								<a href="#" class="select_all">Select all</a>
							</div>
							<?php foreach($terms as $term) : ?>
								<?php 
									$filter_icon = get_field('filter_icon', $term);
									
									$has_towns = false;
									if($towns) :
										if($towns == $term->slug || $towns == 'all') :
											$has_towns = true;
										endif;
									else :
										$has_towns = true;
									endif; 
								?>
								<li><a href="#" data-taxonomy="<?php echo $term->slug; ?>" <?php if($has_towns) { echo 'class="filtered"'; } ?>><div style="background-image: url('<?php echo bloginfo('template_url'); ?>/images/location_filter.png');"></div><?php echo $term->name; ?></a></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
					
					<div class="amenity_filter filter_section">
						<h3 class="filter_open">Filter By Amenities</h3>
						<?php 
							$taxonomy = array('lodging');
							$args = array(
								'child_of' => 115,
							);
							$terms = get_terms($taxonomy, $args);
						?>
						<?php if($terms) : ?>
							<ul>
							<div class="apply_to_all">
								<a href="#" class="clear_filters">Clear filter</a>
								<a href="#" class="select_all">Select all</a>
							</div>
							<?php foreach($terms as $term) : ?>
								<?php 
									$filter_icon = get_field('filter_icon', $term);
								?>
								<li><a href="#" data-taxonomy="<?php echo $term->slug; ?>"><div style="background-image: url('<?php echo $filter_icon['url']; ?>');"></div><?php echo $term->name; ?></a></li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
				<div class="mobile_apply_filters">
					<div class="blue_border_button">
						<a href="#">Apply Filters</a>
					</div>
				</div>
			</div>
			
			
			<!-- Filtered results -->
			<div class="lodging_search_results">
				
			</div>
			
			<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
			<div class="map_popup">
				<div id="lodgingMap" style="width: 100%; height: 80%;"></div>
				<a href="#" class="map_close">X</a>
			</div>
			
			
		</article>
			
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>
