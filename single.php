<?php
/**
 * The Template for displaying all single posts.
 *
 * @package boiler
 */

get_header(); ?>
	
	<section class="blog wrapper">
		
		<article class="container">

            <div class="content">

			<?php while ( have_posts() ) : the_post(); ?>
	
				<?php get_template_part( 'content', 'single' ); ?>
                <div class="blog_single_footer">
                    <ul>
                        <li class="blog_single_date"><?php echo get_the_date('m / d / Y'); ?></li>
                        <li class="blog_single_share_buttons">
							<span class='st_facebook_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
							<span class='st_plusone_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
							<span st_via='tahoenorth' st_username='tahoenorth' class='st_twitter_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
							<span class='st_email_hcount' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
						</li>
                        <!-- Can't calculate total shares due google+ iframe access permissions	
                        <li class="blog_single_shares"><span class="total_shares"></span> Shares</li>
                        -->
                    </ul>
                    
                </div>
				<?php // boiler_content_nav( 'nav-below' ); ?>
	
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) { ?>
						<h3 class="blog_single_comments_header"><?php comments_number(); ?></h3>
						<?php comments_template();
					}
				?>

	
			<?php endwhile; // end of the loop. ?>
			
		
            </div>
				<?php
					if (is_singular('post')) {
						get_template_part('sidebar','blog');
					} elseif (is_singular('deal')) {
						get_template_part('sidebar','deal');
					} else {
						get_template_part('sidebar','blog');
					}
				?>

        </article>

	</section>

    <?php get_template_part('content', 'social-footer');  ?>

    <?php get_template_part('content', 'secondary-footer'); ?>

<?php get_footer(); ?>