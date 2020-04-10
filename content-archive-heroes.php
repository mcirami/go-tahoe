<?php
/**
 * @package boiler
 */
?>



<?php
	if (is_tax('type')) {
		$hero_id = 3737;
	} elseif (is_archive('post')) {
		$hero_id = 3789;
	}
?>

<?php if ( have_rows('heroes', $hero_id) ) : ?>

	<?php while ( have_rows('heroes', $hero_id) ) : the_row(); ?>
	
		<?php if (get_row_layout() == 'hero_slider') : ?>
		
			<?php $rowCount = count(get_sub_field('hero_slide', $hero_id)); ?>
		
			<!-- repeater for slides -->
			<?php if( have_rows('hero_slide', $hero_id) ): ?>
	
				<?php if ($rowCount > 1) : ?>
				
					<div class="hero-swiper-container">
							
						<div class="hero_slides slides swiper-wrapper">
				
							<?php while ( have_rows('hero_slide', $hero_id) ) : the_row(); ?>
								
								<div class="slide swiper-slide">
									<div class="hero_image hero_slide_image">
										<?php $image = get_sub_field('hero_image', $hero_id); ?>
										<?php $mobileImage = get_sub_field('hero_image_mobile', $hero_id); ?>
										<?php $video = get_sub_field('hero_video', $hero_id); ?>
										<?php $typeofslide = get_sub_field('type_of_slide', $hero_id); ?>
										
										<?php 
											if(!$image) {
												$image = get_field('default_hero_image', 'options');
											}
											if(!$mobileImage) {
												$mobileImage = get_field('default_hero_mobile_image', 'options');
											}
											if(!$typeofslide) {
												$typeofslide = 'image';
											}
										?>
										
										<?php if ($typeofslide === 'image' && $image) : ?>
											<picture>
												<?php if($mobileImage) : ?>
													<!--[if IE 9]><video style="display: none;"><![endif]-->
													<source srcset="<?php echo $mobileImage['sizes']['thumb-640-840']; ?>" media="(max-width: 600px)">
													<!--[if IE 9]></video><![endif]-->
												<?php endif; ?>
												<img srcset="<?php echo $image['sizes']['thumb-1280-650']; ?>" alt="<?php echo $image['alt']; ?>">
											</picture>
										<?php elseif($typeofslide === 'video' && $video) : ?> 	
											<video width="100%" height="100%" autoplay loop>
												<source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
											</video>
										<?php endif; ?>
									</div>
									
									<div class="hero_container">
										<div class="container">
											<div class="hero_copy hero_slide_copy">
												<?php if (get_sub_field('hero_title_one', $hero_id)) : ?>
													<h2 class="light_title"><?php the_sub_field('hero_title_one', $hero_id); ?></h2>
												<?php endif; ?>
												<?php if (get_sub_field('hero_title_two', $hero_id)) : ?>
													<h2 class="bold_title"><?php the_sub_field('hero_title_two', $hero_id); ?></h2>
												<?php endif; ?>
												<?php if (get_sub_field('hero_copy', $hero_id)) : ?>
													<?php the_sub_field('hero_copy', $hero_id); ?>
												<?php endif; ?>
												<?php if (get_sub_field('hero_link', $hero_id) || get_sub_field('custom_link', $hero_id)) : ?>
													<?php 
														if (get_sub_field('custom_link', $hero_id)) {
															$link = get_sub_field('custom_link', $hero_id);
														} else {
															$link = get_sub_field('hero_link', $hero_id);
														}
													?>
													<a class="arrow_cta" <?php if (get_sub_field('open_link_in_new_tab', $hero_id)) { echo 'target="_blank"'; } ?> href="<?php echo $link; ?>"></a>
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
					</div><!-- hend position_pagination -->
				
				<?php else : ?>
											
						<div class="hero_slides slides">
				
							<?php while ( have_rows('hero_slide', $hero_id) ) : the_row(); ?>
								
								<div class="slide">
									<div class="hero_image hero_slide_image">
										<?php $image = get_sub_field('hero_image', $hero_id); ?>
										<?php $mobileImage = get_sub_field('hero_image_mobile', $hero_id); ?>
										<?php $video = get_sub_field('hero_video', $hero_id); ?>
										<?php $typeofslide = get_sub_field('type_of_slide', $hero_id); ?>
										
										<?php 
											if(!$image) {
												$image = get_field('default_hero_image', 'options');
											}
											if(!$mobileImage) {
												$mobileImage = get_field('default_hero_mobile_image', 'options');
											}
											if(!$typeofslide) {
												$typeofslide = 'image';
											}
										?>
										
										<?php if ($typeofslide === 'image' && $image) : ?>
											<picture>
												<?php if($mobileImage) : ?>
													<!--[if IE 9]><video style="display: none;"><![endif]-->
													<source srcset="<?php echo $mobileImage['sizes']['thumb-640-840']; ?>" media="(max-width: 600px)">
													<!--[if IE 9]></video><![endif]-->
												<?php endif; ?>
												<img srcset="<?php echo $image['sizes']['thumb-1280-650']; ?>" alt="<?php echo $image['alt']; ?>">
											</picture>
										<?php elseif($typeofslide === 'video' && $video) : ?> 	
											<video width="100%" height="100%" autoplay loop>
												<source src="<?php echo $video['url']; ?>" type="video/mp4">
											</video>
										<?php endif; ?>
									</div>
									
									<div class="hero_container">
										<div class="container">
											<div class="hero_copy hero_slide_copy">
												<?php if (get_sub_field('hero_title_one', $hero_id)) : ?>
													<h2 class="light_title"><?php the_sub_field('hero_title_one', $hero_id); ?></h2>
												<?php endif; ?>
												<?php if (get_sub_field('hero_title_two', $hero_id)) : ?>
													<h2 class="bold_title"><?php the_sub_field('hero_title_two', $hero_id); ?></h2>
												<?php endif; ?>
												<?php if (get_sub_field('hero_copy', $hero_id)) : ?>
													<?php the_sub_field('hero_copy', $hero_id); ?>
												<?php endif; ?>
												<?php if (get_sub_field('hero_link', $hero_id) || get_sub_field('custom_link', $hero_id)) : ?>
													<?php 
														if (get_sub_field('custom_link', $hero_id)) {
															$link = get_sub_field('custom_link', $hero_id);
														} else {
															$link = get_sub_field('hero_link', $hero_id);
														}
													?>
													<a class="arrow_cta" <?php if (get_sub_field('open_link_in_new_tab', $hero_id)) { echo 'target="_blank"'; } ?> href="<?php echo $link; ?>"></a>
												<?php endif; ?>
											</div><!-- end hero_copy -->
										</div><!-- end container -->
									</div><!-- end hero_container -->
								</div><!-- end slide -->
							
							<?php endwhile; ?>
					
						</div><!-- end hero_slides -->
														
				<?php endif; ?>
			
			<?php endif; ?>
					
		<?php elseif (get_row_layout() == 'hero_single_image') : ?>
		
			<div class="hero_image hero_single_image">
				<?php $image = get_sub_field('hero_single_image', $hero_id); ?>
				<?php $mobileImage = get_sub_field('hero_image_mobile', $hero_id); ?>
				<?php $video = get_sub_field('hero_video', $hero_id); ?>
				<?php $type = get_sub_field('hero_type', $hero_id); ?>
				
				<?php 
					if(!$image) {
						$image = get_field('default_hero_image', 'options');
					}
					if(!$mobileImage) {
						$mobileImage = get_field('default_hero_mobile_image', 'options');
					}
					if(!$type) {
						$type = 'image';
					}
				?>

				<?php if ($type === 'image' && $image) : ?>
					<picture>
						<?php if($mobileImage) : ?>
							<!--[if IE 9]><video style="display: none;"><![endif]-->
							<source srcset="<?php echo $mobileImage['sizes']['thumb-640-440']; ?>" media="(max-width: 600px)">
							<!--[if IE 9]></video><![endif]-->
						<?php endif; ?>
						<img srcset="<?php echo $image['sizes']['thumb-1280-650']; ?>" alt="<?php echo $image['alt']; ?>">
					</picture>
				<?php elseif($type === 'video' && $video) : ?> 	
						<video width="100%" height="100%" autoplay loop>
							<source src="<?php echo $video['url']; ?>" type="video/mp4">
						</video>
				<?php endif; ?>
			</div>
			
			<div class="hero_container">
				<div class="container">
					<div class="hero_copy hero_single_copy">
						<?php if (get_sub_field('hero_title_one', $hero_id)) : ?>
							<h2 class="light_title"><?php the_sub_field('hero_title_one', $hero_id); ?></h2>
						<?php endif; ?>
						<?php if (get_sub_field('hero_title_two', $hero_id)) : ?>
							<h2 class="bold_title"><?php the_sub_field('hero_title_two', $hero_id); ?></h2>
						<?php endif; ?>
					</div><!-- end hero_copy -->
				</div><!-- end container -->
			</div><!-- end hero_container -->
			
		<?php elseif(get_row_layout() == 'hero_video') : ?> 
		
			
		
		<?php endif; ?>
		
	<?php endwhile; ?>
    
<?php else : ?>

	<div class="hero_image hero_single_image">
		<?php $image = get_field('default_hero_image', 'options'); ?>
		<?php $mobileImage = get_field('default_hero_mobile_image', 'options'); ?>

		<?php if ($image) : ?>
			<picture>
				<?php if($mobileImage) : ?>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
					<source srcset="<?php echo $mobileImage['sizes']['thumb-640-440']; ?>" media="(max-width: 600px)">
					<!--[if IE 9]></video><![endif]-->
				<?php endif; ?>
				<img srcset="<?php echo $image['sizes']['thumb-1280-650']; ?>" alt="<?php echo $image['alt']; ?>">
			</picture>
		<?php endif; ?>
	</div>
	
	<div class="hero_container">
		<div class="container">
			<div class="hero_copy hero_single_copy">
				<h2 class="light_title"><?php the_title(); ?></h2>
			</div><!-- end hero_copy -->
		</div><!-- end container -->
	</div><!-- end hero_container -->

<?php endif; ?>