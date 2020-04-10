<?php
/**
 *
 * Template Name: Press Images
 *
 */

get_header(); ?>

	<section class="press_images wrapper">
	
		<article class="container">
			
			<div class="header_content">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>

			<!-- Sidebar filtering -->
			<div class="filter_sidebar">
				<div class="mobile_filter_close">
					<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/mobile_close_popup.png" alt="close_popup"></a>
				</div>
				<div class="filter_lists_container">
					<div class="season_filter filter_section">
						<h3 class="filter_open">Filter By Season</h3>
						<ul>
							<li><a href="#" data-taxonomy="summer" class="filtered"><div style=""></div>Summer</a></li>
							<li><a href="#" data-taxonomy="winter"><div style=""></div>Winter</a></li>
						</ul>
					</div>
				</div>
				<div class="mobile_apply_filters">
					<div class="blue_border_button">
						<a href="#">Apply Filters</a>
					</div>
				</div>
			</div>
			
			<div class="content">
				<?php $link_url = true; ?>
				<?php if ( !is_user_logged_in() ) : ?>
					<?php $link_url = false; ?>
					<div class="login_form">
						<h2>LOG IN</h2>
						<?php wp_login_form(array()); ?>
					</div>
				<?php endif; ?>
				
				<!-- Filtered results -->
				<div class="press_images_content">
					<?php if ( is_user_logged_in() ) : ?>
						<?php if ( current_user_can('access_photos') || current_user_can('manage_options') ) : ?>
						<div class="press_images_results">
							<ul>
							</ul>
						</div>
						<?php else : ?>
						<div class="not-authorized">
							You don't have the proper access to download files. Please contact an adminsitrator.
						</div>
						<?php endif; ?>						
					<?php endif; ?>
					<input type="hidden" id="press_image_page_id" value="<?php echo get_the_ID(); ?>">
					<div class="restrictions_conditions">
						<?php the_field('restrictions_conditions'); ?>
					</div>
				</div>
			</div>
			
		</article>
			
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>