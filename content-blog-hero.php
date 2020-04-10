<?php 
	global $post;
	
	$post = get_post(3789);
	setup_postdata($post);
	
	get_template_part('content', 'heroes');
	
	wp_reset_postdata();
?>