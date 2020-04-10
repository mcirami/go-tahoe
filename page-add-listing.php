<?php
/**
 * Template Name: Add Listing
 */
acf_form_head();
get_header(); ?>
	<?php get_template_part('content', 'search-hero'); ?>

	<div class="wrapper">
	<section class="container">
		<?php the_content(); ?>
		<?php acf_form(); ?>
	</section>
	</div>
	
	<?php get_template_part('content', 'social-footer');  ?>
	
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>
