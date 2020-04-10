<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

global $tribe;
$tribe = true;

get_header(); ?>

<section class="events wrapper">
    <div class="container">
	   	<div class="content">
			<?php tribe_events_before_html(); ?>
			<?php tribe_get_view(); ?>
			<?php tribe_events_after_html(); ?>
		</div>
		
		<?php
			if(is_single()) { 
				get_template_part('sidebar', 'single-event'); 
			} else {
				get_template_part('sidebar', 'flexible-content');
			}
		?>
    </div>
</section>

<?php get_template_part('content', 'social-footer');  ?>
	
<?php get_template_part('content', 'secondary-footer'); ?>
	
<?php get_footer(); ?>