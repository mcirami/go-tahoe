<?php
/**
 * @package boiler
 */
?>

<?php if ( have_rows('hero_search', 'options') ) : ?>
	
	<?php while ( have_rows('hero_search', 'options') ) : the_row(); ?>
	
			<div class="hero_image hero_single_image">
				<?php $image = get_sub_field('hero_search_image', 'options'); ?>
				<?php $mobileImage = get_sub_field('hero_image_mobile', 'options'); ?>
			
				<?php if ($image) : ?>
					<picture>
						<?php if ($mobileImage) : ?>
							<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source srcset="<?php echo $mobileImage['sizes']['thumb-640-840']; ?>" media="(max-width: 600px)">
							<!--[if IE 9]></video><![endif]-->
						<?php endif; ?>
						<img srcset="<?php echo $image['sizes']['thumb-1280-650']; ?>" alt="<?php echo $image['alt']; ?>">
					</picture>
				<?php endif; ?>
			</div>
			
			<div class="hero_container">
				<div class="container">
					<div class="hero_copy hero_single_copy">
						<?php if (get_sub_field('hero_title_one', 'options')) : ?>
							<h2 class="light_title"><?php the_sub_field('hero_title_one', 'options'); ?></h2>
						<?php endif; ?>
						<?php if (get_sub_field('hero_title_two', 'options')) : ?>
							<h2 class="bold_title"><?php the_sub_field('hero_title_two', 'options'); ?></h2>
						<?php endif; ?>
					</div><!-- end hero_copy -->
				</div><!-- end container -->
			</div><!-- end hero_container -->
		
	<?php endwhile; ?>

<?php endif; ?>