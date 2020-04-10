<?php 
/**
 * Template Name: Vendor Listings
 */	
 get_header(); ?>
 
 <section class="vendor_listings wrapper">
 	<article class="container">
	 	<div class="content">
			 <div class="blue_border_button back_to_results">
				<a href="<?php echo get_permalink($post->post_parent); ?>">Back To Activity Page</a>
			</div>
			<div class="content_left">
				<div class="header_content">
                	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>
				<?php $listing_type = get_field( 'vendor_listing_type' ); ?>
				<?php if ( $listing_type ) : ?>
					<!-- Filtered results --> 
					<input type="hidden" id="vendor_listing_type" value="<?php echo $listing_type; ?>">
					<div class="vendor_listing_results">
					
					</div>
				<?php endif; ?>					
			</div>
		</div>
		<?php get_template_part( 'sidebar', 'flexible-content' ); ?>
	</article>
 </section>
 	
<?php get_template_part( 'content', 'social-footer' ); ?>
		
<?php get_template_part( 'content', 'secondary-footer' ); ?>
 
<?php get_footer(); ?>