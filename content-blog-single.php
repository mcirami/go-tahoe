<div class="single">
	<?php 
		if ( has_post_thumbnail() ) {
			?>
			<div class="blog-image-wrapper">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php
		} 
	?>
	<div class="single_content">
		<?php 
			$categories = get_the_category(get_the_ID()); 
			
			if($categories) :
		?>
			<ul class="single_categories">
			<?php foreach($categories as $category) : ?>
				<li><?php echo $category->name; ?></li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="wave_border"></div>
		<p><?php echo wp_trim_words(get_the_content(), 60, ' <a href="'.get_the_permalink().'">Read More ></a>'); ?></p>
	</div>
	<div class="single_footer">
		<ul>
			<li class="single_date"><p><?php echo get_the_date('m / d / Y'); ?></p></li>
			<li class="single_comments"><a href="<?php the_permalink(); ?>"><?php comments_number('0 Comments', '1 Comment','% Comments' ); ?></a></li>
			<li class="single_shares">
				<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
				<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
				<span st_via='tahoenorth' st_username='tahoenorth' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
				<span class='st_email_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
			</li>
		</ul>
	</div>
</div>