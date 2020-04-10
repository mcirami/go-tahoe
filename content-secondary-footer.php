<?php
/**
 * @package boiler
 */
?>

<section class="secondary_footer">
	<div class="container">
		<div class="secondary_footer_section">
			<h4 class="days_deal">DEAL OF THE DAY</h4>
            <?php if(get_field('deal_of_the_day','options')) : ?>
                <?php
                    $deal_object = get_field('deal_of_the_day','options');
                ?>

                <?php
                    if($deal_object) :

                    $post = $deal_object;
                    setup_postdata($post);
                ?>
				<?php 
					$deal_title = get_the_title();
					if(strlen($deal_title) > 45) {
						$deal_title = substr($deal_title, 0, 42).'...';
					}
				?>
                <h2 class="footer_class"><?php echo $deal_title; ?></h2>
                    <?php the_excerpt(); ?>
                <div class="blue_border_button">
                    <a href="<?php the_permalink(); ?>">READ MORE</a>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php else : ?>

                <?php
                $args = array(
                    'post_type' => 'deal',
	                'orderby' => 'rand',
                    'posts_per_page' => 1
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    	<?php 
							$deal_title = get_the_title();
							if(strlen($deal_title) > 45) {
								$deal_title = substr($deal_title, 0, 42).'...';
							}
						?>
                        <h2 class="footer_header"><?php echo $deal_title; ?></h2>
                        <?php the_excerpt(); ?>

                        <div class="blue_border_button">
                            <a href="<?php the_permalink(); ?>">READ MORE</a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endif; ?>

		</div>
		<div class="secondary_footer_section">
			<h4 class="trip_idea">TRIP IDEA</h4>
			<div class="footer_description">
                <?php
                    $args = array(
                        'orderby' => 'rand',
                        'posts_per_page' => 1
                    );
                    $the_query = new WP_Query ( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ($the_query->have_posts() ) : $the_query->the_post(); ?>
                    	<?php 
							$deal_title = get_the_title();
							if(strlen($deal_title) > 45) {
								$deal_title = substr($deal_title, 0, 42).'...';
							}
						?>
                        <h2 class="footer_header"><?php echo $deal_title; ?></h2>
                        <?php the_excerpt(); ?>
			</div>
			<div class="blue_border_button">
				<a href="<?php the_permalink(); ?>">READ MORE</a>
			</div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
		</div>
		<div class="secondary_footer_section">
			<h4 class="newsletter_header">NEWSLETTER SIGNUP</h4>
			<h2 class="footer_header">SIGNUP</h2>
			<div class="newsletter_signup">
                <?php gravity_form(3,false, false, false, '', true); ?>
			</div>
		</div>
	</div>
</section>
