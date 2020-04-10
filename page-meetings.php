<?php
/**
 *
 * Template Name: Meetings/Weddings Landing
 *
 */

get_header(); ?>

	<section class="meetings_landing wrapper">
		
		<article class="container">
			
			<div class="content">		
						
				<?php get_template_part('content', 'sections'); ?>
				
			</div>
			
			<?php get_template_part( 'sidebar', 'flexible-content' ); ?>
			
		</article>
		
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>
	
<?php get_footer(); ?>