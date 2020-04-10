<?php 
/* *
 * Template Name: Meeting/Wedding Listings
 */
	
get_header(); ?>

	<section class="listing_taxonomy_page wrapper">
		
		<article class="container">
			
			<div class="content">
				<?php 
					$listing_type = get_field('listing_type');
					if($listing_type == 'meetings') :
						$taxonomy = 'meeting_facilities';
						$taxonomy_id = get_field('meeting_taxonomy');
					else :
						$taxonomy = 'weddings';
						$taxonomy_id = get_field('wedding_taxonomy');
					endif;
					$page_title = get_the_title();
					$page_description = get_the_content();
					
					if($taxonomy_id) :
						$args = array (
							'post_type' => 'directory_listing',
							'posts_per_page' => 30,
							'orderby' => 'rand',
							'order' => 'ASC',
							'tax_query' => array(	
								array(
									'taxonomy' => $taxonomy,
									'field' => 'id',
									'terms' => $taxonomy_id,
								),
							),
						);
									
						$query = new WP_Query($args);
				?>
					<h2 class="facility_title"><?php echo $page_title; ?></h2>
					<p class="facility_description"><?php echo $page_description; ?></p>
					<input type="hidden" id="taxonomy_name" value="<?php echo $taxonomy; ?>">
					<input type="hidden" id="taxonomy_terms" value="<?php echo $taxonomy_id; ?>">
					
					<div class="listing_results_container">
						<h3 class="results_number"><?php echo $query->found_posts; ?> Results</h3>
						<div class="wave_border"></div>
							
						<?php if($query->have_posts()) : ?>
							<ul class="listing_results">
							
							<?php while($query->have_posts()) : $query->the_post(); ?>
				
								<?php get_template_part('content', 'listing-search-result'); ?>
								
							<?php endwhile; wp_reset_postdata(); ?>
							
							<?php if($query->found_posts > 30) : ?>
								<div class="blue_border_button large_blue_border_button">
									<a href="#" class="load_more">Load More</a>
								</div>
							<?php endif; ?>
								
							</ul>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			
			<?php get_template_part( 'sidebar', 'flexible-content' ); ?>
			
		</article>
		
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>
	
<?php get_footer(); ?>