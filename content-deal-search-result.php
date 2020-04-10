<?php 
	$postid = get_the_ID();
	$deals_terms = get_the_terms($postid, 'type');
	$deal_type = null;
	if($deals_terms) :
		foreach($deals_terms as $deal_term) :
			$deal_type = $deal_term;
			break;
		endforeach;
	endif;
?>
<li class="deal_result" data-post_id="<?php echo $postid; ?>">
	<?php if($deal_type) : ?>
		<?php $badge_icon = get_field('badge_icon', $deal_type); ?>
		<img class="result_badge" src="<?php if($badge_icon) { echo $badge_icon['url']; } else { echo bloginfo('template_url').'/images/badge_'.$deal_type->slug.'.png'; } ?>" alt="badge">
	<?php endif; ?>
	<div class="result_content">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php if(get_field('organization')) : ?>
			<p class="deal_organization"><?php the_field('organization'); ?></p>
		<?php endif; ?>
		<div class="wave_border"></div>
		<?php the_content(); ?>
		<div class="blue_border_button"><a href="<?php the_field('website_url'); ?>"><img src="<?php echo bloginfo('template_url'); ?>/images/arrow.png"></a></div>
	</div>
</li>