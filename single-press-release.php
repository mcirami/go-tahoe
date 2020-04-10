<?php
/**
 * The Template for displaying all single posts.
 *
 * @package boiler
 */

get_header(); ?>

    <?php
        $blog_id = 3789;
    ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php if ( have_rows('heroes', $blog_id) ) : ?>

        <?php while ( have_rows('heroes', $blog_id) ) : the_row(); ?>

        <?php if (get_row_layout() == 'hero_single_image') : ?>

                <div class="hero_image hero_single_image">
                    <?php $image = get_sub_field('hero_single_image', $blog_id ); ?>
                    <?php $mobileImage = get_sub_field('hero_image_mobile', $blog_id ); ?>

                    <?php if ($image) : ?>
                        <picture>
                            <!--[if IE 9]><video style="display: none;"><![endif]-->
                            <source srcset="<?php echo $mobileImage['sizes']['thumb-640-840']; ?>" media="(max-width: 600px)">
                            <!--[if IE 9]></video><![endif]-->
                            <img srcset="<?php echo $image['sizes']['thumb-1280-650']; ?>" alt="<?php echo $image['alt']; ?>">
                        </picture>
                    <?php endif; ?>
                </div>

                <div class="hero_container">
                    <div class="container">
                        <div class="hero_copy hero_single_copy">
                            <?php if (get_sub_field('hero_title_one')) : ?>
                                <h2 class="light_title"><?php the_sub_field('hero_title_one', $blog_id ); ?></h2>
                            <?php endif; ?>
                            <?php if (get_sub_field('hero_title_two')) : ?>
                                <h2 class="bold_title"><?php the_sub_field('hero_title_two', $blog_id ); ?></h2>
                            <?php endif; ?>
                        </div><!-- end hero_copy -->
                    </div><!-- end container -->
                </div><!-- end hero_container -->

            <?php endif; ?>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php endwhile; endif; ?>

    <?php // get_template_part('content', 'heroes'); ?>

	
	<section class="blog wrapper">
		
		<article class="container">

            <div class="content">

			<?php while ( have_posts() ) : the_post(); ?>
	
				<?php get_template_part( 'content', 'single' ); ?>
                <div class="blog_single_footer">
                    <ul>
                        <li class="blog_single_date"><?php echo get_the_date('m / d / Y'); ?></li>
                        <li class="blog_single_comments"><a href="#"><?php comments_number(); ?></a></li>
                        <li class="blog_single_shares"><a href="#">0 Shares</a></li>
                    </ul>
                </div>
				<?php // boiler_content_nav( 'nav-below' ); ?>
	
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>
	
			<?php endwhile; // end of the loop. ?>

            </div>

                <?php get_template_part('sidebar','blog'); ?>

        </article>

	</section>

    <?php get_template_part('content', 'social-footer');  ?>

    <?php get_template_part('content', 'secondary-footer'); ?>


<?php get_footer(); ?>