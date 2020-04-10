<?php
/**
 * The template for displaying search forms in boiler
 *
 * @package boiler
 */
?>	
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'boiler' ); ?>" />
		<img src="<?php echo bloginfo('template_url'); ?>/images/search_icon.png" alt="search_icon">
		<?php if(is_page('blog') || (isset($_GET['post_type']) && $_GET['post_type'] == 'post')) : ?>
			<input type="hidden" name="post_type" value="post">
		<?php endif; ?>
	</form>
