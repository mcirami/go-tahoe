<?php
/**
 *
 * Template Name: Lodging Listings
 *
 */

get_header(); ?>

	<section class="deals wrapper">
		
		<?php 
			$types = (isset($wp_query->query_vars['deals-by-type'])) ? $wp_query->query_vars['deals-by-type'] : null;
			$towns = (isset($wp_query->query_vars['deals-by-town'])) ? $wp_query->query_vars['deals-by-town'] : null;
		?>
	
		<article class="container">

			<!-- Sidebar filtering -->
			<div class="filter_sidebar">
				<div class="mobile_filter_close">
					<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/mobile_close_popup.png" alt="close_popup"></a>
				</div>
				<div class="filter_lists_container">
					<div class="calendar_filter filter_section">
						<h3 class="filter_open">Deals Calendar</h3>
						<div class="deals_calendar">
							<?php 
								$current_date = date('D m/d/Y');
								$tomorrow_date = date('D m/d/Y', strtotime('+ 14 day'));
							?>
							<input type="text" id="start_date" value="<?php echo $current_date; ?>">
							<input type="text" id="end_date" value="<?php echo $tomorrow_date; ?>">
						</div>
					</div>
					
					<div class="deal_type_filter filter_section">
						<h3 class="filter_open">Filter By Deal Type</h3>
						<?php 
							$taxonomy = array('type');
							$args = array('hide_empty' => false);
							$terms = get_terms($taxonomy, $args);
						?>
						<?php if($terms) : ?>
							<ul>
							<?php foreach($terms as $term) : ?>
								<?php 
									if(!$term->parent) :
										$filter_icon = get_field('filter_icon', $term);
									
										$has_types = false;
										if($types) :
											if($types == $term->slug || $types == 'all') :
												$has_types = true;
											endif;
										endif; 
								?>
										<li><a href="#" data-taxonomy="<?php echo $term->slug; ?>" <?php if($has_types) { echo 'class="filtered"'; } ?>><div style="background-image: url('<?php echo $filter_icon['url']; ?>');"></div><?php echo $term->name; ?></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
					
					<div class="town_filter filter_section">
						<h3 class="filter_open">Filter By Town</h3>
						<?php 
							$taxonomy = array('location');
							$args = array();
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
										if($towns == $term->slug || $towns == 'all') {
											$has_towns = true;
										}
									endif; 
								?>
								<li><a href="#" data-taxonomy="<?php echo $term->slug; ?>" <?php if($has_towns) { echo 'class="filtered"'; } ?>><div style="background-image: url('<?php echo bloginfo('template_url'); ?>/images/location_filter.png');"></div><?php echo $term->name; ?></a></li>
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
			<div class="deals_search_results">
				
			</div>
			
		</article>
		
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>
