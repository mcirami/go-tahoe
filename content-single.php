<?php
/**
 * @package boiler
 */
?>

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
		
		<h1 class="title"><?php the_title(); ?></h1>
        <div class="wave_border"></div>
            <div class="shares_comments">
                <ul>
                    <li><a class="comments_number" href="#"><?php comments_number('0 Comments', '1 Comment','% Comments' ); ?></a></li>
                    <!-- Can't calculate total shares due google+ iframe access permissions	
                    <li><span class="total_shares"></span> shares</a></li>
                    -->
                </ul>
            </div>

<!--<div class="entry-meta">-->
<!--	--><?php //// boiler_posted_on(); ?>
<!--</div>-->


	<div class="blog_single_content">
		<?php the_content(); ?>
		<?php
			//wp_link_pages( array(
			//	'before' => '<div class="page-links">' . __( 'Pages:', 'boiler' ),
			//	'after'  => '</div>',
			//) );
		?>
	</div>

	<footer>
		<?php
//			/* translators: used between list items, there is a space after the comma */
//			$category_list = get_the_category_list( __( ', ', 'boiler' ) );
//
//			/* translators: used between list items, there is a space after the comma */
//			$tag_list = get_the_tag_list( '', __( ', ', 'boiler' ) );
//
//			if ( ! boiler_categorized_blog() ) {
//				// This blog only has 1 category so we just need to worry about tags in the meta text
//				if ( '' != $tag_list ) {
//					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				} else {
//					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				}
//
//			} else {
//				// But this blog has loads of categories so we should probably display them here
//				if ( '' != $tag_list ) {
//					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				} else {
//					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boiler' );
//				}
//
//			} // end check for categories on this blog
//
//			printf(
//				$meta_text,
//				$category_list,
//				$tag_list,
//				get_permalink(),
//				the_title_attribute( 'echo=0' )
//			);
//		?>
<!---->
<!--		--><?php //edit_post_link( __( 'Edit', 'boiler' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
