<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>
<?php
	global $wp_query;
	$theQuery = $wp_query->query;
	$eventTaxonomy = get_terms('tribe_events_cat');
?>

<div class="events_top" data-category="<?php echo $theQuery[tribe_events_cat]; ?>">
	<p><?php the_field('events_copy', 'options'); ?></p>
</div>
<div class="sort_container">
	<h3 class="results_number">0 Results</h3>
	<?php
		if (is_archive()) {
			$termName = get_term_by('slug', $theQuery[tribe_events_cat], 'tribe_events_cat');
			echo '<h3 class="results_category"> For '.$termName->name.'</h3>';
		}
	?>
	<div class="filter_events">
		<label>FILTER BY:</label>
		<select id="filter_events">
			<option value="/events">All</option> 
			<?php foreach($eventTaxonomy as $term) : ?>
				<?php $termID = $term->term_id; settype($termID, 'integer'); ?>
				<?php $termLink = get_term_link($termID, 'tribe_events_cat'); ?>
				<option value="<?php echo $termLink; ?>" <?php if($termName) { if($termName->name == $term->name) { echo 'selected="selected"'; } } ?>><?php echo $term->name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="wave_border"></div>
	<div class="blue_border_button mobile_filter_button">
		<a href="#">Filter Results</a>
	</div>
	<?php 
	$current_date = date('D m/d/Y');
	$tomorrow_date = date('D m/d/Y', strtotime('+ 14 day'));
?>
	<div class="event_filters filter_sidebar">
		<div class="mobile_filter_close">
			<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/mobile_close_popup.png" alt="close_popup"></a>
		</div>
		<div class="filter_lists_container">
			<div class="date_filters">
				<div class="sort_to">
					<h3>From</h3>
					<input type="text" id="start_date" value="<?php echo $current_date; ?>">
				</div>
				<div class="sort_from">
					<h3>To</h3>
					<input type="text" id="end_date" value="<?php echo $tomorrow_date; ?>">
				</div>
			</div>
			<div class="location_filters">
				
			</div>
			<div class="category_filters">
				
			</div>
		</div>
		<div class="mobile_apply_filters">
			<div class="blue_border_button">
				<a href="#">Apply Filters</a>
			</div>
		</div>
	</div>
</div>
<div class="events_list"></div>
