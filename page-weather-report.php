<?php
/**
 *
 * Template Name: Weather Report
 *
 */

get_header(); ?>

	<section class="snow_report wrapper">
		<article class="container">
			<div class="content">
				<?php if ( get_field( 'weather_enabled', 'options' ) ) : ?>
					<?php $location = get_field( 'weather_location', 'options' ); ?>
					<?php $location_woeid = get_field( 'location_woeid', 'options' ); ?>
					<?php echo do_shortcode('[awesome-weather woeid="'. $location_woeid .'" location="'. $location . '" size="custom" custom_template_name="tahoe" forecast_days="7" show_icons="1" hide_stats="1" custom_bg_color="#ece3d9"]'); ?>
				<?php endif; ?>
				
				<?php if ( get_field( 'snow_report_enabled', 'options' ) ) : ?>
					<?php if ( get_field( 'api_access_token', 'options' ) ) : ?>
						<div class="status_report">
							<h4 class="snow_report_title">Weather Report By Resort</h4>
							<?php if( have_rows( 'resort_list', 'options' ) ): ?>
								<div class="filter">
									<label for="resort_select">Filter By:</label>
									<select class="resort_filter" id="resort_dropdown">
										<?php while ( have_rows( 'resort_list', 'options' ) ) : the_row(); ?>
											<option value="<?php the_sub_field( 'resort_id', 'options' ); ?>"><?php the_sub_field( 'resort_name', 'options' ); ?></option>
										<?php endwhile; ?>
									</select>
								</div>
							<?php endif; ?>
							<div class="wave_border"></div>							
							<div class="status">
								<h2 class="open_status">-</h2>
								<p>Open Status</p>
							</div>
							<div class="status">
								<h2 class="base_depth">-</h2>
								<p>Base Depth(in.)</p>
							</div>
							<div class="status">
								<h2 class="snowfall">-</h2>
								<p>48 HR Snowfall</p>
							</div>
							<div class="status">
								<h2 class="surface_condition">-</h2>
								<p>Surface Condition</p>
							</div>
						</div>
					<?php else : ?>
						<p>Weather Report API Token Error</p>
					<?php endif; ?>
				<?php endif; ?>
				<div class="road_conditions">
					<h4>Road Conditions</h4>
					<div class="wave_border"></div>
					<?php if(have_rows('road_condition_links')) : ?>
						<ul class="road_condition_links">
						<?php while(have_rows('road_condition_links')) : the_row(); ?>
							<li><a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?></li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>	
				</div>
				
			</div>
			<?php get_template_part('sidebar', 'flexible-content'); ?>
		</article>
	</section>

		<?php get_template_part('content', 'social-footer'); ?>
		
		<?php get_template_part('content', 'secondary-footer'); ?>	
	
<?php get_footer(); ?>