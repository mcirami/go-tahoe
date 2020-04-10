<aside class="sidebar">
	<h3>Categories</h3>
	<ul class="blog_categories">
		<?php 
			$args = array(
				'hide_empty' => 0,	
			);
			
			$categories = get_categories($args);
			
			if($categories) :
		?>
			<?php foreach($categories as $category) : ?>
				<li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name.' ('.$category->count.')'; ?></a></li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
	<h3>Search</h3>
	<?php get_search_form(); ?>	
</aside>