<?php
/**
 * @package boiler
 */
?>

<?php if( have_rows('hero_events', 'options') ): ?>

	<?php $rowCount = count(get_field('hero_events', 'options')); ?>

	<?php if ($rowCount > 1) : ?>
	
		<div class="hero-swiper-container">
				
			<div class="hero_slides slides swiper-wrapper">
	
				<?php while ( have_rows('hero_events', 'options') ) : the_row(); ?>
					
					<div class="slide swiper-slide">
						<div class="hero_image hero_slide_image">
							<?php $image = get_sub_field('hero_image', 'options'); ?>
							<?php $mobileImage = get_sub_field('hero_image_mobile', 'options'); ?>
							
							<?php if ($image) : ?>
								<picture>
									<?php if($mobileImage) : ?>
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
								<div class="hero_copy hero_slide_copy">
									<?php if (get_sub_field('hero_title_one', 'options')) : ?>
										<h2 class="light_title"><?php the_sub_field('hero_title_one', 'options'); ?></h2>
									<?php endif; ?>
									<?php if (get_sub_field('hero_title_two', 'options')) : ?>
										<h2 class="bold_title"><?php the_sub_field('hero_title_two', 'options'); ?></h2>
									<?php endif; ?>
									<?php if (get_sub_field('hero_copy', 'options')) : ?>
										<?php the_sub_field('hero_copy', 'options'); ?>
									<?php endif; ?>
									<?php if (get_sub_field('hero_link', 'options') || get_sub_field('custom_link', 'options')) : ?>
										<?php 
											if (get_sub_field('custom_link', 'options')) {
												$link = get_sub_field('custom_link', 'options');
											} else {
												$link = get_sub_field('hero_link', 'options');
											}
										?>
										<a class="arrow_cta" <?php if (get_sub_field('open_link_in_new_tab', 'options')) { echo 'target="_blank"'; } ?> href="<?php echo $link; ?>"></a>
									<?php endif; ?>
								</div><!-- end hero_copy -->
							</div><!-- end container -->
						</div><!-- end hero_container -->
					</div><!-- end slide -->
				
				<?php endwhile; ?>
		
			</div><!-- end hero_slides -->
		
		</div><!-- end her-swiper-container -->
	
		<div class="position_pagination">
			<div class="hero_pagination container"></div>
		</div><!-- end position_pagination -->
		
	<?php else : ?>
								
			<div class="hero_slides slides">
	
				<?php while ( have_rows('hero_events', 'options') ) : the_row(); ?>
					
					<div class="slide">
						<div class="hero_image hero_slide_image">
							<?php $image = get_sub_field('hero_image', 'options'); ?>
							<?php $mobileImage = get_sub_field('hero_image_mobile', 'options'); ?>
							
							<?php if ($image) : ?>
								<picture>
									<?php if($mobileImage) : ?>
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
								<div class="hero_copy hero_slide_copy">
									<?php if (get_sub_field('hero_title_one', 'options')) : ?>
										<h2 class="light_title"><?php the_sub_field('hero_title_one', 'options'); ?></h2>
									<?php endif; ?>
									<?php if (get_sub_field('hero_title_two', 'options')) : ?>
										<h2 class="bold_title"><?php the_sub_field('hero_title_two', 'options'); ?></h2>
									<?php endif; ?>
									<?php if (get_sub_field('hero_copy', 'options')) : ?>
										<?php the_sub_field('hero_copy', 'options'); ?>
									<?php endif; ?>
									<?php if (get_sub_field('hero_link', 'options') || get_sub_field('custom_link', 'options')) : ?>
										<?php 
											if (get_sub_field('custom_link', 'options')) {
												$link = get_sub_field('custom_link', 'options');
											} else {
												$link = get_sub_field('hero_link', 'options');
											}
										?>
										<a class="arrow_cta" <?php if (get_sub_field('open_link_in_new_tab', 'options')) { echo 'target="_blank"'; } ?> href="<?php echo $link; ?>"></a>
									<?php endif; ?>
								</div><!-- end hero_copy -->
							</div><!-- end container -->
						</div><!-- end hero_container -->
					</div><!-- end slide -->
				
				<?php endwhile; ?>
		
			</div><!-- end hero_slides -->
											
	<?php endif; ?>

<?php endif; ?>				