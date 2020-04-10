<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package boiler
 */

get_header(); ?>
	<div class="wrapper">
	<section class="container">
		<?php get_template_part('content', 'sections'); ?>
		<?php the_content(); ?>
	</section>
	</div>
	
	<?php get_template_part('content', 'social-footer');  ?>
	
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>
