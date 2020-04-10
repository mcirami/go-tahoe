<div class="search_result">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php if(get_field('short_description')) : ?>
		<p><?php echo wp_trim_words(get_field('short_description'), 30, '...'); ?></p>
	<?php elseif(get_field('long_description')) : ?>
		<p><?php echo wp_trim_words(get_field('long_description'), 30, '...'); ?></p>
	<?php else : ?>
		<p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>">Link to page ></a>
</div>