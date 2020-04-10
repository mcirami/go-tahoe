<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

	<section class="blog wrapper">
	
		<article class="container">

			<div class="content">
				
				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 10,
						'orderby' => 'publish_date',
						'order' => 'DESC'	
					);
					
					$post_query = new WP_Query($args);
					
					if($post_query->have_posts()) :
				?>
	
					<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
						
						<?php get_template_part('content', 'blog-single'); ?>
			
					<?php endwhile; // end of the loop. ?>
					
					<?php if($post_query->found_posts > 10) { ?>
						<div class="blue_border_button large_blue_border_button">
		   					<a href="#" class="load_more">Load More</a>
		   				</div>
					<?php } ?>
				
				<?php endif; wp_reset_postdata(); ?>
			
			</div>
			
			<?php get_template_part('sidebar', 'blog'); ?>
			
		</article>
		
	</section>
	
	<?php get_template_part('content', 'social-footer');  ?>
	
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>