<aside class="sidebar">	

	<?php
		$terms = wp_get_post_terms( $post->ID, 'lodging' );
		
		// Check if lodging, else, display activities
		if ( !is_wp_error( $terms ) && count( $terms ) > 0 ) {
			$header_text = 'Lodging Deals';
			$class = 'lodging_deals';
			$term = 'lodging-packages';
			$display_social_icons = true;
		} else {
			$header_text = 'Activities Deals';
			$class = 'activities_deals';
			$term = 'activity';
			$display_social_icons = false;
		}
		
		/*if($term == 'activity') {
			$args = array(
				'post_type' 	=> 'deals',
				'post_count'	=> 4,
				'meta_key' 	=>  'organization',
				'meta_value' =>  get_the_title()
			);
		} else {
			$args = array(
				'post_type' 	=> 'deals',
				'post_count'	=> 4,
				'tax_query' 	=> array(
					array(
						'taxonomy' => 'type',
						'field'    => 'slug',
						'terms'    => $term,
					),
				),
			);
		}*/
		
		// Pull in deals associated with this listing
		$args = array(
			'post_type' 	=> 'deal',
			'posts_per_page'=> 4,
			'meta_query' => array(
				array(
					'key' => 'listing_connection',
					'value' => '"' . get_the_ID() . '"',
					'compare' => 'LIKE'
				)
			)
		);
		
		$deals = new WP_Query( $args ); 
	?>
	<?php if ( $deals->have_posts() ) : ?>
		<div class="<?php echo $class; ?>">
			<h3><?php echo $header_text; ?></h3>
			<ul>
				<?php while ( $deals->have_posts() ) : $deals->the_post(); ?>
					 <li><a href="<?php the_field('website_url'); ?>" target="_blank"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	
	<?php 
		$twitter_username 	= get_field( 'twitter_username' );
		$facebook_page_id 	= get_field( 'facebook_page_id' );
		$instagram_username = get_field ( 'instagram_username' );
		$youtube_username 	= get_field ( 'youtube_username' );
	?>
	<?php if ( empty( $twitter_username ) && empty( $facebook_page_id ) && empty( $instagram_username ) && empty( $youtube_username ) ) : ?>
		<?php if ( get_field( 'social_media_default_image', 'option' ) ) : ?>
			<img class="default_image" src="<?php the_field( 'social_media_default_image', 'option' ); ?>" alt="Social Media Image">
			<p><?php the_field( 'social_media_default_image_caption', 'option' ); ?></p>
		<?php endif; ?>
	<?php else : ?>
		<div class="listing_social_feeds">
			<h3>Social Feeds</h3>
			
			<?php if ( !empty( $twitter_username ) ) : ?>
				<div class="social_feeds_section">		
					<div class="social_image twitter"></div>
					<div class="social_feed_content">
						<?php $tweets = get_tweets( $twitter_username, 1 ); ?>
						<?php if ( $tweets ) : ?>
							<div class="tweet">
								<p class="username"><?php echo $tweets[0]->user->name . ' @' . $tweets[0]->user->screen_name;?></p>
								<p><?php echo get_text_with_link( $tweets[0]->text ); ?></p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php if ( !empty( $facebook_page_id ) ) : ?>
				<div class="social_feeds_section">		
					<div class="social_image facebook"></div>
					<div class="social_feed_content">
						<?php $feed = get_facebook_latest_post( $facebook_page_id, 'full_size_image' ); ?>
						<?php if ( $feed ) : ?>
							<?php if ( $feed['type'] == "status" || $feed['type'] == "link" || $feed['type'] == "photo" ) : ?>
								<div class="facebook_update">										
									<?php if ( $feed['type'] == "status" ) : // Layout for Status ?>
										<?php if ( !empty( $feed['message'] ) ) : ?>
											<p><?php echo get_text_with_link( $feed['message'] ); ?></p>
										<?php endif; ?>
									<?php endif; ?>
									
									<?php if ( $feed['type'] == "link" ) : // Layout for Links ?>
										<a href="<?php echo $feed['link']; ?>" target="_blank">
											<?php if ( !empty( $feed['picture'] ) ) :?>
												<img class="link_image" src="<?php echo $feed['picture']; ?>" alt="<?php echo empty( $feed['name'] ) ? "Facebook Image": $feed['name']; ?>">
											<?php endif; ?>
										</a>
										<?php if ( !empty( $feed['message'] ) ) : ?>
											<p><?php echo get_text_with_link( $feed['message'] ); ?></p>
										<?php endif; ?>
									<?php endif; ?>
									
									<?php if ( $feed['type'] == "photo" || $feed['type'] == "video" ) : // Layout for Photos/Videos ?>
										<a href="<?php echo $feed['link']; ?>" target="_blank">
											<img src="<?php echo $feed['picture_full_size']; ?>" alt="<?php echo empty( $feed['message'] ) ? 'Facebook Image' : $feed['message']; ?>">
										</a>
										<?php if ( empty( $feed['story'] ) === false ) : ?>
											<p><?php echo get_text_with_link( $feed['story'] ); ?></p>
										<?php elseif ( empty( $feed['message'] ) === false ) : ?>
											<p><?php echo get_text_with_link( $feed['message'] ); ?></p>
										<?php endif; ?>
									<?php endif; ?>
								</div>	
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php if ( !empty( $instagram_username ) ) : ?>
				<div class="social_feeds_section">		
					<div class="social_image instagram"></div>
					<div class="social_feed_content">
						<div class="instagram_media">
							<?php $instagram_media = get_instagram_lastest_post( $instagram_username ); ?>
							<?php if ( $instagram_media ) : ?>
								<a target="_blank" href="<?php echo $instagram_media->link; ?>">
									<img alt="<?php echo isset( $instagram_media->caption ) ? $instagram_media->caption->text : "Instagram Image" ; ?>" src="<?php echo $instagram_media->images->standard_resolution->url; ?>">
								</a>
								<?php if ( isset( $instagram_media->caption ) ) : ?>
									<p><?php echo get_text_with_link( $instagram_media->caption->text ); ?></p>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
			<?php if ( !empty( $youtube_username ) ) : ?>
				<div class="social_feeds_section">		
					<div class="social_image youtube"></div>
					<div class="social_feed_content">
						<div class="youtube_video">				
							<?php $youtube_videos = get_youtube_videos( $youtube_username, 1 ); ?>
							<?php if ( $youtube_videos ) : ?>
								<a target="_blank" href="#">
									<img alt="<?php echo $youtube_videos[0]->snippet->title; ?>" src="<?php echo $youtube_videos[0]->snippet->thumbnails->medium->url; ?>">
								</a>
								<p><?php echo $youtube_videos[0]->snippet->title; ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>		
		</div>
	
	<?php endif; ?>	
	
	<?php if ( $display_social_icons ) : ?>
		<?php
			$flickr_feed = get_field( 'flickr_feed' );
			$instagram_feed = get_field( 'instagram_feed' );
			$linkedin_feed = get_field( 'linkedin_feed' );
			$googleplus_feed = get_field( 'google+_feed' );
			$pinterest_feed = get_field( 'pinterest_feed' );
		?>	
		<?php if ( !empty( $flickr_feed ) || !empty( $instagram_feed ) || !empty( $linkedin_feed ) ||
				   !empty( $googleplus_feed ) || !empty( $pinterest_feed ) ) : ?>
			<div class="social_icons">
				<?php if ( $flickr_feed ) : ?>
					<a href="<?php echo $flickr_feed; ?>" target="_blank">
						<img src="<?php echo bloginfo( 'template_url' ); ?>/images/social-flickr.png" alt="Flickr"/>
					</a>
				<?php endif; ?>
				<?php if ( $instagram_feed ) : ?>
					<a href="<?php echo $instagram_feed; ?>" target="_blank">
						<img src="<?php echo bloginfo( 'template_url' ); ?>/images/social-instagram.png" alt="Instagram"/>
					</a>
				<?php endif; ?>
				<?php if ( $linkedin_feed ) : ?>
					<a href="<?php echo $linkedin_feed; ?>" target="_blank">
						<img src="<?php echo bloginfo( 'template_url' ); ?>/images/social-linkedin.png" alt="LinkedIn"/>
					</a>
				<?php endif; ?>
				<?php if ( $googleplus_feed ) : ?>
					<a href="<?php echo $googleplus_feed; ?>" target="_blank">
						<img src="<?php echo bloginfo( 'template_url' ); ?>/images/social-googleplus.png" alt="Google+"/>
					</a>
				<?php endif; ?>		
				<?php if ( $pinterest_feed ) : ?>
					<a href="<?php echo $pinterest_feed; ?>" target="_blank">
						<img src="<?php echo bloginfo( 'template_url' ); ?>/images/social-pinterest.png" alt="Pinterest"/>
					</a>
				<?php endif; ?>						
			</div>
		<?php endif; ?>
			
	<?php endif; ?>
	
</aside>