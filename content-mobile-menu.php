<?php if(have_rows('menu_items', 'options')) : ?>
	<?php $i = 0; ?>
	<?php $j = 1; ?>
	<?php while(have_rows('menu_items', 'options')) : the_row(); ?>
		<?php $i++; ?>
		<?php if(get_row_layout() == 'multi_sub_menu'): ?>
			<li class="has_sub">
				<a href="<?php the_sub_field('multi_top_level_link', 'options'); ?>"><?php the_sub_field('multi_top_level_title', 'options'); ?></a><?php if(have_rows('1st_spl', 'options')) : ?><span data-menu-link="<?php echo $i; ?>"></span><?php endif; ?>
			</li>
			<?php if(have_rows('1st_spl', 'options')) : ?>
				<div class="sub_menu_page-<?php echo $i; ?>">
					<div class="nav_close"></div>
					<div class="nav_back"></div>
					<?php while(have_rows('1st_spl', 'options')) : the_row(); ?>
						<?php $j++; ?>
						<li class="has_sub">
							<a href="<?php the_sub_field('2nd_level_link', 'options'); ?>"><?php the_sub_field('2nd_level_link_title', 'options'); ?></a><?php if(have_rows('2nd_spl', 'options')) : ?><span data-menu-link="<?php echo $j.'a'; ?>"></span><?php endif; ?>
						</li>
						<?php if(have_rows('2nd_spl', 'options')) : ?>
							<div class="sub_menu_page-<?php echo $j.'a'; ?>">
								<div class="nav_close"></div>
								<div class="nav_back"></div>
								<?php while(have_rows('2nd_spl', 'options')) : the_row(); ?>
									<li><a href="<?php the_sub_field('3rd_level_link', 'options'); ?>"><?php the_sub_field('3rd_level_title', 'options'); ?></a></li>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		<?php elseif(get_row_layout() == 'sub_menu') : // do sub_menu stuff ?>
			<li class="has_sub">
				<a href="<?php the_sub_field('top_level_link', 'options'); ?>"><?php the_sub_field('top_level_title', 'options'); ?></a><?php if(have_rows('sub_menu_pages', 'options')) : ?><span data-menu-link="<?php echo $i; ?>"></span><?php endif; ?>
			</li>
			<?php if(have_rows('sub_menu_pages', 'options')) : ?>
				<div class="sub_menu_page-<?php echo $i; ?>">
					<div class="nav_close"></div>
					<div class="nav_back"></div>
					<?php while(have_rows('sub_menu_pages', 'options')) : the_row(); ?>
						<li><a href="<?php the_sub_field('sub_page_link', 'options'); ?>"><?php the_sub_field('sub_page_title', 'options'); ?></a></li>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		<?php elseif(get_row_layout() == 'single_link') : // do single_link stuff ?>
			<li><a href="<?php the_sub_field('page_link', 'options'); ?>"><?php the_sub_field('page_title', 'options'); ?></a></li>
		<?php elseif(get_row_layout() == 'secondary_menu') : // do secondary_menu stuff ?>
			<?php if(have_rows('secondary_links', 'options')) : ?>
				<?php while(have_rows('secondary_links', 'options')) : the_row(); ?>
					<li class="secondary"><a href="<?php the_sub_field('secondary_page_link', 'options'); ?>" <?php if(get_sub_field('new_window')) { echo 'target="_blank"'; } ?>><?php the_sub_field('secondary_page_title', 'options'); ?></a></li>		
				<?php endwhile; ?>
			<?php endif; ?>
		<?php endif; ?>
		
	<?php endwhile; // end while have_rows ?>
	
<?php endif; // end have_rows ?>