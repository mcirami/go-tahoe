<aside class="sidebar">
	<?php 
		$options = 'options';
		$page_id = '';
		$read_from_page = false;
		
		
		if ( isset( $eventDisplay ) && $eventDisplay == "list" ) { // Condition to work with The Events Calendar Plugin
			$events_page = get_page_by_path('events');
			if ( $events_page ) {
				$page_id = $events_page->ID;
			}
			
		} elseif ( is_search() ) { // Load sidebar for search results page
			$search_results_page = get_page_by_path('search-results');
			if ( $search_results_page ) {
				$page_id = $search_results_page->ID;
			}
		}
		
		if( have_rows( 'sidebar_sections', $page_id ) ) {
			$options = $page_id;
			$read_from_page = true;		
		}
	?>
	
	<?php if( $read_from_page == false && !have_rows( 'sidebar_sections', 'options' ) ) : ?>
		<p>Warning: Sidebar content not found.<br>Please check the Default Sidebar menu.</p>
	<?php else :?> 
			
		<?php while ( have_rows( 'sidebar_sections', $options ) ) : the_row(); ?>
		
	        <?php if( get_row_layout() == 'deals_section' ) : // Deals Section ?>
				<div class="sidebar_deals">
					<h3><?php echo get_sub_field( 'section_title' ); ?></h3>
					<?php 
						$deals_type = get_sub_field( 'deals_type' );
		
						$args = array (
							'post_type' => 'deals',
							'orderby' => 'rand',
							'posts_per_page' => get_sub_field( 'number_of_deals' ),
							'tax_query' => array(
								array(
									'taxonomy' => 'type',
									'field'    => 'slug',
									'terms'    => $deals_type->slug
								),
							),
						);							
						$the_query = new WP_Query($args);  
					?>
						
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="deals">
								<p><?php the_title(); ?> <a href="<?php the_permalink(); ?>">Get This Deal ></a></p>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p>No results found</p>
					<?php endif; ?>
				</div>
	
	        <?php elseif( get_row_layout() == 'related_links_section' ) : // Related Links Section ?>        
	        	<div class="sidebar_related">
					<h3><?php echo get_sub_field( 'section_title' ); ?></h3>
					<?php if( have_rows( 'related_links' ) ) : ?>
						<?php while ( have_rows( 'related_links' ) ) : the_row(); ?>
							<div class="related_links">
								<a href="<?php the_sub_field('related_link_url'); ?>" <?php if(get_sub_field('new_tab')) { echo 'target="_blank"'; } ?>><?php the_sub_field('related_link_text'); ?></a>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
	       	
	        <?php elseif( get_row_layout() == 'events_section' ) : // Events Section ?> 
				<div class="sidebar_events">
					<h3><?php echo get_sub_field( 'section_title' ); ?></h3>
					<?php
						$events_type = get_sub_field( 'events_type' );
						
						if($events_type) :
							$args = array (
									'post_type' => 'tribe_events',
									'orderby' => 'rand',
									'posts_per_page' => get_sub_field( 'number_of_events' ),
									'tax_query' => array(
											array(
													'taxonomy' => 'tribe_events_cat',
													'field'    => 'slug',
													'terms'    => $events_type->slug
											),
									),
							);							
							$the_query = new WP_Query($args);
						?>			
						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="event">
									<?php if ( the_post_thumbnail() ) : ?>
										<div class="img-container">
											<?php the_post_thumbnail( 'large' ); ?>
										</div>
									<?php endif; ?>
									<?php the_content(); ?>
									<a href="<?php the_permalink(); ?>">Go To Event ></a>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php else : ?>
							<p>No results found</p>
						<?php endif; ?>
					<?php else : ?>
						<p>No results found</p>
					<?php endif; ?>
				</div>
				<?php // end Events Section ?>
	        
	        <?php elseif( get_row_layout() == 'generic_section' ) : // Generic Section ?>        
	        	<div class="sidebar_section">
					<h3><?php echo get_sub_field( 'section_title' ); ?></h3>
					<?php if( have_rows( 'sections' ) ) : ?>
						<?php while ( have_rows( 'sections' ) ) : the_row(); ?>
							<div class="section">
								<?php if ( get_sub_field( 'image' ) ) : ?>
									<?php $image = get_sub_field( 'image' ); ?>
									<div class=“img-container”>
										<?php if ( get_sub_field( 'link' ) ) : ?>
											<a href="<?php the_sub_field( 'link' ); ?>">
												<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
											</a>
										<?php else : ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if ( get_sub_field( 'text' ) ) : ?>
									<p><?php the_sub_field( 'text' ); ?></p>
								<?php endif; ?>
								<?php if ( get_sub_field( 'link' ) ) : ?>
									<a href="<?php the_sub_field( 'link' ); ?>">View ></a>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				
	        <?php elseif( get_row_layout() == 'featured_items' ) : // Featured Items Section ?>        
	        	<div class="sidebar_section">
					<?php if( have_rows( 'featured_items', 'options' ) ) : ?>
						<?php
							$featured_items = get_field( 'featured_items', 'options' );
							$rows_count = count( $featured_items );
							
							if ( $rows_count > 1 ) {
								$rand_elements = 2;
							} else {
								$rand_elements = 1;
							}
							
							$rand_keys = array_rand( $featured_items, $rand_elements );						
						?>
						<?php for ( $i = 0; $i < $rand_elements; $i++ ) : $current_item = $featured_items[$rand_keys[$i]]; ?>
							<div class="section">
							
								<?php 
									// Check if there's more than one element to be displayed. If so, display the title of the second element only when it's different from the title of the first element
				        			if ( $rand_elements > 1 && $i != 0) {
				        				$previous_item = $featured_items[$rand_keys[$i-1]];
				        				if ( !empty( $current_item['title'] ) && $current_item['title'] != $previous_item['title'] ) { 
				        					?>
				        					<h3><?php echo $current_item['title']; ?></h3>
				        					<?php
				        				}  
				        			} else {
				        				if ( ! empty( $current_item['title'] ) ) {
					        				?>
					        				<h3><?php echo $current_item['title']; ?></h3>
					        				<?php
				        				}
				        			}
				        		?>

								<?php if ( isset ( $current_item['image'] ) ) : ?>
									<div class=“img-container”>
										<?php if ( isset ( $current_item['link'] ) ) : ?>
											<a href="<?php echo $current_item['link']; ?>">
												<img src="<?php echo $current_item['image']['url']; ?>" alt="<?php echo $current_item['image']['alt']; ?>" />
											</a>
										<?php else : ?>
											<img src="<?php echo $current_item['image']['url']; ?>" alt="<?php echo $current_item['image']['alt']; ?>" />
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<?php if ( isset ( $current_item['text'] ) ) : ?>
									<p><?php echo $current_item['text']; ?></p>
								<?php endif; ?>
								<?php if ( isset ( $current_item['link'] ) ) : ?>
									<a href="<?php echo $current_item['link']; ?>">View ></a>
								<?php endif; ?>
							</div>
						<?php endfor; ?>
						
					<?php endif; ?>
				</div>				

	        <?php endif; ?>
		       
		<?php endwhile; ?>
		
	<?php endif; ?>
</aside>