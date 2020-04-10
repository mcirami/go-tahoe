<?php
/**
 * The Header for our theme.
 *
 * @package boiler
 */

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">

<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Archer Font from Typography.com -->
<link rel="stylesheet" type="text/css" href="//cloud.typography.com/6200912/750866/css/fonts.css" />
<!-- ITC Franklin Gothic from fonts.com -->
<script type="text/javascript" src="http://fast.fonts.net/jsapi/5f73308b-1890-4136-8c93-0e223bc2a3f9.js"></script>

<?php wp_head(); ?>
</head>

<?php get_template_part('content', 'slide-nav'); ?>

<div class="site_wrap">
<body <?php body_class(); ?>>
	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

        <header id="global_header">
            <div class="container nav_width">
                <div class="logo_container">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" /></a>
                </div>
                <div class="mobile_menu_button">
                	<img src="<?php echo bloginfo('template_url'); ?>/images/hamburger.png" />
                </div>
                <?php get_template_part('content', 'menu'); ?>
            </div>
        </header>
        
        <div class="hero_section">
			<?php 
				global $tribe;
				if(is_search()) {
					get_template_part('content', 'search-hero'); 
				} else if(is_singular('directory_listing')) {
					get_template_part('content', 'listing-hero'); 
				} else if (tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type() || is_singular( 'tribe_events' ) || $tribe) {
					get_template_part('content', 'events-hero'); 
				} else if (is_singular('post') || is_singular('deal')) {
					get_template_part('content', 'parent-heroes');
				} else if (is_archive()) {
					get_template_part('content', 'archive-heroes');
				} else {
					get_template_part('content', 'heroes'); 
				}
			?>
			<?php if ( is_front_page() ) : ?>
				<?php if ( get_field( 'weather_enabled', 'options' ) ) : ?>
					<?php $location = get_field( 'weather_location', 'options' ); ?>
					<?php $location_woeid = get_field( 'location_woeid', 'options' ); ?>
					<?php $full_report_link = get_field( 'full_winter_report_page', 'options' ); ?>
					<div class="awesome-weather-hero">
						<?php echo do_shortcode('[awesome-weather woeid="'. $location_woeid .'" location="'. $location . '" forecast_days="hide" show_icons="1" hide_stats="1"]'); ?>			
						<div class="white_border_button">
							<a href="<?php echo $full_report_link; ?>">Full Weather Report</a>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- end hero_section -->