<?php 
/* *
 * Template Name: Things To Do
 */
 
get_header(); ?>

	<section class="things_to_do">
		<article class="container">
			<div class="content">
				<div class="activities">
					<h4>ALL SUMMER ACTIVITIES</h4>
					<div class="activity_links">
						<?php if(have_rows('summer_activities')) : ?>
							<?php while(have_rows('summer_activities')) : the_row(); ?>
								<a href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('link_text'); ?> ></a>
							<?php endwhile; ?>
						<?php endif; ?>	
					</div>
					<h4>ALL WINTER ACTIVITIES</h4>
					<div class="activity_links">
						<?php if(have_rows('winter_activities')) : ?>
							<?php while(have_rows('winter_activities')) : the_row(); ?>
								<a href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('link_text'); ?> ></a>
							<?php endwhile; ?>
						<?php endif; ?>	
					</div>
				</div>
			</div>
			
			<?php get_template_part( 'sidebar', 'flexible-content' ); ?>
		</article>
	</section>
	
	<?php get_template_part('content', 'social-footer') ?>
	
	<?php get_template_part('content', 'secondary-footer') ?>

<?php get_footer(); ?>