<aside class="sidebar">
	<?php $deals_type = get_field( 'activity_deals_type' )?>
	<?php if ( $deals_type ) : ?>
		<div class="sidebar_deals">
			<h3><?php echo $deals_type->name; ?> Deals</h3>
			<?php 
				$args = array (
					'post_type' => 'deals',
					'orderby' => 'rand',
					'posts_per_page' => 4,
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
						<div class="activity_deals">
							<p><?php the_title(); ?> <a href="<?php the_permalink(); ?>">Get This Deal ></a></p>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php $events_type = get_field( 'activity_events_type' )?>
	<?php if ( $events_type ) : ?>
		<div class="sidebar_events">
			<h3><?php echo $events_type->name; ?> Events</h3>
			<?php 
				$args = array (
						'post_type' => 'tribe_events',
						'posts_per_page' => 1,
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
					<div class="activity_events">
						<?php if ( the_post_thumbnail() ) : ?>
							<div class=“img-container”>
								<?php the_post_thumbnail( 'large' ); ?>
							</div>
						<?php endif; ?>
						<?php the_content(); ?>
						<a href="<?php the_permalink(); ?>">Go To Event ></a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
	
		</div>
	<?php endif; ?>
	<div class="sidebar_related">
		<h3>Related Links</h3>
		<?php if( have_rows('activity_related_links') ) : ?>
			<?php while ( have_rows('activity_related_links') ) : the_row(); ?>
				<div class="related_links">
					<a href="<?php the_sub_field('activity_related_link_url'); ?>"><?php the_sub_field('activity_related_link_text'); ?> ></a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</aside>