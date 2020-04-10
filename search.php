<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package boiler
 */

get_header(); ?>
	
	<section class="search_page wrapper">
	
		<div class="container">
			
			<div class="content">

				<?php if ( have_posts() ) : ?>
					
					<?php get_search_form(); ?>
					
					<?php 
						global $query_string;

						$query_args = explode("&", $query_string);
						$search_query = array();
						
						foreach($query_args as $key => $string) {
							$query_split = explode("=", $string);
							$search_query[$query_split[0]] = urldecode($query_split[1]);
						} // foreach
						$search_query['posts_per_page'] = 5;
						
						$search = new WP_Query($search_query);
					?>
					<div class="search_results">
						<h3 class="results_number"><?php echo $search->found_posts; ?> Results</h3>
						<div class="wave_border"></div>
			
						<?php /* Start the Loop */ ?>
						<?php while ( $search->have_posts() ) : $search->the_post(); ?>
			
							<?php get_template_part( 'content', 'search' ); ?>
			
						<?php endwhile; wp_reset_postdata(); ?>
						
						<?php if($search->found_posts > 5) : ?>
								<div class="blue_border_button large_blue_border_button">
									<a href="#" class="load_more">Load More</a>
			   					</div>
						<?php endif; ?>
					</div>
		
				<?php else : ?>
		
					<?php get_template_part( 'no-results', 'search' ); ?>
		
				<?php endif; ?>
			
			</div>
			
			<?php get_template_part('sidebar', 'flexible-content'); ?>
		
		</div>
		
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>