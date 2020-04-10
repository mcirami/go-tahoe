<ul class="slide_nav">
	<div class="nav_close"></div>
	<div class="desktop_menu">
		<?php if(have_rows('main_links', 'options')) : ?>
			<?php while(have_rows('main_links', 'options')) : the_row(); ?>
				<li><a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_title', 'options'); ?></a></li>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php if(have_rows('sub_menu_links', 'options')) : ?>
			<?php while(have_rows('sub_menu_links', 'options')) : the_row(); ?>
				<li class="has_sub_dropdown">
					<a href="<?php the_sub_field('top_link', 'options'); ?>"><?php the_sub_field('top_link_title', 'options'); ?></a>
					<span></span>
					<?php if(have_rows('sub_links', 'options')) : ?>
						<ul class="sub_menu_dropdown">
							<?php while(have_rows('sub_links', 'options')) : the_row(); ?>
								<li><a href="<?php the_sub_field('sub_link_location', 'options'); ?>"><?php the_sub_field('sub_link_title', 'options'); ?></a></li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php if(have_rows('secondary_links', 'options')) : ?>
			<?php while(have_rows('secondary_links', 'options')) : the_row(); ?>
				<li class="secondary"><a href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('link_title', 'options'); ?></a></li>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="mobile_menu">
		<?php include(locate_template('content-mobile-menu.php')); ?>
	</div>

	<div class="nav_search">
		<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'boiler' ); ?>" />
			<?php if(isset($_GET['post_type']) && $_GET['post_type'] == 'post') : ?>
				<input type="hidden" name="post_type" value="post">
			<?php endif; ?>
		</form>
	</div>
</ul>