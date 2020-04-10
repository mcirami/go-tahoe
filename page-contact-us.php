<?php
/**
 *
 * Template Name: Contact Us
 *
 */

get_header(); ?>

	<section class="contact_us wrapper">
		
		<article class="container">
			
			<div class="content">
				<h2><?php the_field('header_text'); ?></h2>
				<?php the_field('sub_text'); ?>
				<div class="wave_border"></div>
				<div class="contact_info">
					<a class="phone_number" href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a>
					<a class="email_address" href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a>
				</div>
				<?php the_content(); ?>
			</div>
			
			<?php get_template_part( 'sidebar', 'contact' ); ?>
			
		</article>
		
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>
	
<?php get_footer(); ?>