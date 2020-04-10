<?php
/**
 * The Template for displaying all single listing posts.
 *
 * @package boiler
 */

get_header(); ?>

	<section class="single_listing wrapper">
		
		<article class="container">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="blue_border_button">
					<button onclick="history.go(-1);" class="back_to_results">Back To Results</button>
				</div>
				<?php get_template_part( 'content', 'single-listing' ); ?>
				
				<?php get_template_part( 'sidebar', 'single-listing' ); ?>
	
			<?php endwhile; // end of the loop. ?>
			
			<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
			<div class="map_popup">
				<div id="lodgingMap" style="width: 100%; height: 80%;"></div>
				<a href="#" class="map_close">X</a>
			</div>
		
		</article>
		
	</section>
	
	<?php //echo do_shortcode('[dr_add_listing_btn text="Add Listing" view="loggedin | loggedout | always"]'); ?>
	
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>