<aside class="sidebar">
	<div class="sidebar_section">
		<h3>More to Know</h3>
		<div class="section">
			<p>Lodging</p>
			<a href="http://gotahoe.red8dev.com/lodging/">View </a>
		</div>
		<div class="section">
			<p>Tahoe Dining</p>
			<a href="http://gotahoe.red8dev.com/things/dining/">View </a>
		</div>
		<div class="section">
			<p>Tahoe Towns</p>
			<a href="http://gotahoe.red8dev.com/north-lake-tahoe/towns/">View </a>
		</div>
	</div>
	<h3>Categories</h3>
	<ul class="blog_categories">
		<?php 
			$args = array(
				'type' => 'press-release',
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