<?php get_header(); ?>

	<section class="blog wrapper">
	
		<article class="container">
			
			<div class="content">
	
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php get_template_part( 'content', 'blog-single' ); ?>
		
				<?php endwhile; // end of the loop. ?>
			</div>
			
			<?php get_template_part('sidebar', 'blog'); ?>
			
		</article>
		
	</section>
	
	<?php get_template_part('content', 'social-footer');  ?>
	
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>