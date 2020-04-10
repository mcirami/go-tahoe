<?php
/**
 *
 * Template Name: SignUp
 *
 */

get_header(); ?>


<section class="signup wrapper">
	
	<article class="container">
		
		<div class="content">
			<h2><?php the_field('header_text'); ?></h2>
			<?php the_field('sub_text') ?>
			<div class="wave_border"></div>
			
			<?php the_content(); ?>
		</div>
		
		<?php get_template_part('sidebar', 'flexible-content'); ?>
			
	</article>	
		
</section>
	
<?php get_template_part('content', 'social-footer'); ?>
		
<?php get_template_part('content', 'secondary-footer'); ?>


<?php get_footer(); ?>