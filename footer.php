<?php
/**
 * The template for displaying the footer.
 *
 * @package boiler
 */
?>

	<footer id="global_footer" class="site_footer">
		<div class="container">
			
			<?php if (have_rows('footer_links', 'option')) : ?>
				<ul class="footer_links">
					<?php while (have_rows('footer_links', 'option')) : the_row(); ?>
						<li>
							<a href="<?php the_sub_field('footer_link', 'option'); ?>" target="<?php echo get_sub_field( 'link_open_new_window', 'option' ) ? '_blank' : '_self'; ?>" ><?php the_sub_field('link_text', 'option'); ?></a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			
			<?php if (have_rows('social_icons', 'option')) : ?>
				<div class="social_icons">
					<?php while (have_rows('social_icons', 'option')) : the_row(); ?>
							<a href="<?php the_sub_field('social_link', 'option'); ?>" target="_blank">
								<img src="<?php the_sub_field('social_icon', 'option'); ?>" alt="" />
							</a>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			
		</div>
	</footer>
<a href="#0" class="cd-top">Top</a>

<?php wp_footer(); ?>

</body>
</div>
</html>