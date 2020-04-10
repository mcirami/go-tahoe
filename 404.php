<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package boiler
 */

get_header(); ?>

	<?php //get_template_part('content', 'search-hero'); ?>

	<section class="no_page wrapper">

		<div class="container">

			<div class="content">

				<article id="post-0" class="post not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'boiler' ); ?></h1>
					</header>
	
					<div class="entry-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'boiler' ); ?></p>
	
						<?php get_search_form(); ?>
	
					</div>
					
				</article>
				
			</div>
			
			<?php get_template_part('sidebar', 'flexible-content'); ?>
			
		</div>
		
	</section>
	
	<?php get_template_part('content', 'social-footer'); ?>
		
	<?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>