<?php
/**
 * The template for displaying social network updates.
 *
 * @package boiler
 */

$twitter_username = get_field( 'twitter_username_main', 'option' );
$instagram_username = get_field( 'instagram_username_main', 'option' );
$facebook_page_id = get_field( 'facebook_page_id_main', 'option' );
?>

<section class="social_footer">
	<div class="container">
		<h4 class="section_header">North Lake Tahoe Social</h4>
		<div class="mobile-social-line-divider">
			<img src="<?php bloginfo('template_url'); ?>/images/line-divider-twitter.png" alt="Twitter"/>
		</div>
		<div class="social_footer_section">
			<a href="https://twitter.com/TahoeNorth" target="_blank"><img class="twitter" src="<?php bloginfo('template_url'); ?>/images/social-twitter.png" alt="Twitter"/></a>
			<div class="social_footer_content">
				<?php if ( !empty ( $twitter_username ) ) : ?>
					<?php $tweets = get_tweets( $twitter_username, 3 ); ?>
						<?php if ( $tweets ) : ?>
							<?php foreach ( $tweets as $tweet ) : ?>
								<div class="tweets">
									<img alt="<?php echo $tweet->user->name; ?>" src="<?php echo $tweet->user->profile_image_url; ?>">
									<p><?php echo get_text_with_link( $tweet->text ); ?></p>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<p>Twitter: No tweets found for this username or invalid configuration</p>
						<?php endif; ?>
				<?php else : ?>
					<p>Twitter username not set</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="mobile-social-line-divider">
			<img src="<?php bloginfo('template_url'); ?>/images/line-divider-instagram.png" alt="Twitter"/>
		</div>		
		<div class="social_footer_section">
            <a href="https://instagram.com/tahoenorth/" target="_blank"><img class="instagram" src="<?php bloginfo('template_url'); ?>/images/social-instagram.png" alt="Instagram"/></a>
            <div class="instagram"></div>
			<div class="social_footer_content">
				<?php if ( !empty ( $instagram_username ) ) : ?>
					<div class="instagram_media">
						<?php $instagram_media = get_instagram_lastest_post( $instagram_username ); ?>
						<?php if ( $instagram_media ) : ?>
							<a target="_blank" href="<?php echo $instagram_media->link; ?>">
								<img alt="<?php echo isset( $instagram_media->caption ) ? $instagram_media->caption->text : "Instagram Image" ; ?>" src="<?php echo $instagram_media->images->standard_resolution->url; ?>">
							</a>
							<?php if ( isset( $instagram_media->caption ) ) : ?>
								<p><?php echo get_text_with_link( $instagram_media->caption->text ); ?></p>
							<?php endif; ?>
						<?php else : ?>
							<p>Instagram: No feeds found for this username or invalid configuration</p>
						<?php endif; ?>
					</div>
				<?php else : ?>
					<p>Instagram username not set</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="mobile-social-line-divider">
			<img src="<?php bloginfo('template_url'); ?>/images/line-divider-facebook.png" alt="Twitter"/>
		</div>			
		<div class="social_footer_section">
            <a href="https://www.facebook.com/LakeTahoeNorth" target="_blank"><img class="facebook" src="<?php bloginfo('template_url'); ?>/images/social-facebook.png" alt="Facebook"/></a>
			<div class="social_footer_content">
				<?php if ( !empty( $facebook_page_id ) ) : ?>
					<?php $feed = get_facebook_latest_post( $facebook_page_id ); ?>
					<?php if ( $feed ) : ?>
						<?php if ( $feed['type'] == 'status' || $feed['type'] == 'link' || $feed['type'] == 'photo' || $feed['type'] == 'video' ) : ?>						
							<div class="facebook_update">
								<h3>Latest News</h3>
							
								<?php if ( $feed['type'] == 'status' && !empty( $feed['message'] ) ) : // Layout for Status ?>
									<p><?php echo get_text_with_link( $feed['message'] ); ?></p>
								<?php endif; ?>
								
								<?php if ($feed['type'] == 'link' ) : // Layout for Links ?>
									<a href="<?php echo $feed['link']; ?>" target="_blank">
										<?php if ( !empty( $feed['picture'] ) ) :?>
											<img src="<?php echo $feed['picture']; ?>" alt="<?php echo empty( $feed['name'] ) ? "Facebook Image": $feed['name']; ?>">
										<?php endif; ?>
									</a>
									<?php if ( !empty( $feed['message'] ) ) : ?>
										<p><?php echo get_text_with_link( $feed['message'] ); ?></p>
									<?php endif; ?>
								<?php endif; ?>
								
								<?php if ( $feed['type'] == 'photo' || $feed['type'] == 'video' ) : // Layout for Photos/Videos ?>
									<a href="<?php echo $feed['link']; ?>" target="_blank">
										<img src="<?php echo $feed['picture']; ?>" alt="<?php echo empty( $feed['message'] ) ? "Facebook Image": $feed['message']; ?>">
									</a>
									<?php if ( !empty ( $feed['message'] ) ) : ?>
										<p><?php echo get_text_with_link( $feed['message'] ); ?></p>
									<?php endif; ?>
								<?php endif; ?>
								<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FLakeTahoeNorth&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=false&amp;height=100&amp;appId=159275264270479" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:100px;" allowTransparency="true"></iframe>
							</div>
						<?php endif; ?>
					<?php else : ?>
						<p>Facebook: No feeds found for this Page ID</p>
					<?php endif; ?>
				<?php else : ?>
					<p>Facebook Page ID not set</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
