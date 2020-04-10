<?php $s = 1; ?>
<?php while(has_sub_field('content_sections')) : ?>
	
	<?php if(get_row_layout() == 'basic_content') : ?>
	
		<div class="container content_section">
			<div class="full_width_content">
				<?php the_sub_field('full_width_content'); ?>
			</div>
		</div>
	<?php elseif(get_row_layout() == 'basic_content_with_sidebar') : ?>

		<div class="container">
			<div class="content">
				<?php the_sub_field('full_width_content_with_sidebar'); ?>
			</div>
			<?php get_template_part('sidebar', 'flexible-content'); ?>
		</div>

	<?php elseif(get_row_layout() == 'two_column') : ?>
	
		<div class="container">
			<div class="two_column">
				<?php if(have_rows('column')) : ?>
					<?php while(have_rows('column')) : the_row(); ?>
						<div class="column">
							<h2><?php the_sub_field('column_header'); ?></h2>
							<div class="wave_border"></div>
							<?php the_sub_field('column_content'); ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		
	<?php elseif(get_row_layout() == 'image_gallery') : ?> 
	
		<?php 
			$hasSwiper = true;
			
			if($hasSwiper) {
				wp_enqueue_script('swiperCustom', get_template_directory_uri() . '/js/swiperCustom.js', array('jquery'), true);
			}
		?>
	
		<div class="container content_section">
			<?php if(get_sub_field('section_title')) : ?>
				<h2 class="icon_title" style="background-image: url(<?php the_sub_field('title_icon'); ?>);"><?php the_sub_field('section_title'); ?></h2>
			<?php endif; ?>
			<div id="slider-<?php echo $s; ?>" class="swiper-container">
				<div class="swiper-wrapper">
					<?php if(have_rows('slides')) : ?>
					<?php $i = 0; ?>
						<?php while(have_rows('slides')) : the_row(); ?>
							<div class="swiper-slide">
								<?php $image = get_sub_field('image'); ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<div class="image_caption">
									<p><?php echo $image['caption']; ?></p>
								</div>
							</div>
							<?php $i++; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="swiper_nav">
				<div class="swiper_left">
					<img src="<?php echo bloginfo('template_url'); ?>/images/image_nav_left.png" />
				</div>
				<div class="swiper_right">
					<img src="<?php echo bloginfo('template_url'); ?>/images/image_nav_right.png" />
				</div>
			</div>
			<div class="slide_count">
				<div class="slides_num"><span>1</span> of <div class="slide_upper"><?php echo $i; ?></div></div>
			</div>
		</div>
		<?php $s++;?>
	
	<?php elseif(get_row_layout() == 'single_header_two_column') : ?>
	
		<div class="container content_section">
			<div class="one_header_two_column">
				<h2><?php the_sub_field('two_column_header'); ?></h2>
				<div class="wave_border"></div>
				<?php if(have_rows('column')) : ?>
					<?php while(have_rows('column')) : the_row(); ?>
						<div class="column">
							<?php the_sub_field('column_content'); ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		
	<?php elseif(get_row_layout() == 'image_left') : ?> 
	
		<div class="container content_section">
			<div class="image image_left">
                <div class="mobile_header_container">
                    <h2 class="mobile_header"><?php the_sub_field('content_header'); ?></h2>
                    <div class="wave_border"></div>
                </div>
				<?php $imageLeft = get_sub_field('image_left'); ?>
				<img src="<?php echo $imageLeft['url']; ?>" alt="<?php echo $imageLeft['alt']; ?>" />
			</div>
			<div class="content_right">
				<h2><?php the_sub_field('content_header'); ?></h2>
				<div class="wave_border"></div>
				<?php the_sub_field('content_right'); ?>
			</div>
		</div>
		
	<?php elseif(get_row_layout() == 'image_right') : ?> 
	
		<div class="container content_section">
			<div class="image image_right">
                <div class="mobile_header_container">
                    <h2 class="mobile_header"><?php the_sub_field('content_header'); ?></h2>
                    <div class="wave_border"></div>
                </div>
				<?php $imageRight = get_sub_field('image_right'); ?>
				<img src="<?php echo $imageRight['url']; ?>" alt="<?php echo $imageRight['alt']; ?>" />
			</div>
			<div class="content_left">
				<h2><?php the_sub_field('content_header'); ?></h2>
				<div class="wave_border"></div>
				<?php the_sub_field('content_left'); ?>
			</div>
		</div>
		
	<?php elseif(get_row_layout() == 'testimonial') : ?> 
	
		<div class="container content_section">
			<div class="testimonial_wrap">
				<h2 class="icon_title" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/images/testimonial_icon.png'; ?>);">Testimonials</h2>
				<div class="testimonials">
					<?php if(have_rows('testimonials')) : ?>
						<?php while(have_rows('testimonials')) : the_row(); ?>
							<div class="testimonial">
								<?php the_sub_field('testimonial_content'); ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		
	<?php endif; ?>

<?php endwhile; ?>

