<?php
/**
 * Template Name: Press Releases
 */

get_header(); ?>

	<section class="press_releases wrapper">
	
		<article class="container">

			<div class="content">
				
				<?php 
					$args = array(
						'post_type' => 'press-release',
						'posts_per_page' => 10,
						'orderby' => 'publish_date',
						'order' => 'DESC'	
					);
					
					$post_query = new WP_Query($args);
					
					if($post_query->have_posts()) :
				?>
	
					<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
			
						<?php get_template_part( 'content', 'blog-single' ); ?>
			
					<?php endwhile; // end of the loop. ?>
				
				<?php endif; wp_reset_postdata(); ?>
			
			</div>
			
			<?php get_template_part('sidebar', 'press-releases'); ?>
			
		</article>
		
	</section>
	
	<?php get_template_part('content', 'social-footer');  ?>
	
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>